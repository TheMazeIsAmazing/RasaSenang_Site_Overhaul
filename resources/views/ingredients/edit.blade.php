@extends('layouts.web')
@section('title', 'Ingredient nr. '.$ingredient->id.' wijzigen')
@section('top_text', 'Ingredient nr. '.$ingredient->id.' wijzigen')
@section('bottom_text', 'Oepsie, poepsie')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
                <h6 class="alert alert-danger">Let op: gebruik dit alleen bij het corrigeren van spellingsfouten, verander bijvoorbeeld 'kip' niet naar 'rund'.</h6>
            <form method="post" action="{{route('ingredient.update', $ingredient->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Naam</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{$ingredient->name}}">
                    @error('name')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
                </div>
            </form>
        </div>
    </section>
@endsection
