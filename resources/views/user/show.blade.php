@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ $user->name }}
            </div>
            <div class="card-body">
                <p>Email: {{ $user->email }}</p>
                <p>Role: {{ $user->role }}</p>
                <p>Status: {{ $user->status }}</p>
            </div>
        </div>
        <a href="{{ route('users.data') }}" class="btn btn-secondary btn-sm mt-3">Back to List</a>        
    </div>
@endsection