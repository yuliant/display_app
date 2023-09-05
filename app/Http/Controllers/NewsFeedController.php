<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsFeed;
use Illuminate\Support\Facades\Session;
use App\Events\PodcastProcessed;

class NewsFeedController extends Controller
{
    //
    public function index()
    {
        $newsFeed = NewsFeed::all(); // Mengambil semua berita dari tabel "news_feed"
        $title = "Daftar Berita";
        return view('news_feed.index', compact('newsFeed','title'));
    }

    public function create()
    {
        $title = "Buat Berita Baru";
        return view('news_feed.create',compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);

        $news = new NewsFeed([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'date' => $request->input('date'),
        ]);

        $news->save();
        event(new PodcastProcessed('success'));
        return redirect()->route('news-feed.index')->with('success', 'Berita telah ditambahkan.');
    }

    public function edit($id)
    {
        $news = NewsFeed::find($id);
        $title = "Edit Berita";
        if (!$news) {
            return redirect()->route('news-feed.index')->with('error', 'Berita tidak ditemukan.');
        }
    
        return view('news_feed.edit', compact('news','title'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);
    
        $news = NewsFeed::find($id);
    
        if (!$news) {
            return redirect()->route('news-feed.index')->with('error', 'Berita tidak ditemukan.');
        }
    
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->date = $request->input('date');
        $news->save();
        event(new PodcastProcessed('success'));
        return redirect()->route('news-feed.index')->with('success', 'Berita telah diperbarui.');
    }
    public function destroy($id)
    {
        $news = NewsFeed::find($id);
    
        if (!$news) {
            return redirect()->route('news-feed.index')->with('error', 'Berita tidak ditemukan.');
        }
    
        $news->delete();
        event(new PodcastProcessed('success'));
        return redirect()->route('news-feed.index')->with('success', 'Berita telah dihapus.');
    }
            
}
