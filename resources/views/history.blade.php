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
                            <h2>ประวัติการทำแบบทดสอบ</h2>
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
                                            <th>#</th>
                                            <th>การทดสอบ</th>
                                            <th>วันที่ทำแบบทดสอบ</th>
                                            <th>ผลการทดสอบ</th>
                                            <th>เวลาที่ใช้</th>
                                        </tr>
                                    </thead>
                                    <tbody {{ $s = 1 }}>

                                    @if(isset($user))
                                        @foreach($user as $u)
                                        <tr>
                                            <td>{{ $s }}. {{ $u->ex_name }} </td>
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
                            {{ $user->links() }}
                        </div>
                    </div>
                </div>


             

                

                


            </div>
        </div>
       


@endsection

@section('scripts')

@stop('scripts')