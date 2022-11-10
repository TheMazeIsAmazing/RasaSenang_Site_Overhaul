@extends('layouts.web')
@section('title', 'Welkom op onze site')
@if(Auth::user()->role == 0)
    @section('top_text', 'Welkom Admin.')
@else
    @section('top_text', 'Welkom Gebruiker.')
@endif
@section('top_text', 'Welkom Gebruiker.')
@section('bottom_text', 'Wat wilt u vandaag doen?')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a class="btn btn-primary" href={{route('reservation.index')}}>
                            Overzicht reserveringen
                        </a>

                            <a class="btn btn-primary" href={{route('dish.index')}}>
                                Overzicht gerechten
                            </a>
                            @if ($which_review_button == 'biggerThan5')
                                <a class="btn btn-primary" href={{route('review.create')}}>
                                    Beoordeling Schrijven
                                </a>
                            @elseif($which_review_button == 'superCoolAdmin')
                                <a class="btn btn-primary" href={{route('review.index')}}>
                                    Beoordelingen
                                </a>
                            @else
                                <a class="btn btn-dark" href={{route('review.create')}}>
                                    Beoordeling Schrijven
                                </a>
                            @endif
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Uitloggen') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
