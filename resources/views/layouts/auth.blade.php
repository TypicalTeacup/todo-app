@extends('layouts.main')

@section('bodyClasses', 'flex justify-center items-center')

@section('body')
    <section class="flex flex-col gap-3 w-full max-w-72 mx-auto p-3 rounded border-2 border-zinc-300 bg-zinc-50">
        <h2 class="text-center text-lg font-semibold">@yield('title')</h2>
        @if ($errors->any())
            <div class="rounded-xl p-2 border-2 border-red-400 bg-red-200 text-red-700">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" class="w-full flex flex-col gap-2 items-center" action="@yield('action')">
            @csrf
            @yield('inputs')
            <input type="submit" value="@yield('submitText')" class="w-min px-4 py-1 rounded-xl bg-blue-600 text-zinc-50 hover:bg-blue-700 font-medium" />
        </form>
        <div class="flex flex-col gap-1 items-center text-sm font-semibold text-slate-500 tracking-tight hover:*:underline">
            @yield('links')
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        fetch('/sanctum/csrf-cookie')
    </script>
@endpush
