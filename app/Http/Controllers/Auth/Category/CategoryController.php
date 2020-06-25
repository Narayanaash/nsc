<?php

namespace App\Http\Controllers\Auth\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Response;
use DB;
use Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.auth.category.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'heading'      => "required|max:90",
        ]);

        if ($request->hasFile('file')) {

            // check for duplicate
            $given_heading    = strtolower($request->input('heading'));
            $check_count      = DB::table('category')->where('heading', $given_heading)->count();

            if ($check_count > 0) {
                return redirect()->back()->with('msg', '<p class="text-warning">Category already present</p>');
            }

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(280, 280, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/category/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/category/thumbnail/" . $file_name));

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('category')->insert(
                [
                    'file'        => $file_name,
                    'heading'     => strtolower($request->input('heading')),
                    'date'        => $date_i,
                    "created_at"  =>  \Carbon\Carbon::now(),
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Category added successfully</p>');

        } else
            return redirect()->back()->with('msg', '<p class="text-danger">Please select image!</p>');
    }

    public function show()
    {
        return view('admin.auth.category.show');
    }

        public function updateShow($id)
    {
        $category_data  = DB::table('category')
                        ->where('id', decrypt($id))
                        ->get();
        $heading        = $category_data[0]->heading;
        $file           = $category_data[0]->file;
        return view('admin.auth.category.update', ['heading' => $heading, 'file' => $file, 'id' => $id]);
    }

        public function update(Request $request, $id)
    {

        $request->validate([
            'file'         => 'image|mimes:jpeg,png,jpg,gif,svg',
            'heading'      => "required|max:50",
        ]);

        if ($request->hasFile('file')) {

            $image        = $request->file('file');
            $file_name    = time() . ".jpg";

            $image_resize = Image::make($image->getRealPath());

            $image_resize->resize(280, 280, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/category/" . $file_name));

            $image_resize->resize(68, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save(public_path("assets/category/thumbnail/" . $file_name));

            $id = decrypt($id);
            $category_data = DB::table('category')
            ->where('id', $id)
            ->get();

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('category')->where('id', $id)->update(
                [
                    'file'        => $file_name,
                    'heading'     => strtolower($request->input('heading')),
                    'date'        => $date_i,
                    "updated_at"  => \Carbon\Carbon::now(),
                ]
            );

            if(file_exists(public_path("assets/category/" . $category_data[0]->file))) {
            File::delete(public_path("assets/category/" . $category_data[0]->file));
            }

            if(file_exists(public_path("assets/category/thumbnail/" . $category_data[0]->file))) {
            File::delete(public_path("assets/category/thumbnail/" . $category_data[0]->file));
            }

            return redirect()->back()->with('msg', '<p class="text-success">Category updated successfully</p>');

        } else {

            $date_i  = now();
            $date_i  = date('m/d/Y', strtotime($date_i));

            DB::table('category')->where('id', decrypt($id))->update(
                [
                    'heading'      => $request->input('heading'),
                    'date'         => $date_i,
                    'updated_at'   => \Carbon\Carbon::now(),
                ]
            );

            return redirect()->back()->with('msg', '<p class="text-success">Category updated successfully</p>');
        }
    }

    public function get(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'file',
            2 => 'date',
            3 => 'action',
            4 => 'heading',
        );

        $totalData = DB::table('category')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $category_data = DB::table('category')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

        } else {

            $search = $request->input('search.value');

            $category_data = DB::table('category')
                ->orWhere('category.heading', 'LIKE', "%{$search}%")
                ->orWhere('category.date', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('category')
                ->orWhere('category.heading', 'LIKE', "%{$search}%")
                ->orWhere('category.date', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($category_data)) {

            $cnt = 1;

            foreach ($category_data as $single_data) {

                $action = "";
                $action = "<a class=\"btn btn-warning mr-3\" href=\"" . route('category.update_view', ['id' => encrypt($single_data->id)]) . "\">Update</a><a class=\"confirmation-callback btn btn-danger\" href=\"" . route('category.delete', ['id' => encrypt($single_data->id)]) . "\">Delete</a>";

                $file   = "";
                $file   = "<a class=\"publication_file\" href='../../../assets/category/".$single_data->file."' target='_blank'><img src=\"../../../assets/category/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']       = $cnt;
                $nestedData['file']     = $file;
                $nestedData['heading']  = $single_data->heading;
                $nestedData['date']     = $single_data->date;
                $nestedData['action']   = $action;

                $data[]                 = $nestedData;

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
        $category_data = DB::table('category')
            ->where('id', $id)
            ->get();

        if(file_exists(public_path("assets/category/" . $category_data[0]->file))) {
            File::delete(public_path("assets/category/" . $category_data[0]->file));
        }

        if(file_exists(public_path("assets/category/thumbnail/" . $category_data[0]->file))) {
            File::delete(public_path("assets/category/thumbnail/" . $category_data[0]->file));
        }

        DB::table('category')
            ->where('id', $id)
            ->delete();

        $product_data = DB::table('product')
            ->where('category_id', $id)
            ->get();

        if (count($product_data) > 0) {

            $product_data = DB::table('product')
            ->where('category_id', $id)
            ->get();

            foreach ($product_data as $single_product) {
                if(file_exists(public_path("assets/product/" . $single_product->file))) {
                    File::delete(public_path("assets/product/" . $single_product->file));
                }
                if(file_exists(public_path("assets/product/thumbnail/" . $single_product->file))) {
                File::delete(public_path("assets/product/thumbnail/" . $single_product->file));
                }
                if(file_exists(public_path("assets/product/checkout/" . $single_product->file))) {
                    File::delete(public_path("assets/product/checkout/" . $single_product->file));
                }
                DB::table('checkout')
                ->where('product_id', $single_product->id)
                ->delete();
            }
            DB::table('product')
            ->where('category_id', $id)
            ->delete();
        }

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}