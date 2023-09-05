@extends('layouts.backend')

@section('content')
        <div class="col-md-8">
            <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nama_siswa">Nama Siswa:</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $student->nama_siswa }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="ket_prestasi">Keterangan Prestasi:</label>
                    <textarea class="form-control" id="ket_prestasi" name="ket_prestasi" required>{{ $student->ket_prestasi }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="foto">Foto:</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                </div>
                @if ($student->foto)
                <div class="form-group mb-3">
                    <label>Foto Saat Ini:</label><br>
                    <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto Siswa" width="200">
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
@endsection
