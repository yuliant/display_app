@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('timetables.store') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="teacher_name">Nama Guru:</label>
            <input type="text" name="teacher_name" class="form-control" id="teacher_name" placeholder="Masukkan nama guru" required>
        </div>

        <div class="form-group mb-3">
            <label for="day">Hari:</label>
            <input type="text" name="day" class="form-control" id="day" placeholder="Masukkan hari" required>
        </div>

        <div class="form-group mb-3">
            <label for="subject">Mata Pelajaran:</label>
            <input type="text" name="subject" class="form-control" id="subject" placeholder="Masukkan mata pelajaran" required>
        </div>

        <div class="form-group mb-3">
            <label for="start_time">Waktu Mulai:</label>
            <input type="time" name="start_time" class="form-control" id="start_time" required>
        </div>

        <div class="form-group mb-3">
            <label for="end_time">Waktu Selesai:</label>
            <input type="time" name="end_time" class="form-control" id="end_time" required>
        </div>

        <div class="form-group mb-3">
            <label for="classroom">Ruangan Kelas:</label>
            <input type="text" name="classroom" class="form-control" id="classroom" placeholder="Masukkan ruangan kelas" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
