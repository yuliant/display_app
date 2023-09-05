<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use Excel;
use App\Exports\TimetableBlankoExport; // Sesuaikan dengan nama export class yang akan Anda buat
use App\Imports\TimetableImport; // Sesuaikan dengan nama import class yang akan Anda buat
use App\Events\PodcastProcessed;

class TimetableController extends Controller
{
    public function index()
    {
        // Mengambil semua data jadwal dari model Timetable
        $timetables = Timetable::all();
        $title="Daftar Jadwal Sekolah";
        // Menampilkan view index.blade.php dan mengirimkan data jadwal
        return view('timetables.index', compact('timetables','title'));
    }
    public function create()
    {
        // Tampilkan view create.blade.php untuk menambahkan jadwal baru
        $title="Tambah Jadwal Baru";
        return view('timetables.create', compact('title'));
    }
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $request->validate([
            'teacher_name' => 'required',
            'day' => 'required',
            'subject' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'classroom' => 'required',
        ]);
    
        // Buat objek Timetable dengan data dari formulir
        $timetable = new Timetable([
            'teacher_name' => $request->input('teacher_name'),
            'day' => $request->input('day'),
            'subject' => $request->input('subject'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'classroom' => $request->input('classroom'),
        ]);
    
        // Simpan data jadwal
        $timetable->save();
        event(new PodcastProcessed('success'));
        // Redirect ke halaman daftar jadwal
        return redirect()->route('timetables.index')->with('success', 'Jadwal telah ditambahkan.');
    }
    public function edit(Timetable $timetable)
    {
        $title="Edit Jadwal Sekolah";
        return view('timetables.edit', compact('timetable','title'));
    }
        
    public function update(Request $request, Timetable $timetable)
    {
        // Validasi data yang dikirimkan oleh formulir
        $request->validate([
            'teacher_name' => 'required',
            'day' => 'required',
            'subject' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'classroom' => 'required',
        ]);
    
        // Update data jadwal dengan data dari formulir
        $timetable->update([
            'teacher_name' => $request->input('teacher_name'),
            'day' => $request->input('day'),
            'subject' => $request->input('subject'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'classroom' => $request->input('classroom'),
        ]);
        event(new PodcastProcessed('success'));
        // Redirect ke halaman daftar jadwal dengan pesan sukses
        return redirect()->route('timetables.index')->with('success', 'Jadwal telah diperbarui.');
    }

    public function destroy(Timetable $timetable)
    {
        // Hapus data jadwal berdasarkan instance $timetable
        $timetable->delete();
        event(new PodcastProcessed('success'));
        // Redirect ke halaman daftar jadwal dengan pesan sukses
        return redirect()->route('timetables.index')->with('success', 'Jadwal telah dihapus.');
    }   
    public function downloadBlanko()
    {
        return Excel::download(new TimetableBlankoExport, 'timetable_blanko.xlsx');
    }     

    public function import(Request $request)
    {
        // Validasi file Excel yang diunggah
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);
    
        try {
            // Import data dari file Excel
            Excel::import(new TimetableImport, $request->file('excel_file'));
            event(new PodcastProcessed('success'));
            return response()->json(['success' => true, 'message' => 'Jadwal berhasil diimpor.']);
        } catch (\Exception $e) {
            \Log::error('Terjadi kesalahan saat mengimpor jadwal: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat mengimpor jadwal.']);
        }
    }
}
