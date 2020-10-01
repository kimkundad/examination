@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')
@stop('stylesheet')



@section('content')

<div class="intro2" id="intro" data-scroll-index="0" style="background: url('{{ url('img/HeadBanner.png') }}');">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-12">
                        <div class="intro-content text-center">
                            <h1>&nbsp</h1>
                            <p>&nbsp</p>
                            <div class="intro-form" style="height:50px;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="helpdesk-search section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="helpdesk-search-content">
                            <h2 class="mb-5" style="border-bottom: 1px solid #d2caca; padding-bottom: 20px; margin-bottom: 1rem !important;">{{ $ex->ex_name }} </h2>
                            <p class="mb-1">วิชา {{ $ex->cat_name }} | {{ $ex->ex_view }} เข้าชม</p>
                            <p class="mb-1">รหัส {{ $ex->ex_code }}</p>
                            <p class="mb-1">จำนวน {{ $ex->ex_total }} ข้อ</p>
                            <p class="mb-1">เวลา {{ $ex->ex_time }}</p>
                            <br><br>
                            <a href="{{ url('doExam/'.$ex->ids) }}" class="btn btn-success">เริ่มทำแบบทดสอบ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="market section-padding page-section" data-scroll-index="1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title text-center">
                            <h2>ประวัติการทำแบบทดสอบ</h2>
                        </div>
                    </div>
                </div>
              <!--  <div class="row">
                    <div class="col-xl-12">
                        <div class="market-table">
                            <div class="table-responsive">
                                <table class="table mb-0 table-responsive-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>การทดสอบ</th>
                                            <th>วันที่ทำแบบทดสอบ</th>
                                            <th>ผลการทดสอบ</th>
                                            <th>เวลาที่ใช้</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                คะแนน 15/20 
                                            </td>

                                            <td>
                                                22 กันยายน 2563
                                            </td>
                                            <td>
                                                <span class="text-success">ผ่าน</span>
                                            </td>
                                            
                                            <td>20.25 นาที </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                คะแนน 15/20 
                                            </td>

                                            <td>
                                                22 กันยายน 2563
                                            </td>
                                            <td>
                                                <span class="text-success">ผ่าน</span>
                                            </td>
                                            
                                            <td>20.25 นาที </td>
                                        </tr>
                                      
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->

                <hr>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="market-table">
                            <div class="table-responsive">
                                <table class="table mb-0 table-responsive-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>การทดสอบ</th>
                                            <th>วันที่ทำแบบทดสอบ</th>
                                            <th>ผลการทดสอบ</th>
                                            <th>เวลาที่ใช้</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="text-center">กรุณา <a href="{{ url('login') }}" class="btn btn-success">Login</a> เพื่อบันทึกข้อมูลการทำแบบทดสอบ</td>
                                        
                                        </tr>
                                        
                                      
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
       


@endsection

@section('scripts')

@stop('scripts')