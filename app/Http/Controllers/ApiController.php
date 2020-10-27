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

class ApiController extends Controller
{
    //

    public function check_doExam($id){

      if(Auth::check()){

        $ex = DB::table('exercises')
        ->where('id', $id)
        ->first();

        if($ex->level == 0){
          return redirect(url('doExam/'.$id));
        }else{
          return redirect(url('start_exam/'.$id))->with('please_login','กรุณาทำการ Login เข้าสู่ระบบก่อนทำข้อสอบ');
        }

      }else{

        return redirect(url('start_exam/'.$id))->with('please_login','กรุณาทำการ Login เข้าสู่ระบบก่อนทำข้อสอบ');

      }


    }

    public function buy_doExam($id){

      $data['order_no'] = (\random_int(100000, 999999));

      $ex = DB::table('exercises')
        ->where('id', $id)
        ->first();

        $data['ex'] = $ex;

      return view('buy_doExam', $data);
    }

    public function add_my_order(Request $request){

      dd(env('email_pass'));

            $check_count = DB::table('myorders')
            ->where('ex_id', $request['ex_id'])
            ->count();

            $obj = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(array('phone' => $request['phone'] ));

            if($check_count == 0){

            $obj = new myorder();
            $obj->user_id = Auth::user()->id;
            $obj->ex_id = $request['ex_id'];
            $obj->price = $request['price'];
            $obj->name = $request['name'];
            $obj->phone = $request['phone'];
            $obj->email = $request['email'];
            $obj->ex_name = $request['ex_name'];
            $obj->order_id = $request['order_id'];
            $obj->save();


            $get_data = DB::table('myorders')
            ->where('ex_id', $request['ex_id'])
            ->first();


              


              // send email
              $data_toview = array();
            //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
              date_default_timezone_set("Asia/Bangkok");
              $data_toview['data'] = $get_data;
              $data_toview['datatime'] = date("d-m-Y H:i:s");

              $email_sender   = 'kim.kundad@gmail.com';
              $email_pass     = env('email_pass');

              $email_to       =  $get_data->email;
              //echo $admins[$idx]['email'];
              // Backup your default mailer
              $backup = \Mail::getSwiftMailer();

              try{

                          //https://accounts.google.com/DisplayUnlockCaptcha
                          // Setup your gmail mailer
                          $transport = new \Swift_SmtpTransport('smtp.gmail.com', 465, 'SSL');
                          $transport->setUsername($email_sender);
                          $transport->setPassword($email_pass);

                          // Any other mailer configuration stuff needed...
                          $gmail = new Swift_Mailer($transport);

                          // Set the mailer as gmail
                          \Mail::setSwiftMailer($gmail);

                          $data['emailto'] = $email_sender;
                          $data['sender'] = $email_to;
                          //Sender dan Reply harus sama

                          Mail::send('email.order', $data_toview, function($message) use ($data)
                          {
                              $message->from($data['emailto'], 'Learnsbuy');
                              $message->to($data['sender'])
                              ->replyTo($data['sender'], 'Learnsbuy.')
                              ->subject('ใบเสร็จสำหรับการสั่งซื้อคอร์สเรียน Learnsbuy ');

                              //echo 'Confirmation email after registration is completed.';
                          });

              }catch(\Swift_TransportException $e){
                  $response = $e->getMessage() ;
                  echo $response;

              }


              // Restore your original mailer
              Mail::setSwiftMailer($backup);
              // send email







            $message = $request['name']." ได้สั่งข้อสอบ : ".$request['ex_name'].", ออเดอร์ :".$request['order_id'].", ยอดที่ต้องชำระ : ".$request['price'];
            $message_data = array(
              'message' => $message
              );

              $lineapi = '0V5h0cJwrMQ0haSxFbmAiCTCVXMxwaRcHX8BoFffR12';
              $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$lineapi );
              $mms =  trim($message);
              $chOne = curl_init();
              curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
              curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
              curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
              curl_setopt($chOne, CURLOPT_POST, 1);
              curl_setopt($chOne, CURLOPT_POSTFIELDS, $message_data);
              curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
              curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
              curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
              $result = curl_exec($chOne);
              if(curl_error($chOne)){
              echo 'error:' . curl_error($chOne);
              }else{
              $result_ = json_decode($result, true);
            //  echo "status : ".$result_['status'];
            //  echo "message : ". $result_['message'];
              }
              curl_close($chOne);

            return response()->json([
              'data' => [
                'status' => 200,
                'msg' => 'ยืนยันคำสั่งซื้อสำเร็จเรียบร้อยแล้ว'
              ]
            ]);

            }else{

              return response()->json([
                'data' => [
                  'status' => 100,
                  'msg' => 'คุณมีข้อสอบนี้อยู่ในระบบอยู่แล้ว'
                ]
              ]);

            }
            



    }

    public function add_my_contact(Request $request){


        $secret="6LdQnlkUAAAAADW2xY5YauDvYTlGfrzlg-X1la3k";
      //  $response = $request['captcha'];
    
        $captcha = "";
        if (isset($request["g-recaptcha-response"]))
          $captcha = $request["g-recaptcha-response"];
    
      //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
        //$captcha_success=json_decode($verify);
    
      //  dd($captcha_success);
    
        if($response["success"] == false) {
    
          return response()->json([
            'data' => [
              'status' => 100,
              'msg' => 'This user was not verified by recaptcha.',
              'data' => "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response"
            ]
          ]);
    
        }else{
    
          $obj = DB::table('contacts')->insert(
               [
                 'name' => $request['name'],
                 'email' => $request['email'],
                 'phone' => $request['phone'],
                 'detail' => $request['msg'],
                 'created_at' => new \DateTime()
               ]
             );

             
          
    
    
    
          return response()->json([
            'data' => [
              'status' => 200,
              'msg' => 'This user is verified by recaptcha.'
            ]
          ]);
    
        }
    
    
    
      }
}
