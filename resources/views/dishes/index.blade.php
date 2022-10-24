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
                                <img src="{{asset('storage/images/'.$item->image)}}" style="height: 100px; width: 200px"
                                     alt="{{$item->name}}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <h3>Alle items</h3>
            @if(Auth::check())
                @if(Auth::user()->role == 0)
                        <a href="{{route('dish.create')}}"
                           class="btn btn-danger btn-sm">Nieuw gerecht</a>
                        <form class="row flex-wrap" method="post"
                              action="{{route('dish.search')}}">
                            @csrf
                            <div class="form-group mb-3 flex">
                                <select name="ingredient" class="form-control">
                                    <option value="">Kies een ingredient
                                    </option>
                                    @foreach($ingredients as $ingredient)
                                        <option value="{{strtolower($ingredient->id)}}">{{strtolower($ingredient->name)}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ingredient')
                                <span class="alert-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="other" placeholder="Typ een naam of beschrijving"
                                       class="form-control"
                                       value="{{old('other')}}">
                                @error('date')
                                <span class="alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Zoeken</button>
                            </div>
                        </form>
                @endif
            @endif
            <table class="table table-bordered">
                <tr>
                    <th></th>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Ingredienten</th>
                    @if(Auth::check())
                        @if(Auth::user()->role == 0)
                            <th></th>
                            <th></th>
                        @endif
                    @endif
                </tr>
                @foreach ($dishes as $item)
                    <tr>
                        <td><img src="{{asset('storage/images/'.$item->image)}}" style="height: 40px; width: 60px"
                                 alt="{{$item->name}}">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <ul>
                                @foreach($item->ingredients as $ingredient)
                                    <li>{{$ingredient->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        @if(Auth::check())
                            @if(Auth::user()->role == 0)
                                <td>
                                    <form class="toggleHighlightForm" action="{{route('dish.toggleHighlight', $item)}}"
                                          method="POST">
                                        @csrf
                                        <label for="{{$item->id}}" style="display: none"></label><input
                                            type="checkbox" id="{{$item->id}}" name="toggleHighlight"
                                            class="toggleHighlight"
                                            @if($item->highlighted == 1) checked @endif>
                                    </form>
                                </td>
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
        let toggleHighlight = document.querySelectorAll('.toggleHighlight')
        for (let toggleHighlightButton of toggleHighlight) {
            toggleHighlightButton.addEventListener('change', toggleHighlightHandler)
        }

        function toggleHighlightHandler(e) {
            e.target.parentElement.submit();
        }
    </script>
@endsection
