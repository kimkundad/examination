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

    public function add_my_order2(Request $request){

        DB::table('myorders')
            ->where('id', $request['myid'])
            ->update(array('status1' => $request['status_order_x'] ));

            return response()->json([
                'data' => [
                  'status' => 200,
                  'msg' => 'This user is verified by recaptcha.'
                ]
              ]);

    }

    public function get_data_order($id){

        $obj = DB::table('myorders')
                ->where('id', $id)
                ->first();

                $get_count = DB::table('bank_payments')
                ->where('order_id_c', $obj->order_id)
                ->count();

                $get_code = DB::table('bank_payments')
                ->where('order_id_c', $obj->order_id)
                ->first();

                if($get_count > 0){
                    if($get_code->bank == 1){
                        $bank = 'ธนาคารไทยพาณิชย์ (ภาษาญี่ปุ่น) 227-204-4159 อ.พรหมเทพ ชัยกิตติวณิชย์';
                    }elseif($obj->status1 == 2){
                        $bank = 'ธนาคารกสิกรไทย (ภาษาญี่ปุ่น) 026-226-1532 อ.พรหมเทพ ชัยกิตติวณิชย์';
                    }else{
                        $bank = 'ธนาคารกรุงไทย (ภาษาญี่ปุ่น) 981-169-5903 อ.พรหมเทพ ชัยกิตติวณิชย์';
                    }
                }else{
                    $bank = null;
                }
                

                if($obj->status1 == 0){
                    $status_data = 'รอการชำระเงิน';
                }elseif($obj->status1 == 1){
                    $status_data = 'รอการตรวจสอบ';
                }else{
                    $status_data = 'ชำระเงินแล้ว';
                }
                

            return response()->json([
                'success'=>true, 
                'message'=>'string', 
                'status_data'=> $status_data, 
                'data'=> $obj,
                'bank'=> $bank,
                'data2'=> $get_code
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
