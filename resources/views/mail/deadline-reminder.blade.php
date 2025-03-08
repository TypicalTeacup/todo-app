<x-mail::message>
# Przypomnienie

Zadanie {{ $todo->name }} zakończy się jutro.

<x-mail::button :url="url('/home/todo/show/' . $todo->id)">
Zobacz szczegóły
</x-mail::button>
</x-mail::message>
