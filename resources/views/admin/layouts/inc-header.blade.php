<nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="nav-top flex-grow-1">
        <div class="container d-flex flex-row h-100 align-items-center">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center">
            <a class="navbar-brand brand-logo" href="{{ url('admin/dashboard') }}"><img src="{{ url('back/images/logo.svg') }}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('admin/dashboard') }}"><img src="{{ url('back/images/logo-mini.svg') }}" alt="logo"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between flex-grow-1">


            <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">


              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <img src="{{ url('img/avatar/'.Auth::user()->avatar) }}" alt="profile"/>
                  <span class="nav-profile-name"> {{ Auth::user()->name }} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                  <a class="dropdown-item" href="{{ url('logout') }}">
                    <i class="icon-logout text-primary mr-2"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu text-dark"></span>
            </button>
          </div>
        </div>
      </div>
      <div class="nav-bottom">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a href="{{ url('admin/dashboard') }}" class="nav-link"><i class="link-icon icon-pie-chart"></i><span class="menu-title">หน้าแรก</span></a>
            </li>
            
            <li class="nav-item">
              <a href="{{ url('admin/category') }}" class="nav-link"><i class="link-icon icon-handbag"></i><span class="menu-title">หมวดหมู่</span></a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/example') }}" class="nav-link"><i class="link-icon icon-book-open"></i><span class="menu-title">แบบฝึกหัด</span></a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/users') }}" class="nav-link"><i class="link-icon icon-people"></i><span class="menu-title">ผู้ใช้งาน</span></a>
            </li>





          </ul>
        </div>
      </div>
    </nav>
