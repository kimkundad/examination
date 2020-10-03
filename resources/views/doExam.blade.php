@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')
<link href="{{url('assets/css/jquery.steps.css')}}" rel="stylesheet">

<style>
    .wizard > .steps a, .wizard > .steps a:hover, .wizard > .steps a:active {
    display: block;
    width: 30px;
    height: 30px;
    margin: 0 0.em 0.5em;
    padding: 0.1em 0.5em 0.5em 0.5em;
    text-decoration: none;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
figure {
    margin: 0;
}
.wizard > .content {
    background: #fff;
    display: block;
    margin: 0.5em;
    position: relative;
    width: auto;
    height: auto;
    border: 1px solid #eee;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
</style>
@stop('stylesheet')



@section('content')



        <div class="helpdesk-search section-padding" style="padding: 50px 0px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="helpdesk-search-content">
                            <h2 class="mb-5" style=" margin-bottom: 0.81rem !important;">{{ $ex->ex_name }}</h2>
                            <p class="mb-1">จำนวน {{ $ex->ex_total }} ข้อ, เวลา {{ $ex->ex_time }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="market section-padding page-section" data-scroll-index="1" style="padding: 100px 0px; 100px 0px;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                
                    <div class="col-xl-10 col-lg-10">
                    <form class="form-horizontal" id="form" name="Form" action="{{url('post_ans_course')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <p class="text-center">ระบบจะทำการบันทึกเวลาของนักเรียน : <button class="btn btn-outline-danger"><span id="timestamp"></span></button>
                    <input type="hidden" name="timmery_time" value="" id="timestamp2"></p>
                    <hr>
                    <br>

                    <div class="single-video-title box mb-3" {{$set_zero = 1}}>
                    <input type="hidden" class="form-control" name="examples_id" value="{{$ex->ids}}" >
                    <div id="example-basic">

                        @if(isset($obj))
                            @foreach($obj as $u)

                                @if($u->qu_type == 1)
                                <h3>{{$s}}</h3>
                                <section {{$sum = 0}}>
                                <ul class="list-group answers{{$s}}" > <div>
                                <h4>{{ $u->qu_name }}</h4>
                                
                                <br>
                                </div>
                                    <input type="hidden" name="value_{{$s}}" value="" class="answers-2" id="get_sum_ship{{$s}}">
                                    @if(isset($u->options))
                                    @foreach($u->options as $uu)
                                    <li  class="switch list-group-item list-group-item-action" access_id="{{$uu->id}}" s_id="{{$s}}" {{$sum++}}> {{$sum}}.  {{$uu->op_name}}</li>
                                    @endforeach
                                    @endif

                                </ul>
                                </section {{$s++}} {{$set_zero++}}>

                                @elseif($u->qu_type == 2)
                                <h3>{{$s}}</h3>
                                    <section {{$sum = 0}}>
                                    @if(isset($uu->qu_file))
                                    <img src="{{ url('img/exercise/'.$u->qu_file) }}" style="width:100%;">
                                    @endif
                                    <br><br>
                                    <ul class="list-group answers{{$s}}" > <div>
                                    <h4>{{ $u->qu_name }}</h4>
                                    
                                    <br>
                                    </div>
                                        <input type="hidden" name="value_{{$s}}" value="" class="answers-2" id="get_sum_ship{{$s}}">
                                        @if(isset($u->options))
                                    @foreach($u->options as $uu)
                                    <li  class="switch list-group-item list-group-item-action" access_id="{{$uu->id}}" s_id="{{$s}}" {{$sum++}}> {{$sum}}.  {{$uu->op_name}}</li>
                                    @endforeach
                                    @endif

                                    </ul>
                                    </section {{$s++}} {{$set_zero++}}>

                                @else
                                <h3>{{$s}}</h3>
                                <section {{$sum = 0}}>
                                <figure>
                                <h4>{{ $u->qu_name }}</h4>
                                        <audio id="player" controls class="myAudio">
                                            <source src="{{ url('audio/'.$u->qu_file) }}" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                </figure>
                                <ul class="list-group answers{{$s}}" > <div>
                                <br>
                                </div>
                                    <input type="hidden" name="value_{{$s}}" value="" class="answers-1" id="get_sum_ship{{$s}}">
                                    @if(isset($u->options))
                                    @foreach($u->options as $uu)
                                    <li  class="switch list-group-item list-group-item-action" access_id="{{$uu->id}}" s_id="{{$s}}" {{$sum++}}> {{$sum}}.  {{$uu->op_name}}</li>
                                    @endforeach
                                    @endif
                                </ul>
                                </section {{$s++}} {{$set_zero++}}>
                                @endif

                            @endforeach
                        @endif
                        
                        


                        </div>
                    </div >
                    

                    </div>
                    </form {{$set_zero -= 1}}>
                </div>
                
            </div>
        </div {{$sum = 0}}>
       


@endsection

@section('scripts')

<script src="{{url('assets/js/jquery.steps.js')}}"></script>
<script src="{{url('assets/js/ClockTimer.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>



var final_set1 = 0;
console.log({{$set_zero}});

function checkInputs() {

  var flag=0;
var result = new Array();

  $("#example-basic :input").each(function(){
      var input = $(this);
      if(input.val() > 0 && input.val() !== '' ) {
          result.push(input.val());
      }
  });

  console.log(result.length);
  final_set1 = result.length;

  if(result.length == {{$set_zero}}){

  } else {

      swal("คำตอบไม่ครบ!", "นักเรียนต้องกลับไปทำข้อสอบให้ครบ!", "error");

  }

}



$(document).ready(function(){

    var myAudio = document.getElementsByClassName("myAudio");
   
    $('.next_gen').click(function() {
        var set_sound = 1;
        $("#player").each(function(){
            
            $(this).get(1).pause();
        });
    });

  $('#example-basic a').click(function(event) {
               event.preventDefault();
               var get_data = $(this).attr('href');
              // console.log(final_set1);

               if(get_data == '#finish'){
                 checkInputs();
                 if(final_set1 == {{$set_zero}}){

                
                   $('#form').submit();
                 }

               }
              //
          });


$("li.switch").click(function(event) {

  var course_id = $(this).closest('li').attr('access_id');
  var c_id = $(this).closest('li').attr('s_id');
  document.getElementById("get_sum_ship"+c_id).value = Number(course_id);
  console.log('fea : '+course_id);
/*  $.ajax({
          type:'POST',
          url:'{{url('admin/fea_video')}}',
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          data: { "course_id" : course_id },
          success: function(data){
            if(data.data.success){


              PNotify.prototype.options.styling = "fontawesome";
              new PNotify({
                    title: 'ยินดีด้วยค่ะ',
                    text: 'คุณได้ทำการเลือกข้อมูลสำเร็จแล้ว',
                    type: 'success'
                  });



            }
          }
      }); */


  });
    });




$("#example-basic").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true
});

var price_image = 0;

$(function(){
    console.log('ready');

    @if(isset($obj))
          @foreach($obj as $u)

    $('.answers{{$set}} li').click(function(e) {
        e.preventDefault()

        $that = $(this);
        price_image = document.getElementById('timestamp').innerText;
        console.log(price_image);
        document.getElementById("timestamp2").value = price_image;
        $('.answers{{$set}}').find('li').removeClass('active');
        $that.addClass('active');
    });

    {{$set++}}
    @endforeach
@endif

   

    $('.answers2 li').click(function(e) {
        e.preventDefault()

        $that = $(this);

        $('.answers2').find('li').removeClass('active');
        $that.addClass('active');
    });

})

$(document).ready(function() {

 var timmery = clock.config({
    display: 'timestamp'
});

setTimeout(function() {
    clock.StartTime();
}, 1000);

});




</script>
@stop('scripts')