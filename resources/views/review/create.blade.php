@extends('layouts.web')
@section('title', 'Een beoordeling schrijven')
@section('top_text', 'Beoordeling Schrijven')
@section('bottom_text', 'Wij streven ernaar om u zo goed mogelijk te helpen!')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <form method="post" action="{{route('review.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Naam</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{old('name')}}">
                    @error('name')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <h6>Hoeveel sterren geef jij ons?</h6>
                <div class="form-group mb-3">
                    <div class="rate">
                        <input type="radio" id="star5" name="stars" value="5"/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="stars" value="4"/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="stars" value="3"/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="stars" value="2"/>
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="stars" value="1"/>
                        <label for="star1" title="text">1 star</label>
                    </div>
                    @error('stars')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <br>
                <br>
                <div class="form-group mb-3">
                    <label for="title">Titel</label>
                    <input id="title" type="text" name="title" class="form-control"
                           value="{{old('title')}}">
                    @error('title')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description">Beoordeling</label>
                    <textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
                    @error('description')
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
