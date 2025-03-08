@extends('layouts.auth')

@section('title', 'Nowe hasło')

@section('action', '/reset-password')

@section('inputs')
    <input type="hidden" name="token" value="{{ request()->route('token') }}" />
    <input type="hidden" name="email" value={{ request()->get('email') }} class="rounded-lg p-1 border-2 border-gray-300 bg-gray-200 text-gray-500" />
    <input type="password" name="password" placeholder="Hasło" class="rounded-lg p-1 border-2 border-gray-300" />
    <input type="password" name="password_confirmation" placeholder="Potwierdź hasło" class="rounded-lg p-1 border-2 border-gray-300" />
@endsection

@section('submitText', 'Resetuj')

@section('links')
    <a href="/login">Zaloguj się</a>
    <a href="/register">Utwórz konto</a>
@endsection
