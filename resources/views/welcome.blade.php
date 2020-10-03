@extends('layouts.template')

@section('title')
jlpt.online แหล่งรวมข้อสอบ แนวข้อสอบวัดระดับ JLPT ติว N4 N5 ติว N3 N2 N1 ติว PAT 7.3 ภาษาญี่ปุ่น ภาษาญี่ปุ่นพื้นฐาน
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
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title text-center">
                            <h2>เว็บไซต์อันดับหนึ่งในหมวดการศึกษา ภาษาญี่ปุ่น</h2>
                            <p>ครูพี่โฮม คนเดียวที่ได้ PAT ญี่ปุ่น 300 คะแนนเต็ม เกียรตินิยมอันดับ 1 (เหรียญทอง) อักษรศาสตร์ จุฬาฯ</p>
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
                                            <th>รหัส</th>
                                            <th>ข้อสอบ</th>
                                            <th>จำนวนข้อ</th>
                                            <th>ระดับ</th>
                                            <th>ผู้เข้าชม</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($ex)
                                        @foreach($ex as $u)
                                        <tr>
                                            <td>{{ $u->ex_code }}</td>
                                            <td class="coin_icon">
                                                <span>{{ $u->ex_name }}</span>
                                            </td>
                                            <td>
                                            {{ $u->option }}
                                            </td>
                                            <td>
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
                    </div>
                </div>
            </div>
        </div>




        <div class="intro2" id="intro" data-scroll-index="0" style="background: url('{{ url('img/5f245240e1126513387227.png') }}');">
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






        <div class="new-product section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="section-title">
                            <h2>วันนี้ ครูพี่โฮมมีแบบทดสอบใหม่อะไรบ้าง?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="new-product-content">
                            <img class="img-fluid" src="./images/svg/api.svg" alt="">
                            <h4>แบบฝึกหัดใหม่ทุกวัน</h4>
                            <p>เพื่อความทันสมัยของเนื้อหา แบบทดสอบ  เราได้ทำการ คัดกรอง ค้นหาแนวแบบทดสอบ เพิ่มเนื้อหา แบบทดสอบภาษาญี่ปุ่นออนไลน์ ให้กับนักเรียน ให้เยอะที่สุด </p>
                            <a href="{{ url('about_us') }}" class="btn btn-success px-4">รู้จักเรามากขึ้น</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="new-product-content">
                            <img class="img-fluid" src="./images/svg/affiliate.svg" alt="">
                            <h4>เก็บประวัติการทำแบบฝึกหัด</h4>
                            <p>เพื่อให้นักเรียน ได้วิเคราะห์ สรุปผลการเรียนรู้ได้เอง  จากผลการทำแบบฝึกหัด ในแต่ละรอบ อีกทั้งยังสามารถแชร์ ผลการทดสอบ ให้เพื่อนๆมาร่วมสนุกกันได้
                            </p>
                            <a href="{{ url('examination') }}" class="btn btn-outline-success px-4">เริ่มทำแบบทดสอบกัน</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonial section-padding" data-scroll-index="3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="section_heading">
                            <span>มีอะไรพูด ?</span>
                            <h3>ได้รับความไว้วางใจจากผู้ใช้งาน</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-md-11">
                        <div class="testimonial-content">
                            <div class="testimonial2 owl-carousel owl-theme">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="customer-img">
                                            <img class="img-fluid" src="{{ url('img/1601717289304.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="customer-review">
                                            <img class="img-fluid" src="" alt="">
                                            <p>เคยเรียนค่ะ โดยรวมถือว่าโอเคเลยนะ เรียนแบบสด หรือ @home ก็พอๆกัน เสียอย่างเดียวเวลาไม่เข้าใจอะไร @homeจะถามครูตัวต่อตัวไม่ได้ แต่ถามทางไลน์หรือเฟสได้ค่ะ 
                                            </p>
                                            <div class="customer-info">
                                                <h5>สมาชิกหมายเลข 1101456</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="customer-img">
                                            <img class="img-fluid" src="{{ url('img/1601717270937.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="customer-review">
                                            <img class="img-fluid" src="" alt="">
                                            <p>เนื้อหาแบบทดสอบครบ หลากหลาย เพื่อนๆสามารถลองมาทำแบบทดสอบ เพื่อวัดผลกันได้นะครับ มาสนุกด้วยกัน</p>
                                            <div class="customer-info">
                                            <h5>สมาชิกหมายเลข 1154626</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="trust section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="trust-content">
                            <span><i class="fa fa-shield"></i></span>
                            <h4>ใช้งานง่าย</h4>
                            <p>สร้างบัญชี เข้าไปทำ แบบทดสอบ ภาษาญี่ปุ่นออนไลน์ พร้อมเฉลย เก็บสถิติการทำแบบทดสอบ
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="trust-content">
                            <span><i class="fa fa-cubes"></i></span>
                            <h4>หลากหลาย</h4>
                            <p>ติวสอบวัดระดับ JLPT ติว N4 N5 ติว N3 N2 N1 ติว PAT 7.3 ภาษาญี่ปุ่น ภาษาญี่ปุ่นพื้นฐาน สำหรับคนทำงาน</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="trust-content">
                            <span><i class="fa fa-life-ring"></i></span>
                            <h4>ใช้ได้จริง</h4>
                            <p> วิเคราะห์ผลคะแนนออกมาเป็นกราฟ รู้จุดอ่อนจุดแข็งและประเมินโอกาสสอบผ่าน คอร์สเรียนภาษาญี่ปุ่นออนไลน์ </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>














@endsection

@section('scripts')

@stop('scripts')
