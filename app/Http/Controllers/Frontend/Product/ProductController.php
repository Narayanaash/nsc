<?php

namespace App\Http\Controllers\Frontend\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Response;
use DB;
use Auth;
use App\Order;
use App\Product;
class ProductController extends Controller
{
    public function index($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(500);
        }

        $category  = DB::table('category')->where('id', $id)->get('heading');
        $category_to_index_category = DB::table('category')->get();
        $products  = Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(20);
        return view('frontend.pages.products', ['products' => $products, 'category' => $category, 'category_to_index_category' => $category_to_index_category, 'id' => $id]);
    }

    
}