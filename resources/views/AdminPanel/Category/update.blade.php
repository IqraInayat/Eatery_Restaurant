@extends('AdminPanel.main')
@section('myheading')
    Update Category
@endsection

@section('mycontent')
    <form action="{{ route('update_category',['id' => $data->id ])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name..." value="{{ $data->name }}">
            <p class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="discription" class="form-label">Discription</label>
            <input type="text" name="discription" class="form-control" id="discription" placeholder="Enter discription..." value="{{ $data->discription }}">
            <p class="text-danger">
                @error('discription')
                    {{ $message }}
                @enderror
            </p>
        </div>
        
        
        <button type="submit" name="submit" class="btn btn-info">Submit</button>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </form>
@endsection