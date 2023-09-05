@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <a href="{{ route('jadwal-jumat.create') }}" class="btn btn-primary">Tambah Jadwal Jumat</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Khotib</th>
                <th>Imam</th>
                <th>Muadzin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwalJumatList as $jadwalJumat)
            <tr>
                <td>{{ $jadwalJumat->tanggal }}</td>
                <td>{{ $jadwalJumat->khotib }}</td>
                <td>{{ $jadwalJumat->imam }}</td>
                <td>{{ $jadwalJumat->muadzin }}</td>
                <td>
                    <a href="{{ route('jadwal-jumat.edit', $jadwalJumat->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('jadwal-jumat.destroy', $jadwalJumat->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
