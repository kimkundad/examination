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

class DoExamController extends Controller
{
    //

    public function get_myorder($id){

        $ex = DB::table('myorders')
        ->where('order_id', $id)
        ->first();

        $data['ex'] = $ex;

      return view('get_myorder', $data);
    }
}
