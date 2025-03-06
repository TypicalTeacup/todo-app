@extends('layouts.auth')

@section('title', 'Rejestracja')

@section('inputs')
    <input type="text" name="name" placeholder="Nazwa użytkownika" class="rounded-xl p-1 border-2 border-gray-300" />
    <input type="email" name="email" placeholder="E-mail" class="rounded-xl p-1 border-2 border-gray-300" />
    <input type="password" name="password" placeholder="Hasło" class="rounded-xl p-1 border-2 border-gray-300" />
    <input type="password" name="password_confirmation" placeholder="Potwierdź hasło" class="rounded-xl p-1 border-2 border-gray-300" />
@endsection

@section('submitText', 'Utwórz konto')

@section('links')
    <a href="/login">Zaloguj się</a>
@endsection
