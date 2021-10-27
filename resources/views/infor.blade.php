@extends('template')
@section('content')
@auth
    <p> {{ Auth::user()->email }}</p>
@endauth
@endsection