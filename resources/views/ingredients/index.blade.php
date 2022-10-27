@extends('layouts.web')
@section('title', 'Alle Ingrediënten')
@section('top_text', 'Alle Ingrediënten')
@section('bottom_text', 'Wat vind jij lekker in een gerecht?')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
                <form class="row" method="post" action="{{route('ingredient.store')}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nieuw Ingredient</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Typ de naam">
                        @error('name')
                        <span class="alert-danger"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
                    </div>
                </form>
            <table class="table table-bordered">
                <tr>
                    <th>Naam</th>
                    <th></th>
                </tr>
                @foreach ($ingredients as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form data-disable="false" action="{{route('ingredient.destroy', $item->id)}}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-success btn-sm" type="submit"
                               href="{{route('ingredient.edit', $item->id)}}">Wijzigen</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
