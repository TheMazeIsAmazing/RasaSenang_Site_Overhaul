<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role !== 0) {
                $reservation = Reservation::where('email_address', '=', Auth::user()->email)->get()->sortBy('date');
            } else {
                $reservation = Reservation::all()->sortBy('date');
            }

            return view('reservation.index', compact('reservation'));
        } else {
            return view('errors.403');
        }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after:today',
            'time' => 'required',
            'people' => 'required|numeric|max_digits:3',
            'name' => 'required|max:255',
            'email_address' => 'required|max:255|email',
            'phone_number' => 'required|max:18',
            'comments' => 'nullable|max:10000',
        ]);
        Reservation::create($request->all());
        return redirect()->route('reservation.create')->with('status', 'Reservering is Succesvol geplaatst');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\reservation $reservation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(reservation $reservation)
    {
        if (Auth::check()) {
            if ($reservation->email_address == Auth::user()->email || Auth::user()->role == 0) {
                return view('reservation.show', compact('reservation'));
            } else {
                return view('errors.401');
            }
        } else {
            return view('errors.403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\reservation $reservation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(reservation $reservation)
    {
        if (Auth::check()) {
            if ($reservation->email_address == Auth::user()->email || Auth::user()->role == 0) {
                return view('reservation.edit', compact('reservation'));
            } else {
                return view('errors.401');
            }
        } else {
            return view('errors.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\reservation $reservation
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, reservation $reservation)
    {
        if (Auth::check()) {
            $request->validate([
                'date' => 'required|date|after:today',
                'time' => 'required',
                'people' => 'required|numeric|max_digits:3',
                'name' => 'required|max:255',
                'email_address' => 'required|max:255|email',
                'phone_number' => 'required|max:18',
                'comments' => 'nullable|max:10000',
            ]);
            $reservation->date = $request->input('date');
            $reservation->time = $request->input('time');
            $reservation->people = $request->input('people');
            $reservation->name = $request->input('name');
            $reservation->email_address = $request->input('email_address');
            $reservation->phone_number = $request->input('phone_number');
            $reservation->comments = $request->input('comments');
            $reservation->update();
            return redirect()->route('reservation.index')->with('status', 'Reservering is succesvol gewijzigd!');
        } else {
            return view('errors.403');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\reservation $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reservation $reservation)
    {
        if (Auth::check()) {
            if ($reservation->email_address == Auth::user()->email || Auth::user()->role == 0) {
                $reservation->delete();
                return redirect()->route('reservation.index')->with('status', 'Reservering is succesvol verwijderd!');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        if (Auth::check()) {
            if ($request->date_or_other == 'time') {
                $reservation = Reservation::where('date', '=', $request->date)->get();
                if (count($reservation) >= 1) {
                    return view('reservation.index', compact('reservation'));
                } else {
                    $reservation = Reservation::all();
                    return view('reservation.index', compact('reservation'))->with('status', 'Met huidige zoekopdracht hebben we niets gevonden, we laten alle reserveringen zien');
                }
            } else {
                $reservation = Reservation::where('name', 'like', '%' . $request->other . '%')
                    ->orWhere('people', 'like', '%' . $request->other . '%')
                    ->orWhere('id', 'like', '%' . $request->other . '%')
                    ->orWhere('email_address', 'like', '%' . $request->other . '%')
                    ->orWhere('phone_number', 'like', '%' . $request->other . '%')
                    ->get();
                if (count($reservation) >= 1) {
                    return view('reservation.index', compact('reservation'));
                } else {
                    $reservation = Reservation::all();
                    return view('reservation.index', compact('reservation'))->with('status', 'Met huidige zoekopdracht hebben we niets gevonden, we laten alle reserveringen zien');
                }
            }
        } else {
            return view('errors.403');
        }
    }
}
