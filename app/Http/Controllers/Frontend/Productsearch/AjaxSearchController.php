<?php

namespace App\Http\Controllers\Frontend\Productsearch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class AjaxSearchController extends Controller
{
    public function get(Request $request, $keyword)
    {
      $search_arr = explode(' ',trim($keyword));

      if ($request->ajax()) {
        foreach ($search_arr as $key => $value) {
            $array[] = $value;
          }
        $product = DB::table('product')
               ->where('name', 'LIKE', '%'.$keyword.'%')
               ->select('name', 'file', 'id')
               ->distinct('name')
               ->orderBy('id', 'desc')
               ->take(20)
               ->get();
        if (count($product) == 0) {
          $product = DB::table('product')
               ->join('category', 'product.category_id', '=', 'category.id')
               ->Where(function ($query) use($array) {
                 for ($i = 0; $i < count($array); $i++){
                    $query->orWhere('product.name', 'like',  '%' . $array[$i] .'%');
                 }      
                })
               ->orWhere('category.heading', 'LIKE', '%'.$keyword.'%')
               ->select('product.name', 'product.file', 'product.id')
               ->distinct('product.name')
               ->orderBy('id', 'desc')
               ->take(20)
               ->get();
        }
        
        $response = "";
        foreach ($product as $single_product) {
        $response .= '<div class="col-md-3 p-1" style="margin-bottom: 5px;">
                        <img src="'.asset('assets/product/thumbnail/'.$single_product->file.'').'" alt="" style="margin-top: -6px;">
                      </div>
                      <div class="col-md-9 p-1 last-child-border-0" style="border-bottom: 1px;border-bottom-style: dashed;border-color: #dadada;">
                        <span><a href="'.route('frontend.checkout', ['p_id' => encrypt($single_product->id)]).'">'.$single_product->name.'</a></span>
                      </div>';
      }
      echo $response;
      } else {
          if (strlen($keyword) < 2) {
            $empt = array();
            return view('frontend.pages.searchresult', ['keyword' => $keyword, 'query' => $keyword, 'products' => $empt, 'msg' => '<p class="text-danger">Search string must be at least 3 characters</p>']);
          }
          foreach ($search_arr as $key => $value) {
            $array[] = $value;
          }
        ////
          $product = DB::table('product')
               ->where('name', 'LIKE', '%'.$keyword.'%')
               ->select('name', 'file', 'id')
               ->distinct('name')
               ->orderBy('id', 'desc')
               ->paginate(20);
        if (count($product) == 0) {
          $product = DB::table('product')
               ->join('category', 'product.category_id', '=', 'category.id')
               ->Where(function ($query) use($array) {
                 for ($i = 0; $i < count($array); $i++){
                    $query->orWhere('product.name', 'like',  '%' . $array[$i] .'%');
                 }      
                })
               ->orWhere('category.heading', 'LIKE', '%'.$keyword.'%')
               ->select('product.name', 'product.file', 'product.id')
               ->distinct('product.name')
               ->orderBy('id', 'desc')
               ->paginate(20);
        }
        /////
        $category_to_index_category = DB::table('category')->get();
        
        return view('frontend.pages.searchresult', ['products' => $product, 'query' => $keyword ,'keyword' => \Illuminate\Support\Str::limit($keyword, 10, $end='...'), 'category_to_index_category' => $category_to_index_category]);
      }
    }
}