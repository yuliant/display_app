@extends('layouts.display')

@section('content')
<div class="container-fluid full-height" style="background-image: url('{{ asset('storage/'.getSettingDisplay('bg_image_big')) }}');background-size: cover;background-repeat: no-repeat;background-position: center center;width: 100%;height: 100vh;">
    <div class="row transparan mb-3">
        <div class="col-lg-2 hij-mas p-2">
            <p>
                <span class="huruf-2">{{$hariHijriah}}</span><br>
                <span class="huruf-1">{{$tahunMasehi}}</span>
                <hr class="garis-bawah">
                <span class="huruf-1">{{$strHijriah}}</span>
            </p>
        </div>
        <div class="col-lg-8 d-flex justify-content-center">
            <div class="logo">
                <img src="{{asset('storage/'.getSettingDisplay('logo'))}}" alt="Logo" class="img-logo">
            </div>
            <div class="display-header-title mt-2 ms-2">
                <div class="fs-4 mt-3 mt-lg-0">{{getSettingDisplay('display_title')}}</div>
                <div class="fs-6 mb-3 mb-lg-0">{{getSettingDisplay('display_subtitle')}}</div>
            </div>
        </div>
        <div class="col-lg-2 d-flex justify-content-end align-items-center">
            <div class="time-3">
                <div class="hour" id="hour">08:30</div>
            </div>
        </div>
    </div>
    <div class="row second-middle" id="myElement">
        <div class="col-lg-12">
            <div class="card bg-transparan-dark-light">
                <div class="card-body">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-lg-3 text-center ln-1">
                            <div class="huruf-6 color-black">IQOMAH</div>
                            <div class="huruf-4 color-black" id="eventNameEnd">ISYA</div>
                            <div class="huruf-5 color-black" id="minuteCountDown"><i class="fa-solid fa-clock"></i> 04:12</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row main-middle" id="myElement-2">
        <div class="col-lg-4">
            <div class="card bg-transparan-dark-light">
                <div class="card-body">
                    <h6 class="huruf-1 color-black">Jadwal Khatib dan Imam Salat Jum'at</h6>
                    <table class="table table-sm">
                        <tr>
                            <th class="huruf-1">Tanggal</th>
                            <th class="text-end huruf-1">{{$fridayFormatted}}</th>
                        </tr>
                        <tr>
                            <th class="huruf-1">Khotib</th>
                            <th class="text-end huruf-1">{{ @$jadwalJumat->khotib }}</th>
                        </tr>
                        <tr>
                            <th class="huruf-1">Imam</th>
                            <th class="text-end huruf-1">{{ @$jadwalJumat->imam }}</th>
                        </tr>
                        <tr>
                            <th class="huruf-1">Muadzin</th>
                            <th class="text-end huruf-1">{{ @$jadwalJumat->muadzin }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card bg-transparan-dark-light">
                <div class="card-body">
                    @foreach($hadits as $hadis)
                    <div class="hadis">
                        <p class="color-black huruf-2">
                            {{$hadis->isi}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bawah-fix">
    <div class="row col-info bg-transparan-dark-light">
        <div class="col d-flex justify-content-center align-items-center">
            <div id="currentEvent" class="huruf-1">Upcoming Event Solat: <span id="eventName"></span></div>
            <div id="countdown">
                <div class="ms-3 huruf-1">
                    <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
                </div>
            </div>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <span class="huruf-1">
                @if(count($upcomingHolyDay)>0)
                Upcoming Holy Day :
                @foreach($upcomingHolyDay as $libur)
                {{$libur['nama']}} on {{$libur['tgl']}}
                @endforeach
                @endif
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col col-salat bg-transparan-dark-green d-flex flex-column align-items-center justify-content-center">
            <div class="huruf-4 color-yelow">Subuh</div>
            <div class="huruf-6 color-white">{{$salat['subuh']}}</div>
        </div>
        <div class="col col-salat bg-transparan-dark-red d-flex flex-column align-items-center justify-content-center">
            <div class="huruf-4 color-yelow">Duha</div>
            <div class="huruf-6 color-white">{{$salat['duha']}}</div>
        </div>
        <div class="col col-salat bg-transparan-dark-orange d-flex flex-column align-items-center justify-content-center">
            <div class="huruf-4 color-yelow">Dzuhur</div>
            <div class="huruf-6 color-white">{{$salat['dzuhur']}}</div>
        </div>
        <div class="col col-salat bg-transparan-light-green d-flex flex-column align-items-center justify-content-center">
            <div class="huruf-4 color-yelow">Ashar</div>
            <div class="huruf-6 color-white">{{$salat['ashar']}}</div>
        </div>
        <div class="col col-salat bg-transparan-dark-magenta d-flex flex-column align-items-center justify-content-center">
            <div class="huruf-4 color-yelow">Magrib</div>
            <div class="huruf-6 color-white">{{$salat['magrib']}}</div>
        </div>
        <div class="col col-salat bg-transparan-dark-blue d-flex flex-column align-items-center justify-content-center">
            <div class="huruf-4 color-yelow">Isya</div>
            <div class="huruf-6 color-white">{{$salat['isya']}}</div>
        </div>
    </div>
    <div class="row">
        <div class="news-feed-3">
            <!-- Judul News Feed -->
            <div class="news-feed-title">
                News Feed
            </div>

            <!-- Ikon News Feed dari Font Awesome -->
            <div class="news-feed-icon">
                <i class="fas fa-newspaper"></i>
            </div>

            <!-- Isi News Feed -->
            <div class="news-feed-content huruf-0">
                <!-- Isi News Feed akan ditampilkan di sini, dipisahkan dengan char | -->
                @foreach($newsFeeds as $newsFeed)
                {{ $newsFeed->title }} | {{ $newsFeed->content }} |
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    // Daftar waktu event solat
    const events = [{
            name: "Subuh",
            time: "{{ $salat['subuh'] }}:00"
        },
        {
            name: "Duhur",
            time: "{{ $salat['dzuhur'] }}:00"
        },
        {
            name: "Ashar",
            time: "{{ $salat['ashar'] }}:00"
        },
        {
            name: "Magrib",
            time: "{{ $salat['magrib'] }}:00"
        },
        {
            name: "Isya",
            time: "{{ $salat['isya'] }}:00"
        },
    ];

    let currentEventIndex = 0;

    function updateCountdown() {
        const now = new Date();
        const currentTime = now.getHours() + ":" + (now.getMinutes() < 10 ? "0" : "") + now.getMinutes() + ":" + (now.getSeconds() < 10 ? "0" : "") + now.getSeconds();

        const currentEvent = events[currentEventIndex];
        const eventTime = currentEvent.time;
        const start = eventTime.split(":");
        const eventTimeTgl = new Date();

        eventTimeTgl.setHours(parseInt(start[0]));
        eventTimeTgl.setMinutes(parseInt(start[1]));
        eventTimeTgl.setSeconds(parseInt(start[2]));


        // Memeriksa apakah event saat ini sudah berakhir
        if (now >= eventTimeTgl) {

            // Konversi eventTime ke objek Date
            const eventTimeDate = new Date();
            eventTimeDate.setHours(parseInt(start[0]));
            eventTimeDate.setMinutes(parseInt(start[1]));
            eventTimeDate.setSeconds(parseInt(start[2]));
            // Tambahkan 5 menit ke eventTimeDate
            eventTimeDate.setMinutes(eventTimeDate.getMinutes() + 10);
            if (now <= eventTimeDate) {
                var myElement = document.getElementById('myElement');
                var myElement2 = document.getElementById('myElement-2');
                myElement.style.display = 'flex';
                myElement2.style.display = 'none';
                document.getElementById("eventNameEnd").innerHTML = currentEvent.name;
                showIqomah(eventTimeDate);
            }

            // Pindah ke event selanjutnya jika event saat ini sudah berakhir
            currentEventIndex++;
            if (currentEventIndex >= events.length) {
                // Jika semua event telah selesai, hentikan countdown
                document.getElementById("eventName").innerHTML = "Semua Event Selesai";
                document.getElementById("hours").innerHTML = "00";
                document.getElementById("minutes").innerHTML = "00";
                document.getElementById("seconds").innerHTML = "00";
                return;
            }
        }

        const nextEvent = events[currentEventIndex];
        const nextEventTime = nextEvent.time;

        // Menghitung waktu mundur hingga event selanjutnya
        const countdownTime = getTimeDifference(currentTime, nextEventTime);

        document.getElementById("eventName").innerHTML = currentEvent.name;
        document.getElementById("hours").innerHTML = countdownTime.hours;
        document.getElementById("minutes").innerHTML = countdownTime.minutes;
        document.getElementById("seconds").innerHTML = countdownTime.seconds;

        setTimeout(updateCountdown, 1000); // Memperbarui setiap 1 detik
    }

    function showIqomah(eventTimeDate) {
        const iqomahInterval = setInterval(function() {
            const now = new Date();
            const timeDifference = eventTimeDate - now;
            if (timeDifference <= 0) {
                // Countdown IQOMAH sudah selesai
                var myElement = document.getElementById('myElement');
                var myElement2 = document.getElementById('myElement-2');
                clearInterval(iqomahInterval); // Hentikan interval
                document.getElementById("minuteCountDown").innerHTML = "<i class='fa-solid fa-clock'></i> 00:00";
                myElement.style.display = 'none';
                myElement2.style.display = 'flex';
            } else {
                // Hitung menit dan detik yang tersisa
                const minutes = Math.floor((timeDifference / 1000) / 60);
                const seconds = Math.floor((timeDifference / 1000) % 60);
                document.getElementById("minuteCountDown").innerHTML = "<i class='fa-solid fa-clock'></i> " + (minutes < 10 ? "0" : "") + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
            }
        }, 1000);
    }

    function getTimeDifference(startTime, endTime) {
        const start = startTime.split(":");
        const end = endTime.split(":");

        const startDate = new Date();
        const endDate = new Date();

        startDate.setHours(parseInt(start[0]));
        startDate.setMinutes(parseInt(start[1]));
        startDate.setSeconds(parseInt(start[2])); // Tambahkan baris ini untuk detik
        endDate.setHours(parseInt(end[0]));
        endDate.setMinutes(parseInt(end[1]));
        endDate.setSeconds(parseInt(end[2])); // Tambahkan baris ini untuk detik

        const timeDifference = endDate - startDate;

        const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        return {
            hours: hours < 10 ? "0" + hours : hours,
            minutes: minutes < 10 ? "0" + minutes : minutes,
            seconds: seconds < 10 ? "0" + seconds : seconds,
        };
    }

    // Memulai perhitungan waktu mundur dan menampilkan countdown IQOMAH jika diperlukan
    updateCountdown();


    function updateClock() {

        const now = new Date();
        const hour = String(now.getHours()).padStart(2, '0');
        const minute = String(now.getMinutes()).padStart(2, '0');
        const second = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('hour').textContent = `${hour}:${minute}:${second}`;

        // Periksa apakah saat ini sudah masuk waktu hari berikutnya
        if (hour === '00' && minute === '00' && second === '00') {
            // Refresh halaman jika sudah masuk hari berikutnya
            window.location.reload();
        }
    }

    // Memperbarui jam setiap detik
    setInterval(updateClock, 1000);

    // Memanggil fungsi pertama kali saat halaman dimuat
    updateClock();
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

    document.addEventListener("DOMContentLoaded", function() {
        var hadits = document.querySelectorAll(".hadis");
        var currentIndex = 0;

        function showHadis(index) {
            hadits.forEach(function(hadis, i) {
                if (i === index) {
                    hadis.style.display = "flex";
                } else {
                    hadis.style.display = "none";
                }
            });
        }

        function rotateHadits() {
            currentIndex = (currentIndex + 1) % hadits.length;
            showHadis(currentIndex);
        }

        // Panggil rotateStudents setiap beberapa detik
        setInterval(rotateHadits, 10000); // Ubah angka ini sesuai dengan interval yang Anda inginkan (dalam milidetik)

        // Tampilkan elemen pertama saat halaman dimuat
        showHadis(currentIndex);
    });
</script>
@endsection