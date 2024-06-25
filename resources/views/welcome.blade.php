@extends('layout.app')

@section('title', 'Ryan BarberKing | Welcome')

@section('company-header')
    <div class="company-header">
        <h1>Ryan Barberking</h1>
    </div>
@endsection

@section('content')
    <div class="button-container">
        <a href="{{ route('reservation') }}" class="button">Reservation</a>
    </div>
@endsection
