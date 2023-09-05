@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('hadis.update', $hadis->id) }}">
        @csrf <!-- Proteksi dari CSRF -->
        @method('PUT') <!-- Menggunakan metode PUT untuk mengirim perubahan -->

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $hadis->judul }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="isi">Isi Hadis</label>
            <textarea class="form-control" id="isi" name="isi" rows="5" required>{{ $hadis->isi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('hadis.index') }}" class="btn btn-secondary">Batal</a>
    </form>    
</div>
@endsection