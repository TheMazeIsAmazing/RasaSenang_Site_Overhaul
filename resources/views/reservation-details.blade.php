@extends('layouts.web')
@section('title', 'Details Reservering nr. ' . $reservation->id)
@section('top_text', 'Details Reservering nr. ' . $reservation->id)
@section('bottom_text', 'Altijd een gedetailleerd overzicht')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            <div>
                <a href="{{route('reservations-page')}}" class="btn btn-success btn-sm">Alle reserveringen</a>
            </div>
            <div>
                <table>
                    <tr>
                        <td>Naam</td>
                        <td>{{ $reservation->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $reservation->email }}</td>
                    </tr>
                    <tr>
                        <td>Datum</td>
                        <td>{{ $reservation->date }}</td>
                    </tr>
                </table>
            </div>

        </div>
    </section>
@endsection
