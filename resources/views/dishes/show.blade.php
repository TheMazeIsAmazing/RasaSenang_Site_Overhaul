@extends('layouts.web')
@section('title', 'Details Gerecht nr. ' . $dish->id)
@section('top_text', 'Details Gerecht nr. ' . $dish->id)
@section('bottom_text', 'Altijd een gedetailleerd overzicht')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            <div>
                <a href="{{route('dish.index')}}" class="btn btn-success btn-sm">Alle gerechten</a>
            </div>
            <div>
                <table class="table table-bordered">
                    <tr>
                        <td>Naam</td>
                        <td>{{ $dish->name }}</td>
                    </tr>
                    <tr>
                        <td>Beschrijving</td>
                        <td>{{ $dish->description }}</td>
                    </tr>
                    <tr>
                        <td>Ingredienten</td>
                        <td>                          @foreach($dish_ingredient as $ingredient)
                                @if($ingredient->dish_id !== null && $ingredient->ingredient_id !== null)
                                    @if($ingredient->dish_id == $dish->id)
                                        <li>{{$ingredients[$ingredient->ingredient_id - 1]->name}}</li>
                                    @endif
                                @endif
                            @endforeach</td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td><img src="{{asset('storage/images/'.$dish->image)}}" style="height: 200px; width: 300px"
                                 alt="{{$dish->name}}"></td>
                    </tr>
                </table>
                <div class="row">
                    <form data-disable="false" action="{{route('dish.destroy', $dish->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                    </form>

                    {{--                    <a class="btn btn-success btn-sm" type="submit" href="{{route('dish.edit', $dish->id)}}">Wijzigen</a>--}}
                    {{--                </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection