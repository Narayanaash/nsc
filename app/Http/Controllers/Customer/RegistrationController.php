<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Hash;
class RegistrationController extends Controller
{
    public function addCustomer(Request $request){
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required|numeric|min:10',
            'password'  => 'required|confirmed|min:6',
        ]);

        $customer = new Customer;
        $customer->name     = $request->input('name');
        $customer->email    = $request->input('email');
        $customer->phone    = $request->input('phone');
        $customer->password = Hash::make($request->input('password'));
        if($customer->save()){
            return redirect()->route('customer.login')->with('message','You are now registerd! Login In Please');;
        }
    }
}
