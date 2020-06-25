<?php

namespace App\Http\Controllers\Frontend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        $catgeory  = DB::table('category')->paginate(20);
        $category_to_index_category = DB::table('category')->get();
        return view('frontend.pages.category', ['catgeory' => $catgeory, 'category_to_index_category' => $category_to_index_category]);
    }
}