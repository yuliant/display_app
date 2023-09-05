@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('jamkes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" class="form-control" id="hari" name="hari" value="{{ $selectedHari }}" readonly>
            </div>            
            <div class="form-group mb-3">
                <label for="nama_jam">Nama Jam</label>
                <select id="nama_jam" name="nama_jam" class="form-control">
                    @for($i=0;$i<=15;$i++)
                    <option value="Jam Ke-{{$i}}">Jam Ke-{{$i}}</option>
                    @endfor
                    <option value="Istirahat 1">Istirahat Pertama</option>
                    <option value="Istirahat 2">Istirahat Kedua</option>
                </select> 
            </div>
            <div class="mb-3">
                <label for="waktu_awal" class="form-label">Waktu Awal</label>
                <input type="time" class="form-control" id="waktu_awal" name="waktu_awal" required>
            </div>
            <div class="mb-3">
                <label for="waktu_akhir" class="form-label">Waktu Akhir</label>
                <input type="time" class="form-control" id="waktu_akhir" name="waktu_akhir" required>
            </div>
            <div class="mb-3">
                <label for="no_urut" class="form-label">No Urut</label>
                <input type="number" class="form-control" id="no_urut" name="no_urut" required>
            </div>           
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jamkes.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

