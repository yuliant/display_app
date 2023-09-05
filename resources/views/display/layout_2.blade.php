@extends('layouts.display')

@section('content')

        <div class="header container-fluid" style="background-image: url('{{ asset('storage/'.getSettingDisplay('bg_image')) }}');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-3 col-lg-3">
                        <div class="time-logo d-flex align-items-center justify-content-between">
                            <div class="time">
                                <div class="hour" id="hour">08:30</div>
                                <div class="day">{{$day}}</div>
                                <div class="date">{{$date}}</div>
                            </div>
                            <div class="logo">
                                <img src="{{asset('storage/'.getSettingDisplay('logo'))}}" alt="Logo" class="img-logo">
                            </div>  
                        </div>                      
                    </div>
                    <div class="col-9 text-md-start">
                        <div class="title fs-4 mt-3 mt-lg-0">{{getSettingDisplay('display_title')}}</div>
                        <div class="subtitle fs-6 mb-3 mb-lg-0">{{getSettingDisplay('display_subtitle')}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-3">
                <!-- Bagian 1: -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-danger text-white text-center" style="font-weight: bold;">
                            Jadwal Pelajaran Hari Ini @if($jamKe) {{$jamKe->nama_jam}} @endif
                        </div>
                        <div class="card-body time-table body-table ting-dps-2">
                            <table class="table table-striped">
                                <tbody>
                                    @forelse($jadwalPelajaran as $jadwal)
                                    <tr>
                                        <td>{{ $jadwal->rombel->nama }}</td>
                                        <td>{{ $jadwal->guru->nama_guru }} <br> {{ $jadwal->guru->mata_pelajaran }}</td>
                                        <td>{{ $jadwal->jamke->waktu_awal }} - {{ $jadwal->jamke->waktu_akhir }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">Tidak ada jadwal pelajaran saat ini.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>                        
                </div>                
                <!-- Bagian 2:  -->
                <div class="col-lg-4">
                    <div class="row mb-3">
                        @foreach ($studentOfTheMonth as $student)
                            <div class="student-of-the-month">
                                <div class="student-image">
                                    <img src="{{ asset('storage/'.$student->foto) }}" alt="Student of The Month">
                                </div>
                                <div class="student-details">
                                    <div class="student-name">{{ $student->nama_siswa }}</div>
                                    <div class="student-achievement">Prestasi: {{ $student->ket_prestasi }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>                    
                    <div class="row mt-3">
                        <div class="card card-messages">
                            <div class="card-header text-center" style="background-color: #FF8C00; color: black;font-weight: bold;">
                                School Messages
                            </div>
                            <div class="card-body card-body-messages">
                                @foreach ($messages as $message)
                                    <p>{{ $message->message }}</p>
                                    <hr> <!-- Garis pemisah antara pesan -->
                                @endforeach
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card card-event">
                        <div class="card-header text-center" style="background-color: #FF8C00; color: black;font-weight: bold;">
                            Event
                        </div>
                        <div class="card-body event">
                            @foreach ($events as $event)
                                @if ($event->type === 'text' && getSettingDisplay('mode_event')==='text')
                                    <h2>{{ $event->event_name }}</h2>
                                    <p>{{ $event->event_date }} - {{ $event->event_time }}</p>
                                    <p>{{ $event->event_description }}</p>
                                    <hr>
                                @elseif ($event->type === 'image' && getSettingDisplay('mode_event')==='image')
                                    <div class="justify-content-center align-items-center image-event">
                                        <img src="{{ asset('storage/images/' . $event->image) }}" alt="{{ $event->event_name }}" style="height:40vw;width:auto;">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>   
                </div>                
            </div>
        </div>
        <div class="news-feed">
            <!-- Judul News Feed -->
            <div class="news-feed-title">
                News Feed
            </div>

            <!-- Ikon News Feed dari Font Awesome -->
            <div class="news-feed-icon">
                <i class="fas fa-newspaper"></i>
            </div>

            <!-- Isi News Feed -->
            <div class="news-feed-content">
                <!-- Isi News Feed akan ditampilkan di sini, dipisahkan dengan char | -->
                @foreach($newsFeeds as $newsFeed)
                    {{ $newsFeed->title }} | {{ $newsFeed->content }} |
                @endforeach
            </div>
        </div>

<script>
var modeEvent = '{{ getSettingDisplay("mode_event") }}';

/*function checkForUpdates() {
    setInterval(function() {
        fetch('/check-updates')
            .then(response => response.json())
            .then(data => {
                var status = data.status;
                if(status==1){
                    window.location.href = '/display-screen';
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
    }, 5000); // Setiap 5 detik
}

// Panggil fungsi checkForUpdates untuk memulai pembaruan berkala
checkForUpdates();*/

if (modeEvent === 'text') {
    $('.event').simplemarquee({

        // scroll speed in px per second
        speed: 30,

        // scroll directions
        // left, right, top and bottom
        direction: 'top',

        // number of cycles before pausing
        cycles: 'Infinity',

        // space in px between the duplicated contents
        space: 40,

        // delay between each cycle in ms
        delayBetweenCycles: 200,

        // pause/restart on hover
        handleHover: false,

        // up<a href="https://www.jqueryscript.net/time-clock/">date</a> marquee on resize
        handleResize: true,

        // easing
        easing: 'linear'

    });
}else{
    document.addEventListener("DOMContentLoaded", function () {
        var gambaryo = document.querySelectorAll(".image-event");
        var currentIndex = 0;

        function showImage(index) {
            gambaryo.forEach(function (gambar, i) {
                if (i === index) {
                    gambar.style.display = "flex";
                } else {
                    gambar.style.display = "none";
                }
            });
        }

        function rotateImage() {
            currentIndex = (currentIndex + 1) % gambaryo.length;
            showImage(currentIndex);
        }

        // Panggil rotateStudents setiap beberapa detik
        setInterval(rotateImage, 5000); // Ubah angka ini sesuai dengan interval yang Anda inginkan (dalam milidetik)

        // Tampilkan elemen pertama saat halaman dimuat
        showImage(currentIndex);
    });
}
$('.body-table').simplemarquee({

    // scroll speed in px per second
    speed: 30,

    // scroll directions
    // left, right, top and bottom
    direction: 'top',

    // number of cycles before pausing
    cycles: 'Infinity',

    // space in px between the duplicated contents
    space: 40,

    // delay between each cycle in ms
    delayBetweenCycles: 200,

    // pause/restart on hover
    handleHover: false,

    // up<a href="https://www.jqueryscript.net/time-clock/">date</a> marquee on resize
    handleResize: true,

    // easing
    easing: 'linear'

});
$('.news-feed-content').simplemarquee({

    // scroll speed in px per second
    speed: 30,

    // scroll directions
    // left, right, top and bottom
    direction: 'left',

    // number of cycles before pausing
    cycles: 'Infinity',

    // space in px between the duplicated contents
    space: 40,

    // delay between each cycle in ms
    delayBetweenCycles: 200,

    // pause/restart on hover
    handleHover: false,

    // up<a href="https://www.jqueryscript.net/time-clock/">date</a> marquee on resize
    handleResize: true,

    // easing
    easing: 'linear'

});
$('.card-body-messages').simplemarquee({

    // scroll speed in px per second
    speed: 30,

    // scroll directions
    // left, right, top and bottom
    direction: 'top',

    // number of cycles before pausing
    cycles: 'Infinity',

    // space in px between the duplicated contents
    space: 40,

    // delay between each cycle in ms
    delayBetweenCycles: 200,

    // pause/restart on hover
    handleHover: false,

    // up<a href="https://www.jqueryscript.net/time-clock/">date</a> marquee on resize
    handleResize: true,

    // easing
    easing: 'linear'

});

document.addEventListener("DOMContentLoaded", function () {
    var students = document.querySelectorAll(".student-of-the-month");
    var currentIndex = 0;

    function showStudent(index) {
        students.forEach(function (student, i) {
            if (i === index) {
                student.style.display = "flex";
            } else {
                student.style.display = "none";
            }
        });
    }

    function rotateStudents() {
        currentIndex = (currentIndex + 1) % students.length;
        showStudent(currentIndex);
    }

    // Panggil rotateStudents setiap beberapa detik
    setInterval(rotateStudents, 5000); // Ubah angka ini sesuai dengan interval yang Anda inginkan (dalam milidetik)

    // Tampilkan elemen pertama saat halaman dimuat
    showStudent(currentIndex);
});


    function updateClock() {
        const now = new Date();
        const hour = String(now.getHours()).padStart(2, '0');
        const minute = String(now.getMinutes()).padStart(2, '0');
        const second = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('hour').textContent = `${hour}:${minute}:${second}`;
    }

    // Memperbarui jam setiap detik
    setInterval(updateClock, 1000);

    // Memanggil fungsi pertama kali saat halaman dimuat
    updateClock();
</script>
@endsection
