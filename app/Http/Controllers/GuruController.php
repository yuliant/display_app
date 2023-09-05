<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GuruBlankoExport; // Sesuaikan dengan nama export yang akan Anda buat
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Imports\GuruImport; // Sesuaikan dengan nama import yang akan Anda buat
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class GuruController extends Controller
{
    // Menampilkan daftar guru
    public function index()
    {
        $gurus = Guru::all();
        $title = "Data Guru";
        return view('guru.index', compact('gurus', 'title'));
    }

    // Menampilkan form tambah guru
    public function create()
    {
        $title = "Data Guru";
        return view('guru.create', compact('title'));
    }

    // Menyimpan data guru yang baru ditambahkan
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_guru' => 'required|unique:gurus',
            'nama_guru' => 'required',
            'mata_pelajaran' => 'required',
        ]);

        Guru::create($data);
        event(new PodcastProcessed('success'));
        return redirect()->route('guru.index')->with('success', 'Guru telah ditambahkan.');
    }

    // Menampilkan detail guru
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', ['guru' => $guru]);
    }

    // Menampilkan form edit guru
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $title = 'Edit Guru';
        return view('guru.edit', compact('guru','title'));
    }

    // Menyimpan perubahan data guru yang diedit
    public function update(Request $request, $id)
    {
        try {
            $guru = Guru::findOrFail($id);
    
            $data = $request->validate([
                'kode_guru' => 'required|unique:gurus,kode_guru,'.$guru->id,
                'nama_guru' => 'required',
                'mata_pelajaran' => 'required',
            ]);
    
            $guru->update($data);
            event(new PodcastProcessed('success'));
            return redirect()->route('guru.index')->with('success', 'Data guru telah diperbarui.');
        } catch (\Exception $e) {
            // Tangani kesalahan di sini
            $errorMessage = $e->getMessage(); // Pesan kesalahan asli
    
            // Anda dapat mengarahkan pengguna ke halaman yang sesuai, contoh:
            return redirect()->route('guru.index')->with('error', 'Error gagal disimpan');
        }
    }

    // Menghapus data guru
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        event(new PodcastProcessed('success'));
        return redirect()->route('guru.index')->with('success', 'Guru telah dihapus.');
    }

    public function exportBlanko()
    {
        return Excel::download(new GuruBlankoExport(), 'guru_blanko.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048', // Sesuaikan dengan jenis file yang Anda inginkan
        ]);
    
        try {
            Excel::import(new GuruImport(), $request->file('file'));
            event(new PodcastProcessed('success'));
        } catch (\Exception $e) {
            return redirect()->route('guru.index')->with('error', 'Terjadi kesalahan saat mengimpor data guru.');
        }
    
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diimpor.');
    }
}
