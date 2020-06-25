<?php

namespace App\Http\Controllers\Auth\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Response;
use Carbon;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $category = DB::table('category')->get();
        return view('admin.auth.product.index', ['category' => $category]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'             => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category'         => "required",
            'name'             => "required|max:200",
            'product_code'     => "max:20",
            // 'price'            => 'required',
        ]);

        try {
            $category_id = decrypt($request->input('category'));
        } catch (Exception $e) {
            return redirect()->back()->with('msg', '<p class="text-danger">Something Went Wrong!, Try Again</p>');
        }

        $check_category_existence = DB::table('category')->where('id', $category_id)->count();
        if ($check_category_existence < 0) {
            return redirect()->back()->with('msg', '<p class="text-danger">Category Not Found!</p>');
        }

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/product/checkout/" . $file_name));

            $image_resize->resize(280, 280, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/product/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/product/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('product')->insert(
                [
                    'name'          => $request->input('name'),
                    'category_id'   => $category_id,
                    'product_code'  => strtoupper($request->input('product_code')),
                    'file'          => $file_name,
                    // 'price'         => $request->input('price'),
                    'date'          => $date_i,
                    "created_at"    =>  \Carbon\Carbon::now(),
                    "updated_at"    => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Product added successfully</p>');

        } else
            return redirect()->back()->with('msg', '<p class="text-danger">Please select image!</p>');
    }

    public function show($category)
    {
        $id = decrypt($category);
        $category_name = DB::table('category')->where('id', $id)->get('heading');
        return view('admin.auth.product.show', ['catgory' => $category, 'category_name' => $category_name]);
    }

    public function updateShow($id)
    {
        $id       = decrypt($id);
        $product  = DB::table('product')
                  ->where('id', $id)
                  ->get();

        $category = DB::table('category')
                  ->select('heading', 'id')
                  ->get();

        return view('admin.auth.product.update', ['category' => $category, 'product' => $product]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'file'             => 'image|mimes:jpeg,png,jpg,gif,svg',
            'category'         => "required",
            'name'             => "required|max:200",
            'product_code'     => "max:20",
            // 'price'            => 'required',
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/product/checkout/" . $file_name));

            $image_resize->resize(280, 280, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/product/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/product/thumbnail/" . $file_name));

            $product_data = DB::table('product')
            ->where('id', decrypt($id))
            ->get();

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('product')->where('id', decrypt($id))->update(
                [
                    'name'          => $request->input('name'),
                    'category_id'   => $request->input('category'),
                    'product_code'  => strtoupper($request->input('product_code')),
                    'file'          => $file_name,
                    // 'price'         => strtoupper($request->input('price')),
                    'date'          => $date_i,
                    "updated_at"    => \Carbon\Carbon::now(),
                ]
            );

            if(file_exists(public_path("assets/product/" . $product_data[0]->file))) {
            File::delete(public_path("assets/product/" . $product_data[0]->file));
            }

            if(file_exists(public_path("assets/product/thumbnail/" . $product_data[0]->file))) {
                File::delete(public_path("assets/product/thumbnail/" . $product_data[0]->file));
            }

            if(file_exists(public_path("assets/product/checkout/" . $product_data[0]->file))) {
                File::delete(public_path("assets/product/checkout/" . $product_data[0]->file));
            }

            return redirect()->back()->with('msg', '<p class="text-success">Product updated successfully</p>');

        } else {

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('product')->where('id', decrypt($id))->update(
                [
                    'name'          => $request->input('name'),
                    'category_id'   => $request->input('category'),
                    'product_code'  => strtoupper($request->input('product_code')),
                    // 'price'         => strtoupper($request->input('price')),
                    'date'          => $date_i,
                    "updated_at"    => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Product updated successfully</p>');
        }
    }

    public function get(Request $request, $id)
    {
        $id = decrypt($id);

        $columns = array(
            0 => 'id',
            1 => 'file',
            2 => 'name',
            3 => 'code',
            4 => 'date',
            5 => 'action',
        );

        $totalData = DB::table('product')->where('category_id', $id)->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $product_data = DB::table('product')
                ->where('category_id', $id)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $product_data = DB::table('product')
                ->orWhere('product.name', 'LIKE', "%{$search}%")
                ->orWhere('product.product_code', 'LIKE', "%{$search}%")
                // ->orWhere('product.price', 'LIKE', "%{$search}%")
                ->orWhere('product.date', 'LIKE', "%{$search}%")
                ->where('category_id', $id)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('product')
                ->orWhere('product.name', 'LIKE', "%{$search}%")
                ->orWhere('product.product_code', 'LIKE', "%{$search}%")
                // ->orWhere('product.price', 'LIKE', "%{$search}%")
                ->orWhere('product.date', 'LIKE', "%{$search}%")
                ->where('category_id', $id)
                ->count();
        }

        $data = array();

        if (!empty($product_data)) {

            $cnt = 1;

            foreach ($product_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning mr-3\" href=\"" . route('product.update_view', ['id' => encrypt($single_data->id)]) . "\">Update</a><a class=\"confirmation-callback btn btn-danger\" href=\"" . route('product.delete', ['id' => encrypt($single_data->id)]) . "\">Delete</a>";

                $file   = "";
                $file   = "<a class=\"publication_file\" href='../../../../assets/product/checkout/".$single_data->file."' target='_blank'><img src=\"../../../../assets/product/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']           = $cnt;
                $nestedData['file']         = $file;
                $nestedData['name']         = $single_data->name;
                $nestedData['code']         = empty($single_data->product_code) ? '<span class="text-muted text-">N/A</span>' : $single_data->product_code;
                // $nestedData['price']        = $single_data->price;
                $nestedData['date']         = $single_data->date;
                $nestedData['action']       = $action;

                $data[]                     = $nestedData;

                $cnt++;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        print json_encode($json_data);
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $product_data = DB::table('product')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/product/" . $product_data[0]->file))) {
            File::delete(public_path("assets/product/" . $product_data[0]->file));
        }

        if(file_exists(public_path("assets/product/thumbnail/" . $product_data[0]->file))) {
            File::delete(public_path("assets/product/thumbnail/" . $product_data[0]->file));
        }

        if(file_exists(public_path("assets/product/checkout/" . $product_data[0]->file))) {
            File::delete(public_path("assets/product/checkout/" . $product_data[0]->file));
        }

        DB::table('product')
            ->where('id', $id)
            ->delete();
        DB::table('checkout')
            ->where('product_id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}