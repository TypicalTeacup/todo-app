@extends('layouts.main')

@section('body')
    <form method="POST">
        @csrf
        @yield('inputs')
        <input type="submit" value="@yield('submitText')" />
    </form>
    @yield('links')
@endsection
