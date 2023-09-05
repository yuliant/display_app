@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required readonly>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" name="role">
                    <option value="admin" @if ($user->role=='admin') selected @else "" @endif>Admin</option>
                    <option value="user" @if ($user->role=='user') selected @else "" @endif>User</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="Status">Status:</label>
                <select class="form-control" name="status">
                    <option value="active" @if ($user->status=='active') selected @else "" @endif>Active</option>
                    <option value="not" @if ($user->status!='active') selected @else "" @endif>Not Active</option>
                </select>
            </div>            
            <button type="submit" class="btn btn-primary btn-sm">Update User</button>
            <a href="{{ route('users.data') }}" class="btn btn-secondary btn-sm">Back to List</a>
        </form>
    </div>     
    </div>
@endsection