<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HadisNabi;
use App\Events\PodcastProcessed;

class HadisNabiController extends Controller
{
    public function index()
    {
        $title = 'Kumpulan Hadits Nabi';
        $hadisList = HadisNabi::orderBy('created_at', 'desc')->get();
        return view('hadis.index', compact('hadisList','title'));
    }
    public function create()
    {
        $title = 'Form Tambah Hadits';
        return view('hadis.create',compact('title'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        // Simpan hadis ke dalam database
        $hadis = new HadisNabi;
        $hadis->judul = $validatedData['judul'];
        $hadis->isi = $validatedData['isi'];
        $hadis->save();
        event(new PodcastProcessed('success'));
        // Redirect kembali ke halaman daftar hadis setelah penyimpanan
        return redirect()->route('hadis.index')->with('success', 'Hadis berhasil disimpan');
    }  
    public function edit($id)
    {
        $title = 'Edit Hadits';
        $hadis = HadisNabi::findOrFail($id);
        return view('hadis.edit', compact('hadis','title'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        // Temukan hadis berdasarkan ID
        $hadis = HadisNabi::findOrFail($id);

        // Perbarui data hadis
        $hadis->judul = $validatedData['judul'];
        $hadis->isi = $validatedData['isi'];
        $hadis->save();
        event(new PodcastProcessed('success'));
        // Redirect kembali ke halaman daftar hadis setelah perubahan
        return redirect()->route('hadis.index')->with('success', 'Hadis berhasil diperbarui');
    }  
    public function destroy($id)
    {
        // Temukan dan hapus hadis berdasarkan ID
        $hadis = HadisNabi::findOrFail($id);
        $hadis->delete();
        event(new PodcastProcessed('success'));
        // Redirect kembali ke halaman daftar hadis setelah penghapusan
        return redirect()->route('hadis.index')->with('success', 'Hadis berhasil dihapus');
    }
}
