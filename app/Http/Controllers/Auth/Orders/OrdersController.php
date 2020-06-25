<?php

namespace App\Http\Controllers\Auth\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Response;
use DB;

class OrdersController extends Controller
{
    public function show()
    {
        return view('admin/auth/customerorder.show');
    }

    public function get(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'file',
            2 => 'name',
            3 => 'code',
            4 => 'date',
            5 => 'action',
            // 6 => 'price',
            6 => 'customer_name',
            7 => 'customer_phone',
        );

        $totalData = DB::table('checkout')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $checkout_data = DB::table('checkout')
                ->join('product', 'checkout.product_id', '=', 'product.id')
                ->select('checkout.*', 'product.file', 'product.name', 'product.product_code')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {

            $search = $request->input('search.value');

            $checkout_data = DB::table('checkout')
                ->join('product', 'checkout.product_id', '=', 'product.id')
                ->select('checkout.*', 'product.file', 'product.name', 'product.product_code')
                ->orWhere('product.name', 'LIKE', "%{$search}%")
                ->orWhere('product.product_code', 'LIKE', "%{$search}%")
                // ->orWhere('product.price', 'LIKE', "%{$search}%")
                ->orWhere('product.date', 'LIKE', "%{$search}%")
                ->orWhere('checkout.customer_name', 'LIKE', "%{$search}%")
                ->orWhere('checkout.customer_phone', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('checkout')
                ->join('product', 'checkout.product_id', '=', 'product.id')
                ->select('checkout.*', 'product.file', 'product.name', 'product.product_code')
                ->orWhere('product.name', 'LIKE', "%{$search}%")
                ->orWhere('product.product_code', 'LIKE', "%{$search}%")
                // ->orWhere('product.price', 'LIKE', "%{$search}%")
                ->orWhere('product.date', 'LIKE', "%{$search}%")
                ->orWhere('checkout.customer_name', 'LIKE', "%{$search}%")
                ->orWhere('checkout.customer_phone', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($checkout_data)) {

            $cnt = 1;

            foreach ($checkout_data as $single_data) {

                $action = "";
                $action = "<a class=\"confirmation-callback btn btn-danger\" href=\"" . route('orders.delete', ['id' => encrypt($single_data->id)]) . "\">Delete</a>";

                $file   = "";
                $file   = "<a class=\"publication_file\" href='../../../assets/product/checkout/".$single_data->file."' target='_blank'><img src=\"../../../assets/product/thumbnail/".$single_data->file."\"><i class=\"fa fa-share-square\"></i></a>";

                $nestedData['id']               = $cnt;
                $nestedData['file']             = $file;
                $nestedData['name']             = $single_data->name;
                $nestedData['code']             = empty($single_data->product_code) ? '<span class="text-muted text-">N/A</span>' : $single_data->product_code;
                // $nestedData['price']         = $single_data->price;
                $nestedData['customer_name']    = $single_data->customer_name;
                $nestedData['customer_phone']   = $single_data->customer_phone;
                $nestedData['date']             = $single_data->date;
                $nestedData['action']           = $action;

                $data[]  = $nestedData;

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
        DB::table('checkout')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}