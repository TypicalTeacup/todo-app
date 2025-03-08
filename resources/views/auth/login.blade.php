@extends('layouts.auth')

@section('title', 'Logowanie')

@section('inputs')
    <input type="email" name="email" placeholder="E-mail" class="rounded-lg p-1 border-2 border-gray-300" />
    <input type="password" name="password" placeholder="Hasło" class="rounded-lg p-1 border-2 border-gray-300" />
@endsection

@section('submitText', 'Zaloguj się')

@section('links')
    <a href="/forgot-password">Resetuj hasło</a>
    <a href="/register">Utwórz konto</a>
@endsection
