@extends('layouts.backend')

@section('content')
<div class="container">
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="event_name">Nama Acara</label>
            <input type="text" class="form-control" id="event_name" name="event_name" required>
        </div>

        <div class="form-group">
            <label for="event_description">Deskripsi Acara</label>
            <textarea class="form-control" id="event_description" name="event_description" required></textarea>
        </div>

        <div class="form-group">
            <label for="event_date">Tanggal Acara</label>
            <input type="date" class="form-control" id="event_date" name="event_date" required>
        </div>

        <div class="form-group">
            <label for="event_time">Jam Acara</label>
            <input type="time" class="form-control" id="event_time" name="event_time" required>
        </div>

        <div class="form-group">
            <label for="type">Tipe</label>
            <select class="form-control" id="type" name="type" required>
                <option value="text">Text</option>
                <option value="image">Image</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Gambar (Jika Tipe = Image)</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Tambah Acara</button>
    </form>
</div>
@endsection
