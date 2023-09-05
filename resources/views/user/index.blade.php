@extends('layouts.backend')

@section('content')
    <div class="col-md-12">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{route('user.show',$row->id)}}">View</a>
                        <a class="btn btn-warning btn-sm" href="{{route('user.edit',$row->id)}}">Edit</a>
                        <form action="" method="POST" class="d-inline">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Add New User</a>
    </div>
@endsection