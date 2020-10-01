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
                            <h2>So, What brings new product today?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="new-product-content">
                            <img class="img-fluid" src="./images/svg/api.svg" alt="">
                            <h4>Integrate our API</h4>
                            <p>A white-label solution for your project, whether it is a wallet, a marketplace or a
                                service provider. Set it up to accept any of 140+ cryptocurrencies listed on Tradix
                                and get revenue for each transaction made.</p>
                            <a href="#" class="btn btn-success px-4">Learn more</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="new-product-content">
                            <img class="img-fluid" src="./images/svg/affiliate.svg" alt="">
                            <h4>Join our Affiliate Program</h4>
                            <p>Place an affiliate link or customizable widget on your website, blog or social media
                                profile. Get 50% of our revenue from every transaction made via either of the tools
                                used.
                            </p>
                            <a href="#" class="btn btn-outline-success px-4">Become an affiliate</a>
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
                            <span>What's Say</span>
                            <h3>Trusted by 2 million customers</h3>
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
                                            <img class="img-fluid" src="./images/testimonial/1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="customer-review">
                                            <img class="img-fluid" src="./images/brand/2.webp" alt="">
                                            <p>Integrating Tradix services into Trezor Wallet's exchange has been a
                                                great success for all parties, especially the users.
                                            </p>
                                            <div class="customer-info">
                                                <h5>Mr John Doe</h5>
                                                <p>CEO, Example Company</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="customer-img">
                                            <img class="img-fluid" src="./images/testimonial/2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="customer-review">
                                            <img class="img-fluid" src="./images/brand/3.webp" alt="">
                                            <p>MEW is excited to bring Tradix’s extensive range of crypto assets,
                                                competitive rates and seamless swap functionality</p>
                                            <div class="customer-info">
                                                <h5>Mr Abraham</h5>
                                                <p>CEO, Example Company</p>
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
                            <h4>EASY</h4>
                            <p>Create an account, choose your crypto, input your receiving address, and send your funds
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="trust-content">
                            <span><i class="fa fa-cubes"></i></span>
                            <h4>SAFE</h4>
                            <p>As a non-custodial exchange, we don’t hold your deposits, so your funds are never
                                vulnerable to hacks.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="trust-content">
                            <span><i class="fa fa-life-ring"></i></span>
                            <h4>COMPETITIVE</h4>
                            <p>Our exchange rates are updated in real time. What you see is what you get--with no
                                additional fees.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>














@endsection

@section('scripts')

@stop('scripts')
