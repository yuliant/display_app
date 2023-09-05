<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class SchoolMessageController extends Controller
{
    public function index(){
        $title = "Data Pesan Sekolah";
        $messages = SchoolMessage::all();
        return view('messages.index', compact('messages','title'));
    }
    public function create()
    {
        $title = 'Buat Pesan Baru';
        return view('messages.create',compact('title'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'message' => 'required',
        ]);

        $pembuat = Auth::user()->role;
        
        SchoolMessage::create([
            'pembuat' => $pembuat,
            'message' => $request->message,
        ]);

        event(new PodcastProcessed('success'));

        return redirect()->route('messages.index')
            ->with('success', 'Pesan berhasil dibuat.');
    }

    public function edit(SchoolMessage $message)
    {
        $title = "Edit Pesan";
        return view('messages.edit', compact('message','title'));
    }

    public function update(Request $request, SchoolMessage $message)
    {
        $request->validate([
            'pembuat' => 'required',
            'message' => 'required',
        ]);
        $message->update($request->all());
        event(new PodcastProcessed('success'));


        return redirect()->route('messages.index')
            ->with('success', 'Pesan berhasil diperbarui.');
    }

    public function destroy(SchoolMessage $message)
    {
        $message->delete();
        event(new PodcastProcessed('success'));
        return redirect()->route('messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }

}
