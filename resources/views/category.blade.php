@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')

<style>
.pagination {
   justify-content: center;
}
</style>
@stop('stylesheet')



@section('content')

<div class="intro2" id="intro" data-scroll-index="0" style="background: url('{{ url('img/category/'.$obj->cat_image) }}');">
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

        

        <div class="market section-padding page-section" data-scroll-index="1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title text-center">
                            <h2>{{ $obj->cat_name }}</h2>
                            <p>รายการข้อสอบ จำนวน {{ $count }} ชุด</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="market-table">
                            <div class="table-responsive">
                                <table class="table mb-0 table-responsive-sm table-striped">
                                    <thead>
                                        <tr>
                                        <th class="m_h">รหัส</th>
                                            <th >ข้อสอบ</th>
                                            <th>จำนวนข้อ</th>
                                            <th class="m_h">ระดับ</th>
                                            <th>ผู้เข้าชม</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if($ex)
                                        @foreach($ex as $u)
                                        <tr>
                                            <td class="m_h">{{ $u->ex_code }}</td>
                                            <td class="coin_icon">
                                                <span>{{ $u->ex_name }}</span>
                                            </td>
                                            <td>
                                            {{ $u->option }}
                                            </td>
                                            <td class="m_h">
                                                <span class="text-danger">{{ $u->cat_name }}</span>
                                            </td>
                                            <td>{{ $u->ex_view }} </td>
                                            <td><a href="{{ url('/start_exam/'.$u->ids) }}" class="btn btn-outline-success">เริ่มทำข้อสอบ</a></td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row ">
                            
                            <div class="col-md-12 text-center" style="justify-content: center;"><br> {{ $ex->links() }} </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
       


@endsection

@section('scripts')

@stop('scripts')