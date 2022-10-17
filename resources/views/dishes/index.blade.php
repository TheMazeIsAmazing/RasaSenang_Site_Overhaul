@extends('layouts.web')
@section('title', 'Onze Menukaart')
@section('top_text', 'Menukaart')
@section('bottom_text', 'Welke is jouw favoriet?')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="container-fluid bg-dark text-white rounded-1">
                <h3>Onze highlights</h3>
                <div class="row">
                    @foreach ($dishes as $item)
                        @if($item->highlighted == 1)
                            <div class="container-sm">
                                <h4>{{$item->name}}</h4>
                                <h6>{{$item->description}}</h6>
                                <img src="{{asset($item->image)}}" style="max-height: 100px" alt="{{$item->name}}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
                <h3>Alle items</h3>
            <table class="table table-bordered">
                <tr>
                    <th></th>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Ingredienten</th>
                    @if(Auth::check())
                        @if(Auth::user()->role == 0)
                            <th></th>
                        @endif
                    @endif
                </tr>
                @foreach ($dishes as $item)
                    <tr>
                        <td><img src="{{asset($item->image)}}" style="height: 40px; width: 60px" alt="{{$item->name}}">
                        </td>
                        <td>{{ html_entity_decode($item->name) }}</td>
                        <td>{{ htmlentities($item->description) }}</td>
                        <td>allemaal ingredienten</td>
                        @if(Auth::check())
                            @if(Auth::user()->role == 0)
                                <td>
                                    <a href="{{route('dish.show', ['dish' => $item->id])}}"
                                       class="btn btn-success btn-sm">Details</a>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
    <script>
        window.addEventListener('load', init)
        let dateOrOther = document.getElementById('date_or_other')
        let hiddenIfDateIsSelected = document.getElementById('hidden_if_date_is_selected');
        let hiddenIfOtherIsSelected = document.getElementById('hidden_if_other_is_selected');
        dateOrOther.addEventListener('change', toggleHandlerDateOrOther)


        function init() {
            toggleHandlerDateOrOther()
        }

        function toggleHandlerDateOrOther() {
            let currentItem = dateOrOther.selectedIndex
            if (currentItem === 0) {
                hiddenIfDateIsSelected.style.display = 'none'
                hiddenIfOtherIsSelected.style.display = 'block'
            } else if (currentItem === 1) {
                hiddenIfDateIsSelected.style.display = 'block'
                hiddenIfOtherIsSelected.style.display = 'none'
            }
        }


    </script>
@endsection
