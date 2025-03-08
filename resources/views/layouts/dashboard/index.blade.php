@extends('layouts.main')

@section('body')
    <nav class="flex justify-between p-2 border-b">

        @if (auth()->user())
            <form action="/home">
                <x-button type="submit" :buttonType="'normal'">Zadania</x-button>
            </form>
            <form method="POST" class="flex gap-4 items-center" action="{{ route('logout') }}">
                <div>Zalogowano jako: {{ auth()->user()->name }}</div>
                @csrf
                <x-button type="submit" :buttonType="'normal'">Wyloguj się</x-button>
            </form>
        @else
            <form action="{{ route('login') }}">
                <x-button type="submit" :buttonType="'normal'">Zaloguj się</x-button>
            </form>
        @endif
    </nav>
    <main class="p-2">
        @yield('main')
    </main>
@endsection
