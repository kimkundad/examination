@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')
@stop('stylesheet')



@section('content')



<div class="contact-form section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-title">
                            <h2>แจ้งให้ ครูพี่โฮม ทราบจากนักเรียนโดยตรง!</h2>
                            <p class="text-center">เราอยากได้ยินจากคุณเสมอ! แจ้งให้เราทราบว่าเราจะช่วยเหลือคุณได้ดีที่สุดและเราจะดำเนินการอย่างไร
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="info-list">
                            <h5 class="mb-3">Address</h5>
                            <ul>
                                <li><i class="fa fa-map-marker"></i> ZA-SHI สาขาสยามสแควร์</li>
                                <li><i class="fa fa-phone"></i> 02-658-3819, 02-658-3986</li>
                                <li><i class="fa fa-envelope"></i> learnsbuy@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8">
                    <form id="contactForm">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactName">
                                            Full name
                                        </label>

                                        <!-- Input -->
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Full name">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactEmail">
                                            Email
                                        </label>

                                        <!-- Input -->
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="hello@domain.com">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactEmail">
                                            phone
                                        </label>

                                        <!-- Input -->
                                        <input type="email" class="form-control" name="phone" id="phone"
                                            placeholder="hello@domain.com">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactEmail">
                                            check bot
                                        </label>

                                        <!-- Input -->
                                        <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>

                                    </div>
                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-7 mb-md-9">

                                        <!-- Label -->
                                        <label for="contactMessage">
                                            What can we help you with?
                                        </label>

                                        <!-- Input -->
                                        <textarea class="form-control" name="msg" id="msg" rows="5"
                                            placeholder="Tell us what we can help you with!"></textarea>

                                    </div>
                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row justify-content-center">
                                <div class="col-auto">

                                    <!-- Submit -->
                                    <button type="submit" id="btnSendData" class="btn btn-primary lift">
                                        Send message
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
  var msg = document.getElementById("msg").value;
  var phone = document.getElementById("phone").value;




if(name == '' || msg == '' || email == '' || phone == ''){

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
      url: "{{url('/api/add_my_contact')}}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: formData,
      processData: false,
      contentType: false,
      cache:false,
      type: 'POST',
      success: function (data) {

      //  console.log(data.data.status)
          if(data.data.status == 200){


            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 0);

            swal("สำเร็จ!", "ข้อความถูกส่งไปหาเจ้าหน้าที่เรียบร้อยแล้ว", "success");

            $("#name").val('');
            $("#msg").val('');
            $("#email").val('');
            $("#phone").val('');


          setTimeout(function(){
            //    window.location.replace("{{url('clients/success_payment/')}}/"+data.data.value);
          }, 3000);

          }else{

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 500);

            swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

          }
      },
      error: function () {

      }
  });

}


});
</script>

@stop('scripts')