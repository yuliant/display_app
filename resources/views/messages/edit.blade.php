@extends('layouts.backend') <!-- Sesuaikan layout dengan proyek Anda -->

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('messages.update', ['message' => $message->id]) }}">
            @csrf <!-- Token CSRF Laravel -->
            @method('PUT') <!-- Method PUT untuk mengupdate -->
            <div class="form-group mb-3">
                <label for="pembuat">Pembuat:</label>
                <input type="text" name="pembuat" id="pembuat" class="form-control" value="{{ $message->pembuat }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="message">Pesan:</label>
                <textarea name="message" id="message" class="form-control" required>{{ $message->message }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
