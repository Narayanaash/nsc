<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showCustomerLoginForm(){
        return view('frontend.pages.login', ['url' => 'customer']);
    }

    public function customerLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'))->with('error','Email or password is incorrect!');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
}
