<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{getSetting('app_name')}}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">{{getSetting('short_name')}}</a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                <svg class="bi"><use xlink:href="#search"/></svg>
            </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="bi"><use xlink:href="#list"/></svg>
            </button>
            </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
    </header>

<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary tinggi">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu DISFO</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="@if (Auth::user()->role === 'admin') {{route('admin.dashboard')}} @else {{route('user.dashboard')}} @endif">
              <i class="fa-solid fa-house-user"></i>
                Dashboard
              </a>
            </li>
            @if (Auth::user()->role === 'admin')
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('display.screen')}}" target="_blank">
              <i class="fa-solid fa-tv"></i>
                Show Display
              </a>
            </li>
            @endif
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Master Data</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <svg class="bi"><use xlink:href="#plus-circle"/></svg>
            </a>
          </h6>
          <ul class="nav flex-column mb-auto">
            @if (Auth::user()->role === 'admin')
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('users.data')}}">
              <i class="fa-solid fa-users-rectangle"></i>
                Users Data
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/employees')}}">
              <i class="fa-solid fa-person-burst"></i>
                Data Pegawai
              </a>
            </li>   
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/events')}}">
              <i class="fa-brands fa-elementor"></i>
                Event
              </a>
            </li>   
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/videos')}}">
              <i class="fa-solid fa-photo-film"></i>
                Gallery Videos
              </a>
            </li>            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/guru')}}">
              <i class="fa-solid fa-chalkboard-user"></i>
                Guru
              </a>
            </li>      
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/hadis')}}">
              <i class="fa-solid fa-book"></i>
                Hadis Nabi
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/jadwal-jumat')}}">
              <i class="fa-regular fa-calendar"></i>
                Jadwal Jumat
              </a>
            </li>                                   
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/jadwal-pelajaran')}}">
              <i class="fa-solid fa-clock-rotate-left"></i>
                Jadwal Pelajaran
              </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/jadwal-salat')}}">
              <i class="fa-solid fa-person-praying"></i>
                Jadwal Solat
              </a>
            </li>              
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/jamkes')}}">
              <i class="fa-regular fa-clock"></i>
                Jam Belajar
              </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/news-feed')}}">
              <i class="fa-solid fa-rss"></i>
                News Feed
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/rombels')}}">
              <i class="fa-regular fa-building"></i>
                Rombel
              </a>
            </li>                              
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/student-of-the-month')}}">
              <i class="fa-solid fa-graduation-cap"></i>
                Student Of The Month
              </a>
            </li>   
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/messages')}}">
              <i class="fa-regular fa-message"></i>
                School Messages
              </a>
            </li>                             
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Settings</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <svg class="bi"><use xlink:href="#plus-circle"/></svg>
            </a>
          </h6>

          <ul class="nav flex-column mb-auto">
            @if (Auth::user()->role === 'admin')
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('settings.index') }}">
              <i class="fa-solid fa-gear"></i>
                App Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('display-settings.index') }}">
              <i class="fa-solid fa-wrench"></i>
                Display Settings
              </a>
            </li>             
            @endif           
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Sign out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 tinggi">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="@if (Auth::user()->role === 'admin') {{route('admin.dashboard')}} @else {{route('user.dashboard')}} @endif" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-house-chimney-user"></i></a>
            <a href="{{URL::previous()}}" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
          </div>
        </div>
      </div>
      @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif    
      @if (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
      @endif           
      <div class="row">
          @yield('content')  
      </div>
    </main>
  </div>
</div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>   
</body>
</html>
