<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamKe;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class JamKeController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan pilihan hari dari request (jika ada)
        $now = Carbon::now();
        $hari = $now->translatedFormat('l');
        $selectedHari = $request->input('hari', $hari);

        // Mengambil data JamKe yang sesuai dengan pilihan hari dan mengurutkannya berdasarkan no_urut
        $jamkes = JamKe::where('hari', $selectedHari)->orderBy('no_urut', 'asc')->get();

        $title = 'Data Jam Belajar Hari-'.$selectedHari;
        return view('jamkes.index', compact('jamkes', 'title', 'selectedHari'));
    }

    public function create(Request $request)
    {
        $title = 'Buat Jam Belajar';
        $selectedHari = $request->query('selectedHari', 'Senin');
        return view('jamkes.create',compact('title','selectedHari'));
    }

    public function store(Request $request)
    {
        try {
            // Cek apakah nama_jam sudah ada dalam database
            $hari = $request->input('hari');
            $existingJam = JamKe::where('nama_jam', $request->input('nama_jam'))
            ->where('hari', $request->input('hari')) // Menambahkan klausa WHERE untuk kolom 'hari'
            ->first();        
    
            if ($existingJam) {
                // Jika sudah ada, beri pesan dan redirect kembali ke index
                return redirect()->route('jamkes.index',['hari' => $hari])->with('success', 'Jam ' . $request->input('nama_jam') . ' sudah ada dalam database.');
            }

            $request->validate([
                'nama_jam' => 'required|string|max:255',
                'waktu_awal' => 'required|',
                'waktu_akhir' => 'required|after:waktu_awal',
                //Tambahkan validasi sesuai dengan kebutuhan Anda
            ]);
            // Jika belum ada, buat jam baru
            JamKe::create([
                'nama_jam' => $request->input('nama_jam'),
                'waktu_awal' => $request->input('waktu_awal'),
                'waktu_akhir' => $request->input('waktu_akhir'),
                'hari'=> $request->input('hari'),
                'no_urut'=> $request->input('no_urut'),
            ]);
            event(new PodcastProcessed('success'));
            // Redirect dengan pesan sukses
            return redirect()->route('jamkes.index',['hari' => $hari])->with('success', 'Jam ' . $request->input('nama_jam') . ' berhasil disimpan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->route('jamkes.index',['hari' => $hari])->with('success', 'Terjadi kesalahan saat menyimpan jam: ' . $e->getMessage());
        }
    }
    
    public function edit($id)
    {
        $jamke = JamKe::findOrFail($id);
        $title = 'Edit Jam Belajar';
        return view('jamkes.edit', compact('jamke','title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jam' => 'required|string|max:255',
            'waktu_awal' => 'required|',
            'waktu_akhir' => 'required|after:waktu_awal',
            'no_urut' => 'required',
            //Tambahkan validasi sesuai dengan kebutuhan Anda
        ]);

        $jamke = JamKe::findOrFail($id);
        $jamke->update($request->all());
        event(new PodcastProcessed('success'));
        return redirect()->route('jamkes.index',['hari' => $request->input('hari')])
            ->with('success', 'Jam Ke berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jamke = JamKe::findOrFail($id);
        $jamke->delete();
        event(new PodcastProcessed('success'));
        return redirect()->back()
            ->with('success', 'Jam Ke berhasil dihapus.');
    }
}
