@extends('layouts.backend') <!-- Jika Anda menggunakan layout di aplikasi Anda -->

@section('content')
    <div class="col-md-12">
        <form action="{{ route('guru.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="kode_guru">Kode Guru</label>
                <input type="text" class="form-control" id="kode_guru" name="kode_guru" required>
            </div>
            <div class="form-group mb-3">
                <label for="nama_guru">Nama Guru</label>
                <input type="text" class="form-control" id="nama_guru" name="nama_guru" required>
            </div>
            <div class="form-group mb-3">
                <label for="mata_pelajaran">Mata Pelajaran</label>
                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
