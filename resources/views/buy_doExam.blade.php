@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')
<style>
.mb-5, .my-5 {
    margin-bottom: 1.5rem !important;
}
</style>
@stop('stylesheet')



@section('content')



<div class="contact-form section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title">
                            <h2>ยืนยันการสั่งซื้อข้อสอบ</h2>
                            <p class="text-center">กดยืนยันการสั่งซื้อเพื่อสร้าง หมายเลขออเดอร์ สำหรับการแจ้งชำระเงิน จากนั้นรอเจ้าหน้าที่ตรวจสอบแล้วยืนยัน แล้วระบบจะทำการส่งข้อความแจ้งเตือนชำระเงินสำเร็จไปยังอีเมลของนักเรียน
                             <br>ข้อสอบที่นักเรียนซื้อจะอยู่ในเมนู ( <a href="#">ข้อสอบของฉัน</a> )
                            </p>
                        </div>

                        <form id="contactForm">
                            <div class="row">
                            <div class="col-12 col-md-12">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactName">
                                            ข้อสอบที่สั่งซื้อ
                                        </label>

                                        <!-- Input -->
                                        <input type="text" class="form-control" name="ex_name" value="{{ $ex->ex_name }}" id="ex_name"
                                            placeholder="ภาษาไทย ชั้น ป. 2 เรื่อง คำคล้องจอง" readonly>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactName">
                                            ชื่อนักเรียน
                                        </label>

                                        <!-- Input -->
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" id="name"
                                            placeholder="Full name">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactEmail">
                                            อีเมล
                                        </label>

                                        <!-- Input -->
                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" id="email"
                                            placeholder="hello@domain.com">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactEmail">
                                            เบอร์ติดต่อ
                                        </label>

                                        <!-- Input -->
                                        <input type="email" class="form-control" name="phone" value="{{ Auth::user()->phone }}" id="phone"
                                            placeholder="081XXXXXXX">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactEmail">
                                            ราคาที่ต้องชำระ
                                        </label>

                                        <!-- Input -->
                                        <input type="email" class="form-control" name="price" value="{{ $ex->price }}" id="price"
                                            placeholder="300" readonly>
                                            <input type="hidden" class="form-control" name="ex_id" value="{{ $ex->id }}" id="ex_id" readonly>
                                            <input type="hidden" class="form-control" name="order_id" value="{{ $order_no }}" id="order_id" readonly>

                                    </div>
                                </div>
                            </div>
                            <!-- / .row -->
                            
                            
                            <!-- / .row -->
                            <div class="row justify-content-center">
                                <div class="col-auto">

                                    <!-- Submit -->
                                    <button type="submit" id="btnSendData" class="btn btn-primary lift">
                                        ยืนยันการสั่งซื้อ
                                    </button>

                                </div>
                            </div>
                            <!-- / .row -->
                        </form>

                    </div>
                </div>
                
                
            </div>
        </div>


@endsection

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>

<script>
$(document).on('click','#btnSendData',function (event) {
  event.preventDefault();
  var form = $('#contactForm')[0];
  var formData = new FormData(form);

  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var ex_name = document.getElementById("ex_name").value;
  var phone = document.getElementById("phone").value;
  var price = document.getElementById("price").value;
  var ex_id = document.getElementById("ex_id").value;
  var order_id = document.getElementById("order_id").value;




if(name == '' || price == '' || email == '' || phone == ''){

  swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

}else{

  $.LoadingOverlay("show", {
    background  : "rgba(255, 255, 255, 0.4)",
    image       : "",
    fontawesome : "fa fa-cog fa-spin"
  });


  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
    }
});

  $.ajax({
      url: "{{url('/api/add_my_order')}}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: formData,
      processData: false,
      contentType: false,
      cache:false,
      type: 'POST',
      success: function (data) {

       // alert(data.data.status)
          if(data.data.status === 200){

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 500);

            swal("สำเร็จ!", data.data.msg, "success");


          setTimeout(function(){
                window.location.replace("{{url('get_myorder')}}/"+order_id);
          }, 3000);

          }else{

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 500);

            swal(data.data.msg);

          }
      },
      error: function () {

      }
  });

}


});
</script>

@stop('scripts')