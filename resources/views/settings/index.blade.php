@extends('layouts.backend')

@section('content')
<div class="col-md-12">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <label for="app_name" class="col-md-2 col-form-label" >Nama Aplikasi</label>
            <div class="col-md-6">
                <input type="text" name="app_name" id="app_name" class="form-control" value="{{ $settings['app_name'] }}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-form-label" >Short Name</label>
            <div class="col-md-10">
                <input type="text" name="short_name" id="short_name" class="form-control" value="{{ $settings['short_name'] }}">
            </div>
        </div>        
        <div class="row mb-3">
            <label class="col-md-2 col-form-label" >Logo Aplikasi</label>
            <div class="col-md-10">
                <input type="text" name="app_logo" id="app_logo" class="form-control" value="{{ $settings['app_logo'] }}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-form-label" >Deskripsi Aplikasi</label>
            <div class="col-md-10">
                <textarea name="app_description" id="app_description" class="form-control">{{ $settings['app_description'] }}</textarea>
            </div>
        </div>        
        <div class="row mb-3">
            <label class="col-md-2 col-form-label" >Contact Info</label>
            <div class="col-md-10">
                <textarea name="contact_info" id="contact_info" class="form-control">{{ $settings['contact_info'] }}</textarea>
            </div>
        </div>  
        <div class="row mb-3">
            <label class="col-md-2 col-form-label" >Bahasa</label>
            <div class="col-md-3">
                <?php $bahasa=$settings['language']; ?>
                <select class="form-control" name="language">
                    <option value="en" {{ $bahasa === 'en' ? 'selected' : '' }}>English</option>
                    <option value="idn" {{ $bahasa === 'idn' ? 'selected' : '' }}>Indonesia</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
        <label class="col-md-2 col-form-label" >Kota</label>
            <div class="col-md-3">
                <select class="form-control" name="kota">
                @foreach($kotas as $kota)
                    <option value="{{$kota['toponymName']}}" {{$kota['toponymName']===$settings['kota'] ? 'selected' : ''}}>{{$kota['toponymName']}}</option>
                @endforeach
                </select>
            </div>            
        </div>  
        <div class="row mb-3">
            <label class="col-md-2 col-form-label" >Time Zone</label>
            <div class="col-md-3">
                <select class="form-control" name="time_zone">
                @foreach($timezones as $timezone)
                    <option value="{{$timezone}}" {{$timezone===$settings['time_zone'] ? 'selected' : ''}}>{{$timezone}}</option>
                @endforeach
                </select>
            </div>            
        </div>                
        <!-- Form fields for other settings... -->

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection