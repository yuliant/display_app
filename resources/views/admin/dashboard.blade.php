@extends('layouts.backend')

@section('content')
<div class="row mb-3">
    <div class="col-md-6">
        <div class="h-100 p-3 text-bg-dark rounded-3">
            <p>{{getSetting('app_description')}}</p>
            <a href="{{route('display.screen')}}" class="btn btn-outline-light" target="_blank">Lihat Display</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="h-100 p-3 text-bg-dark rounded-3">
            <p>
                Jika gambar / image tidak muncul, perbaiki storage symlink laravel dengan cara hapus folder storage 
                didalam folder public, kemudian klik tombol dibawah ini. Cara ini juga berlaku jika anda ingin menempatkan 
                aplikasi ini di hosting
            </p>
            <a href="{{route('link.storage')}}" class="btn btn-outline-light" target="_blank">Perbaiki</a>
        </div>
    </div>    
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="dashboard">
            <div class="menu d-flex flex-wrap">
                <div class="menu-item" onclick="location.href='{{ route('admin.dashboard') }}';">
                    <i class="fa solid fa-house-user menu-icon"></i>
                    <span>Home</span>
                </div>
                <div class="menu-item" onclick="window.open('{{route('display.screen')}}', '_blank');" >
                    <i class="fa-solid fa-tv menu-icon"></i>
                    <span>Display</span>
                </div>                
                <div class="menu-item" onclick="location.href='{{route('users.data')}}';">
                    <i class="fa-solid fa-users-rectangle menu-icon"></i>
                    <span>Users</span>
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
                <div class="menu-item" onclick="location.href='{{ route('settings.index') }}';">
                    <i class="fa-solid fa-gear menu-icon"></i>
                    <span>App Conf</span>
                </div>    
                <div class="menu-item" onclick="location.href='{{ route('display-settings.index') }}';">
                    <i class="fa-solid fa-wrench menu-icon"></i>
                    <span>Display Conf</span>
                </div>                                                                  
                <!-- Tambahkan menu lain di sini -->
            </div>
        </div>
    </div>  
</div> 
<div class="row mb-3">
    <div class="col-md-12">
        <h6>Mohon Dibaca!</h6>
        <p>
            Aplikasi ini menggunakan pusher, agar semua perubahan data diproses secara realtime pada display untuk itu 
            anda harus melakukan tindakan ini jika anda menempatkan aplikasi ini pada local web server :<br>
            Contoh web server xampp:
            <ol>
                <li>Download file cacert.pem dari https://curl.se/docs/caextract.html</li>
                <li>Letakan file tersebut pada : C:\xampp\php\extras\ssl\cacert.pem</li>
                <li>Buka file php.ini pada folder C:\xampp\php</li>
                <li>Cari baris curl.cainfo =</li>
                <li>Tambahkan alamat file dari cacert.pem, sehingga menjadi : curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"</li>
                <li>Restart php xampp (stop kemudian start kembali)</li>
            </ol>
            Contoh untuk web server php :
            <ol>
                <li>Download file cacert.pem dari https://curl.se/docs/caextract.html</li>
                <li>Letakan file tersebut pada : C:\php\extras\ssl\cacert.pem</li>
                <li>Buka file php.ini pada folder C:\php</li>
                <li>Cari baris curl.cainfo =</li>
                <li>Tambahkan alamat file dari cacert.pem, sehingga menjadi : curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"</li>
                <li>Restart php xampp (stop kemudian start kembali)</li>
            </ol>  
            Setelah anda melakukan semua dengan benar maka segala sesuatu perubahan data diaplikasi akan realtime tampil 
            pada display informasi.          
        </p>
    </div>
</div> 
@endsection