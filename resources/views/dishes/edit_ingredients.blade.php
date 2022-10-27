@extends('layouts.web')
@section('title', 'Ingredienten toevoegen/verwijderen gerecht')
@section('top_text', 'Ingredienten toevoegen aan/verwijderen van '.$dish->name)
@section('bottom_text', 'Lekker, nu met kip!')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            <form method="post" action="{{route('dish.store_ingredients', $dish->id)}}">
                @csrf
                @foreach($ingredients as $ingredient)
                    <div class="form-group mb-3">
                        <label for="{{strtolower($ingredient->name)}}">{{$ingredient->name}}</label>
                        <input
                            type="checkbox" id="{{strtolower($ingredient->name)}}}"
                            name="{{strtolower($ingredient->id)}}" @foreach($dish->ingredients as $dish_ingredient)
                                @if($dish_ingredient->name == $ingredient->name) checked @endif
                            @endforeach>
                    </div>
                @endforeach
                <div class="form-group mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
                </div>
            </form>
        </div>
    </section>
@endsection
