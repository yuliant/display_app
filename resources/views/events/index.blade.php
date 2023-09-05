@extends('layouts.backend')

@section('content')
<div class="col-md-12">
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-2">Buat Event Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Acara</th>
                <th>Deskripsi Acara</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Type</th>
                <th>Image</th>
                <th>Aksi</th> <!-- Kolom tambahan untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->event_description }}</td>
                    <td>{{ $event->event_date }}</td>
                    <td>{{ $event->event_time }}</td>
                    <td>{{ $event->type }}</td>
                    <td>
                        @if ($event->type == 'image')
                            <img src="{{ asset('storage/images/' . $event->image) }}" alt="{{ $event->event_name }}" style="height:60px;width:auto;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus acara ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
