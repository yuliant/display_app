@extends('layouts.backend')
@section('content')
        <div class="col-md-8">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama_siswa">Nama Siswa:</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                </div>
                <div class="form-group mb-3">
                    <label for="ket_prestasi">Keterangan Prestasi:</label>
                    <textarea class="form-control" id="ket_prestasi" name="ket_prestasi" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="foto">Foto:</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
@endsection