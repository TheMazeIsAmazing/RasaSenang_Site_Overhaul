<?php

namespace App\Http\Controllers;

use App\Models\Dish_Ingredient;
use App\Models\Dishes;
use App\Models\Ingredients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dishes = Dishes::all();
        $dish_ingredient = Dish_Ingredient::all();
        $ingredients = Ingredients::all();
        return view('dishes.index', compact('dishes', 'dish_ingredient', 'ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
//        $ingredients = Ingredients::all();
        return view('dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->file('image')->store('public/images');
        $dish = new Dishes();
        $dish->name = $request->name;
        $dish->description = $request->description;
        if ($request->has('highlighted')) {
            $dish->highlighted = 1;
        } else {
            $dish->highlighted = 0;
        }
        $dish->image = $request->file('image')->hashName();
        $dish->save();

//        $image = Request::file('image_form');
//        $extension = $image->getClientOriginalExtension();
//        Storage::disk('public')->put($image->getFilename().'.'.$extension,  Dishes::get($image));
//        $dish = new Dishes();
        //        dd($request->image_form);
//        $request->validate([
//            'name' => 'required',
//            'description' => 'required',
//            'image_form' => 'required|mimes:jpeg,bmp,png',
//            'highlighted' => 'nullable',
//        ]);
//        if($validates->fails()) {
//            dd($request->image_form);
//        }
//        if ($request->v('image_form')) {
//            dd($request->image_form);
//            $request->file('image')->storePublicly('image', 'public');
//            if ($request->has('highlighted')) {
//                $image = new Dishes([
//                    "name" => $request->get('name'),
//                    "highlighted" => 1,
//                    "description" => $request->get('description'),
//                    "image" => $request->file('image')->hashName(),
//                ]);
//            } else {
//                $image = new Dishes([
//                    "name" => $request->get('name'),
//                    "highlighted" => 0,
//                    "description" => $request->get('description'),
//                    "image" => $request->file('image')->hashName(),
//                ]);
//            }
//            Storage::put('images/', $image);
//            $image->save();
//        }
        return redirect()->route('dish.index')->with('status', 'Gerecht is Succesvol aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\dishes $dish
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(dishes $dish)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 0) {
//                $dish_ingredient = Dish_Ingredient::where('dish_id', '=', $dish->id);
                $dish_ingredient = Dish_Ingredient::all();


                $ingredients = Ingredients::all();
                return view('dishes.show', compact('dish', 'dish_ingredient', 'ingredients'));
            } else {
                return view('errors.403');
            }
        } else {
            return view('errors.403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dishes $dish
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
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
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Dishes $dish
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Dishes $dish)
    {
        $dish->delete();
        return redirect()->route('dish.index')->with('status', 'Gerecht is succesvol verwijderd!');
    }
}
