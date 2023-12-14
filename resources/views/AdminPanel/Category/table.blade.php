@extends('AdminPanel.main')
@section('myheading')
    Categories 
@endsection

@section('mycontent')
<form action="{{route('search')}}" method="POST">
    @csrf
        <div class="input-group text-danger mb-3">
            <input type="text" name="search" id="search" placeholder="Search Categories" value="{{ $search }}">
            <button type="submit" class="input-group-text btn btn-info"><i class="fa-solid fa-magnifying-glass text-light"></i></button>
        </div>
</form>
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
                <th>Discription</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $show_category)
                <tr>
                    <td>{{ $show_category->id }}</td>
                    <td>{{ $show_category->name }}</td>
                    <td>{{ $show_category->discription }}</td>
                    <td>{{ $show_category->created_at }}</td>
                    <td>
                        <a href="{{ route('delete_category',['id' => $show_category->id ])}}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('edit_category',['id' => $show_category->id ])}}" class="btn btn-info mx-2">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
