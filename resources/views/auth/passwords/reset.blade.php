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
                                <h4 class="card-title">{{ __('Reset Password') }}</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" class="signin_validate" action="{{ route('password.update') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" placeholder="hello@example.com" name="email">

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
                                    <div class="form-group">
                                        <label>{{ __('Confirm Password') }}</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password_confirmation"  required autocomplete="current-password"
                                            name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block">{{ __('Reset Password') }}</button>
                                    </div>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('scripts')

@stop('scripts')