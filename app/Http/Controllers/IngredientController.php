<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        if(Auth::check()) {
            if(Auth::user()->role == 0){
                $ingredients = Ingredients::all();
                return view('ingredients.index', compact('ingredients'));
            } else {
                return view('errors.401');

            }
        } else {
            return view('errors.403');

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $ingredient = new Ingredients();
        $ingredient->name = $request->input('name');
        $ingredient->save();
        return redirect()->route('ingredient.index')->with('status', 'Ingredient is Succesvol aangemaakt');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Ingredients $ingredient
     * @return Application|Factory|View
     */
    public function edit(Ingredients $ingredient)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 0) {
                return view('ingredients.edit', compact('ingredient'));
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
     * @param Request $request
     * @param Ingredients $ingredient
     * @return RedirectResponse
     */
    public function update(Request $request, Ingredients $ingredient)
    {
        $request->validate([
            'name' => 'required|max:255',

        ]);
        $ingredient->name = $request->input('name');
        $ingredient->save();

        return redirect()->route('ingredient.index')->with('status', 'Ingredient is Succesvol gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ingredients $ingredient
     * @return RedirectResponse
     */
    public function destroy(Ingredients $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredient.index')->with('status', 'Ingredient is succesvol verwijderd!');
    }
}
