<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use App\myorder;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard.index');
    }

    public function admin_order(Request $request){

        $obj = DB::table('myorders')
                ->orderBy('id', 'desc')
                ->get();

            return response()->json([
                'success'=>true, 
                'message'=>'string', 
                'data'=> $obj
            ]);

    }

    public function edit_order($id){

        //dd(env('APP_URL'));

        $objs = DB::table('myorders')
            ->where('id', $id)
            ->first();

            $data['objs'] = $objs;

            $get_code = DB::table('bank_payments')
                ->where('order_id_c', $objs->order_id)
                ->first();

               // dd($get_code);

                $data['get_code'] = $get_code;

      return view('admin.api_edit_order', $data);

    }


    public function post_edit_order(Request $request, $id){

        DB::table('myorders')
            ->where('id', $id)
            ->update(array('status1' => $request['status_order_x'] ));

            return redirect(url('admin/dashboard/'))->with('edit_success','คุณทำการลบอสังหา สำเร็จ');

    }
}
