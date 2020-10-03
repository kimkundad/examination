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

        <div class="exchange-form">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-7 col-lg-7">
                        <div class="intro-form-exchange">
                            <form  class="currency_validate" method="POST" action="{{ url('search_category/') }}">
                            {{ csrf_field() }}
                              <h2 class="text-center">ค้นหาข้อสอบ</h2>
                                <div class="form-group">

                                    <div class="input-group mb-3">
                                        <select name='category' class="form-control">
                                            <option value="">ค้นหาจากเนื้อหาการเรียน</option>
                                            @if(isset($objs))
                                                @foreach($objs as $u)
                                                    <option value="{{$u->id}}"> {{$u->cat_name}} </option>
                                                @endforeach
                                            @endif
                                        </select>

                                    </div>
                                </div>



                                <button type="submit" name="submit" class="btn btn-success btn-block">
                                    ค้นหา
                                    <i class="la la-search"></i>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="market section-padding page-section" data-scroll-index="1">
            <div class="container">
               
            @if(isset($objs))
                @foreach($objs as $j)
                <div class="row">
                    <div class="col-xl-12">
                    <h4 class="card-title">{{$j->cat_name}} <a href="{{ url('category/'.$j->id) }}" style="float:right; font-size:16px;"> ดูเพิ่มเติม <i class="la la-arrow-right"></i> </a></h4>
                        <div class="market-table">
                            <div class="table-responsive">
                                <table class="table mb-0 table-responsive-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>ข้อสอบ</th>
                                            <th>จำนวนข้อ</th>
                                            <th>ระดับ</th>
                                            <th>ผู้เข้าชม</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(isset($j->my_ex))
                                        @foreach($j->my_ex as $u)
                                        <tr>
                                            <td>{{ $u->ex_code }}</td>
                                            <td class="coin_icon">
                                                <span>{{ $u->ex_name }}</span>
                                            </td>
                                            <td>
                                            {{ $u->option }}
                                            </td>
                                            <td>
                                                <span class="text-danger">{{$j->cat_name}}</span>
                                            </td>
                                            <td>{{ $u->ex_view }} </td>
                                            <td><a href="{{ url('/start_exam/'.$u->id) }}" class="btn btn-outline-success">เริ่มทำข้อสอบ</a></td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                @endforeach
            @endif


            </div>
        </div>




       
        














@endsection

@section('scripts')

@stop('scripts')
