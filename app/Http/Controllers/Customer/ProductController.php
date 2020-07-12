<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use App\Models\Customer;
use Auth;
class ProductController extends Controller
{
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);    
        $cart->add($product, $product->id);

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
        $customer = Customer::find(Auth::guard('customer')->user()->id);
        return view('frontend.pages.selectaddress', ['products' => $cart, 'customer' => $customer]);
    }

    public function addAddress(Request $request){
       if($request->ajax()){
           $formdata = $request->formdata;
           dd($formdata);
       }
    }

    public function deleteCart($id)
    {
        dd($id);
        $product = session::forget('cart', $id)->first();
        $product->destroy($id);
        return redirect()->back();
    }
}
