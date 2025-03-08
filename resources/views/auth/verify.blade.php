@extends('layouts.main')

@section('body')
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            Nowy link do weryfikacji został wysłany
        </div>
    @endif

    <p>Na e-mail został wysłany link weryfikacyjny</p>
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <input type="submit" value="Wyślij nowy link" />
    </form>
@endsection

