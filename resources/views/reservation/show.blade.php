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
                    <form action="{{route('reservation.destroy', $reservation->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                    </form>
                </table>
            </div>

        </div>
    </section>
@endsection
