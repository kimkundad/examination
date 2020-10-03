<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\category;
use App\exercise;
use App\answer;
use App\answerh;
use Illuminate\Support\Facades\DB;

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
