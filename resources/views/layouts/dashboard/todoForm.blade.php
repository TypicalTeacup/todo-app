@extends('layouts.dashboard.index')
@use('App\Models\Todo')

@php
$name = '';
$description = '';
$priority = '';
$status = '';
$deadline = '';

if(isset($todo)){
    $name = 'value=' . $todo->name;
    $description = 'value=' . $todo->description;
    $priority = $todo->priority;
    $status =  $todo->status;
    $deadline = $todo->deadline;
}
@endphp

@section('main')
    <h1 class="text-4xl font-semibold">@yield('actionName')</h1>
    <form class="flex flex-col gap-2">
        <label id="name">
            Nazwa zadania:
            <input
                type="text"
                name="name"
                {{ $name }}
                placeholder="Nazwa zadania"
                required
                class="rounded-lg border-2 border-gray-300 px-1"
            />
            <ul class="text-red-600 font-semibold"></ul>
        </label>

        <label id="description">
            Opis zadania:
            <textarea
                name="description"
                {{ $description }}
                placeholder="Opis zadania"
                class="rounded-lg border-2 border-gray-300 px-1"
            ></textarea>
            <ul class="text-red-600 font-semibold"></ul>
        </label>

        <label id="priority">
            Priorytet:
            <select
                name="priority"
                required
                class="border-2 border-gray-300 px-1 rounded-lg"
            >
                @foreach (Todo::$priorities as $key => $value)
                    <option {{ $key === $priority ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <ul class="text-red-600 font-semibold"></ul>
        </label>

        <label id="status">
            Status:
            <select
                name="status"
                required
                class="border-2 border-gray-300 px-1 rounded-lg"
            >
                @foreach (Todo::$statuses as $key => $value)
                    <option {{ $key === $status ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <ul class="text-red-600 font-semibold"></ul>
        </label>

        <label id="deadline">
            Termin wykonania:
            <input
                type="datetime-local"
                name="deadline"
                id="deadlineInput"
                placeholder="Termin wykonania"
                class="rounded-lg border-2 border-gray-300 px-1"
            />
            <ul class="text-red-600 font-semibold"></ul>
        </label>
        <x-button type="submit" :buttonType="'normal'">
            @yield('submitText')
        </x-button>
        <script>
            const deadlineElement = document.getElementById("deadlineInput");
            const deadlineDate = (()=> {
                const date = new Date("{{ $todo->deadline }} UTC")
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
                const day = String(date.getDate()).padStart(2, '0');
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');

                return `${year}-${month}-${day}T${hours}:${minutes}`;
            })()
            deadlineElement.value = deadlineDate;
        </script>
    </form>
@endsection
