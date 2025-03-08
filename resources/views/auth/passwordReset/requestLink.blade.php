@extends('layouts.auth')

@section('title', 'Resetowanie hasła')

@section('inputs')
    <input type="email" name="email" placeholder="E-mail" class="rounded-lg p-1 border-2 border-gray-300" />
@endsection

@section('submitText', 'Wyślij')

@section('links')
    <a href="/login">Zaloguj się</a>
    <a href="/register">Utwórz konto</a>
@endsection
