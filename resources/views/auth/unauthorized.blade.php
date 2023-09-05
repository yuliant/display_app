@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center row">
            <div class=" col-md-6">
                <img src="{{ asset('image/error-404.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class=" col-md-6 mt-5">
                <p class="fs-3"> <span class="text-danger">Opps!</span> Halaman tidak ditemukan.</p>
                <p class="lead">
                    Halaman yang anda cari tidak ditemukan!
                </p>
            </div>

        </div>
    </div>    
</div>
@endsection