@extends('layouts.backend') <!-- Jika Anda memiliki layout dasar (master layout) -->

@section('content')
<div class="col-md-12">

    <form action="{{ route('news-feed.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Judul:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
        </div>
        <div class="form-group mb-3">
            <label for="content">Isi Berita:</label>
            <textarea class="form-control" id="content" name="content">{{ $news->content }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="date">Tanggal:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $news->date }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
