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
                            <h2>คุณทำรายการสำเร็จ</h2>
                            <p class="text-center">ทางทีมงานจะรีบตรวจสอบให้เร็วที่สุด 
                            </p>
                        </div>    

                        <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><span class="text-primary">หมายเลขออเดอร์</span></td>
                                                    <td><span class="text-primary"> {{ $ex->order_id_c }} </span></td>
                                                </tr>
                                                <tr>
                                                    <td>วันที่</td>
                                                    <td>{{$ex->day_tran}} / {{$ex->time_tran}}</td>
                                                </tr>
                                                <tr>
                                                    <td>ชื่อผู้ส่งเรื่อง</td>
                                                    <td>{{$ex->name_c}}</td>
                                                </tr>
                                                <tr>
                                                    <td>เลือกชำระเงิน</td>
                                                    <td>โอนผ่านธนาคาร</td>
                                                </tr>
                                                <tr>
                                                    <td>อีเมล</td>
                                                    <td>{{$ex->email_c}}</td>
                                                </tr>
                                                <tr>
                                                    <td>เบอร์ติดต่อ</td>
                                                    <td>{{$ex->phone_c}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td> ยอดที่ต้องชำระ</td>
                                                    <td>฿{{$ex->money_c}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <p class="p-4">คุณสามารถตรวจสอบรายละเอียดการสั่งซื้อของคุณได้ <a href="{{url('buy_history')}}"> ประวัติ การสั่งซื้อ</a></p>
                                    

                        
                        

                    </div>
                </div>
                
                
            </div>
        </div>


@endsection

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>




@stop('scripts')