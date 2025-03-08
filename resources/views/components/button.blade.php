<button
{{ $attributes->class([
    'text-zinc-50 px-4 py-1 rounded-lg',
    'bg-blue-600 hover:bg-blue-700' => $buttonType !== 'warning',
    'bg-red-600 hover:bg-red-700' => $buttonType === 'warning',
    ])
}}
>
    {{ $slot }}
</button>
