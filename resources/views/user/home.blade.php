@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $todos = $user->todos;
@endphp

@extends('layouts.dashboard.index')

@section('main')
    <div class="flex gap-2">
        <h1>Zadania</h1>
        <a href="/home/newTodo">Nowe zadanie</a>
    </div>
    @foreach($todos as $todo)
        {{ dd($todo) }}
    @endforeach
@endsection
