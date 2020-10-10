<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function index()
    {
        //
        $objs = contact::all();
        $data['objs'] = $objs;
        return view('admin.contact.index', $data);
    }

    public function del_contact($id){
      $obj = contact::find($id);
      $obj->delete();
      return redirect(url('admin/contact/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
