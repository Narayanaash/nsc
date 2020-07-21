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
use App\Qoutation;
use App\QoutationDetails;
class ProductController extends Controller
{
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        //  if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "product_code" => $product->product_code,
                        "quantity" => 1,
                        "photo" => $product->file,
                        "category_name" => $product->category->heading
                    ]
            ];
           
            session()->put('cart', $cart);
            return redirect()->back();
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back();
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "product_code" => $product->product_code,
            "quantity" => 1,
            "photo" => $product->file,
            "category_name" => $product->category->heading
        ];

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if(($request->id) && ($request->quantity))
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function getCart(){
        if(!Session::has('cart')){
            return view('frontend.pages.cart');
        }
        return view('frontend.pages.cart');
    }

    public function getCheckout(){
        if(!Session::has('cart')){
            return view('frontend.pages.selectaddress');
        }
       
        $address = Address::where('user_id', Auth::guard('customer')->user()->id)->get();
        return view('frontend.pages.selectaddress', ['address' => $address]);
    }

    public function addAddress(Request $request){
       if($request->ajax()){
           $name = $request->input('name');
           $email = $request->input('email');
           $phone = $request->input('phone');
           $city = $request->input('city');
           $zip = $request->input('zip');
           $addresses = $request->input('address');
           $landmark = $request->input('landmark');
           
           $address = new Address;
           $address->user_id = Auth::guard('customer')->user()->id;
           $address->name = $name;
           $address->email = $email;
           $address->phone = $phone;
           $address->city = $city;
           $address->zip = $zip;
           $address->street_address = $addresses;
           $address->landmark = $landmark;
           if($address->save()){
               return 1;
           }
       }
    }

    public function addOrder(Request $request){
       $this->validate($request, [
           'address_select'  => 'required'
       ]);

        if(!Session::has('cart')){
            return redirect()->route('frontend.cart');
        }
       
        $qoutation = new Qoutation;
        $qoutation->user_id = Auth::guard('customer')->user()->id;
        $qoutation->address_id = $request->input('address_select');
        $qoutation->quantity  = $request->input('item_qty');

        $qoutation->save();

        $cart = Session::get('cart');
        foreach ($cart as $key => $value) {
            $name = $value['name'];
            $code = $value['product_code'];
            $quantity = $value['quantity'];
            $photo = $value['photo'];
            $category_name = $value['category_name'];
            $qoutation_details = new QoutationDetails;
            $qoutation_details->qoutation_id = $qoutation->id;
            $qoutation_details->product_name = $name;
            $qoutation_details->product_code = $code;
            $qoutation_details->product_category = $category_name;
            $qoutation_details->photo = $photo;
            $qoutation_details->quantity = $quantity;
    
            $qoutation_details->save();
        } 

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
       $orders = Qoutation::with('qoutation_details')->where('user_id', Auth::guard('customer')->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.pages.orders', compact('orders'));
    }

    public function userQuery(){
       
        $checkout_data = DB::table('checkout')
                ->join('product', 'checkout.product_id', '=', 'product.id')
                ->select('checkout.*', 'product.id', 'product.file', 'product.name', 'product.product_code')
                ->where('checkout.auth_name', Auth::guard('customer')->user()->id)
                ->get();
        return view('frontend.pages.queries', compact('checkout_data'));   
    }
}

