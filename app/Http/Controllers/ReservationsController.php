<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationsController
{
    public function destroy($id)
    {
        if (Auth::check()) {
            if (Reservation::find($id) && $id !== '') {
                $reservation = Reservation::find($id);
                $reservation->delete();
                return redirect()->back()->with('status','Reservering is succesvol verwijderd!');
            } else {
                return view('errors.404');
            }
        } else {
            return view('errors.404');
        }
    }

    public function create()
    {
        return view('reservation-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|date_format:dd-mm-yyyy|after:today',
            'time' => 'required|time|between:16:00,21:30|',
            'people' => 'required|numeric|max_digits:3',
            'name' => 'required|max:255',
            'email_address' => 'required|max:255|email',
            'phone_number' => 'required|max:18',
            'comments' => 'nullable|max:10000',
        ]);
//        $reservation = new Reservation();
//        $reservation->date = $request->input('date');
//        $reservation->time = $request->input('time');
//        $reservation->people = $request->input('people');
//        $reservation->email_address = $request->input('email_address');
//        $reservation->phone_number = $request->input('phone_number');
//        $reservation->comments = $request->input('comments');
//        $reservation->save();
        Reservation::create($request->all());
//        return redirect()->back()->with('status','Reservering is Succesvol geplaatst');
    }


    public function index(){
        if (Auth::check()) {
            $reservation = Reservation::all();
            return view('reservations', compact('reservation'));
        } else {
            return view('errors.404');
        }
    }
}
