<x-app-layout>
    <form action="{{ route('financial_entity.store') }}" method="post">
        @csrf
        <x-slot name="header">
            <h2>
                {{ __('Cadastrando Agência Bancária') }}
            </h2>
        </x-slot>
        <x-label for="code">
            {{ __('Code') }}
        </x-label>
        <x-input name="code" id="code"></x-input>
        <x-label for="name">
            {{ __('Name') }}
        </x-label>
        <x-input name="name" id="name"></x-input>
        <x-form-action-buttons></x-form-action-buttons>
    </form>
</x-app-layout>