@extends('layouts.backend') <!-- Jika Anda menggunakan layout di aplikasi Anda -->

@section('content')
    <div class="col-md-12">
        <form action="{{ route('rombels.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nama">Nama Rombel</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Rombel" required>
                <small id="namaHelp" class="form-text text-muted">Masukkan nama rombel, pisahkan dengan koma (contoh: 7-1, 7-2, 7-3).</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('rombels.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
