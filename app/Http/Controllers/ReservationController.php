<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $reservation = Reservation::all();
        return view('reservation.index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'people' => 'required',
            'name' => 'required',
            'email_address' => 'required',
            'phone_number' => 'required',
        ]);
        Reservation::create($request->all());
        return redirect()->route('reservation.create')->with('status','Reservering is Succesvol geplaatst');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(reservation $reservation)
    {
        return view('reservation.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reservation $reservation)
    {
            $reservation->delete();
            return redirect()->route('reservation.index')->with('status','Reservering is succesvol verwijderd!');
    }
}
