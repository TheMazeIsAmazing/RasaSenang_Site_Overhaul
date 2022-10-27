@extends('layouts.web')
@section('title', 'Beoordelingen')
@section('top_text', 'Beoordelingen')
@section('bottom_text', 'Geef jij ons ook 5 sterren?')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            @if(count($review))
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Geschreven door:</th>
                        <th>Aantal sterren</th>
                        <th>Titel</th>
                        <th>Beoordeling</th>
                        @if(Auth::check())
                            @if(Auth::user()->role == 0)
                                <th></th>
                            @endif
                        @endif
                    </tr>
                    @foreach ($review as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stars }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            @if(Auth::check())
                                @if(Auth::user()->role == 0)
                            <td>
                                <form data-disable="false" action="{{route('review.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Verwijderen</button>
                                </form>
                            </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </table>
            @else
                <h6 class="alert alert-danger">Oeps, er zijn helaas geen beoordelingen gevonden!</h6>
            @endif

        </div>
    </section>
@endsection
