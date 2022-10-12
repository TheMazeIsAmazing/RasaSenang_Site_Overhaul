@extends('layouts.web')
@section('title', 'Overzicht Reserveringen')
@section('top_text', 'Overzicht Reserveringen')
@section('bottom_text', 'Altijd een geweldig overzicht')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <table>
                <tr>
                    <th>id</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Datum</th>
                </tr>
                @foreach ($reservation as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email_address }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->date }}</td>
                        <td>
                            <a href="{{route('reservation.show', ['reservation' => $item->id])}}"
                               class="btn btn-success btn-sm">Details</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Wijzigen</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
