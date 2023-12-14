<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    
    public function store(Request $request)
    {

        if (Auth::user()) {

            $useremail = Auth::user()->email;

            $request->validate([
                "name" => "required",
                "email" => "required",
                "nog" => "required",
                "reserve_time" => "required",
                "contact_number" => "required",
                "message" => "required",
            ]);

               $reservation = new Reservation();
               $reservation->name           = $request->name;
               $reservation->reserved_by    =  $useremail;
               $reservation->email          = $request->email;
               $reservation->contact        = $request->contact_number;
               $reservation->reservation_time  = $request->reserve_time;
               $reservation->no_of_guest  = $request->nog;
               $reservation->message         = $request->message;
               $reservation->save();
               return redirect()->back()->with('success' ,'Reservation submitted successfully');
        } 
        else 
        {
           
            return redirect()->route('login');
        }
    }

    public function reserved_reservations_table(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) 
        {
            $reserved = Reservation::where('name', 'LIKE', "%$search%")->get();
            return view("AdminPanel.Reservation.table", ['data' => $reserved,"search" =>  $search]);
        } 
        else 
        {
            $reserved = Reservation::where('reservation_status','reserved')->get();
            return view("AdminPanel.Reservation.table", ['data' => $reserved,"search" =>  $search]);
        }
    }

    
    public function completed_reservations(string $id)
    {
        $reservation = Reservation::find($id);
        if($reservation)
        {
            $reservation->reservation_status='Done';
            $reservation->save();
            return redirect()->route('complete_reservation_table')->with('success','Done Reservation');
        }   
    }
    
    public function completed_reservations_table(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) 
        {
            $completed_reservations = Reservation::where('name', 'LIKE', "%$search%")->get();
            return view("AdminPanel.Reservation.table", ['data' => $completed_reservations,"search" =>  $search]);
        } 
        else 
        {
            $completed_reservations = Reservation::where('reservation_status','Done')->get();
            return view("AdminPanel.Reservation.table", ['data' => $completed_reservations,"search" =>  $search]);
        }
    }

    
    public function edit(string $id)
    {
        $reservation = Reservation::find($id);
        return view('AdminPanel.Reservation.update',['data' => $reservation]);
    }

    public function update(Request $request, string $id)
    {
        $useremail = Auth::user()->email;
        $this->validate($request,[
            "name" => "required",
            "email" => "required",
            "nog" => "required",
            "reserve_time" => "required",
            "contact_number" => "required",
            "message" => "required",
        ]);
        $reservation = Reservation::find($id);
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->reserved_by    =  $useremail;
        $reservation->contact        = $request->contact_number;
        $reservation->reservation_time  = $request->reserve_time;
        $reservation->no_of_guest  = $request->nog;
        $reservation->message         = $request->message;
        $reservation->save();
        return redirect()->route('reserve_data')->with('success' ,'Reservation Updated successfully');

    }

    public function temporary_delete(string $id)
    {
        $temp = Reservation::find($id);
        if(!is_null($temp))
        {
            $temp->delete();
        }
        return redirect()->back()->with('Moved to Recycle Bin');

    }

    public function Trash()
    {
        $trash = Reservation::onlyTrashed()->get();
        return view('AdminPanel.Reservation.trash',['data'=> $trash]);
    }

    public function forceDelete(string $id)
    {
        $data = Reservation::withTrashed()->find($id);
        if(!is_null($data))
        {
            $data->forceDelete();
        }
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function restore(string $id)
    {
        $data = Reservation::withTrashed()->find($id);
        if(!is_null($data))
        {
            $data->restore();
        }
        return redirect()->back()->with('success','Restored Successfully');
    }
}
