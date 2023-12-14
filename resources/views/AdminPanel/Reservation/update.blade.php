@extends('AdminPanel.main')
@section('myheading')
    Update Reservation
@endsection

@section('mycontent')
<form action="{{ route('update_reservation',['id' => $data->id ])}}" method="post">
    @csrf
    <div class="mb-3">
         <input type="text" class="form-control" id="cf-name" name="name"
             placeholder="Full name" value="{{ $data->name }}">
             <p class="text-danger">
                   @error('name')
                        {{$message}}
                   @enderror
             </p>
     </div>

     <div class="mb-3">
         <input type="email" class="form-control" id="cf-email" name="email"
             placeholder="Email address" value="{{ $data->email }}">
             <p class="text-danger">
              @error('email')
                   {{$message}}
              @enderror
        </p>
     </div>
     <div class="mb-3">
         <input type="datetime-local" class="form-control"  name="reserve_time">
         <p class="text-danger" value="{{ $data->reserve_time  }}">
              @error('reserve_time')
                   {{$message}}
              @enderror
        </p>
     </div>
     <div class="mb-3">
         <input type="number" class="form-control" id="cf-name" name="nog"
             placeholder="Number of Guests" value="{{ $data->nog }}">
             <p class="text-danger">
              @error('nog')
                   {{$message}}
              @enderror
        </p>
     </div>
     <div class="mb-3">
         <input type="number" class="form-control" id="cf-name" name="contact_number"
             placeholder="Enter Your Contact number" value="{{ $data->contact_number }}">
             <p class="text-danger">
              @error('contact_number')
                   {{$message}}
              @enderror
        </p>
     </div>
     <div class="mb-3">
        
         <textarea class="form-control" rows="6" id="cf-message" name="message" placeholder="Write Special requirement">{{ $data->message }}</textarea>
       
     </div>
         <button type="submit" class="form-control btn btn-info" id="cf-submit" name="submit">Update Reservation</button>
</form>
@endsection