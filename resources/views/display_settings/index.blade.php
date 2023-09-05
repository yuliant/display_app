@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('display-settings.update-all') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <table class="table">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($display_settings as $setting)
                        <tr>
                            <td>{{ $setting->label }}</td>
                            <td>
                                @if ($setting->type === 'file')
                                    @if ($setting->value)
                                    <img src="{{ asset('storage/' . $setting->value) }}" alt="{{$setting->key}} Image" class="{{($setting->key==='logo' ? 'logo-display' : '')}} {{($setting->key==='bg_image' ? 'background-header' : '')}} {{($setting->key==='bg_image_big' ? 'background-full' : '')}} mb-3">
                                    @endif            
                                    <input type="file" name="bg_image[{{ $setting->id }}]" class="form-control">
                                @elseif ($setting->type==='text')
                                    <input type="text" name="settings[{{ $setting->id }}][value]" value="{{ $setting->value }}" class="form-control" required>
                                @elseif ($setting->type === 'select')
                                    @if ($setting->key === 'video_source')
                                        <select name="settings[{{ $setting->id }}][value]" class="form-control" required>
                                            @foreach (explode(',', 'playlist,local,streaming') as $option)
                                                <option value="{{ $option }}" {{ $option === $setting->value ? 'selected' : '' }}>{{ ucfirst($option) }}</option>
                                            @endforeach
                                        </select>
                                    @elseif($setting->key === 'mode_event')
                                        <select name="settings[{{ $setting->id }}][value]" class="form-control" required>
                                            @foreach (explode(',', 'text,image') as $option)
                                                <option value="{{ $option }}" {{ $option === $setting->value ? 'selected' : '' }}>{{ ucfirst($option) }}</option>
                                            @endforeach
                                        </select>   
                                    @elseif($setting->key === 'tema')
                                        <select name="settings[{{ $setting->id }}][value]" class="form-control" required>
                                            @foreach (explode(',', 'layout_1,layout_2,layout_3') as $option)
                                                <option value="{{ $option }}" {{ $option === $setting->value ? 'selected' : '' }}>{{ ucfirst(str_replace("_"," ",$option)) }} {{desLayout($option)}}</option>
                                            @endforeach
                                        </select>                                                                      
                                    @endif
                                @elseif ($setting->type === 'radio')
                                    @if ($setting->key === 'display_orientation')
                                        @foreach (explode(',', 'landscape,portrait') as $option)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="settings[{{ $setting->id }}][value]" value="{{ $option }}" {{ $option === $setting->value ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ ucfirst($option) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
