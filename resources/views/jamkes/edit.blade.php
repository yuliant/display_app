@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('jamkes.update', $jamke->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" class="form-control" id="hari" name="hari" value="{{ $jamke->hari }}" readonly>
            </div>            
            <div class="form-group mb-3">
                <label for="nama_jam">Nama Jam</label>
                <h6>{{$jamke->nama_jam}}</h6>
                <input type="hidden" class="form-control" id="nama_jam" name="nama_jam" value="{{ $jamke->nama_jam }}" required>
            </div>
            <div class="mb-3">
                <label for="waktu_awal" class="form-label">Waktu Awal</label>
                <input type="time" class="form-control" id="waktu_awal" name="waktu_awal" value="{{ $jamke->waktu_awal }}" required>
            </div>
            <div class="mb-3">
                <label for="waktu_akhir" class="form-label">Waktu Akhir</label>
                <input type="time" class="form-control" id="waktu_akhir" name="waktu_akhir" value="{{ $jamke->waktu_akhir }}" required>
            </div>
            <div class="mb-3">
                <label for="no_urut" class="form-label">No Urut</label>
                <input type="number" class="form-control" id="no_urut" name="no_urut" value="{{ $jamke->no_urut }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('jamkes.index', $jamke->hari) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

