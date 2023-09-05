@extends('layouts.backend') <!-- Anda bisa menyesuaikan layout sesuai dengan proyek Anda -->

@section('content')
    <div class="container">
        <a href="{{ route('messages.create') }}" class="btn btn-primary mb-2">Buat Pesan Baru</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pembuat</th>
                    <th>Pesan</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->pembuat }}</td>
                        <td>{{ $message->message }}</td>
                        <td>
                            <a href="{{ route('messages.edit', ['message' => $message->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('messages.destroy', ['message' => $message->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
