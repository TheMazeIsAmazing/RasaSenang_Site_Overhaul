@extends('layouts.web')
@section('title', 'Nieuw gerecht')
@section('top_text', 'Nieuw gerecht aanmaken')
@section('bottom_text', 'Ik heb nu al trek!')
@section('content')
    <section id="section-table-reservations">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <form method="post" action="{{route('dish.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Naam</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{old('name')}}">
                    @error('name')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description">Beschrijving</label>
                    <textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
                    @error('description')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="image">Foto</label>
                    <input id="image" type="file" name="image" class="form-control" value="{{old('image')}}">
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
