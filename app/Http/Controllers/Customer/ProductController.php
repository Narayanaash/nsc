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
use App\OrderItem;
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
        $order_item = new OrderItem;
        $order_item->item_code = $request->input('item_code');
        $order_item->item_name = $request->input('item_name');
        $order_item->item_qty = $request->input('item_qty');
        $order_item->item_category = $request->input('item_category');
        $order_item->save();

        $order = new Order;
        $order->order_id = $this->orderID($order_item->id);
        $order->user_id = Auth::guard('customer')->user()->id;
        $order->order_item_id = $order_item->id;
        if($order->save()){
            $token = rand(1111, 9999);
            
            return redirect()->route('customer.thank_you')
        }
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
}
