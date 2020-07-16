<?php

namespace App\Http\Controllers\Frontend\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Response;
use Carbon;
use DB;
use Auth;
class CheckoutController extends Controller
{
    public function store(Request $request, $p_id)
    {
      $customer_name   = $request->input('customer_name');
      $customer_phone  = $request->input('customer_phone');
      $productName     = $request->input('productName');
      $code            = $request->input('code');
      $qty             = $request->input('qty');
      if (strlen($customer_name) == 0) {
        echo "<p class=\"text-danger\">Inavild name!</p>";
        die();
      } elseif (strlen($customer_phone) ==0 || strlen($customer_phone) < 10) {
        echo "<p class=\"text-danger\">Invalid phone number!</p>";
        die();
      }

      try {
            $id = decrypt($p_id);
        } catch (DecryptException $e) {
            abort(500);
        }

      // check for product existence
      $check_count = DB::table('product')->where('id', $id)->count();
      if ($check_count < 1) {
        echo "<p class=\"text-danger\">Product not found!</p>";
        die();
      }

      $date_i  = now();
      $date_i  = date('m/d/Y', strtotime($date_i));
      if(Auth::guard('customer')->check()){
        $checkout = DB::table('checkout')->where('productName', $productName)->where('auth_name', Auth::guard('customer')->user()->id)->count();
       if($checkout < 1){
         DB::table('checkout')->insert([
           "product_id"      => $id,
           "customer_name"   => $request->input('customer_name'),
           "customer_phone"  => $request->input('customer_phone'),
           "productName"     => $request->input('productName'),
           "code"             => $request->input('code'),
           "qty"              => $request->input('qty'),
           "auth_name"       => Auth::guard('customer')->user()->id,
           "date"            => $date_i,
           "created_at"      => \Carbon\Carbon::now(),
         ]);
         echo "<p class=\"text-success\">Thank you, one of our team will be in contact with you shortly.</p>";
       }else{
         echo "<p class=\"text-danger\"> You have already requested this product. Check the status in the ORDER list. </p>";
       }
      }else{
        return redirect()->route('customer.login');
      }

    }
}