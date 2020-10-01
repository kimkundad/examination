@extends('admin.layouts.template')

@yield('stylesheet')

<link rel="stylesheet" href="{{ url('back/vendors/summernote/dist/summernote-bs4.css') }}">
<style>
.dd {
	position: relative;
	display: block;
	margin: 0;
	padding: 0;
	list-style: none;
	font-size: 13px;
	line-height: 20px;
}

.dd-list {
	display: block;
	position: relative;
	margin: 0;
	padding: 0;
	list-style: none;
}

.dd-list .dd-list {
	padding-left: 30px;
}

.dd-collapsed .dd-list {
	display: none;
}

.dd-item, .dd-empty, .dd-placeholder {
	display: block;
	position: relative;
	margin: 0;
	padding: 0;
	min-height: 20px;
	font-size: 13px;
	line-height: 20px;
}

.dd-handle {
    display: block;
    height: auto;
    margin: 5px 0;
    padding: 6px 10px;
    color: #333;
    text-decoration: none;
    font-weight: 600;
    border: 1px solid #CCC;
    background: #F6F6F6;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.dd-handle:hover {
	color: #cccccc;
	background: #fff;
}

.dd-item > button {
	display: block;
	position: relative;
	cursor: pointer;
	float: left;
	width: 25px;
	height: 20px;
	margin: 7px 0;
	padding: 0;
	text-indent: 100%;
	white-space: nowrap;
	overflow: hidden;
	border: 0;
	background: transparent;
	font-size: 12px;
	line-height: 1;
	text-align: center;
	font-weight: bold;
}

.dd-item > button:before {
	content: '+';
	display: block;
	position: absolute;
	width: 100%;
	text-align: center;
	text-indent: 0;
}

.dd-item > button[data-action="collapse"]:before {
	content: '-';
}

.dd-placeholder {
	margin: 5px 0;
	padding: 0;
	min-height: 30px;
	background: white;
	border: 1px dashed #cccccc;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}

.dd-empty {
	margin: 5px 0;
	padding: 0;
	min-height: 30px;
	background: #f2fbff;
	border: 1px dashed #b6bcbf;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	border: 1px dashed #bbb;
	min-height: 100px;
	background-color: #e5e5e5;
	background-image: -webkit-linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white), -webkit-linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white);
	background-image: -moz-linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white), -moz-linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white);
	background-image: linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white), linear-gradient(45deg, white 25%, transparent 25%, transparent 75%, white 75%, white);
	background-size: 60px 60px;
	background-position: 0 0, 30px 30px;
}

.dd-dragel {
	position: absolute;
	pointer-events: none;
	z-index: 9999;
}

.dd-dragel > .dd-item .dd-handle {
	margin-top: 0;
}

.dd-dragel .dd-handle {
	-webkit-box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.1);
	box-shadow: 2px 4px 6px 0 rgba(0, 0, 0, 0.1);
}
.modal-content {

    background-color: #ffffff !important;
 
}
</style>
@section('content')


    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">จัดการแบบฝึกหัด</h4>
                    <h6>{{ $objs->ex_name }}</h6>
                    <br>
                    <form id="dd-form" action="{{url('admin/updatesort/'.$objs->id)}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="sort_order" id="nestable-output"  />
                        <div class="dd" id="nestable">
                            <ol class="dd-list" {{ $s=1 }}>
                                @if(isset($obj))
                                    @foreach($obj as $u)
                                    <li class="dd-item" data-id="{{$u->id}}">
                                        <div class="dd-handle row mar-top">
                                        <div class="form-group">
                                        <p>{{$s}} . {{$u->qu_name}}</p>
                                        @foreach($u->option as $uu)
                                        <div class="radio">
                                            <label>
                                                <input type="radio"  value="{{$uu->op_name}}" id="{{$uu->id}}" >
                                                    @if($uu->status_op == 1)
                                                    <span class="text-success">{{$uu->op_name}}</span>
                                                    @else
                                                    {{$uu->op_name}}
                                                    @endif
                                            </label>
                                        </div>
                                        @endforeach
                                        </div>
                                        </div>
                                    </li {{$s++}}>
                                    @endforeach
                                @endif
                                
                            </ol>
                        </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-fw"><i class="icon-star-outline"></i>เรียงคำถามใหม่</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <a type="button" data-toggle="modal" data-target="#exampleModal-2" class="btn btn-inverse-primary btn-rounded btn-fw btn-block">คำถามข้อความ</a>
                <a type="button" data-toggle="modal" data-target="#exampleModal-2" class="btn btn-inverse-secondary  btn-rounded btn-fw btn-block">คำถามรูปภาพ</a>
                <a type="button" data-toggle="modal" data-target="#exampleModal-2" class="btn btn-inverse-success  btn-rounded btn-fw btn-block">คำถามเสียง</a>
                </div>
            </div>
        </div>

    </div>

    


                  
                  <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">เพิ่ม คำถามข้อความ</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form class="forms-sample" name="form-2" action="{{url('admin/add_question')}}" method="post" id="myform" enctype="multipart/form-data">
                        <div class="modal-body">
                                <input type="hidden" name="category_id" value="{{$objs->cat_id}}">
                                <input type="hidden" name="q_id" value="{{$objs->id}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="exampleTextarea1">หัวข้อแบบสอบถาม</label>
                                    <textarea class="form-control" id="exampleTextarea1" name="qu_name" rows="4"></textarea>
                               
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">รูปแบบคำถาม<span class="text-danger">*</span></label>
                                    <select class="form-control" name="option_type" >
                                    <option value=""> -- เลือก รูปแบบคำถาม -- </option>
                                        <option value="1"> คำถามข้อความ </option>
                                        <option value="2"> คำถามรูปภาพ </option>
                                        <option value="3"> คำถามเสียง </option>
                                    </select>
                                    </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">รูปภาพหรือไฟล์เสียง (ไม่จำเป็นต้องใส่ก็ได้)</label>
                                    <input type="file" class="dropify"  name="image" />
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                        <label class=" col-form-label">คำตอบที่ 1</label>
                                            <input type="text" name="name_option[]" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                        <label class=" col-form-label">&nbsp</label>
                                        <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="radioExample" id="membershipRadios1" value="1" >
                                                ข้อที่ถูก
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                        <label class=" col-form-label">คำตอบที่ 2</label>
                                            <input type="text" name="name_option[]" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                        <label class=" col-form-label">&nbsp</label>
                                        <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="radioExample" id="membershipRadios1" value="2" >
                                                ข้อที่ถูก
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                        <label class=" col-form-label">คำตอบที่ 3</label>
                                            <input type="text" name="name_option[]" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                        <label class=" col-form-label">&nbsp</label>
                                        <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="radioExample" id="membershipRadios1" value="3" >
                                                ข้อที่ถูก
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                        <label class=" col-form-label">คำตอบที่ 4</label>
                                            <input type="text" name="name_option[]" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                        <label class=" col-form-label">&nbsp</label>
                                        <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="radioExample" id="membershipRadios1" value="4" >
                                                ข้อที่ถูก
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                            
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">ยกเลิก</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  </div>
                  <!-- Modal Ends -->




               

                  


@stop('content')



@section('scripts')

<script src="{{ url('back/vendors/jquery-nestable/jquery.nestable.js')}}"></script>
<script src="{{ url('back/js/dropify.js') }}"></script>

<script>

(function( $ ) {

'use strict';

/*
Update Output
*/
var updateOutput = function (e) {
    var list = e.length ? e : $(e.target),
        output = list.data('output');

    if (window.JSON) {
        output.val(window.JSON.stringify(list.nestable('serialize')));
    } else {
        output.val('JSON browser support required for this demo.');
    }
};

/*
Nestable 1
*/
$('#nestable').nestable({
    group: 1
}).on('change', updateOutput);

/*
Output Initial Serialised Data
*/
$(function() {
    updateOutput($('#nestable').data('output', $('#nestable-output')));
});

}).apply(this, [ jQuery ]);


</script>

@stop('scripts')
