@extends('layouts.web')
@section('title', 'Details Reservering nr. ' . $reservation->id)
@section('top_text', 'Details Reservering nr. ' . $reservation->id)
@section('bottom_text', 'Altijd een gedetailleerd overzicht')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            <div>
                <a href="{{route('reservation.index')}}" class="btn btn-success btn-sm">Alle reserveringen</a>
            </div>
            <div>
                <table class="table table-bordered">
                    <tr>
                        <td>Datum</td>
                        <td>{{ date('d-m-Y' , strtotime($reservation->date)) }}</td>
                    </tr>
                    <tr>
                        <td>Aanvangstijd</td>
                        <td>{{ date('H:i' , strtotime($reservation->time)) }}</td>
                    </tr>
                    <tr>
                        <td>Aantal Gasten</td>
                        <td>{{ $reservation->people }}</td>
                    </tr>
                    <tr>
                        <td>Naam</td>
                        <td>{{ $reservation->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $reservation->email_address }}</td>
                    </tr>
                    <tr>
                        <td>Telefoonnummer</td>
                        <td>{{ $reservation->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Opmerkingen</td>
                        <td>{{ $reservation->comments }}</td>
                    </tr>
                    <tr>
                        <td>Geplaatst op:</td>
                        <td>{{ date('d-m-Y; H:i:s' , strtotime($reservation->created_at)) }}</td>
                    </tr>
                    <tr>
                        <td>Gewijzigd op:</td>
                        <td>{{ date('d-m-Y; H:i:s' , strtotime($reservation->updated_at)) }}</td>
                    </tr>
                </table>
                <div class="row">
                    <form action="{{route('reservation.destroy', $reservation->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                    </form>

                    <a class="btn btn-success btn-sm" type="submit" href="{{route('reservation.edit', $reservation->id)}}">Wijzigen</a>
                </div>
            </div>

        </div>
    </section>
@endsection
