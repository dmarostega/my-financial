<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Listando') }} {{ __('Cartões') }}</h2>
    </x-slot>
    <div>
        <x-link :href="route('card.create')">Novo</x-link>
    </div>
</x-app-layout>