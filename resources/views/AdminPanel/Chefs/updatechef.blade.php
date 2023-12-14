
@extends('AdminPanel.main')
@section('myheading')
    Add Chef
@endsection

@section('mycontent')
    <form action="{{ route('update_chef',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name..." value="{{ $data->name }}">
            <p class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Speciality</label>
            <input type="text" name="speciality" class="form-control" id="speciality"  placeholder="Enter Speciality" value="{{ $data->speciality }}">
            <p class="text-danger">
                @error('speciality')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="Enter nationality..." value="{{ $data->nationality}}">
            <p class="text-danger">
                @error('nationality')
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

