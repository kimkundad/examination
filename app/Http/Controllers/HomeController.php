<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category;
use App\exercise;
use App\answer;
use App\answerh;
use App\bank_payment;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $objs = category::get();
        $data['objs'] = $objs;

        $ex = DB::table('exercises')
        ->select(
        'exercises.*',
        'exercises.id as ids',
        'exercises.created_at as created_ats',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->orderBy('ex_view', 'desc')
        ->limit(8)
        ->get();

        foreach ($ex as $u) {
            $options = DB::table('questions')->where('part_id',$u->ids)->count();
            $u->option = $options;
        }

        $data['ex'] = $ex;

        return view('welcome', $data);
    }

    public function payment($id){

        $data['id'] = $id;
        
        return view('payment', $data);
    }

    public function payment2(){

        $data['id'] = null;
        
        return view('payment', $data);
    }


    public function post_confirm_payment(Request $request){

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

    return redirect(url('payment/'.$request['order_id_c']))->with('error_confirm','คุณทำการเพิ่มอสังหา สำเร็จ');
  }else{

    $image = $request->file('image');
        $this->validate($request, [
             'image' => 'required|max:8048',
             'name_c' => 'required',
             'email_c' => 'required',
             'phone_c' => 'required',
             'money_c' => 'required',
             'day_tran' => 'required',
             'order_id_c' => 'required'
         ]);
  
  
         $check = DB::table('myorders')
         ->where('order_id', $request['order_id_c'])
         ->count();
  
         if($check > 0){
  
           $get_code = DB::table('myorders')
           ->where('order_id', $request['order_id_c'])
           ->first();

           DB::table('myorders')
            ->where('order_id', $request['order_id_c'])
            ->update(array('status1' => 1 ));
  
           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
  
      
           $img = Image::make($image->getRealPath());
           $img->resize(800, 800, function ($constraint) {
           $constraint->aspectRatio();
         })->save('assets/img/slip/'.$input['imagename']);
  
         $input['imagename_small'] = time().'_small.'.$image->getClientOriginalExtension();
  
          $img = Image::make($image->getRealPath());
          $img->resize(240, 240, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/img/slip/'.$input['imagename_small']);
  
           $package = new bank_payment();
            $package->order_id_c = $request['order_id_c'];
            $package->name_c = $request['name_c'];
            $package->email_c = $request['email_c'];
            $package->phone_c = $request['phone_c'];
            $package->bank = $request['bank'];
            $package->image = $input['imagename'];
            $package->money_c = $request['money_c'];
            $package->day_tran = $request['day_tran'];
            $package->time_tran = $request['time_tran'];
            $package->re_mark = 'null';
            $package->save();
  
  
  
            $message = $request['name_c']." ได้ทำการแจ้งชำระเงินมาที่ Order ID : ".$request['order_id_c']." เบอร์ : ".$request['phone_c'];
  
  
                $image_thumbnail_url = url('assets/img/slip/'.$input['imagename_small']);  // max size 240x240px JPEG
                $image_fullsize_url = url('assets/img/slip/'.$input['imagename']); //max size 1024x1024px JPEG
                $imageFile = 'copy/240.jpg';
                $sticker_package_id = '';  // Package ID sticker
                $sticker_id = '';    // ID sticker
  
                $message_data = array(
                'imageThumbnail' => $image_thumbnail_url,
                'imageFullsize' => $image_fullsize_url,
                'message' => $message,
                'imageFile' => $imageFile,
                'stickerPackageId' => $sticker_package_id,
                'stickerId' => $sticker_id
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
  
  
  
            return redirect(url('confirm_payment_success/'.$get_code->order_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
  
         }else{
            return redirect(url('payment/'.$request['order_id_c']))->with('error_confirm','คุณทำการเพิ่มอสังหา สำเร็จ');
         }

  }

  
  
  
      }

      public function confirm_payment_success($id){

        $get_code = DB::table('bank_payments')
        ->where('order_id_c', $id)
        ->first();
  
        $data['ex'] = $get_code;
        return view('confirm_payment_success', $data);
  
      }
    

    public function terms(){
        return view('terms');
    }

    public function privacy_policy(){
        return view('privacy_policy');
    }

    public function examinations(){

        $objs = category::get();
        
        if(isset($objs)){
            foreach($objs as $j) {
                $ex = DB::table('exercises')
                ->where('cat_id', $j->id)
                ->orderBy('ex_view', 'desc')
                ->limit(8)
                ->get();

                foreach ($ex as $u) {
                    $options = DB::table('questions')->where('part_id',$u->id)->count();
                    $u->option = $options;
                }

                $j->my_ex = $ex;
            }
        }
        
        $data['objs'] = $objs;

        

        

        return view('examination', $data);

    }

    public function search_category(Request $request){

        $category = $request['category'];

        if($category == null){
            return redirect(url('/'));
        }else{
            return redirect(url('category/'.$category));
        }

        

    }

    public function category($id){

        $obj = category::find($id);
        $data['obj'] = $obj;

        $ex = DB::table('exercises')
        ->select(
        'exercises.*',
        'exercises.id as ids',
        'exercises.created_at as created_ats',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->where('categories.id', $id)
        ->orderBy('ex_view', 'desc')
        ->paginate(15);

        foreach ($ex as $u) {
            $options = DB::table('questions')->where('part_id',$u->ids)->count();
            $u->option = $options;
        }

        $data['ex'] = $ex;

        $count = DB::table('exercises')
        ->where('cat_id', $id)
        ->count();
        $data['count'] = $count;

        return view('category', $data);

    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function start_exam($id){

        if(Auth::guest()){
            $user = null;
        }else{

        $user = DB::table('answerhs')
        ->select(
        'answerhs.*',
        'answerhs.id as ids',
        'answerhs.created_at as created_ats',
        'exercises.*'
        )
        ->leftjoin('exercises', 'exercises.id',  'answerhs.examples_id')
        ->where('answerhs.user_id', Auth::user()->id)
        ->get();

        }

        //dd($user);

        $data['user'] = $user;

        $ex = DB::table('exercises')
        ->select(
        'exercises.*',
        'exercises.id as ids',
        'exercises.created_at as created_ats',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->where('exercises.id', $id)
        ->orderBy('ex_view', 'desc')
        ->first();

        DB::table('exercises')
            ->where('id', $id)
            ->update(['ex_view' => $ex->ex_view+1]);

        $data['ex'] = $ex;

        return view('start_exam', $data);
    }

    public function doExam($id){

        $ex = DB::table('exercises')
        ->select(
        'exercises.*',
        'exercises.id as ids',
        'exercises.created_at as created_ats',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->where('exercises.id', $id)
        ->orderBy('ex_view', 'desc')
        ->first();

        DB::table('exercises')
            ->where('id', $id)
            ->update(['ex_view' => $ex->ex_view+1]);

        $data['ex'] = $ex;


        $obj = DB::table('questions')
            ->where('part_id', $id)
            ->orderBy('qu_sort', 'asc')
            ->get();

        $optionsRes = [];
        foreach ($obj as $u) {
            $options = DB::table('options')->where('qu_id',$u->id)->get();
            $u->options = $options;
        }

        $s = 1;
        $data['s'] = $s;
        $set = 1;
        $data['set'] = $set;
        $data['obj'] = $obj;
        

        return view('doExam', $data);
    }

    public function reportExam($id){

        $obj = DB::table('answerhs')
            ->where('code_gen', $id)
            ->first();
        $data['obj'] = $obj;

        $ex = DB::table('exercises')
            ->select(
            'exercises.*',
            'exercises.id as ids',
            'exercises.created_at as created_ats',
            'categories.*'
            )
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->where('exercises.id', $obj->examples_id)
        ->orderBy('ex_view', 'desc')
        ->first();

        $data['ex'] = $ex;

        $count = DB::table('answerhs')
            ->where('examples_id', $obj->examples_id)
            ->groupBy('code_gen')
            ->count();

        $data['count'] = $count;

        //dd($count);
        $mypoint = (($obj->total_point*100)/$ex->ex_total);
        $topoint = ((($ex->ex_total-$obj->total_point)*100)/$ex->ex_total);
        //dd($mypoint.'-'.$topoint);

        $data['mypoint'] = $mypoint;
        $data['topoint'] = $topoint;

        return view('reportExam', $data);
    }

    public function answer($id){

        $ex = DB::table('exercises')
            ->select(
            'exercises.*',
            'exercises.id as ids',
            'exercises.created_at as created_ats',
            'categories.*'
            )
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->where('exercises.id', $id)
        ->orderBy('ex_view', 'desc')
        ->first();

        $data['ex'] = $ex;

        $obj = DB::table('questions')
            ->where('part_id', $id)
            ->orderBy('qu_sort', 'asc')
            ->get();

        $optionsRes = [];
        foreach ($obj as $u) {
            $options = DB::table('options')->where('qu_id',$u->id)->get();
            $u->option = $options;
        }

        $objs = exercise::find($id);
        //dd($obj);
        $data['obj'] = $obj;

        return view('answer', $data);
    }


    public function post_ans_course2(Request $request){

        $examples_id = $request['examples_id'];
        $s_data = 1;

        $loop_check = DB::table('questions')
        ->where('part_id', $examples_id)
        ->get();

        if(Auth::check()){
           $id_user = Auth::user()->id;
        }else{
           $id_user = 0;
        }

       // dd($loop_check);

            $payment = new answerh();
            $payment->examples_id  = $examples_id;
            $payment->user_id = $id_user;
            $payment->code_gen = (\random_int(10000, 99999));
            $payment->total_time = $request['timmery_time'];
            $payment->save(); 

        if(isset($loop_check)){
            foreach($loop_check as $u){

                $value = $request['value_'.$s_data];
                $id_questions = $u->id;

                $ans_check = DB::table('options')
                ->where('id', $value)
                ->first();

                $my_point = 0;
                if($ans_check->status_op == 1){
                    $my_point = 1;
                }
                
                $pay = new answer();
                $pay->answer_id  = $payment->id;
                $pay->my_code_gen = $payment->code_gen;
                $pay->answers = $value;
                $pay->ans_status = $my_point;
                $pay->save(); 

                $s_data++;
            }
        }

        $final_point = DB::table('answers')
        ->where('my_code_gen', $payment->code_gen)
        ->where('ans_status', 1)
        ->count();

        DB::table('answerhs')
            ->where('id', $payment->id)
            ->update(['total_point' => $final_point]);

        return redirect(url('reportExam/'.$payment->code_gen))->with('success','ยินดีด้วย');
        
    }
}
