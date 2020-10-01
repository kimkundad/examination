@extends('layouts.template')

@section('title')
เสริมสร้างพัฒนาการของเด็กๆผ่านการทำอาหารไปกับพวกเรา Green Wondery
@stop

@section('stylesheet')

<style>
    button, .btn {
    padding: 8px 15px;
    display: inline-block;
    border-radius: 5px;
    min-width: 80px;
    font-size: 14px;
    font-weight: 600;
}
h4{
    margin-top:20px;
}
.card {
    padding:20px;
}
</style>
@stop('stylesheet')



@section('content')



        <div class="about-one section-padding">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="id_info">
                            <h3>{{$ex->ex_name}} </h3>
                            <p class="mb-1 mt-3">ระดับ {{$ex->cat_name}} </p>
                            <p class="mb-1 mt-3">รหัส {{$ex->ex_code}} </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-sm btn-success mt-3"><i class="fa fa-list-ul" aria-hidden="true"></i> {{$ex->ex_total}} ข้อ </a>
                                    <a href="#" class="btn btn-sm btn-success mt-3"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$ex->ex_time}} </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('answer/'.$ex->ids) }}" class="btn btn-outline-primary  mt-3"><i class="fa fa-check-square-o" aria-hidden="true"></i>  ดูเฉลย </a>
                                    <a href="{{ url('doExam/'.$ex->ids) }}" class="btn btn-outline-primary mt-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ทำอีกครั้ง  </a>
                                    <a href="#" class="btn btn-sm btn-primary mt-3"><i class="fa fa-facebook" aria-hidden="true"></i> แชร์ให้เพื่อนรู้</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="id_info price-grid" {{ $s=1 }}>
                            
                           
                                <br>
                                @if(isset($obj))
                                    @foreach($obj as $u)

                                    @if($u->qu_type == 1)
                                    <div class="card">

                                    <h4>{{$s}} . {{$u->qu_name}}</h4>
                                    <ul>
                                        @foreach($u->option as $uu)
                                        @if($uu->status_op == 1)
                                        <li><b><span class="text-success">{{$uu->op_name}}</span></b></li>
                                        @else
                                        <li>{{$uu->op_name}}</li>
                                        @endif
                                        @endforeach
                                    </ul>

                                    </div>
                                    @elseif($u->qu_type == 2)

                                    <div class="card">
                                    <img src="{{ url('img/exercise/'.$u->qu_file) }}" style="width:100%;">
                                    <h4>{{$s}} . {{$u->qu_name}}</h4>
                                    <ul>
                                        @foreach($u->option as $uu)
                                        @if($uu->status_op == 1)
                                        <li><b><span class="text-success">{{$uu->op_name}}</span></b></li>
                                        @else
                                        <li>{{$uu->op_name}}</li>
                                        @endif
                                        @endforeach
                                    </ul>

                                    </div>

                                    @else

                                    <div class="card">
                                    <audio id="player" controls class="myAudio">
                                            <source src="{{ url('audio/'.$u->qu_file) }}" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                    <h4>{{$s}} . {{$u->qu_name}}</h4>
                                    <ul>
                                        @foreach($u->option as $uu)
                                        @if($uu->status_op == 1)
                                        <li><b><span class="text-success">{{$uu->op_name}}</span></b></li>
                                        @else
                                        <li>{{$uu->op_name}}</li>
                                        @endif
                                        @endforeach
                                    </ul>

                                    </div>

                                    @endif


                                    @endforeach
                                @endif
                                    
                                    

                                    
                                    
                            
                        </div>
                    </div>
                </div>
             
                
            </div>
        </div>

      
       
        


@endsection

@section('scripts')

@stop('scripts')