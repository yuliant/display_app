@extends('layouts.backend') <!-- Jika Anda menggunakan layout di aplikasi Anda -->

@section('content')
    <div class="col-md-12">
        <div class="mb-3">
            <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Guru</a>
            <a href="{{ route('guru.export.blanko') }}" class="btn btn-success">Unduh Blanko</a>
            <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importModal">Import Excel</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Guru</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gurus as $guru)
                    <tr>
                        <td>{{ $guru->kode_guru }}</td>
                        <td>{{ $guru->nama_guru }}</td>
                        <td>{{ $guru->mata_pelajaran }}</td>
                        <td>
                            <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus guru ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal Import Excel -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('guru.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Impor Data Guru dari Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">Pilih File Excel:</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls, .csv">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Impor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
