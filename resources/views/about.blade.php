@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')
@stop('stylesheet')



@section('content')



<div class="about-one section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="service-img">
                            <img src="{{ url('assets/images/about/1.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-content m-t-50">
                            <h3>In Brief</h3>
                            <p>Founded in January of 2020, Tradix is a digital currency wallet and platform where
                                merchants
                                and consumers can transact with new digital currencies like bitcoin, ethereum, and
                                litecoin.
                                We're based in San Francisco, California.</p>
                            <p>Bitcoin is the world's most widely used alternative currency with a total market cap of
                                over
                                $100 billion. The bitcoin network is made up of thousands of computers run by
                                individuals
                                all over the world.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-ceo py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ceo-content">
                            <div class="media">
                                <img src="{{ url('assets/images/avatar/6.jpg')}}" alt="" class="img-fluid mr-4 rounded-circle">
                                <div class="media-body">
                                    <h3>Eric Benz</h3>
                                    <span>CEO of Tradix</span>
                                    <p class="mt-2">John Abraham has over 10 years of experience working in and around
                                        Financial Technology. He has delivered innovative SaaS systems for some of
                                        today's biggest institutions around payments, identity, and banking
                                        infrastructure. John Abraham has been in the Blockchain space since 2012 and is
                                        involved in a number of blockchain and fintech businesses both as an investor,
                                        board director, and founder.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-two section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="service-content my-5">
                            <h3>Working at Tradix</h3>
                            <p>Digital currencies are changing how we use and think about money. Tradix, the most
                                trusted
                                company in the space, is looking for you to join our rapidly growing team.</p>
                            <a href="#" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-img">
                            <img src="{{ url('assets/images/about/1.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('scripts')

@stop('scripts')