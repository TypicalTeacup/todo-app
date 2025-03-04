@extends('layouts.dashboard.index')

@section('main')
    <h1>@yield('actionName')</h1>
    <form>
        @csrf
        <input type="text" name="name" placeholder="Nazwa zadania" required />
        <textarea name="description" placeholder="Opis zadania"></textarea>
        <select name="priority" required>
            <option value="low">Niski</option>
            <option value="medium" selected>Średni</option>
            <option value="high">Wysoki</option>
        </select>
        <select name="status">
            <option value="toDo">Do zrobienia</option>
            <option value="inProgress">W trakcie</option>
            <option value="done">Zakończone</option>
        </select>
        <input type="datetime-local" name="deadline" placeholder="Termin wykonania" />
        <input type="submit" value="@yield('submitText')" />
    </form>
@endsection
