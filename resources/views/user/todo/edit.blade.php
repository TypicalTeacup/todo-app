@extends('layouts.dashboard.todoForm')

@section('title', 'Edytuj zadanie')
@section('actionName', 'Edytuj zadanie')

@section('submitText', 'Zapisz')

@push('bodyScripts')
    <script>
        const editForm = document.querySelector("main > form");
        editForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const body = {
                name: editForm.name.value,
                description: editForm.description.value,
                status: editForm.status.value,
                priority: editForm.priority.value,
                deadline: new Date(editForm.deadline.value).toISOString(),
            };
            try {
                const response = await axios.patch("/api/todo/{{ $todo->id }}", body);
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
