<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }} {{ __('categoria') }}</h2>
    </x-slot>
    <form action="{{ route('financial_entity.update', ['id' => $financialEntity->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="flex flex-col">
            <x-label for="code">{{ __('code') }}</x-label>
            <x-input id="code" name="code" value="{{ $financialEntity->code }}"/>
            <x-label for="name">
                {{ __('name') }}
            </x-label>
            <x-input id="name" name="name" type="text" value="{{ $financialEntity->name }}" />
            @if($errors)
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach         
            @endif
            <x-form-action-buttons></x-form-action-buttons>
        </div>
    </form>
</x-app-layout>