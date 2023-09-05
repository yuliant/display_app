<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class RombelController extends Controller
{
    public function index()
    {
        $rombels = Rombel::all();
        $title = 'Data Rombel';
        return view('rombels.index', compact('rombels','title'));
    }

    public function create()
    {
        $title ='Tambah Rombel';
        return view('rombels.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
    
        $namaRombels = explode(',', $request->input('nama'));
    
        foreach ($namaRombels as $namaRombel) {
            // Lakukan validasi atau manipulasi data jika diperlukan
            Rombel::create(['nama' => trim($namaRombel)]);
        }
        event(new PodcastProcessed('success'));
        return redirect()->route('rombels.index')
            ->with('success', 'Rombel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rombel = Rombel::findOrFail($id);
        $title = "Edit Rombel";
        return view('rombels.edit', compact('rombel','title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            //Tambahkan validasi sesuai dengan kebutuhan Anda
        ]);

        $rombel = Rombel::findOrFail($id);
        $rombel->update($request->all());
        event(new PodcastProcessed('success'));
        return redirect()->route('rombels.index')
            ->with('success', 'Rombel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rombel = Rombel::findOrFail($id);
        $rombel->delete();
        event(new PodcastProcessed('success'));
        return redirect()->route('rombels.index')
            ->with('success', 'Rombel berhasil dihapus.');
    }
}
