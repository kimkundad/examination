<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class ApiController extends Controller
{
    //
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
