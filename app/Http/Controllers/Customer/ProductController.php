<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use App\Models\Customer;
use Auth;
use App\Address;
use DB;
use Carbon\Carbon;
use App\OrderCart;
use App\Order;
class ProductController extends Controller
{
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        if(Auth::guard('customer')->check()){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);    
            $cart->add($product, $product->id);
            $cart_insert = DB::table('order_carts')
                ->insert([
                    'user_id'     => Auth::guard('customer')->user()->id,
                    'product_id'     => $product->id,
                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);
        }else{
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);    
            $cart->add($product, $product->id);
        }

        $request->session()->put('cart', $cart);
        return redirect()->route('frontend.products', ['category_id' => encrypt($product->category_id)]);
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('frontend.pages.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontend.pages.cart', ['products' => $cart->items]);
    }

    public function getCheckout(){
        if(!Session::has('cart')){
            return view('frontend.pages.selectaddress');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $address = Address::where('user_id', Auth::guard('customer')->user()->id)->get();
        $order_cart = OrderCart::where('user_id', Auth::guard('customer')->user()->id)->get();
        return view('frontend.pages.selectaddress', ['products' => $cart->items, 'address' => $address]);
    }

    public function addAddress(Request $request){
       if($request->ajax()){
           $name = $request->input('name');
           $email = $request->input('email');
           $phone = $request->input('phone');
           $city = $request->input('city');
           $zip = $request->input('zip');
           $address = $request->input('address');
           $landmark = $request->input('landmark');
           
           $address = new Address;
           $address->user_id = Auth::guard('customer')->user()->id;
           $address->name = $name;
           $address->email = $email;
           $address->phone = $phone;
           $address->city = $city;
           $address->zip = $zip;
           $address->address = $address;
           $address->landmark = $landmark;
           if($address->save()){
               return 1;
           }else{
               return 2;
           }
       }
    }

    public function addOrder(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('frontend.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order;
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->street_address = $request->input('address');
        $order->city = $request->input('city');
        $order->zip = $request->input('zip');
        $order->landmark = $request->input('landmark');
        Auth::guard('customer')->user()->orders()->save($order);

        $order_id = DB::table('orders')
                ->where('id', $order->id)
                ->update([
                    'order_id' => $this->orderID($order->id),
                ]);
        Session::forget('cart');
        $token = rand(1111, 9999);
        return redirect()->route('customer.thank_you', ['token' => encrypt($token)]);
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->route('frontend.cart');
    }

    function orderID($id){
        $order = Order::count();
        if($order > 0){
            $first_name = 'N';
            $last_name = 'SC';
    
            $title_id = $first_name.$last_name;
            $l_id = 6 - strlen((string)$id);
            $generatedID = $title_id ;
            for ($i=0; $i < $l_id; $i++) { 
                $generatedID .= "0";
            }
            $generatedID .= $id;
            return $generatedID;
        }else{
            $generatedID = 'NSC000001';
            return $generatedID;
        }
    }

    public function cart()
    {
        return view('frontend.pages.cart');
    }

    public function thankYou($token){
        try {
            $token = decrypt($token);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        if($token){
            return view('frontend.pages.thankyou');
        }
    }
    
    public function userOrder(){
        $orders = Auth::guard('customer')->user()->orders;
        $orders->transform(function($order, $key){
             $order->cart = unserialize($order->cart);
             return $order;
        });
        return view('frontend.pages.orders', ['orders' => $orders]);
    }
}
