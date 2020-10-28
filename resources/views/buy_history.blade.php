@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')
@stop('stylesheet')



@section('content')




        <div class="market section-padding page-section" data-scroll-index="1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title text-center">
                            <h2>ประวัติการสั่งซื้อ</h2>
                        </div>
                    </div>
                </div>
                <hr>
                
                

                <div class="row">
                    <div class="col-xl-12">
                        <div class="market-table">
                            <div class="table-responsive">
                                <table class="table mb-0 table-responsive-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>หมายเลขออเดอร์</th>
                                            <th>วันที่สั่งซื้อ</th>
                                            <th>ข้อสอบ</th>
                                            <th>ราคา</th>
                                            <th>สถานะ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody {{ $s = 1 }}>

                                    @if(isset($user))
                                        @foreach($user as $u)
                                        <tr>
                                            <td>{{ $u->order_id }} </td>
                                            <td>
                                             {{ $u->created_ats }} 
                                            </td>
                                            <td>
                                            {{ $u->ex_name }}
                                            </td>
                                            <td>{{ $u->price }} </td>
                                            <td>
                                                @if($u->status1 == 0)
                                                <span class="text-warning">รอการชำระเงิน</span>
                                                @elseif($u->status1 == 1)
                                                <span class="text-danger">รอการตรวจสอบ</span>
                                                @else
                                                <span class="text-success">สำเร็จ</span>
                                                @endif
                                                
                                            </td>
                                            <td>
                                                @if($u->status1 == 0)
                                                <a href="{{ url('payment/'.$u->order_id) }}" class="btn btn-warning">แจ้งชำระเงินออนไลน์</a>
                                                @elseif($u->status1 == 1)
                                                @else
                                                <a href="{{ url('doExam/'.$u->ex_id) }}" class="btn btn-success">ทำข้อสอบเลย</a>
                                                @endif
                                            </td>
                                            
                                        </tr {{ $s++ }}>
                                        @endforeach
                                    @endif
                                        
                                      
                                        
                                    </tbody>
                                </table>
                            </div>
                            {{ $user->links() }}
                        </div>
                    </div>
                </div>


             

                

                


            </div>
        </div>
       


@endsection

@section('scripts')

@stop('scripts')