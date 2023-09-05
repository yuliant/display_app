@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('jamkes.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-sm-3">
                    <select class="form-control" name="hari">
                        <option value="Senin" @if($selectedHari=='Senin') selected @endif>Senin</option>
                        <option value="Selasa" @if($selectedHari=='Selasa') selected @endif>Selasa</option>
                        <option value="Rabu" @if($selectedHari=='Rabu') selected @endif>Rabu</option>
                        <option value="Kamis" @if($selectedHari=='Kamis') selected @endif>Kamis</option>
                        <option value="Jumat" @if($selectedHari=="Jumat") selected @endif>Jumat</option>
                        <option value="Sabtu" @if($selectedHari=='Sabtu') selected @endif>Sabtu</option>
                        <!-- Tambahkan opsi-opsi hari lainnya sesuai dengan kebutuhan Anda -->
                    </select>
                </div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-sm btn-info">Tampilkan Data</button>    
                    <a href="{{ route('jamkes.create', ['selectedHari' => $selectedHari]) }}" class="btn btn-primary btn-sm">Tambah Jam Ke</a>           
                </div>
            </div>
        </form>        
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Jam</th>
                    <th scope="col">Waktu Awal</th>
                    <th scope="col">Waktu Akhir</th>
                    <th scope="col">No Urut</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jamkes as $jamke)
                    <tr>
                        <th scope="row">{{ $jamke->id }}</th>
                        <td>{{ $jamke->nama_jam }}</td>
                        <td>{{ $jamke->waktu_awal }}</td>
                        <td>{{ $jamke->waktu_akhir }}</td>
                        <td>{{ $jamke->no_urut }}</td>
                        <td>
                            <a href="{{ route('jamkes.edit', $jamke->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('jamkes.destroy', $jamke->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus jam ke ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
