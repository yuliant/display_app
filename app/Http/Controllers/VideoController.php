<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use App\Events\PodcastProcessed;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        $title = 'Gallery Videos';
        return view('videos.index', compact('videos','title'));
    }

    public function create()
    {
        $title = 'Upload Video';
        return view('videos.create',compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'required|mimetypes:video/mp4,video/x-flv,video/3gpp,video/x-msvideo,video/x-ms-wmv',
        ]);
    
        // Simpan video ke direktori storage/app/public/videos
        $videoPath = $request->file('video')->store('public/videos');
    
        // Ubah path agar sesuai dengan direktori yang bisa diakses publik
        $videoPath = str_replace('public/', '', $videoPath);
    
        Video::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'video_path' => $videoPath,
        ]);
        event(new PodcastProcessed('success'));
        return redirect()->route('videos.index')->with('success', 'Video berhasil diunggah.');
    }

    public function edit($id)
    {
        $video = Video::find($id);
        $title = 'Edit Video';
        return view('videos.edit', compact('video','title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $video = Video::find($id);
    
        $video->title = $request->input('title');
        $video->description = $request->input('description');
    
        if ($request->hasFile('video')) {
            $request->validate([
                'video' => 'mimetypes:video/mp4,video/x-flv,video/3gpp,video/x-msvideo,video/x-ms-wmv',
            ]);
    
            // Hapus video lama jika ada
            if ($video->video_path) {
                Storage::delete('public/' . $video->video_path); // Perhatikan penambahan 'public/' di sini.
            }
    
            $videoPath = $request->file('video')->store('public/videos'); // Ubah penyimpanan ke 'public/videos'.
            $video->video_path = str_replace('public/', '', $videoPath);
        }
    
        $video->save();
        event(new PodcastProcessed('success'));
        return redirect()->route('videos.index')->with('success', 'Video berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $video = Video::find($id);
    
        // Hapus video dari penyimpanan
        if ($video->video_path) {
            Storage::delete('public/' . $video->video_path);
        }
    
        $video->delete();
        event(new PodcastProcessed('success'));
        return redirect()->route('videos.index')->with('success', 'Video berhasil dihapus.');
    }
}
