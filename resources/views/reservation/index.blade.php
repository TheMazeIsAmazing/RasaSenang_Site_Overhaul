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
            <table class="table table-bordered">
                <tr>
                    <th>id</th>
                    <th>Datum</th>
                    <th>Aanvangstijd</th>
                    <th>Aantal Gasten</th>
                    <th>Naam</th>
                    <th></th>
                </tr>
                @foreach ($reservation as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ date('d-m-Y' , strtotime($item->date)) }}</td>
                        <td>{{ date('H:i' , strtotime($item->time)) }}</td>
                        <td>{{ htmlentities($item->people) }}</td>
                        <td>{{ htmlentities($item->name) }}</td>
                        <td>
                            <a href="{{route('reservation.show', ['reservation' => $item->id])}}"
                               class="btn btn-success btn-sm">Details</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
