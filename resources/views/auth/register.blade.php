@extends('layouts.auth')

@section('title', 'Rejestracja')

@section('inputs')
    <input type="text" name="name" />
    <input type="email" name="email" />
    <input type="password" name="password" />
    <input type="password" name="password_confirmation" />
@endsection

@section('submitText', 'Utwórz konto')

@section('links')
    <a href="/login">Zaloguj się</a>
@endsection
