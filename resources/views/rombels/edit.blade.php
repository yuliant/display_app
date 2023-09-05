@extends('layouts.backend') <!-- Jika Anda menggunakan layout di aplikasi Anda -->

@section('content')
    <div class="col-md-12">
        <form action="{{ route('rombels.update', $rombel->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nama">Nama Rombel</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $rombel->nama }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('rombels.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
