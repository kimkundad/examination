<!-- <div class="cookie_alert">

        <div class="alert alert-light fade show">
            <i class="la la-close" data-dismiss="alert"></i>
            <p>
                We use cookies to enhance your experience. By using Tradix, you agree to our <a href="#">Terms of
                    Use</a> and <a href="#">Privacy
                    Policy</a>
            </p>
            <button class="btn btn-success btn-block">Accept</button>
        </div>
    </div> -->


    <!-- <div class="bg_icons"></div> -->



    <script src="{{ url('assets/js/global.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>



    <!-- Chart sparkline plugin files -->
    <script src="{{ url('assets/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- <script src="./vendor/validator/jquery.validate.js"></script>
    <script src="./vendor/validator/validator-init.js"></script> -->


    <script src="{{ url('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/vendor/waves/waves.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/owl-carousel-init.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    

    
    
        <script src="{{ url('assets/js/scripts.js') }}"></script>

    <script>

$('.navbar-toggler').on('click', function(){
    var div = document.getElementById('icon_pro');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        setTimeout(function(){
            div.style.display = 'block';
            }, 500);
        
    }
  
});



(function ($) {
    'use strict'
    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        duration: "fast"
    });
})(jQuery);

        @if ($message = Session::get('edit_success'))
        swal("Success!", "ระบบทำการแก้ไขข้อมูลให้แล้ว.", "success");
        @endif

        @if ($message = Session::get('please_login'))
        swal("กรุณาทำการ Login เข้าสู่ระบบก่อนทำข้อสอบ");
        @endif


        

    </script>
    
