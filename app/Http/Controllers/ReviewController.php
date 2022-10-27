<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $review = Review::all();
        return view('review.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->role !== 0) {
                $reservation_count = Reservation::where('email_address', '=', Auth::user()->email)->get()->count();
                if ($reservation_count >= 5) {
                    return view('review.create');
                } else {
                    return redirect()->back()->with('status', 'Voordat u een beoordeling mag plaatsen, moet u 5 reserveringen hebben.');
                }
            } else {
                return view('review.index');
            }
        } else {
            return view('errors.403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'stars' => 'required|numeric',
        ]);
        Review::create($request->all());
        return redirect()->route('review.index')->with('status', 'Beoordeling is Succesvol geplaatst');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Review $review)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 0) {
                $review->delete();
                return redirect()->route('review.index')->with('status', 'Beoordeling is succesvol verwijderd!');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
