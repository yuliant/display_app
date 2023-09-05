@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('jadwal-jumat.store') }}">
        @csrf
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="khotib">Khotib</label>
            <input type="text" class="form-control" id="khotib" name="khotib" required>
        </div>
        <div class="form-group">
            <label for="imam">Imam</label>
            <input type="text" class="form-control" id="imam" name="imam" required>
        </div>
        <div class="form-group mb-3">
            <label for="muadzin">Muadzin</label>
            <input type="text" class="form-control" id="muadzin" name="muadzin" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
