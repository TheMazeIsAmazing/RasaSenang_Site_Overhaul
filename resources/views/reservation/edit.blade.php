@extends('layouts.web')
@section('title', 'Reservering nr. '.$reservation->id.' wijzigen')
@section('top_text', 'Reservering Wijzigen')
@section('bottom_text', 'Komt u er niet uit? U kunt ook telefonisch deze wijzigen!')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <form method="post" action="{{route('reservation.update', $reservation->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="date">Datum</label>
                    <input id="date" type="date" name="date" class="form-control" value="{{old('date', date('Y-m-d'))}}">
                    @error('date')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="time">Aanvangstijd</label>
                    <select id="time" type="time" name="time" class="form-control">
                        <option value="17:00" @if(strtotime($reservation->time) == strtotime('16:00'))selected @endif>16:00
                        </option>
                        <option value="16:30" @if(strtotime($reservation->time) == strtotime('16:30'))selected @endif>16:30
                        </option>
                        <option value="17:00" @if(strtotime($reservation->time) == strtotime('17:00'))selected @endif>17:00
                        </option>
                        <option value="17:30" @if(strtotime($reservation->time) == strtotime('17:30'))selected @endif>17:30
                        </option>
                        <option value="18:00" @if(strtotime($reservation->time) == strtotime('18:00'))selected @endif>18:00
                        </option>
                        <option value="18:30" @if(strtotime($reservation->time) == strtotime('18:30'))selected @endif>18:30
                        </option>
                        <option value="19:00" @if(strtotime($reservation->time) == strtotime('19:00'))selected @endif>19:00
                        </option>
                        <option value="19:30" @if(strtotime($reservation->time) == strtotime('19:30'))selected @endif>19:30
                        </option>
                        <option value="20:00" @if(strtotime($reservation->time) == strtotime('20:00'))selected @endif>20:00
                        </option>
                        <option value="20:30" @if(strtotime($reservation->time) == strtotime('20:30'))selected @endif>20:30
                        </option>
                        <option value="21:00" @if(strtotime($reservation->time) == strtotime('21:00'))selected @endif>21:00
                        </option>
                    </select>
                    @error('time')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="people">Aantal Gasten</label>
                    <input id="people" type="number" name="people" class="form-control" value="{{$reservation->people}}">
                    @error('people')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="name">Naam</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{$reservation->name}}">
                    @error('name')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email_address">E-Mailadres</label>
                    <input id="email_address" type="text" name="email_address" class="form-control" value="{{$reservation->email_address}}">
                    @error('email_address')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="phone_number">Telefoonnummer</label>
                    <input id="phone_number" type="text" name="phone_number" class="form-control" value="{{$reservation->phone_number}}">
                    @error('phone_number')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="comments">Opmerkingen</label>
                    <textarea id="comments" name="comments" class="form-control">{{$reservation->comments}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
                </div>
            </form>
        </div>
    </section>
@endsection
