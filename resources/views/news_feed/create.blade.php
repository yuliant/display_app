@extends('layouts.backend') <!-- Jika Anda memiliki layout dasar (master layout) -->

@section('content')
<div class="col-md-12">
    <h1>Tambah Berita Baru</h1>
    <form action="{{ route('news-feed.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Judul:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group mb-3">
            <label for="content">Isi Berita:</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="date">Tanggal:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Berita</button>
    </form>
</div>
@endsection
