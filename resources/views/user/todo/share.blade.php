@extends('layouts.dashboard.index')

@section('main')
    <div class="flex gap-4 items-center">
        <h1 class="font-semibold text-4xl">Udostępnij {{ $todo->name }}</h1>
    </div><br/>
    <form id="shareForm">
        <label for="expires">
            Wygasa:
            <input type="datetime-local" name="expires" required />
        </label><br/>
        Link:
        <textarea
            id="linkOutput"
            class="rounded-lg border-2 border-gray-300 bg-gray-200"
            disabled
        ></textarea>
        <br/><br/>
        <x-button type="submit" :buttonType="'normal'">
            Stwórz link
        </x-button>
    </form><br/>
    <x-button id="copyButton" :buttonType="'normal'">Kopiuj link</x-button><br/>
    <p class="text-red-600 font-semibold" id="error"></p>

    <script>
        const shareForm = document.getElementById("shareForm");
        const copyButton = document.getElementById("copyButton");

        shareForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const body = {
                expires: new Date(shareForm.expires.value).toISOString(),
            }
            try {
                const response = await axios.post("/api/todo/{{ $todo->id }}/share", body);
                console.log(response);
                document.getElementById("linkOutput").innerText = response.data.url;
            } catch (err) {
                console.error(err.response.data.message);
                document.getElementById("error").innerText = err.response.data.message;
            }
        });

        copyButton.addEventListener("click", (e) => {
            const linkOutput = document.getElementById("linkOutput");
            navigator.clipboard.writeText(linkOutput.value);
        });
    </script>
@endsection
