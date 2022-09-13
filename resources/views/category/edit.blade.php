<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Editando') }}  {{ __('categoria') }}</h2>
    </x-slot>
    <p>ID: {{ $id ?? 'Não informado!' }}</p>
</x-app-layout>