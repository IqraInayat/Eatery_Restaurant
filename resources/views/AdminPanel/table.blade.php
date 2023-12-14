@extends('AdminPanel.main')
@section('myheading')
    User Data
@endsection

@section('mycontent')

<form action="{{route('search')}}" method="POST">
    @csrf
        <div class="input-group text-danger mb-3">
            <input type="text" name="search" id="search" placeholder="Search Users" value="{{ $search }}">
            <button type="submit" class="input-group-text btn btn-info"><i class="fa-solid fa-magnifying-glass text-light"></i></button>
        </div>
</form>

{{-- <form action="{{ route('search') }}" method="Post">
    @csrf
    <input type="text" name="search" placeholder="Search Users" value="{{ $search }}">
    <button type="submit">Search</button>
</form> --}}

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['usertype'] }}</td>
                    <td>{{ $user['created_at'] }}</td>
                    <td>
                        <a href="{{ route('delete_user',['id' => $user->id ])}}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('edit_user',['id' => $user->id ])}}" class="btn btn-info mx-2">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
