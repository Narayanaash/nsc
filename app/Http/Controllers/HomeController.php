<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category_count  = DB::table('category')->count();
        $product_count   = DB::table('product')->count();
        $orders_count    = DB::table('checkout')->count();
        $queries_count   = DB::table('queries')->count();
        
        return view('admin.auth.home.home',['category_count' => $category_count, 'product_count' => $product_count, 'orders_count' => $orders_count, 'queries_count' => $queries_count]);
    }
}
