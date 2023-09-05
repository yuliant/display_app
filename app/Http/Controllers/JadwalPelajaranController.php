<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPelajaran;
use App\Models\JamKe;
use App\Models\Rombel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class JadwalPelajaranController extends Controller
{
    public function index(Request $request)
    {
        $title = "Jadwal Pelajaran";
        $now = Carbon::now();
        $hari = $now->translatedFormat('l');
        $jamkes = JamKe::all();
        $rombels = Rombel::all();
        $selectedHari = $request->input('hari', $hari);
        /*$hariAktif = Jamke::orderBy('hari')
                    ->orderBy('no_urut')
                    ->get()
                    ->groupBy('hari');  */

        $hariAktif = Jamke::where('hari', $selectedHari)
                    ->orderBy('no_urut')
                    ->get()
                    ->groupBy('hari');

        $jadwalPelajaran = JadwalPelajaran::with('guru')->get(); // Mengambil data jadwal pelajaran dengan relasi ke guru

        return view('jadwal.index', compact('jamkes', 'rombels', 'jadwalPelajaran','title', 'hariAktif','selectedHari'));
    }

    public function store(Request $request)
    {
        try {
            foreach ($request->kode_guru as $hari => $data) {
                foreach ($data as $jamke_id => $rombelData) {
                    foreach ($rombelData as $rombel_id => $kode_guru) {

                        // Cek apakah data sudah ada dalam database
                        $existingData = JadwalPelajaran::where([
                            'jamke_id' => $jamke_id,
                            'rombel_id' => $rombel_id,
                        ])->first();
    
                        if ($existingData) {
                            // Update data jika sudah ada
                            $existingData->update(['kode_guru' => $kode_guru]);
                        } else {
                            // Buat data baru jika belum ada

                            if($kode_guru!=""){
                                JadwalPelajaran::create([
                                    'jamke_id' => $jamke_id,
                                    'rombel_id' => $rombel_id,
                                    'kode_guru' => $kode_guru,
                                ]);
                            }
                            
                        }
                    }
                }
            }
            event(new PodcastProcessed('success'));
            // Redirect dengan pesan sukses
            return redirect()->route('jadwal.index',['hari' => $hari])->with('success', 'Data jadwal pelajaran berhasil disimpan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->route('jadwal.index',['hari' => $hari])->with('error', 'Terjadi kesalahan saat menyimpan data jadwal pelajaran: ' . $e->getMessage());
        }
    }
    
    
    
}
