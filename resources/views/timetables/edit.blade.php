@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('timetables.update', $timetable->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="teacher_name">Nama Guru:</label>
            <input type="text" name="teacher_name" class="form-control" id="teacher_name" value="{{ $timetable->teacher_name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="day">Hari:</label>
            <input type="text" name="day" class="form-control" id="day" value="{{ $timetable->day }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="subject">Mata Pelajaran:</label>
            <input type="text" name="subject" class="form-control" id="subject" value="{{ $timetable->subject }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="start_time">Waktu Mulai:</label>
            <input type="time" name="start_time" class="form-control" id="start_time" value="{{ $timetable->start_time }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="end_time">Waktu Selesai:</label>
            <input type="time" name="end_time" class="form-control" id="end_time" value="{{ $timetable->end_time }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="classroom">Ruangan Kelas:</label>
            <input type="text" name="classroom" class="form-control" id="classroom" value="{{ $timetable->classroom }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
