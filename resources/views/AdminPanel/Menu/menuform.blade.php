@extends('AdminPanel.main')
@section('myheading')
    Add Menu
@endsection

@section('mycontent')
    <form action="{{ route('add_menu')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Dish Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name..." value="{{ old('name') }}">
            <p class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="chef" class="form-label">Chef Name</label>
            <select name="chef" id="chef" class="form-control">
                <option class="drop-down">Select Chef</option>
                @foreach($chef as  $chef)
                    <option value="{{ $chef->id }}">{{ $chef->name }}</option>
                @endforeach
            </select>
            <p class="text-danger">
                @error('chef')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Enter Price...">
            <p class="text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control">
                <option class="drop-down">Select Category</option>
                @foreach($category as  $select_category)
                    <option value="{{ $select_category->id }}">{{ $select_category->name }}</option>
                @endforeach
            </select>
            <p class="text-danger">
                @error('category')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Select Image</label>
            <input type="file" name="image" class="form-control" id="image">
            <p class="text-danger">
                @error('image')
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