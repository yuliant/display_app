@extends('layouts.backend') <!-- Sesuaikan layout dengan proyek Anda -->

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('messages.store') }}">
            @csrf <!-- Token CSRF Laravel -->
            <div class="form-group mb-3">
                <label for="message">Pesan:</label>
                <textarea name="message" id="message" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
