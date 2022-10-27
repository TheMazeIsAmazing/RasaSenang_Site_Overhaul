@extends('layouts.web')
@section('title', 'Gerecht nr. '.$dish->id.' wijzigen')
@section('top_text', 'Gerecht wijzigen')
@section('bottom_text', 'Ik heb nu al trek!')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <form method="post" action="{{route('dish.update', $dish->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Naam</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{$dish->name}}">
                    @error('name')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description">Beschrijving</label>
                    <textarea id="description" name="description" class="form-control">{{$dish->description}}</textarea>
                    @error('description')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image">Foto</label>
                    <h6 class="alert alert-danger">Laat dit veld leeg als u het huidige plaatje wilt behouden</h6>
                    <input id="image" type="file" name="image" class="form-control" value="{{$dish->image}}">
                    @error('image')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="highlighted">Is gehighlight?</label>
                    <input
                        type="checkbox" id="highlighted" name="highlighted">
                    @error('highlighted')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
                </div>
            </form>
        </div>
    </section>
@endsection
