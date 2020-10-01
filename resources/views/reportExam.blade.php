@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')

<style>
    button, .btn {
    padding: 8px 15px;
    display: inline-block;
    border-radius: 5px;
    min-width: 80px;
    font-size: 14px;
    font-weight: 600;
}
</style>
@stop('stylesheet')



@section('content')



        <div class="about-one section-padding">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="id_info">
                            <h3>{{$ex->ex_name}} </h3>
                            <p class="mb-1 mt-3">ระดับ {{$ex->cat_name}} </p>
                            <p class="mb-1 mt-3">รหัส {{$ex->ex_code}} </p>
                            <p class="mb-1">วันที่สอบ: <span class="font-weight-bold">{{ $obj->created_at }}</span></p>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-sm btn-success mt-3"><i class="fa fa-list-ul" aria-hidden="true"></i> {{$ex->ex_total}} ข้อ </a>
                                    <a href="#" class="btn btn-sm btn-success mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$ex->ex_time}} </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('answer/'.$ex->ids) }}" class="btn btn-outline-primary  mt-3"><i class="fa fa-check-square-o" aria-hidden="true"></i>  ดูเฉลย </a>
                                    <a href="{{ url('doExam/'.$ex->ids) }}" class="btn btn-outline-primary mt-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ทำอีกครั้ง  </a>
                                    <a href="#" class="btn btn-sm btn-primary mt-3"><i class="fa fa-facebook" aria-hidden="true"></i> แชร์ให้เพื่อนรู้</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        
                        <div class="product-feature-content">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="product-feature-text">
                                        <h4><span><i class="fa fa-shield"></i></span> {{ $obj->total_point }} </h4>
                                        <p>ข้อที่ถูก</p>
                                    </div>
                                    <div class="product-feature-text">
                                        <h4><span><i class="fa fa-adjust"></i></span> {{ $ex->ex_total-$obj->total_point }} </h4>
                                        <p>ข้อที่ผิด</p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div id="sparkline11"></div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="row">
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="product-feature-box">
                                    <span class="bg-success"><i class="la la-user"></i></span>
                                    <h4>{{$count}}</h4>
                                    <p>เข้ามาทำข้อสอบ</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="product-feature-box">
                                    <span class="bg-info"><i class="la la-clock-o"></i></span>
                                    <h4>{{$obj->total_time}} นาที</h4>
                                    <p>เวลาที่ทำได้</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        
        


@endsection

@section('scripts')
<script>

(function ($) {


$("#sparkline11").sparkline([{{number_format($topoint)}}, {{number_format($mypoint)}}], {
    type: "pie",
    height: "170",
    resize: !0,
    sliceColors: ["rgba(22, 82, 240, 0.2)", "rgba(22, 82, 240, 0.95)"]
});

})(jQuery); 

</script>

@stop('scripts')