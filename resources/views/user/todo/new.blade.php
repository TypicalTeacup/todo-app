@extends('layouts.dashboard.todoForm')

@section('title', 'Nowe zadanie')
@section('actionName', 'Nowe zadanie')

@section('submitText', 'Dodaj')

@push('bodyScripts')
    <script>
        const newForm = document.querySelector("main > form");

        newForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const body = {
                name: newForm.name.value,
                description: newForm.description.value,
                status: newForm.status.value,
                priority: newForm.priority.value,
                deadline: new Date(newForm.deadline.value).toISOString(),
            };
            try {
                const response = await axios.put("/api/todo", body);
                window.location.href = "/home/todo/{{ $todo->id }}/show";
            } catch (err) {
                console.log(err);
                for(const field in err.response.data.errors) {
                    const ul = document.querySelector(`#${field} > ul`);

                    err.response.data.errors[field].forEach((error)=>{
                        const element = document.createElement('li');
                        element.innerText = error;
                        ul.appendChild(element);
                    });
                }
            }
        });
    </script>
@endpush
