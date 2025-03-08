@php
    $deleteFormId = uniqid('deleteTodo');
    $deadlineId = uniqid('deadline');
@endphp
<div class="my-4 rounded-lg px-2 py-1 border-2 border-gray-300 bg-gray-100">
    <div class="flex gap-6">
        <h2 class="font-semibold text-2xl">{{ $todo->name }}</h2>
        <form action="/home/todo/{{ $todo->id }}/show">
            <x-button type="submit" :buttonType="'normal'">
                Szczegóły
            </x-button>
        </form>
        <form action="/home/todo/{{ $todo->id }}/edit">
            <x-button type="submit" :buttonType="'normal'">
                Edytuj
            </x-button>
        </form>
        <form id="{{ $deleteFormId }}">
            <x-button type="submit" :buttonType="'warning'">
                Usuń
            </x-button>
        </form>
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

    <script>
        document.getElementById("{{ $deleteFormId }}").addEventListener("submit", async (e) => {
            e.preventDefault();
            await axios.delete("/api/todo/{{ $todo->id }}")
            location.reload(true);
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
</div>
