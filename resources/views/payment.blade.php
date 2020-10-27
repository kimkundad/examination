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

<style>
    .card {

    margin-bottom: 10px;

}
</style>

<div class="contact-form section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title" style="margin-bottom: 35px;">
                            <h2>แจ้งการชำระเงิน</h2>
                            <p class="text-center">กรุณากรอกหมายเลขออเดอร์ (ORDER ID) ซึ่งส่งไปยังอีเมลของนักเรียนตอนสั่งซื้อข้อสอบ
                            </p>
                        </div>
                        
                        @if ($errors->has('order_id_c'))
                        <div class="price-grid">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-danger"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก หมายเลขออเดอร์ด้วยค่ะ!</h5>
                                </div>
                            </div>
                        </div>
                        @endif

                         @if ($errors->has('name_c'))
                        <div class="price-grid">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-danger"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก ชื่อผู้แจ้งด้วยค่ะ!</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($errors->has('email_c'))
                        <div class="price-grid">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-danger"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก อีเมลด้วยค่ะ!</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($errors->has('phone_c'))
                        <div class="price-grid">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-danger"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก เบอร์ติดต่อด้วยค่ะ!</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($errors->has('money_c'))
                        <div class="price-grid">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-danger"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก ยอดชำระเงินด้วยค่ะ!</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($errors->has('day_tran'))
                        <div class="price-grid">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-danger"><i class="fa fa-info" aria-hidden="true"></i> กรุณากรอก วันที่ชำระเงิน!</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($errors->has('image'))
                        <div class="price-grid">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-danger"><i class="fa fa-info" aria-hidden="true"></i> กรุณาแบนหลักฐานการชำระเงินด้วยค่ะ!</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <form  action="{{url('post_confirm_payment/')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="row">
                            <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactName">
                                        หมายเลขออเดอร์
                                        </label>

                                        <!-- Input -->
                                        <input type="text" class="form-control" name="order_id_c" value="{{ $id }}" id="ex_name"
                                            placeholder="หมายเลขออเดอร์ 74582XXX ">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactName">
                                        ชื่อ - นามสกุล
                                        </label>

                                        <!-- Input -->
                                        <input type="text" class="form-control" name="name_c" value="{{ old('name_c')}}"  id="name">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactEmail">
                                            อีเมล
                                        </label>

                                        <!-- Input -->
                                        <input class="form-control" type="text" placeholder="อีเมล" name="email_c" value="{{ old('email_c')}}">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactName">
                                        เบอร์ติดต่อ
                                        </label>

                                        <!-- Input -->
                                        <input class="form-control" type="text" placeholder="เบอร์ติดต่อ" name="phone_c" value="{{ old('phone_c')}}">

                                    </div>
                                </div>

                                <div class="col-12 col-md-12">
                                    <div class="form-group mb-5">

                                        <!-- Label -->
                                        <label for="contactName">
                                        โอนเงินเข้าธนาคารไหน?
                                        </label>

                                        <!-- Input -->
                                        <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"><i class="fa fa-bank"></i></label>
                                            </div>
                                            <select class="form-control" name="bank">
                                                <option value="1">ธนาคารไทยพาณิชย์ (ภาษาญี่ปุ่น) 227-204-4159 อ.พรหมเทพ ชัยกิตติวณิชย์</option>
                                                <option value="2">ธนาคารกสิกรไทย (ภาษาญี่ปุ่น) 026-226-1532 อ.พรหมเทพ ชัยกิตติวณิชย์</option>
                                                <option value="3">ธนาคารกรุงไทย (ภาษาญี่ปุ่น) 981-169-5903 อ.พรหมเทพ ชัยกิตติวณิชย์</option>
                                            </select>
                                        </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">
                                        <!-- Label -->
                                        <label for="contactName">
                                        จำนวนเงิน
                                        </label>

                                        <!-- Input -->
                                        <input class="form-control" type="text" placeholder="จำนวนเงิน" name="money_c" value="{{ old('money_c')}}">

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">
                                        <!-- Label -->
                                        <label for="contactName">
                                        เช็ค Bot
                                        </label>

                                        <!-- Input -->
                                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                                        <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong>คุณเป็นหุ่นยนต์หรือป่าวหล่ะ!</strong>
                                            </span>
                                        @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">
                                        <!-- Label -->
                                        <label for="contactName">
                                        วันที่-เวลาโอนเงิน
                                        </label>

                                        <!-- Input -->
                                        <input type="text" class="form-control" value="<?php echo date('d-m-Y')?>"
                                                        id="datepicker" autocomplete="off" name="day_tran">

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-5">
                                        <!-- Label -->
                                        <label for="contactName">
                                        ชั่วโมง-นาที
                                        </label>

                                        <!-- Input -->
                                        <input type="text" class="form-control" name="time_tran" value="{{ old('time_tran')}}"
                                            placeholder="10.30">

                                    </div>
                                </div>

                                <div class="col-12 col-md-12">
                                    <div class="form-group mb-5">
                                        <!-- Label -->
                                        <label for="contactName">
                                        สลิปการโอนเงิน
                                        </label>

                                        <!-- Input -->
                                        <div class="custom-file-upload">
                                            
                                            <input type="file" id="file" name="image" />
                                        </div>

                                    </div>
                                </div>
                             
                            </div>
                            <!-- / .row -->
                            
                            
                            <!-- / .row -->
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <br>
                                    <!-- Submit -->
                                    <button type="submit" id="btnSendData" class="btn btn-primary lift">
                                        แจ้งชำระเงิน
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

<style>

.custom-file-upload-hidden {
    display: none;
    visibility: hidden;
    position: absolute;
    left: -9999px;
}
.custom-file-upload {
    display: block;
    width: auto;
    font-size: 16px;
    margin-top: 0px;
    //border: 1px solid #ccc;
    label {
        display: block;
        margin-bottom: 5px;
    }
}

.file-upload-wrapper2 {
    position: relative; 
    margin-bottom: 5px;
    //border: 1px solid #ccc;
}
.file-upload-input2 {
    border-radius: 4px;
    height: 50px;
    border: 1px solid #f1f4f8;
    padding: 0px 22px;
    font-size: 16px;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
    background: #F2F6FE;
    
}
.file-upload-button2 {
    cursor: pointer; 
    display: inline-block; 
    color: #fff;
    font-size: 16px;
    text-transform: uppercase;
    padding: 11px 20px; 
    border: none;
    margin-left: -1px;  
    background: #1652F0;
    float: left; /* IE 9 Fix */
  
  
}

</style>

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>

<script>

//Reference: 
//https://www.onextrapixel.com/2012/12/10/how-to-create-a-custom-file-input-with-jquery-css3-and-php/
;(function($) {

// Browser supports HTML5 multiple file?
var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
    isIE = /msie/i.test( navigator.userAgent );

$.fn.customFile = function() {

  return this.each(function() {

    var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
        $wrap = $('<div class="file-upload-wrapper2">'),
        $input = $('<input type="text" class="file-upload-input2" />'),
        // Button that will be used in non-IE browsers
        $button = $('<button type="button" class="file-upload-button2">เลือกรูปภาปภาพ</button>'),
        // Hack for IE
        $label = $('<label class="file-upload-button2" for="'+ $file[0].id +'">เลือกรูปภาปภาพ</label>');

    // Hide by shifting to the left so we
    // can still trigger events
    $file.css({
      position: 'absolute',
      left: '-9999px'
    });

    $wrap.insertAfter( $file )
      .append( $file, $input, ( isIE ? $label : $button ) );

    // Prevent focus
    $file.attr('tabIndex', -1);
    $button.attr('tabIndex', -1);

    $button.click(function () {
      $file.focus().click(); // Open dialog
    });

    $file.change(function() {

      var files = [], fileArr, filename;

      // If multiple is supported then extract
      // all filenames from the file array
      if ( multipleSupport ) {
        fileArr = $file[0].files;
        for ( var i = 0, len = fileArr.length; i < len; i++ ) {
          files.push( fileArr[i].name );
        }
        filename = files.join(', ');

      // If not supported then just take the value
      // and remove the path to just show the filename
      } else {
        filename = $file.val().split('\\').pop();
      }

      $input.val( filename ) // Set the value
        .attr('title', filename) // Show filename in title tootlip
        .focus(); // Regain focus

    });

    $input.on({
      blur: function() { $file.trigger('blur'); },
      keydown: function( e ) {
        if ( e.which === 13 ) { // Enter
          if ( !isIE ) { $file.trigger('click'); }
        } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
          // On some browsers the value is read-only
          // with this trick we remove the old input and add
          // a clean clone with all the original events attached
          $file.replaceWith( $file = $file.clone( true ) );
          $file.trigger('change');
          $input.val('');
        } else if ( e.which === 9 ){ // TAB
          return;
        } else { // All other keys
          return false;
        }
      }
    });

  });

};

// Old browser fallback
if ( !multipleSupport ) {
  $( document ).on('change', 'input.customfile', function() {

    var $this = $(this),
        // Create a unique ID so we
        // can attach the label to the input
        uniqId = 'customfile_'+ (new Date()).getTime(),
        $wrap = $this.parent(),

        // Filter empty input
        $inputs = $wrap.siblings().find('.file-upload-input2')
          .filter(function(){ return !this.value }),

        $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

    // 1ms timeout so it runs after all other events
    // that modify the value have triggered
    setTimeout(function() {
      // Add a new input
      if ( $this.val() ) {
        // Check for empty fields to prevent
        // creating new inputs when changing files
        if ( !$inputs.length ) {
          $wrap.after( $file );
          $file.customFile();
        }
      // Remove and reorganize inputs
      } else {
        $inputs.parent().remove();
        // Move the input so it's always last on the list
        $wrap.appendTo( $wrap.parent() );
        $wrap.find('input').focus();
      }
    }, 1);

  });
}

}(jQuery));

$('input[type=file]').customFile();
</script>

@stop('scripts')