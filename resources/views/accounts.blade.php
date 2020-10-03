@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')
@stop('stylesheet')



@section('content')




        <div class="market section-padding page-section" data-scroll-index="1">
            <div class="container">
            <form class="forms-sample" method="POST" action="{{ url('api/add_profile/') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
                <div class="row ">

                <div class="col-xl-12">
                
                </div>
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ข้อมูลส่วนตัวของนักเรียน</h4>
                                    </div>
                                    <div class="card-body">
                                        
                                            <div class="form-row">
                                                <div class="form-group col-xl-12">
                                                    <label class="mr-sm-2">New Email</label>
                                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Email">
                                                </div>
                                                <div class="form-group col-xl-12">
                                                    <label class="mr-sm-2">Line ID</label>
                                                    <input type="text" class="form-control" value="{{ Auth::user()->zipcode }}" name="zipcode" placeholder="line id">
                                                </div>
                                                <div class="form-group col-xl-12">
                                                    <label class="mr-sm-2">Phone</label>
                                                    <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="08x-1256-xx52">
                                                </div>
                                                
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">&nbsp</h4>
                                    </div>
                                    <div class="card-body">
                                        
                                            <div class="form-row">
                                                <div class="form-group col-xl-12">
                                                    <label class="mr-sm-2">Your Name</label>
                                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" placeholder="Name">
                                                </div>
                                                <div class="form-group col-xl-12">
                                                    <label class="mr-sm-2"> Address</label>
                                                    <input type="text" class="form-control" value="{{ Auth::user()->address }}" name="address" placeholder="123, Central Square, Brooklyn" name="permanentaddress">
                                                </div>
                                                <div class="form-group col-xl-12">
                                                    <div class="media align-items-center mb-3">
                                                        <img class="mr-3 rounded-circle mr-0 mr-sm-3"
                                                            src="{{ url('img/avatar/'.Auth::user()->avatar) }}" width="55" height="55" alt="">
                                                        <div class="media-body">
                                                            <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                                                            <p class="mb-0">Max file size is 20mb
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="file-upload-wrapper" data-text="Change Photo">
                                                        <input name="image" type="file"
                                                            class="file-upload-field">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-success waves-effect">บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>

                            


                </div>
                </form>
                <hr>
            </div>
        </div>
       


@endsection

@section('scripts')

<script>

@error('email')
    swal("ชื่อ หรือ อีเมล ซ้ำในระบบ!");
@enderror

</script>


@stop('scripts')