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

                <form method="post"
                      class="row flex-wrap"
                      action="{{route('reservation.search')}}">
                    @csrf
                    <div class="form-group mb-3 flex">
                        <select id="date_or_other" name="date_or_other" class="form-control">
                            <option value="time" @if(session('value_date_or_other') == 'time')selected @endif>Datum
                            </option>
                            <option value="other" @if(session('value_date_or_other') == 'other')selected @endif>Nummer, E-mail, Telefoonnummer en meer
                            </option>
                        </select>
                        @error('time_or_other')
                        <span class="alert-danger"> {{$message}}</span>
                        @enderror
                    </div>
                    <div id="hidden_if_date_is_selected" class="form-group mb-3">
                        <input id="other" type="text" name="other" placeholder="Typ hier" class="form-control" @if(session('value_other'))value="{{session('value_other')}}" @endif>
                        @error('other')
                        <span class="alert-danger"> {{$message}}</span>
                        @enderror
                    </div>
                    <div id="hidden_if_other_is_selected" class="form-group mb-3">
                        <input id="date" type="date" name="date" class="form-control" value="{{old('date', date('Y-m-d'))}}">
                        @error('date')
                        <span class="alert-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Zoeken</button>
                    </div>
                </form>
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
                        <td>{{ $item->people }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{route('reservation.show', ['reservation' => $item->id])}}"
                               class="btn btn-success btn-sm">Details</a>
                        </td>
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
