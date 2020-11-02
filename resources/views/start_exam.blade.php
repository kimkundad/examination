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
                            
                            
                            @if($ex->level == 0)
                            <div>
                            <p class="mb-1">เนื้อหาส่วนนี้นักเรียนสามารถเข้ามาทำข้อสอบได้ฟรี ไม่มีค่าใช้จ่าย</p>
                            <h4 class="text-success">ข้อสอบฟรี</h4>
                            </div>
                            <a href="{{ url('check_doExam/'.$ex->ids) }}" class="btn btn-success">เริ่มทำข้อสอบ</a>
                            @else

                                @if(Auth::guest())
                                <div>
                                <p class="mb-1"><b>กดสั่งซื้อข้อสอบ :</b>  {{ $ex->ex_name }} </p>
                                <h4 class="text-success">ราคา {{ $ex->price }} บาท</h4>
                                </div>
                                <br>
                                <td colspan="5" class="text-center">กรุณา <a href="{{ url('login') }}" class="btn btn-success">Login</a> เพื่อกดซื้อข้อสอบ</td>

                                @else
                                    <div>
                                    <p class="mb-1"><b>กดสั่งซื้อข้อสอบ :</b>  {{ $ex->ex_name }} </p>
                                    <h4 class="text-success">ราคา {{ $ex->price }} บาท</h4>
                                    </div>
                                    <br>
                                    @if($check_count != null)

                                        @if($check_count->status1 == 0)
                                        <p class="mb-1 text-danger">นักเรียนได้ทำการสั่งซื้อข้อสอบนี้ไปแล้ว รอการแจ้งชำระเงิน</p>
                                        <a href="{{ url('payment/'.$check_count->order_id) }}" class="btn btn-danger">แจ้งการชำระเงิน</a>
                                        @elseif($check_count->status1 == 1)
                                        <p class="mb-1 text-warning">นักเรียนได้ทำการแจ้งชำระเงินไปแล้ว รอการตรวจสอบ</p>
                                        <a href="#" class="btn btn-warning">รอการตรวจสอบ</a>
                                        @else
                                        <a href="{{ url('check_doExam/'.$ex->ids) }}" class="btn btn-success">เริ่มทำข้อสอบ</a>
                                        @endif
                                    @else
                                    <td colspan="5" class="text-center"> <a href="{{ url('buy_doExam/'.$ex->ids) }}" class="btn btn-success">กดซื้อข้อสอบ</a></td>
                                    @endif

                                @endif

                            @endif
                            
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
                            <h2>ประวัติการทำข้อสอบ</h2>
                        </div>
                    </div>
                </div>
                <hr>
                @if (Auth::guest())
                <div class="row">
                    <div class="col-xl-12">
                        <div class="market-table">
                            <div class="table-responsive">
                                <table class="table mb-0 table-responsive-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>การทดสอบ</th>
                                            <th>วันที่ทำข้อสอบ</th>
                                            <th>ผลการทดสอบ</th>
                                            <th>เวลาที่ใช้</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="text-center">กรุณา <a href="{{ url('login') }}" class="btn btn-success">Login</a> เพื่อบันทึกข้อมูลการทำข้อสอบ</td>
                                        
                                        </tr>
                                        
                                      
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @else

                <div class="row">
                    <div class="col-xl-12">
                        <div class="market-table">
                            <div class="table-responsive">
                                <table class="table mb-0 table-responsive-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>การทดสอบ</th>
                                            <th>วันที่ทำข้อสอบ</th>
                                            <th>ผลการทดสอบ</th>
                                            <th>เวลาที่ใช้</th>
                                        </tr>
                                    </thead>
                                    <tbody {{ $s = 1 }}>

                                    @if(isset($user))
                                        @foreach($user as $u)
                                        <tr>
                                            <td>{{ $s }}</td>
                                            <td>
                                                คะแนน {{ $u->total_point }}/{{ $u->ex_total }} 
                                            </td>

                                            <td>
                                                {{$u->created_at}}
                                            </td>
                                            <td>
                                                @if($u->total_point >= ($u->ex_total/2))
                                                <span class="text-success">ผ่าน</span>
                                                @else
                                                <span class="text-danger">ไม่ผ่าน</span>
                                                @endif
                                                
                                            </td>
                                            
                                            <td>{{ $u->total_time }} นาที </td>
                                        </tr {{ $s++ }}>
                                        @endforeach
                                    @endif
                                        
                                      
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                @endif
              <!--   -->

                

                


            </div>
        </div>
       


@endsection

@section('scripts')

@stop('scripts')