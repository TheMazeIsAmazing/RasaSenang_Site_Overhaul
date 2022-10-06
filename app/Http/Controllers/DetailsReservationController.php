<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class DetailsReservationController extends Controller
{
    public function index(Request $request){
        if (Auth::check()) {
            $reservation = Reservation::find($request->get('id'));;
            return view('reservation-details', compact('reservation'));
        } else {
            return view('errors.404');
        }
    }
}
