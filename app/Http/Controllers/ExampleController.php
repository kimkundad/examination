<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\exercise;
use App\question;
use App\option;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ExampleController extends Controller
{
    //
    public function index(){

        $objs = DB::table('exercises')
        ->select(
        'exercises.*',
        'exercises.id as ids',
        'exercises.created_at as created_ats',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->paginate(15);

        foreach ($objs as $u) {
            $options = DB::table('questions')->where('part_id',$u->ids)->count();
            $u->option = $options;
        }

        $data['objs'] = $objs;
        return view('admin.example.index', $data);

    }

    public function create(){
        $objs = category::all();
        $data['objs'] = $objs;
        return view('admin.example.create', $data);
    }



    public function edit($id){
        $obj = category::all();
        $data['obj'] = $obj;

        $objs = exercise::find($id);
        $data['objs'] = $objs;

        return view('admin.example.edit', $data);
    }

    public function show($id){

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
        $data['objs'] = $objs;
        $data['obj'] = $obj;

        return view('admin.example.show', $data);
    }

    public function add_example(Request $request){

    $image = $request->file('image');
    $this->validate($request, [
        'image' => 'required|max:8048',
        'ex_name' => 'required',
        'ex_code' => 'required',
        'cat_id' => 'required'
    ]);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(800, 800, function ($constraint) {
        $constraint->aspectRatio();
      })->save('img/exercise/'.$input['imagename']);

      $package = new exercise();
      $package->ex_name = $request['ex_name'];
      $package->ex_detail = $request['ex_detail'];
      $package->cat_id = $request['cat_id'];
      $package->ex_image = $input['imagename'];
      $package->ex_total = $request['ex_total'];
      $package->ex_time = $request['ex_time'];
      $package->ex_code = $request['ex_code'];
      $package->save();

      return redirect(url('admin/example/'.$package->id.'/show'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

}   

    public function add_question(Request $request){

        $image = $request->file('image');

        $this->validate($request, [
            'qu_name' => 'required',
            'option_type' => 'required'
        ]);

        $radioExample = $request['radioExample'];

        if($request['option_type'] == 1){
           // dd('text');

            $obj = new question();
            $obj->qu_name = $request['qu_name'];
            $obj->qu_type = $request['option_type'];
            $obj->cat_id = $request['category_id'];
            $obj->part_id = $request['q_id'];
            $obj->status = $request['radioExample'];
            $obj->point = 1;
            $obj->save();

        }elseif($request['option_type'] == 2){
           // dd('image');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(1200, 800, function ($constraint) {
            $constraint->aspectRatio();
            })->save('img/exercise/'.$input['imagename']);

           $obj = new question();
            $obj->qu_name = $request['qu_name'];
            $obj->qu_type = $request['option_type'];
            $obj->cat_id = $request['category_id'];
            $obj->part_id = $request['q_id'];
            $obj->status = $request['radioExample'];
            $obj->qu_file = $input['imagename'];
            $obj->point = 1;
            $obj->save();


        }else{
           // dd('sound');

           $destinationPath = 'audio';
           $input['image'] = time().'.'.$image->getClientOriginalExtension();
           $request->file('image')->move($destinationPath, $input['image']);

           $obj = new question();
            $obj->qu_name = $request['qu_name'];
            $obj->qu_type = $request['option_type'];
            $obj->cat_id = $request['category_id'];
            $obj->part_id = $request['q_id'];
            $obj->status = $request['radioExample'];
            $obj->qu_file = $input['image'];
            $obj->point = 1;
            $obj->save();


        }

        $the_id = $obj->id;
        $name_option = request()->get('name_option');
        $type_option = request()->get('option_type');

        if($the_id){
            if (count($name_option) > 0) {
                       for ($i = 0; $i < count($name_option); $i++) {
   
                        $j = $i+1;

                         $option = new option();
                         $option->qu_id = $the_id;
                         $option->op_name = $name_option[$i];
                         $option->op_type = $type_option;
                         if($j == $radioExample){
                         $option->status_op = 1;
                         }
                         $option->save();

   
                       }
   
                   }
   
   
           return redirect(url('admin/example/'.$request['q_id'].'/show'))->with('add_success','เพิ่มข้อสอบ'.$request['name_question'].' สำเร็จ');
       }


    }

    public function updatesort(Request $request, $id){

        $sort_order = $request['sort_order'];
        $sort_order = json_decode($sort_order,true);
        foreach($sort_order as $index=>$ids) {

            $obj = DB::table('questions')
            ->where('id', $ids['id'])
            ->update(array('qu_sort' => ($index + 1) ));

        }

        return redirect(url('admin/example/'.$id.'/show'))->with('edit_success','ทำการเรียงลำดับคำถามใหม่เรียบร้อยแล้ว');

    }


    public function post_edit_example(Request $request, $id){

        $image = $request->file('image');

        $this->validate($request, [
            'ex_name' => 'required',
            'ex_code' => 'required',
            'cat_id' => 'required'
        ]);

        if($image == NULL){

            $package = exercise::find($id);
            $package->ex_name = $request['ex_name'];
            $package->ex_detail = $request['ex_detail'];
            $package->cat_id = $request['cat_id'];
            $package->ex_total = $request['ex_total'];
            $package->ex_time = $request['ex_time'];
            $package->ex_code = $request['ex_code'];
            $package->save();

        }else{

            $objs = DB::table('exercises')
            ->where('id', $id)
            ->first();

            $file_path = 'img/exercise/'.$objs->ex_image;
            unlink($file_path);

            $package = exercise::find($id);
            $package->ex_name = $request['ex_name'];
            $package->ex_detail = $request['ex_detail'];
            $package->cat_id = $request['cat_id'];
            $package->ex_image = $input['imagename'];
            $package->ex_total = $request['ex_total'];
            $package->ex_time = $request['ex_time'];
            $package->ex_code = $request['ex_code'];
            $package->save();

        }

        return redirect(url('admin/edit_example/'.$id.'/edit'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');


    }

    public function del_example($id){

        $objs = DB::table('exercises')
        ->where('id', $id)
        ->first();

        $file_path = 'img/exercise/'.$objs->ex_image;
        unlink($file_path);

      /*  DB::table('exercises')
            ->where('cat_id', $id)
            ->update(['cat_id' => 0]); */

      $obj = exercise::find($id);
      $obj->delete();
      return redirect(url('admin/example/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');

    }


}
