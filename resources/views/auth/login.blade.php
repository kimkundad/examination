@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')
@stop('stylesheet')



@section('content')




<div class=" section-padding">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-xl-5 col-md-6">
                            <div class="mini-logo text-center my-5">
                                <img src="{{ url('img/logo/800px-Google_2015_logo.svg.png') }}" alt="" style="height:42px;">
                            </div>
                        <div class="auth-form card">
                            <div class="card-header justify-content-center">
                                <h4 class="card-title">เข้าสู่ระบบ</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" class="signin_validate" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="hello@example.com" name="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password"
                                            name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group mb-0">
                                            <label class="toggle">
                                                <input class="toggle-checkbox" name="remember" type="checkbox">
                                                <span class="toggle-switch"></span>
                                                <span class="toggle-label">จดจำฉันไว้</span>
                                            </label>
                                        </div>
                                        <div class="form-group mb-0">
                                            <a href="{{ route('password.request') }}">ลืม Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block">เข้าสู่ระบบ</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>หากคุณยังไม่มีบัญชี? <a class="text-primary" href="{{ ('register') }}"> สมัครสมาชิก</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('scripts')

@stop('scripts')