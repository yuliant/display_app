@extends('layouts.backend')

@section('content')
<div class="col-md-12 mb-3">
    <div class="mb-3 d-flex justify-content-between">
        <span>{{$jadwalSalat['data']['date']['readable']}}</span>
        <span>{{$jadwalSalat['data']['date']['hijri']['day']}} {{$jadwalSalat['data']['date']['hijri']['month']['en']}} {{$jadwalSalat['data']['date']['hijri']['year']}}</span>
    </div>
    <table class="table table-sm mb-3">
        <thead>
            <tr>
            @foreach ($jadwalSalat['data']['timings'] as $key => $time)
                <th>{{$key}}</th>
            @endforeach    
            </tr>
        </thead>
        <tbody>
            <tr>
            @foreach ($jadwalSalat['data']['timings'] as $key => $time)
                <td><i class="fa-solid fa-clock"></i> {{$time}}</td>
            @endforeach    
            </tr>            
        </tbody>   
    </table>
    <p>
        Jadwal solat ini diambil otomatis menggunakan api dari Aladhan berdasarkan nama kota anda yang telah anda 
        definisikan pada App Settings.<br>
        Penentapan Waktu Shubuh 20.0 deg. Kemiringan Matahari, Penetapan Waktu Isya 18.0 deg. Kemiringan Matahari, 2 menit untuk waktu Ihtiyati (pengaman).
    </p>
</div>
@endsection