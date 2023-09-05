@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <a href="{{ route('hadis.create') }}" class="btn btn-primary mb-3">Tambah Hadis</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hadisList as $hadis)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $hadis->judul }}</td>
                <td>{{ $hadis->isi }}</td>
                <td>
                    <a href="{{ route('hadis.edit', $hadis->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('hadis.destroy', $hadis->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus hadis ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>
@endsection