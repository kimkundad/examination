<nav class="navbar navbar-default navbar-inverse navbar-theme" id="main-nav">
  <div class="container">
    <div class="navbar-inner nav">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-target="#navbar-main" data-toggle="collapse" type="button" area-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}" style="height: 100px;">
          <img src="{{url('img/logo_kaichon888_2.png')}}" class="rounded" alt="TAXI Kaichon888 Thailand" title="TAXI Kaichon888 Thailand"/>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-main" style="padding-top: 30px;">
        <ul class="nav navbar-nav">


          <li class="{{ (Request::is('/about_us') ? 'active' : '') }} dropdown">
            <a href="{{url('/about_us')}}" >สินค้าของเรา</a>
          </li>




          <li class="">
            <a href="#" ><b><i class="fa fa-phone" aria-hidden="true"></i></b> 089-059-1794</a>
          </li>
          <li class="">
            <a href="https://lin.ee/udQJ9nsv" target="_blank"><b><i class="fa fa-commenting" aria-hidden="true"></i></b> Kaichon888 Thailand</a>
          </li>




        </ul>


        <ul class="nav navbar-nav navbar-right">






          <li class="navbar-nav-item-user dropdown">
            @if (Auth::guest())

            <a class="btn btn-primary-inverse btn-lg " href="{{ url('tracking') }}" style="color:#fff; padding: 15px;">
              <i class="fa fa-bookmark" aria-hidden="true" style="font-size: 16px; margin-left: -10px;"></i> Track order
            </a>
            @else


            @endif
          </li>


        </ul>
      </div>
    </div>
  </div>
</nav>
