<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalJumat;
use App\Events\PodcastProcessed;

class JadwalJumatController extends Controller
{
    // Menampilkan daftar jadwal Jumat
    public function index()
    {
        $title = 'Jadwal Jumat';
        $jadwalJumatList = JadwalJumat::all();
        return view('jadwal-jumat.index', compact('jadwalJumatList','title'));
    }

    // Menampilkan form untuk menambahkan jadwal Jumat baru
    public function create()
    {
        $title = 'Buat Jadwal Jumat';
        return view('jadwal-jumat.create', compact('title'));
    }

    // Menyimpan jadwal Jumat baru ke database
    public function store(Request $request)
    {
        $jadwalJumatData = $request->validate([
            'tanggal' => 'required',
            'khotib' => 'required',
            'imam' => 'required',
            'muadzin' => 'required',
        ]);

        JadwalJumat::create($jadwalJumatData);
        event(new PodcastProcessed('success'));
        return redirect()->route('jadwal-jumat.index')->with('success', 'Jadwal Jumat telah ditambahkan.');
    }

    // Menampilkan form untuk mengedit jadwal Jumat
    public function edit($id)
    {
        $title = 'Edit Jadwal Jumat';
        $jadwalJumat = JadwalJumat::findOrFail($id);
        return view('jadwal-jumat.edit', compact('jadwalJumat','title'));
    }

    // Memperbarui jadwal Jumat yang sudah ada
    public function update(Request $request, $id)
    {
        $jadwalJumatData = $request->validate([
            'tanggal' => 'required',
            'khotib' => 'required',
            'imam' => 'required',
            'muadzin' => 'required',
        ]);

        $jadwalJumat = JadwalJumat::findOrFail($id);
        $jadwalJumat->update($jadwalJumatData);
        event(new PodcastProcessed('success'));

        return redirect()->route('jadwal-jumat.index')->with('success', 'Jadwal Jumat telah diperbarui.');
    }

    // Menghapus jadwal Jumat
    public function destroy($id)
    {
        $jadwalJumat = JadwalJumat::findOrFail($id);
        $jadwalJumat->delete();
        event(new PodcastProcessed('success'));
        return redirect()->route('jadwal-jumat.index')->with('success', 'Jadwal Jumat telah dihapus.');
    }
}
