@extends('AdminPanel.main')
@section('myheading')
    Reservation Data
@endsection
@section('mycontent')
<form action="{{route('search')}}" method="POST">
    @csrf
        <div class="input-group text-danger mb-3">
            <input type="text" name="search" id="search" placeholder="Search Reservations" value="{{ $search }}">
            <button type="submit" class="input-group-text btn btn-info"><i class="fa-solid fa-magnifying-glass text-light"></i></button>
        </div>
</form>

{{-- <form action="{{ route('search') }}" method="Post">
    @csrf
    <input type="text" name="search" placeholder="Search Users" value="{{ $search }}">
    <button type="submit">Search</button>
</form> --}}
    <table class="table table-hover my-0">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Guests</th> 
                <th>Reservation Time</th> 
                <th>Reserved By</th>
                <th>Message</th>
                {{-- <th>Created At</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $reservation )
            <tr>
                <td>{{ $reservation->id}}</td>
                <td>{{ $reservation->name}}</td>
                <td>{{ $reservation->email}}</td>
                <td>{{ $reservation->contact}}</td>
                <td>{{ $reservation->no_of_guest}}</td>
                <td>{{ $reservation->reservation_time}}</td>
                <td>{{ $reservation->reserved_by}}</td>
                <td>{{ $reservation->message}}</td>
                {{-- <td>{{ $reservation->created_at}}</td> --}}
                <td>
                    <a href="{{ route('temp_delete',['id' => $reservation->id]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    <a href="{{ route('edit_reservation',['id' => $reservation->id ]) }}" class="btn btn-info"><i class="far fa-pen-to-square"></i></a>
                    <a href="{{ route('complete_reservation',['id' => $reservation->id ]) }}" class="btn btn-success"><i class="fas fa-check"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection