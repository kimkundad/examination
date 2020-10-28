<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\category;
use App\exercise;
use App\answer;
use App\answerh;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    //
    public function history()
    {

        $user = DB::table('answerhs')
        ->select(
        'answerhs.*',
        'answerhs.id as ids',
        'answerhs.created_at as created_ats',
        'exercises.*'
        )
        ->leftjoin('exercises', 'exercises.id',  'answerhs.examples_id')
        ->where('answerhs.user_id', Auth::user()->id)
        ->orderBy('answerhs.created_at', 'desc')
        ->paginate(15);

        $data['user'] = $user;
        return view('history', $data);
    }


    public function my_examination(){

        $user = DB::table('myorders')
        ->select(
        'myorders.*',
        'myorders.id as ids',
        'myorders.created_at as created_ats',
        'exercises.*',
        'categories.*'
        )
        ->leftjoin('exercises', 'exercises.id',  'myorders.ex_id')
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->where('myorders.user_id', Auth::user()->id)
        ->where('myorders.status1', 2)
        ->orderBy('myorders.created_at', 'desc')
        ->paginate(15);

        foreach ($user as $u) {
            $options = DB::table('questions')->where('part_id',$u->ids)->count();
            $u->option = $options;
        }

        //dd($user);

        $data['user'] = $user;
        return view('my_examination', $data);

    }


    public function buy_history(){

        $user = DB::table('myorders')
        ->select(
        'myorders.*',
        'myorders.id as ids',
        'myorders.created_at as created_ats',
        'exercises.*'
        )
        ->leftjoin('exercises', 'exercises.id',  'myorders.ex_id')
        ->where('myorders.user_id', Auth::user()->id)
        ->orderBy('myorders.created_at', 'desc')
        ->paginate(15);
        
        $data['user'] = $user;
        return view('buy_history', $data);

    }

    public function accounts(){
        return view('accounts');
    }

    public function add_profile(Request $request){

    $image = $request->file('image');

   // dd($request->all());

        $this->validate($request, [
            'email' => 'unique:users,email,'.Auth::user()->id
        ]);

        if($image == null){

            $package = User::find(Auth::user()->id);
            $package->name = $request['name'];
            $package->email = $request['email'];
            $package->phone = $request['phone'];
            $package->zipcode = $request['zipcode'];
            $package->address = $request['address'];
            $package->save();

        }else{

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            })->save('img/avatar/'.$input['imagename']);

            $package = User::find(Auth::user()->id);
            $package->name = $request['name'];
            $package->email = $request['email'];
            $package->phone = $request['phone'];
            $package->zipcode = $request['zipcode'];
            $package->address = $request['address'];
            $package->avatar = $input['imagename'];
            $package->save();
          //  dd('555');
        }

            

            return redirect(url('accounts'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }
}
