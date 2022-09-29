@extends('layouts.web')
@section('title', 'about')
@section('content')
    <h1>Welcome</h1>
    <sub>this is the about page</sub>
    <a href={{ route('homepage') }}>not about us</a>
@endsection
