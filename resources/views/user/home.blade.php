@extends('layouts.dashboard.index')

@section('title', 'Zadania')

@use('App\Models\Todo')

@section('main')
    <div class="flex gap-4 items-center">
        <h1 class="text-4xl font-semibold">Zadania</h1>
        <a href="/home/todo/new" class="text-zinc-50 bg-blue-600 hover:bg-blue-700 px-4 py-1 rounded-lg">Nowe zadanie</a>
    </div>
    <form id="filterForm">
        <h2 class="m-1 text-lg">
            Filtry:
            <x-button  :buttonType="'normal'">
                Filtruj
            </x-button>
        </h2>
        <div class="flex gap-4">
            <label class="flex flex-col items-start" for="priority[]">
                Priorytet:
                <select class="rounded-lg border-2 bg-gray-50" name="priority[]" multiple>
                    @foreach (Todo::$priorities as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </label>

            <label class="flex flex-col items-start" for="status[]">
                Status:
                <select class="rounded-lg border-2 bg-gray-50" name="status[]" multiple>
                    @foreach (Todo::$statuses as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <label for="after">
            Termin od:
            <input
                type="datetime-local"
                name="after"
                class="rounded-lg border-2 border-gray-300 px-1"
            />
        </label></br>

        <label for="before">
            Termin do:
            <input
                type="datetime-local"
                name="before"
                class="rounded-lg border-2 border-gray-300 px-1"
            />
        </label>
    </form>
    <div class="py-4">
        @foreach($todos as $todo)
            <x-todo :$todo />
        @endforeach
    </div>

    <script>
        const filterForm = document.getElementById('filterForm');

        filterForm.addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();
            console.log('submit');

            // Get the datetime-local input elements
            const afterInput = filterForm.querySelector('input[name="after"]');
            const beforeInput = filterForm.querySelector('input[name="before"]');

            // Convert the datetime-local values to ISO strings if they are not empty
            if (afterInput.value) {
                console.log("after")
                const afterDate = new Date(afterInput.value);
                afterInput.value = afterDate.toISOString();
            }

            if (beforeInput.value) {
                console.log("before")
                const beforeDate = new Date(beforeInput.value);
                beforeInput.value = beforeDate.toISOString();
            }

            // Submit the form
            filterForm.submit();
        });
    </script>
@endsection
