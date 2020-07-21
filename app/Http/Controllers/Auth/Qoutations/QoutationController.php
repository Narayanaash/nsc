<?php

namespace App\Http\Controllers\Auth\Qoutations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Qoutation;
use App\QoutationDetails;
use App\Models\Customer;
use DB;
class QoutationController extends Controller
{
    public function show()
    {
        return view('admin/auth/customerorder.show');
    }

    public function get(){
        $query = Qoutation::with('customer')->with('address')->orderBy('created_at', 'DESC');
            return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '
                <a href="'.route('qoutations.view', ['id' => encrypt($row->id)]).'" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
                <a href="'.route('qoutations.delete', ['id' => encrypt($row->id)]).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>              
                <a href="'.route('qoutations.reject', ['id' => encrypt($row->id)]).'" class="btn btn-warning btn-sm"><i class="fa fa-cancel"></i></a>              
                ';
               
             return $btn;
            })
            ->make(true);
    }

    public function view($id){
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $qoutation = Qoutation::with('qoutation_details')->find($id);
        return view('admin.auth.customerorder.invoice', compact('qoutation'));
    }

    public function delete($id){
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $qoutation = Qoutation::with('qoutation_details')->find($id);
        $qoutation->delete();
        $qoutation_details = QoutationDetails::where("qoutation_id", $id)->delete();
        return redirect()->back();
    }

    public function reject($id){
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
       $update = DB::table('qoutations')
        ->where('id', $id)
        ->update([
            'status' => '4'
        ]);

        return redirect()->back()->with('msg', 'Rejected Succefully!');
    }
}
