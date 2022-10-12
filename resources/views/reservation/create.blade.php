@extends('layouts.web')
@section('title', 'Nieuwe reservering')
@section('top_text', 'Reserveren')
@section('bottom_text', 'U kunt ook telefonisch reserveren!')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <form method="post" action="{{route('reservation.store')}}">
                @csrf
                {{--                $reservation->date = $request->input('date');--}}
                {{--                $reservation->time = $request->input('time');--}}
                {{--                $reservation->people = $request->input('people');--}}
                {{--                $reservation->email_address = $request->input('email_address');--}}
                {{--                $reservation->phone_number = $request->input('phone_number');--}}
                {{--                $reservation->comments = $request->input('comments');--}}
                {{--                $reservation->save();--}}
                <div class="form-group mb-3">
                    <label for="date">Datum</label>
                    <input id="date" type="date" name="date" class="form-control">
                    @error('date')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="time">Aanvangstijd</label>
                    <input id="time" type="time" name="time" class="form-control">
                    @error('time')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="people">Aantal Gasten</label>
                    <input id="people" type="number" name="people" class="form-control" value="{{old('people')}}">
                    @error('people')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="name">Naam</label>
                    <input id="name" type="text" name="name" class="form-control">
                    @error('name')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email_address">E-Mailadres</label>
                    <input id="email_address" type="text" name="email_address" class="form-control">
                    @error('email_address')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="phone_number">Telefoonnummer</label>
                    <input id="phone_number" type="text" name="phone_number" class="form-control">
                    @error('phone_number')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="comments">Opmerkingen</label>
                    <textarea id="comments" name="comments" class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
                </div>
            </form>
        </div>
    </section>
@endsection
