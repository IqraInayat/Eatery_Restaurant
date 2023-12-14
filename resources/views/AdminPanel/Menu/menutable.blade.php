@extends('AdminPanel.main')
@section('myheading')
    Menu Table
@endsection
@section('mycontent')

<form action="{{route('search')}}" method="POST">
    @csrf
        <div class="input-group text-danger mb-3">
            <input type="text" name="search" id="search" placeholder="Search Menu" value="{{ $search }}">
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
                <th>Dish Name</th>
                <th>Chef Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $ourmenu)
                <tr>
                    <td>{{ $ourmenu->id }}</td>
                    <td>{{ $ourmenu->name }}</td>
                    <td>{{  App\Models\Chef::find($ourmenu->chef)->name }}</td>
                    <td>{{ $ourmenu->price }}</td>
                    <td>{{ App\Models\Category::find($ourmenu->category)->name }}</td>
                    <td><img src="{{ asset('./admin/images/' . $ourmenu->image) }}" alt="User Image" height="120px" height="120px"></td>
                    <td>
                        <a href="{{ route('delete_menu',['id' => $ourmenu->id])}}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('edit_menu',['id' => $ourmenu->id])}}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection