@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('timetables.create') }}" class="btn btn-primary">Tambah</a>
                <a href="{{ route('timetables.download-blanko') }}" class="btn btn-info">Download Blanko Import</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">Impor Excel</button>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Mata Pelajaran</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Ruang Kelas</th>
                    <th>Nama Guru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timetables as $timetable)
                    <tr>
                        <td>{{ $timetable->day }}</td>
                        <td>{{ $timetable->subject }}</td>
                        <td>{{ $timetable->start_time }}</td>
                        <td>{{ $timetable->end_time }}</td>
                        <td>{{ $timetable->classroom }}</td>
                        <td>{{ $timetable->teacher_name }}</td>
                        <td>
                            <a href="{{ route('timetables.edit', $timetable) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('timetables.destroy', $timetable) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="importModalLabel">Impor Jadwal dari Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk mengunggah file Excel -->
                    <form action="{{ route('timetables.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="excelFile">Pilih File Excel:</label>
                            <input type="file" class="form-control-file" id="excelFile" name="excel_file">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="importTimetable()">Impor</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function importTimetable() {
            // Simpan elemen input file Excel dalam variabel
            var excelFileInput = document.getElementById('excelFile');

            // Pastikan file Excel telah dipilih
            if (excelFileInput.files.length === 0) {
                alert('Pilih file Excel terlebih dahulu.');
                return;
            }

            // Buat objek FormData untuk mengirim file Excel
            var formData = new FormData();
            formData.append('excel_file', excelFileInput.files[0]);

            // Kirim request POST ke server
            fetch("{{ route('timetables.import') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(data => {
                // Tangani respons dari server (misalnya, tampilkan pesan sukses atau kesalahan)
                alert(data.message);

                // Tutup modal jika impor berhasil
                if (data.success) {
                    $('#importModal').modal('hide');
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error(error);
            });
        }
    </script>

@endsection
