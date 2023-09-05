@extends('layouts.backend') <!-- Jika Anda menggunakan layout di aplikasi Anda -->

@section('content')
    <div class="col-md-12">
        <a href="{{ route('rombels.create') }}" class="btn btn-primary mb-2">Tambah Rombel</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rombels as $rombel)
                    <tr>
                        <th scope="row">{{ $rombel->id }}</th>
                        <td>{{ $rombel->nama }}</td>
                        <td>
                            <a href="{{ route('rombels.edit', $rombel->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('rombels.destroy', $rombel->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus rombel ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
