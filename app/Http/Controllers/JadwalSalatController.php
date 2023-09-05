<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JadwalSalatController extends Controller
{
    public function getJadwalSalat()
    {
        $namakota = getSetting('kota');
        $title = "Jadwal Solat $namakota";
        $country = "Indonesia";
        $date =date('d')."-".date('m')."-".date('Y');
        
        $url = "http://api.aladhan.com/v1/timingsByCity/$date?country=$country&city=$namakota&method=99&methodSettings=20.0,null,18.0&tune=2,2,45,2,2,2,2,2,2";

        $response = Http::get($url);
    
        $jadwalSalat = $response->json();
    
        return view('jadwal_salat', compact('jadwalSalat','title'));
    }
}
