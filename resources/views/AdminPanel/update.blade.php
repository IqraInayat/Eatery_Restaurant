
@extends('AdminPanel.main')
@section('myheading')
    Update User Data
@endsection

@section('mycontent')
    <form action="{{ route('update_user',['id' => $user->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name..." value="{{ $user->name }}">
            <p class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email..." value="{{ $user->email }}">
            <p class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter Password" >
            <p class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="cpassword" aria-describedby="emailHelp" placeholder="Confirm Password" >
            <p class="text-danger">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </p>
        </div>
        
        
        <button type="submit" name="submit" class="btn btn-info">Submit</button>
  </form>
@endsection

{{-- When you use @section in a view and @yield in a layout, you're essentially saying "the content of this section in the view should be placed in this location in the layout." --}}