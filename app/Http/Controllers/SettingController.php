<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Events\PodcastProcessed;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class SettingController extends Controller
{
    public function index(){
        $title = "Pengaturan Umum";
        $kotas = $this->getKotaKotaIndonesia();
        $timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, 'ID');
        $settings = [
            'app_name' => getSetting('app_name'),
            'short_name' => getSetting('short_name'),
            'app_logo' => getSetting('app_logo'),
            'app_description' => getSetting('app_description'),
            'contact_info' => getSetting('contact_info'),
            'language' => getSetting('language'),
            'kota' => getSetting('kota'),
            'time_zone' => getSetting('time_zone'),
        ];
        return view('settings.index',compact('title','settings','kotas','timezones'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_name' => 'required|string|max:255',
            'app_logo' => 'nullable|string|max:255',
            'app_description' => 'nullable|string',
            'short_name' => 'required|string', 
            'contact_info' => 'required|string',
            'language' => 'required|string',
            'kota' => 'required|string',
            'time_zone' => 'required|string',            
            // Validasi untuk pengaturan lainnya...
        ]);

        if ($validator->fails()) {
            return redirect()->route('settings.index')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Simpan perubahan ke dalam database
        updateSetting('app_name', $request->input('app_name'));
        updateSetting('short_name', $request->input('short_name'));
        updateSetting('app_logo', $request->input('app_logo'));
        updateSetting('app_description', $request->input('app_description'));
        updateSetting('contact_info', $request->input('contact_info'));
        updateSetting('language', $request->input('language'));
        updateSetting('kota', $request->input('kota'));
        updateSetting('time_zone', $request->input('time_zone'));
        Config::set('app.timezone', $request->input('time_zone'));
        // Simpan perubahan untuk pengaturan lainnya...
        event(new PodcastProcessed('success'));
        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }

    private function getKotaKotaIndonesia()
    {
        $username = 'spanda_dev';
        $countryCode = 'ID'; // Kode negara untuk Indonesia
    
        $response = Http::get("http://api.geonames.org/searchJSON", [
            'country' => $countryCode,
            'maxRows' => 1000, // Jumlah maksimal baris yang akan diambil
            'username' => $username, // Ganti dengan kunci API Anda
        ]);
    
        $data = $response->json();
        $kotaKota = collect($data['geonames'])
        ->sortBy('toponymName') // Mengurutkan berdasarkan 'toponymName'
        ->values() // Menghapus kembali kunci array
        ->all();
        return $kotaKota;
    }
}
