<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $title = 'Data Events';
        return view('events.index', compact('events','title'));
    }

    public function create()
    {
        $title = "Buat Event Baru";
        return view('events.create', compact('title'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $request->validate([
            'event_name' => 'required',
            'event_description' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'type' => 'required',
        ]);
    
        // Inisialisasi objek Event dengan data dari formulir
        $event = new Event([
            'event_name' => $request->input('event_name'),
            'event_description' => $request->input('event_description'),
            'event_date' => $request->input('event_date'),
            'event_time' => $request->input('event_time'),
            'type' => $request->input('type'),
        ]);
    
        // Jika tipe adalah "Image," simpan file gambar
        if ($request->input('type') === 'image' && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $event->image = $imageName;
        }else{
            $event->image="";
        }
    
        // Simpan data acara
        $event->save();
        event(new PodcastProcessed('success'));
        // Redirect ke halaman daftar acara
        return redirect()->route('events.index')->with('success', 'Acara telah ditambahkan.');
    }

    public function edit(Event $event)
    {
        $title = "Edit Event";
        return view('events.edit', compact('event','title'));
    }

    public function update(Request $request, Event $event)
    {
        // Validasi data yang dikirimkan oleh formulir
        $request->validate([
            'event_name' => 'required',
            'event_description' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'type' => 'required',
        ]);
    
        // Update data acara dengan data dari formulir
        $event->update([
            'event_name' => $request->input('event_name'),
            'event_description' => $request->input('event_description'),
            'event_date' => $request->input('event_date'),
            'event_time' => $request->input('event_time'),
            'type' => $request->input('type'),
        ]);
    
        // Jika tipe adalah "Image" dan ada file gambar yang diunggah, simpan gambar baru
        if ($request->input('type') === 'image' && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $event->image = $imageName;
            $event->save();
            
        }
        event(new PodcastProcessed('success'));
        // Redirect ke halaman daftar acara dengan pesan sukses
        return redirect()->route('events.index')->with('success', 'Acara telah diperbarui.');
    }

    public function destroy(Event $event)
    {
        // Hapus gambar dari penyimpanan jika tipe adalah "Image"
        if ($event->type === 'image' && !empty($event->image)) {
            Storage::delete('public/images/' . $event->image);
        }
    
        // Hapus data acara
        $event->delete();
        event(new PodcastProcessed('success'));
        // Redirect ke halaman daftar acara dengan pesan sukses
        return redirect()->route('events.index')->with('success', 'Acara telah dihapus.');
    }
}
