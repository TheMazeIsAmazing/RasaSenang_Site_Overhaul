<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Ingredients;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $dishes = Dishes::all();
        $ingredients = Ingredients::all();
        return view('dishes.index', compact('dishes', 'ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dishes.create');
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
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|size:10000|mimes:jpeg,bmp,png',
        ]);
        $request->file('image')->store('public/images');
        $dish = new Dishes();
        $dish->name = $request->input('name');
        $dish->description = $request->input('description');
        if ($request->has('highlighted')) {
            $dish->highlighted = 1;
        } else {
            $dish->highlighted = 0;
        }
        $dish->image = $request->file('image')->hashName();
        $dish->save();

        return redirect()->route('dish.index')->with('status', 'Gerecht is Succesvol aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param Dishes $dish
     * @return Application|Factory|View
     */
    public function show(dishes $dish)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 0) {
                $ingredients = Ingredients::all();
                return view('dishes.show', compact('dish', 'ingredients'));
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
     * @param Dishes $dish
     * @return Application|Factory|View
     */
    public function edit(Dishes $dish)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 0) {
                return view('dishes.edit', compact('dish'));
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
     * @param Dishes $dish
     * @return RedirectResponse
     */
    public function update(Request $request, Dishes $dish)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|size:10000|mimes:jpeg,bmp,png',
        ]);
        $dish->name = $request->input('name');
        $dish->description = $request->input('description');
        if ($request->has('highlighted')) {
            $dish->highlighted = 1;
        } else {
            $dish->highlighted = 0;
        }
        if ($request->has('image')) {
            $request->file('image')->store('public/images');
            $dish->image = $request->file('image')->hashName();
        }
        $dish->save();

        return redirect()->route('dish.index')->with('status', 'Gerecht is Succesvol Gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dishes $dish
     * @return RedirectResponse
     */
    public function destroy(Dishes $dish)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 0) {
                $dish->delete();
                return redirect()->route('dish.index')->with('status', 'Gerecht is succesvol verwijderd!');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Dishes $dish
     * @return RedirectResponse
     */
    public function toggleHighlight(Request $request, Dishes $dish)
    {
        $request->validate([
            'toggleHighlight' => 'nullable',
        ]);
        if ($request->has('toggleHighlight')) {
            $dish->highlighted = 1;
            $dish->save();
            return redirect()->route('dish.index')->with('status', 'Gerecht is succesvol gehighlight!');
        } else {
            $dish->highlighted = 0;
            $dish->save();
            return redirect()->route('dish.index')->with('status', 'Gerecht is succesvol ongehighlight!');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        if (isset($request->ingredient)) {
            if (isset($request->other)) {
                $dishes = Dishes::whereHas('ingredients', function ($query) use ($request) {
                    $query->where('ingredient_id', '=', $request->input('ingredient'));
                })->where('name', 'like', '%' . $request->other . '%')->orWhereHas('ingredients', function ($query) use ($request) {
                    $query->where('ingredient_id', '=', $request->input('ingredient'));
                })->where('description', 'like', '%' . $request->other . '%')->get();
            } else {
                $dishes = Dishes::whereHas('ingredients', function ($query) use ($request) {
                    $query->where('ingredient_id', '=', $request->input('ingredient'));
                })->get();
            }
        } elseif (isset($request->other)) {
            $dishes = Dishes::where('name', 'like', '%' . $request->other . '%')->orWhere('description', 'like', '%' . $request->other . '%')->get();
        } else {
            $dishes = Dishes::all();
        }
        $ingredients = Ingredients::all();
        return view('dishes.index', compact('dishes', 'ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dishes $dish
     * @return Application|Factory|View
     */
    public function edit_ingredients(Dishes $dish)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 0) {
                $ingredients = Ingredients::all();
                return view('dishes.edit_ingredients', compact('dish', 'ingredients'));
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
     * @param Dishes $dish
     * @return RedirectResponse
     */
    public function store_ingredients(Request $request, Dishes $dish)
    {
        $ingredient_attach_array = [];
        $ingredient_remove_array = [];
        $ingredients = Ingredients::all();
        foreach ($ingredients as $ingredient) {
            if ($request->has($ingredient->id)) {
                $dish_pull_count = Dishes::whereHas('ingredients', function ($query) use ($ingredient) {
                    $query->where('ingredient_id', '=', $ingredient->id);
                })->where('id', '=', $dish->id)->count();
                if ($dish_pull_count == '0') {
                    $ingredient_attach_array[] = $ingredient->id;
                }
            } else {
                $dish_pull_count = Dishes::whereHas('ingredients', function ($query) use ($ingredient) {
                    $query->where('ingredient_id', '=', $ingredient->id);
                })->where('id', '=', $dish->id);
                if ($dish_pull_count >= '1') {
                    $ingredient_remove_array[] = $ingredient->id;
                }
            }
        }

        $ingredient = Ingredients::find($ingredient_attach_array);
        $dish->ingredients()->attach($ingredient);
        $ingredient = Ingredients::find($ingredient_remove_array);
        $dish->ingredients()->detach($ingredient);

        return redirect()->route('dish.show', $dish)->with('status', 'Ingrediënten zijn succesvol aangepast!');
    }
}
