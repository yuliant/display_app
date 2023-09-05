@extends('layouts.backend')

@section('content')
<div class="col-lg-12">
    <form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Judul Video</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $video->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required>{{ $video->description }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="video">Ganti Video</label>
            <input type="file" name="video" id="video" class="form-control" accept="video/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
