<div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('img/logo/JLPTONLINE_Logo_2020_02_v1.png') }}" alt=""></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">

                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ url('/') }}">หน้าแรก</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ url('/examination') }}" style="width:100px">คลังข้อสอบ</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ url('/about_us') }}" style="width:100px">เกี่ยวกับเรา</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ url('/contact_us') }}" style="width:85px">ติดต่อเรา</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="{{ url('/payment') }}" style="width:85px">แจ้งชำระเงิน</a>
                                      </li>
                                      @if (Auth::guest())
                                      <li class="nav-item intro-btn">
                                          <a class="nav-link btn btn-outline-primary" href="{{ url('/login') }}" style="width:85px">เข้าสู่ระบบ</a>
                                      </li>
                                      <li class="nav-item intro-btn">
                                          <a class="nav-link btn btn-outline-primary" href="{{ url('/register') }}" style="width:120px">สมัครสมาชิก</a>
                                      </li>
                                      @else


                                      @endif

                                    </ul>
                                </div>
                                @if (Auth::guest())
                                @else
                                <div class="profile_log dropdown" id="icon_pro">
                                        <div class="user" data-toggle="dropdown">
                                            <span class="thumb"><i class="la la-user"></i></span>
                                            <span class="name">{{ mb_substr(Auth::user()->name, 0, 7, 'UTF-8') }}</span>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ url('accounts') }}" class="dropdown-item">
                                                <i class="la la-user"></i> ข้อมูลส่วนตัว
                                            </a>
                                            <a href="{{ url('my_examination') }}" class="dropdown-item">
                                                <i class="la la-cubes"></i> ข้อสอบของฉัน
                                            </a>
                                            <a href="{{ url('history') }}" class="dropdown-item">
                                                <i class="la la-book"></i> ประวัติข้อสอบ
                                            </a>
                                            <a href="{{ url('buy_history') }}" class="dropdown-item">
                                                <i class="la la-shopping-cart"></i> ประวัติการสั่งซื้อ
                                            </a>
                                            
                                            <a href="{{ url('logout') }}" class="dropdown-item logout">
                                                <i class="la la-sign-out"></i> ออกจากระบบ
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
