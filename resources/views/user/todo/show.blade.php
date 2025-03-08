@extends('layouts.dashboard.index')

@php
$deleteFormId = uniqid('deleteTodo');
$deadlineId = uniqid('deadlineId');
@endphp

@section('main')
    <div class="flex gap-4 items-center">
        <h1 class="font-semibold text-4xl">{{ $todo->name }}</h1>
        @if(!request()->hasValidSignature())
            <form action="/home/todo/{{ $todo->id }}/share">
                <x-button type="submit" :buttonType="'normal'">Udostępnij</x-button>
            </form>
            <form action="/home/todo/{{ $todo->id }}/edit">
                <x-button type="submit" :buttonType="'normal'">Edytuj</x-button>
            </form>
            <form id="{{ $deleteFormId }}">
                <x-button type="submit" :buttonType="'warning'">
                    Usuń
                </x-button>
            </form>
        @endif
    </div>
    <p>Priorytet: {{ $todo->getPriority() }}</p>
    <p>Status: {{ $todo->getStatus() }}</p>
    <p>
        Termin wykonania:
        <span id="{{ $deadlineId }}" class="
        @if($todo->expired())
            text-red-500
            font-semibold
        @endif
        "></span>
    </p>
    @if ($todo->description !== null)
        <p>{{ $todo->description }}</p>
    @else
        <p>Brak opisu</p>
    @endif

    <script>
        const form = document.getElementById("{{ $deleteFormId }}");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            await axios.delete("/api/todo/{{ $todo->id }}")
            location.href = "/home";
        });


        // convert from utc to local time
        document.getElementById("{{ $deadlineId }}").innerText = (()=> {
            const date = new Date("{{ $todo-> deadline }} UTC")
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');

            return `${year}-${month}-${day} ${hours}:${minutes}`;
        })()
    </script>
@endsection
