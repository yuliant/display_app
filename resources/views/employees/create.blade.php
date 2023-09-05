@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" name="position" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add Employee</button>
        </form>
    </div>
@endsection
