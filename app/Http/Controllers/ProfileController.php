<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        //making a comparison to see which review button is shown since Compact is stupid and doesn't allow integers
        $reservation_count = Reservation::where('email_address', '=', Auth::user()->email)->get()->count();

        if (Auth::user()->role == 0) {
            $which_review_button = 'superCoolAdmin';
        } elseif ($reservation_count >= 5) {
            $which_review_button = 'biggerThan5';
        } else {
            $which_review_button = 'not5';
        }

        return view('user-menu', compact('which_review_button'));
    }
}
