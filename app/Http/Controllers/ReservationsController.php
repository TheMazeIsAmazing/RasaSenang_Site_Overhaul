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

    public function index(){
        if (Auth::check()) {
            $reservation = Reservation::all();
            return view('reservations', compact('reservation'));
        } else {
            return view('errors.404');
        }
    }
}
