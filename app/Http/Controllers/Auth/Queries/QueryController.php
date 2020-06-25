<?php

namespace App\Http\Controllers\Auth\Queries;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Response;
use DB;

class QueryController extends Controller
{
    public function show()
    {
        return view('admin/auth/queries.show');
    }

    public function get(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'phone',
            4 => 'subject',
            5 => 'message',
            6 => 'date',
            7 => 'action',
        );

        $totalData = DB::table('queries')->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $checkout_data = DB::table('queries')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {

            $search = $request->input('search.value');

            $checkout_data = DB::table('queries')
                ->orWhere('queries.name', 'LIKE', "%{$search}%")
                ->orWhere('queries.email', 'LIKE', "%{$search}%")
                ->orWhere('queries.phone', 'LIKE', "%{$search}%")
                ->orWhere('queries.subject', 'LIKE', "%{$search}%")
                ->orWhere('queries.message', 'LIKE', "%{$search}%")
                ->orWhere('queries.created_at', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = DB::table('queries')
                ->orWhere('queries.name', 'LIKE', "%{$search}%")
                ->orWhere('queries.email', 'LIKE', "%{$search}%")
                ->orWhere('queries.phone', 'LIKE', "%{$search}%")
                ->orWhere('queries.subject', 'LIKE', "%{$search}%")
                ->orWhere('queries.message', 'LIKE', "%{$search}%")
                ->orWhere('queries.created_at', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        if (!empty($checkout_data)) {

            $cnt = 1;

            foreach ($checkout_data as $single_data) {

                $action = "";
                $action = "<a class=\"confirmation-callback btn btn-danger\" href=\"" . route('queries.delete', ['id' => encrypt($single_data->id)]) . "\">Delete</a>";

                $nestedData['id']           = $cnt;
                $nestedData['name']         = $single_data->name;
                $nestedData['email']        = $single_data->email;
                $nestedData['phone']        = $single_data->phone;
                $nestedData['subject']      = $single_data->subject;
                $nestedData['message']      = $single_data->message;
                $nestedData['date']         = $single_data->created_at;
                $nestedData['action']       = $action;

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
        DB::table('queries')
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with('msg','<p class="text-success">Deleted successfully</p>');
    }
}