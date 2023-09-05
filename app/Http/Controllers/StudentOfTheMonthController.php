<?php

namespace App\Http\Controllers;

use App\Models\StudentOfTheMonth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class StudentOfTheMonthController extends Controller
{
    public function index()
    {
        $title = "Student Of The Month";
        $students = StudentOfTheMonth::all();
        return view('students.index', compact('students','title'));
    }

    public function create()
    {
        $title = "Tambah Student Of The Month";
        return view('students.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'ket_prestasi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah sesuai kebutuhan
        ]);

        // Upload foto
        $fotoPath = $request->file('foto')->store('student_fotos', 'public');

        StudentOfTheMonth::create([
            'nama_siswa' => $request->input('nama_siswa'),
            'ket_prestasi' => $request->input('ket_prestasi'),
            'foto' => $fotoPath,
        ]);
        event(new PodcastProcessed('success'));
        return redirect()->route('students.index')->with('success', 'Data siswa telah berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $title = "Details Student Of The Month";
        $student = StudentOfTheMonth::findOrFail($id);
        return view('students.show', compact('student','title'));
    }

    public function edit(string $id)
    {

        $title = "Edit Student Of The Month";
        $student = StudentOfTheMonth::findOrFail($id);
        return view('students.edit', compact('student','title'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'ket_prestasi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah sesuai kebutuhan
        ]);
        $student = StudentOfTheMonth::findOrFail($id);
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            Storage::disk('public')->delete($student->foto);

            // Upload foto baru
            $fotoPath = $request->file('foto')->store('student_fotos', 'public');
        } else {
            $fotoPath = $student->foto;
        }

        $student->update([
            'nama_siswa' => $request->input('nama_siswa'),
            'ket_prestasi' => $request->input('ket_prestasi'),
            'foto' => $fotoPath,
        ]);
        event(new PodcastProcessed('success'));

        return redirect()->route('students.index')->with('success', 'Data siswa telah berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $student = StudentOfTheMonth::findOrFail($id);
        // Hapus foto terkait sebelum menghapus record
        Storage::disk('public')->delete($student->foto);

        $student->delete();
        event(new PodcastProcessed('success'));
        
        return redirect()->route('students.index')->with('success', 'Data siswa telah berhasil dihapus.');
    }
}
