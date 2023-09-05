<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\StudentOfTheMonth;
use App\Models\SchoolMessage;
use App\Models\Event;
use App\Models\NewsFeed;
use App\Models\Timetable;
use App\Models\JadwalPelajaran;
use App\Models\JamKe;
use App\Models\Guru;
use App\Models\Rombel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Models\HadisNabi;
use App\Models\JadwalJumat;

class DisplayController extends Controller
{
    public function index()
    {
        $title = 'Display Informasi';
        $tema = getSettingDisplay('tema');
        switch ($tema) {
            case 'layout_1':
                $data = $this->showLayout_1($tema, $title);
                break;
            case 'layout_2':
                $data = $this->showLayout_1($tema, $title);
                break;
            case 'layout_3':
                $data = $this->showLayout_3($tema, $title);
                break;
        }
        return view('display.' . $tema, $data);
    }
    private function showLayout_3($tema, $title)
    {

        $today = Carbon::now(); // Mendapatkan tanggal hari ini
        $friday = $today->startOfWeek()->next(Carbon::FRIDAY); // Mendapatkan tanggal hari Jumat dalam minggu ini

        // Format tanggal menjadi format yang diinginkan
        //$fridayFormatted = $friday->format('Y-m-d');
        $fridayFormatted = $friday->format('d M Y');
        $fridayFormatted2 = $friday->format('Y-m-d');

        $jadwalSalat = $this->getJadwalSalat();
        $tglJadwalSalat = $jadwalSalat['data']['date'];
        $timingSalat = $jadwalSalat['data']['timings'];
        $salat = [
            'subuh' => $timingSalat['Fajr'],
            'duha' => $timingSalat['Sunrise'],
            'dzuhur' => $timingSalat['Dhuhr'],
            'ashar' => $timingSalat['Asr'],
            'magrib' => $timingSalat['Maghrib'],
            'isya' => $timingSalat['Isha'],
        ];
        $tahunMasehi = $tglJadwalSalat['readable'];
        $Hijriah = $tglJadwalSalat['hijri'];
        $tglHijriah = $Hijriah['day'];
        $bulanHijriah = $Hijriah['month']['en'];
        $tahunHijriah = $Hijriah['year'];
        $hariHijriah = $Hijriah['weekday']['en'];
        $strHijriah = "$tglHijriah $bulanHijriah $tahunHijriah";
        $upcomingHolyDay = $this->upComingHolyDay();
        //$newsFeeds = NewsFeed::all(); // Mengambil semua data NewsFeed
        $newsFeeds = NewsFeed::orderBy('date', 'desc')->get();
        $hadits = HadisNabi::orderBy('created_at', 'desc')->get();
        $jadwalJumat = JadwalJumat::whereDate('tanggal', $fridayFormatted2)->first();
        // dd($jadwalJumat);
        return compact('title', 'tahunMasehi', 'strHijriah', 'hariHijriah', 'newsFeeds', 'salat', 'upcomingHolyDay', 'fridayFormatted', 'hadits', 'jadwalJumat');
    }
    private function showLayout_1($tema, $title)
    {
        //$now = Carbon::now()->timezone('Asia/Jakarta');
        $now = Carbon::now();
        $day = $now->translatedFormat('l');
        $date = $now->translatedFormat('d F Y');
        $currentTime = date('H:i:s');

        //$waktuSekarang = Carbon::now();

        // Ambil hari aktif berdasarkan tanggal saat ini
        //$hariAktif = $waktuSekarang->format('l');

        // Query untuk mendapatkan jadwal pelajaran sesuai dengan hari aktif dan waktu saat ini
        $jadwalPelajaran = JadwalPelajaran::whereHas('jamke', function ($query) use ($day, $currentTime) {
            $query->where('hari', $day)
                ->whereTime('waktu_awal', '<=', $currentTime)
                ->whereTime('waktu_akhir', '>=', $currentTime);
        })
            ->with(['rombel', 'guru', 'jamke']) // Mengambil data rombel, guru, dan jamke terkait
            ->get();


        // Query untuk mengambil data JamKe sesuai dengan kriteria
        $jamKe = JamKe::where('hari', $day)
            ->whereTime('waktu_awal', '<=', $currentTime)
            ->whereTime('waktu_akhir', '>=', $currentTime)
            ->first();


        // Ambil bulan dan tahun saat ini
        $currentMonth = $now->month;
        $currentYear = $now->year;

        // Mengambil data StudentOfTheMonth dengan bulan dan tahun yang sesuai
        $studentOfTheMonth = StudentOfTheMonth::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get();

        // Mengambil data SchoolMessage berdasarkan tanggal aktif
        $messages = SchoolMessage::whereDate('updated_at', '=', $now->toDateString())
            ->get();

        // Menghitung hari ke berapa dalam satu minggu (0 = Minggu, 1 = Senin, dst.)
        $currentDayOfWeek = $now->dayOfWeek;

        // Menghitung selisih hari antara hari saat ini dan Minggu (0 = Minggu)
        $daysUntilSunday = 0 - $currentDayOfWeek;

        // Menghitung tanggal awal minggu dengan menambahkan selisih hari ke tanggal saat ini
        $startOfWeek = $now->addDays($daysUntilSunday)->startOfDay();

        // Menghitung tanggal akhir minggu dengan menambahkan 6 hari ke tanggal awal minggu
        $endOfWeek = $startOfWeek->copy()->addDays(6)->endOfDay();

        \Log::info('Start of Week: ' . $startOfWeek->toDateString());
        \Log::info('End of Week: ' . $endOfWeek->toDateString());
        $events = Event::whereBetween('event_date', [$startOfWeek->toDateString(), $endOfWeek->toDateString()])
            ->get();

        //$newsFeeds = NewsFeed::all(); // Mengambil semua data NewsFeed
        $newsFeeds = NewsFeed::orderBy('date', 'desc')->get();
        return compact('title', 'day', 'date', 'studentOfTheMonth', 'messages', 'events', 'newsFeeds', 'jadwalPelajaran', 'jamKe');
        //return view('display.'.$tema,compact('title','day','date','studentOfTheMonth','messages','events','newsFeeds','jadwalPelajaran','jamKe'));        
    }
    private function getJadwalSalat()
    {
        $country = "Indonesia";
        $namakota = getSetting('kota');
        $title = "Jadwal Solat $namakota";
        $date = date('d') . "-" . date('m') . "-" . date('Y');
        /*$response = Http::get("https://api.aladhan.com/v1/timingsByCity/".$date, [
            'city' => $namakota,
            'country' => 'Indonesia',
            'method' => 2, // Metode perhitungan salat
            'school' => 1, // Metode sekolah
            'timezone' => 'auto', // Zona waktu otomatis
        ]);*/
        $url = "http://api.aladhan.com/v1/timingsByCity/$date?country=$country&city=$namakota&method=99&methodSettings=20.0,null,18.0&tune=2,2,45,2,2,2,2,2,2";

        $response = Http::get($url);

        $jadwalSalat = $response->json();

        return $jadwalSalat;
    }

    private function upComingHolyDay()
    {
        $apiKey = 'YOUR_ALADHAN_API_KEY';
        $year = date('Y'); // Tahun saat ini
        $month = date('m'); // Bulan saat ini
        $country = "Indonesia";
        $city = getSetting('kota');

        $url = "http://api.aladhan.com/v1/calendarByCity/$year/$month?country=$country&city=$city&method=99&methodSettings=20.0,null,18.0&tune=2,2,45,2,2,2,2,2,2";

        $response = Http::get($url);

        $data = $response->json();
        //dd($data);
        // Data kalender hijriah
        $hijriCalendar = $data['data'];
        //dd($data);
        $hasil = array();
        foreach ($hijriCalendar as $h) {
            if (!empty($h['date']['hijri']['holidays'])) {
                $item = [
                    'tgl' => $h['date']['readable'],
                    'nama' => $h['date']['hijri']['holidays'][0],
                ];
                array_push($hasil, $item);
            }
        }

        return $hasil;
    }
}
