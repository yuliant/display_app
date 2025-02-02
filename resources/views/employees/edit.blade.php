@extends('layouts.backend')

@section('content')
    <div class="container">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Employee</button>
        </form>
    </div>
@endsection
