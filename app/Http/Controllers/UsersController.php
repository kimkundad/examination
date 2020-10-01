<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count = DB::table('users')->count();

        $objs = DB::table('users')
              ->Orderby('users.id', 'desc')
              ->paginate(15);


      $data['objs'] = $objs;
      $data['count'] = $count;

    //  dd($objs);

        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $objs = DB::table('shops')
              ->where('shop_status', 1)
              ->get();

        $data['objs'] = $objs;

        $data['method'] = "post";
        $data['url'] = url('admin/users');
        return view('admin.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);

         $ran = array("1483537975.png","1483556517.png","1483556686.png");
         $randomSixDigitInt = 'GW-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999)).'-'.(\random_int(1000, 9999));
         $user = User::create([
         'name' => $request['name'],
         'email' => $request['email'],
         'password' => Hash::make($request['password']),
         'is_admin' => false,
         'provider' => 'email',
         'status' => 0,
         'avatar' => $ran[array_rand($ran, 1)],
         'code_user' => $randomSixDigitInt,
       ]);

       $user
       ->roles()
       ->attach(Role::where('name', 'employee')->first());

       return redirect(url('admin/users/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $objs = DB::table('users')
              ->Where('users.id', $id)
              ->first();
            //  dd($objs);

      $data['objs'] = $objs;

  

      $data['url'] = url('admin/users/'.$id);
      $data['method'] = "put";
      return view('admin.users.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
          'name' => ['required', 'string', 'max:255'],
          'email' => 'required|email|unique:users,email,'.$id,
         ]);

         $package = User::find($id);
         $package->name = $request['name'];
         $package->email = $request['email'];
         $package->phone = $request['phone'];
         $package->save();

         if($request['password'] != null){

           $this->validate($request, [
             'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
            $package = User::find($id);
            $package->password = Hash::make($request['password']);
            $package->save();
         }

         return redirect(url('admin/users/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obj = User::find($id);
        $obj->delete();
        return redirect(url('admin/users/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
