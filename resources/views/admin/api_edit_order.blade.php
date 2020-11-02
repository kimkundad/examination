@extends('admin.layouts.template')

@yield('stylesheet')

<link rel="stylesheet" href="{{ url('back/vendors/summernote/dist/summernote-bs4.css') }}">
@section('content')


      <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ข้อมูลการสั่งซื้อ #{{ $objs->order_id }} 
                      @if($objs->status1 == 0)
                      <label class="badge badge-danger">รอการชำระเงิน</label>
                      @elseif($objs->status1 == 1)
                      <label class="badge badge-warning">รอการตรวจสอบ</label>
                      @else
                      <label class="badge badge-success">ชำระเงินแล้ว</label>
                      @endif
                  </h4>
                  

                  <form class="forms-sample" method="POST" action="{{ url('api/post_edit_order/'.$objs->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="exampleInputUsername1">ชื่อแบบฝึกหัด </label>
                      <input type="text" class="form-control" name="ex_name" value="{{ $objs->ex_name }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">ราคา </label>
                      <input type="text" class="form-control" name="price" value="{{ $objs->price }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">ชื่อนักเรียน </label>
                      <input type="text" class="form-control" name="name" value="{{ $objs->name }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">เบอร์ติดต่อ </label>
                      <input type="text" class="form-control" name="phone" value="{{ $objs->phone }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">อีเมล </label>
                      <input type="text" class="form-control" name="email" value="{{ $objs->email }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">วันที่สั่งซื้อ </label>
                      <input type="text" class="form-control" name="created_at" value="{{ $objs->created_at }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">สถานะออเดอร์ </label>
                      <select class="form-control" name="status_order_x" >
                        <option value="0" @if( $objs->status1 == 0)
														selected='selected'
														@endif> รอการชำระเงิน </option>
                        <option value="1" @if( $objs->status1 == 1)
														selected='selected'
                                                        @endif> รอการตรวจสอบ </option>
                        <option value="2" @if( $objs->status1 == 2)
														selected='selected'
														@endif> ชำระเงินแล้ว </option>
                    </select>
                    </div>

    

                    <br />
                    <h4 class="card-title">ข้อมูลการชำระเงิน </h4>
                    @if(isset($get_code))

                    <div class="form-group">
                      <label for="exampleInputUsername1">ชื่อผู้โอน </label>
                      <input type="text" class="form-control" name="name_c" value="{{ $get_code->name_c }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">เบอร์ติดต่อ </label>
                      <input type="text" class="form-control" name="name_c" value="{{ $get_code->name_c }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">อีเมล </label>
                      <input type="text" class="form-control" name="name_c" value="{{ $get_code->name_c }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">จำนวนเงิน </label>
                      <input type="text" class="form-control" name="name_c" value="{{ $get_code->name_c }}" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">ธนาคาร </label>
                      @if($get_code->bank == 1)
                      <input type="text" class="form-control" name="name_c" value="ธนาคารไทยพาณิชย์ (ภาษาญี่ปุ่น) 227-204-4159 อ.พรหมเทพ ชัยกิตติวณิชย์" readonly>
                      @elseif($get_code->bank == 2)
                      <input type="text" class="form-control" name="name_c" value="ธนาคารกสิกรไทย (ภาษาญี่ปุ่น) 026-226-1532 อ.พรหมเทพ ชัยกิตติวณิชย์" readonly>
                      @else
                      <input type="text" class="form-control" name="name_c" value="ธนาคารกรุงไทย (ภาษาญี่ปุ่น) 981-169-5903 อ.พรหมเทพ ชัยกิตติวณิชย์" readonly>
                      @endif
                      
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">วัน-เวลา </label>
                      <input type="text" class="form-control" name="name_c" value="{{ $get_code->day_tran }} / {{ $get_code->time_tran }}" readonly>
                    </div>

                    <div class="form-group">
                      <img src="{{ (env('APP_URL').'/assets/img/slip/'.$get_code->image) }}" style="width: 100%; border: 2px solid #439aff;" >
                    </div>

                    
                    @else
                    ยังไม่มีการแจ้งชำระเงินมายังระบบ
                    

                    @endif

                    
                    <div style="text-align: right;">
                    <br /><br /><br />
                    <button type="submit" class="btn btn-primary mr-2">บันทึก</button>
                    <button class="btn btn-light">ยกเลิก</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>

          </div>


@stop('content')



@section('scripts')


<script>

$(document).ready(function() {


});

</script>

@stop('scripts')
