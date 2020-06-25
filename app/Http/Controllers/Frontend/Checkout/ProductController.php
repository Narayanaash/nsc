<?php

namespace App\Http\Controllers\Frontend\Checkout;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Controllers\Controller;
use Response;
use DB;

class ProductController extends Controller
{
    public function index($id)
    {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            abort(500);
        }

        $product_checkout  = DB::table('product')
                           ->join('category', 'product.category_id', '=', 'category.id')
                           ->select('product.*', 'category.heading')
                           ->where('product.id', $id)
                           ->get();

        $products_from_this_category = DB::table('product')
                                     ->where('category_id', $product_checkout[0]->category_id)
                                     ->where('id', '!=', $id)
                                     ->take(12)
                                     ->get();
                                     
        $category_to_index_category = DB::table('category')->get();

        return view('frontend.pages.checkout', ['product_checkout' => $product_checkout, 'products' => $products_from_this_category, 'category_to_index_category' => $category_to_index_category]);
    }
}