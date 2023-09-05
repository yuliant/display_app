@extends('layouts.backend') <!-- Jika Anda memiliki layout dasar (master layout) -->

@section('content')
<div class="col-md-12">

    <a href="{{ route('news-feed.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Berita</a>
    <div class="list-group">
        @foreach ($newsFeed as $news)
        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $news->title }}</h5>
                <small>{{ $news->date }}</small>
            </div>
            <p class="mb-1">{{ $news->content }}</p>
            <div class="d-flex justify-content-end">
                <a href="{{ route('news-feed.edit', $news->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('news-feed.destroy', $news->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                </form>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
