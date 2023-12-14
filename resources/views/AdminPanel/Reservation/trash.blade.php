@extends('AdminPanel.main')
@section('myheading')
    Trash Data
@endsection
@section('mycontent')
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
                    <a href="{{ route('delete_reservation',['id' => $reservation->id ]) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('restore_reservation',['id' => $reservation->id ]) }}" class="btn btn-success">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection