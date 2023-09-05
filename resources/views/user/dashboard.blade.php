@extends('layouts.backend')

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <div class="h-100 p-3 text-bg-dark rounded-3">
            <p>{{getSetting('app_description')}}</p>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="dashboard">
            <div class="menu d-flex flex-wrap">
                <div class="menu-item" onclick="location.href='{{ route('user.dashboard') }}';">
                    <i class="fa solid fa-house-user menu-icon"></i>
                    <span>Home</span>
                </div>               
                <div class="menu-item" onclick="location.href='{{url('/employees')}}';">
                    <i class="fa-solid fa-person-burst menu-icon"></i>
                    <span>Pegawai</span>
                </div>
                <div class="menu-item" onclick="location.href='{{url('/events')}}';">
                    <i class="fa-brands fa-elementor menu-icon"></i>
                    <span>Event</span>
                </div>       
                <div class="menu-item" onclick="location.href='{{url('/jadwal-pelajaran')}}';">
                    <i class="fa-solid fa-clock-rotate-left menu-icon"></i>
                    <span>Jadwal</span>
                </div>    
                <div class="menu-item" onclick="location.href='{{url('/news-feed')}}';">
                    <i class="fa-solid fa-rss menu-icon"></i>
                    <span>News</span>
                </div>    
                <div class="menu-item" onclick="location.href='{{url('/student-of-the-month')}}';">
                    <i class="fa-solid fa-graduation-cap menu-icon"></i>
                    <span>Student</span>
                </div>  
                <div class="menu-item" onclick="location.href='{{url('/messages')}}';">
                    <i class="fa-regular fa-message menu-icon"></i>
                    <span>Message</span>
                </div>  
                <div class="menu-item" onclick="location.href='{{url('/hadis')}}';">
                    <i class="fa-solid fa-book menu-icon"></i>
                    <span>Hadits Nabi</span>
                </div>     
                <div class="menu-item" onclick="location.href='{{url('/jadwal-jumat')}}';">
                    <i class="fa-solid fa-book menu-icon"></i>
                    <span>Jadwal Jumat</span>
                </div>         
                <div class="menu-item" onclick="location.href='{{url('/jadwal-salat')}}';">
                    <i class="fa-solid fa-person-praying menu-icon"></i>
                    <span>Jadwal Salat</span>
                </div>                                                                                 
                <!-- Tambahkan menu lain di sini -->
            </div>
        </div>
    </div>  
</div>  
@endsection