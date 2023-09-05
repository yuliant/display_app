@extends('layouts.backend')

@section('content')
<div class="col-lg-12">
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul Video</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="video">Unggah Video</label>
            <input type="file" name="video" id="video" class="form-control" accept="video/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Unggah</button>
    </form>
</div>
@endsection
