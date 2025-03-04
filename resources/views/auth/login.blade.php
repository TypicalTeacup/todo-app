@extends('layouts.auth')

@section('title', 'Logowanie')

@section('inputs')
    <input type="email" name="email" />
    <input type="password" name="password" />
@endsection

@section('submitText', 'Zaloguj się')

@section('links')
    <a href="/register">Utwórz konto</a>
@endsection
