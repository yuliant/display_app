@extends('layouts.backend')

@section('content')
<div class="col-lg-12">
    <a href="{{ route('videos.create') }}" class="btn btn-primary">Unggah Video Baru</a>    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Video</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($videos as $video)
                <tr>
                    <td>{{ $video->title }}</td>
                    <td>{{ $video->description }}</td>
                    <td>
                        <video width="200" controls>
                            <source src="{{ Storage::url($video->video_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </td>
                    <td>
                        <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus video ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada video yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="col-lg-12">
    <h5 class="mb-2">Petunjuk</h2><hr>
    <p>
        Pastikan pengaturan upload untuk php anda sudah benar dengan mengatur <br>
        upload_max_filesize = 20M <br>
        post_max_size = 20M <br>
        untuk ukuran sesuai dengan keinginan anda. Pengaturan di webserver lokal ada di file php.ini, 
        untuk pengaturan webserver hosting online ada di pengaturan php options
    </p>
</div>
@endsection
