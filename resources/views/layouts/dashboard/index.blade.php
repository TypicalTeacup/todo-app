@extends('layouts.main')

@section('body')
    <nav>
        <div></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Wyloguj się"/>
        </form>
    </nav>
    <main>
        @yield('main')
    </main>
@endsection
