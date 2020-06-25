<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Response;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $category_to_index_category = DB::table('category')->paginate(25);
        $category_headings = DB::table('category')->get();
        return view('frontend.pages.index', ['category_to_index_category' => $category_to_index_category, 'category_headings' => $category_headings]);
    }
}