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
                            <h2>ยืนยันการสั่งซื้อสำเร็จแล้ว</h2>
                            <p class="text-center">ระบบได้รับข้อความของคุณแล้ว เราได้ทำการส่งอีเมลพร้อมหมายเลขออเดอร์ <br>ให้นักเรียนนำ <b>หมายเลขออเดอร์ แจ้งชำระเงินตามลิงค์นี้ </b>( <a href="{{ url('payment/'.$ex->order_id) }}">แจ้งชำระเงินออนไลน์</a> ) 
                            </p>
                        </div>    
                        <h4>แจ้งโอนเงิน <span>( โอนเงินผ่านธนาคาร )</span></h4>
                        <br>
                                  <div class="profile_card">
                                            <div class="media" style="margin-bottom:10px;">
                                            <img class="mr-3" src="{{ url('img/bank/1516693634.png') }}" alt="" width="50">
                                                <div class="media-body">
                                                    <h4>227-204-4159</h4>
                                                    <h5>อ.พรหมเทพ ชัยกิตติวณิชย์</h5>
                                                </div>
                                            </div>
                                            </div>
                                            
                                            <div class="profile_card">
                                            <div class="media" style="margin-bottom:10px;">
                                            <img class="mr-3" src="{{ url('img/bank/1516693645.png') }}" alt="" width="50">
                                                <div class="media-body">
                                                    <h4>026-226-1532</h4>
                                                    <h5>อ.พรหมเทพ ชัยกิตติวณิชย์</h5>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="profile_card">
                                            <div class="media" style="margin-bottom:10px;">
                                            <img class="mr-3" src="{{ url('img/bank/1516693707.png') }}" alt="" width="50">
                                                <div class="media-body">
                                                    <h4>981-169-5903</h4>
                                                    <h5>อ.พรหมเทพ ชัยกิตติวณิชย์</h5>
                                                </div>
                                            </div>
                                            </div>

                        <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><span class="text-primary">หมายเลขออเดอร์</span></td>
                                                    <td><span class="text-primary"> {{ $ex->order_id }} </span></td>
                                                </tr>
                                                <tr>
                                                    <td>ข้อสอบ</td>
                                                    <td>{{ $ex->ex_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ราคาข้อสอบ</td>
                                                    <td>{{ $ex->price }} บาท</td>
                                                </tr>
                                                <tr>
                                                    <td>ชื่อนักเรียน</td>
                                                    <td>{{ $ex->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>เบอร์ติดต่อ</td>
                                                    <td>{{ $ex->phone }}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td> อีเมล</td>
                                                    <td> {{ $ex->email }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                        
                        

                    </div>
                </div>
                
                
            </div>
        </div>


@endsection

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>




@stop('scripts')