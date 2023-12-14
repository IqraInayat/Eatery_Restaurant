@extends('AdminPanel.main')
@section('myheading')
    Chef Data
@endsection

@section('mycontent')
<form action="{{route('search')}}" method="POST">
    @csrf
        <div class="input-group text-danger mb-3">
            <input type="text" name="search" id="search" placeholder="Search Chefs" value="{{ $search }}">
            <button type="submit" class="input-group-text btn btn-info"><i class="fa-solid fa-magnifying-glass text-light"></i></button>
        </div>
</form>

{{-- <form action="{{ route('search') }}" method="Post">
    @csrf
    <input type="text" name="search" placeholder="Search Users" value="{{ $search }}">
    <button type="submit">Search</button>
</form> --}}
    <table class="table">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Speciality</th>
                <th>Nationality</th>
                <th>Image</th>
                <th>Created_At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chefs as $chef)
            <tr>
                <td>{{ $chef->id }}</td>
                <td>{{ $chef->name }}</td>
                <td>{{ $chef->speciality }}</td>
                <td>{{ $chef->nationality }}</td>
                <td><img src="{{ asset('./admin/chefimages/' . $chef->image) }}" height="120px" width="120px"></td>
                <td>{{ $chef->created_at }}</td>
                <td>
                    <a href="{{ route('delete_chef',['id' => $chef->id ])}}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('edit_chef',['id' => $chef->id ])}}" class="btn btn-info">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection