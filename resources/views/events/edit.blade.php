@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="event_name">Nama Acara</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="{{ $event->event_name }}" required>
        </div>

        <div class="form-group">
            <label for="event_description">Deskripsi Acara</label>
            <textarea class="form-control" id="event_description" name="event_description" required>{{ $event->event_description }}</textarea>
        </div>

        <div class="form-group">
            <label for="event_date">Tanggal Acara</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $event->event_date }}" required>
        </div>

        <div class="form-group">
            <label for="event_time">Jam Acara</label>
            <input type="time" class="form-control" id="event_time" name="event_time" value="{{ $event->event_time }}" required>
        </div>

        <div class="form-group">
            <label for="type">Tipe</label>
            <select class="form-control" id="type" name="type" required>
                <option value="text" @if ($event->type === 'text') selected @endif>Text</option>
                <option value="image" @if ($event->type === 'image') selected @endif>Image</option>
            </select>
        </div>

        @if ($event->type === 'image')
        <div class="form-group">
            <label for="current_image">Gambar Saat Ini</label>
            <img src="{{ asset('storage/images/' . $event->image) }}" alt="{{ $event->event_name }}" width="100">
        </div>
        @endif

        <div class="form-group">
            <label for="image">Ubah Gambar (Jika Tipe = Image)</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
