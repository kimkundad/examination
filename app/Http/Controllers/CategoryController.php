<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\exercise;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = category::paginate(15);

        foreach ($objs as $obj) {

                $options = DB::table('exercises')->select(
                  'exercises.*'
                  )
                  ->where('exercises.cat_id', $obj->id)
                  ->count();

                $obj->option = $options;
              }
              $data['objs'] = $objs;
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
      $data['url'] = url('admin/category');
      return view('admin.category.create', $data);
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
        $image = $request->file('image');

      $this->validate($request, [
       'cat_name' => 'required',
       'image' => 'required'
      ]);

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(2048, 420, function ($constraint) {
        $constraint->aspectRatio();
      })->save('img/category/'.$input['imagename']);

      $package = new category();
      $package->cat_name = $request['cat_name'];
      $package->cat_image = $input['imagename'];
      $package->save();
      return redirect(url('admin/category'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

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
        $obj = category::find($id);
        $data['obj'] = $obj;
        $objs = DB::table('exercises')
        ->select(
        'exercises.*',
        'exercises.id as ids',
        'exercises.created_at as created_ats',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'exercises.cat_id')
        ->where('exercises.cat_id', $id)
        ->paginate(15);

        foreach ($objs as $u) {
            $options = DB::table('questions')->where('part_id',$u->ids)->count();
            $u->option = $options;
        }

        $data['objs'] = $objs;
        
        return view('admin.category.show', $data);
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
      $obj = category::find($id);
      $data['datahead'] = "แก้ไขหมวดหมู่";
      $data['method'] = "put";
      $data['url'] = url('admin/category/'.$id);
      $data['objs'] = $obj;
      return view('admin.category.edit', $data);
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
        $image = $request->file('image');

        $this->validate($request, [
         'cat_name' => 'required'
        ]);
  
        if($image == NULL){
  
        $package = category::find($id);
        $package->cat_name = $request['cat_name'];
        $package->save();
  
        return redirect(url('admin/category'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
  
        }else{
  
          $objs = DB::table('categories')
            ->where('id', $id)
            ->first();
  
            $file_path = 'img/category/'.$objs->cat_image;
            unlink($file_path);
  
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
  
              $img = Image::make($image->getRealPath());
              $img->resize(2048, 420, function ($constraint) {
              $constraint->aspectRatio();
            })->save('img/category/'.$input['imagename']);
  
            $package = category::find($id);
            $package->cat_name = $request['cat_name'];
            $package->cat_image = $input['imagename'];
            $package->save();
            return redirect(url('admin/category'))->with('edit_success','เพิ่ม เสร็จเรียบร้อยแล้ว');


    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_cat($id)
    {

      $objs = DB::table('categories')
        ->where('id', $id)
        ->first();

        $file_path = 'img/category/'.$objs->cat_image;
        unlink($file_path);

        DB::table('exercises')
            ->where('cat_id', $id)
            ->update(['cat_id' => 0]);

      $obj = category::find($id);
      $obj->delete();
      return redirect(url('admin/category/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');


        //
    }
}
