1<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }} {{ __('cartão') }}</h2>
    </x-slot>
    <x-form :action="route('card.store')">
        <x-label for="title">{{ __('Title') }}</x-label>
        <x-input id="title" name="title" value="{{ old('title') }}" />
        <x-label for="number" >{{ __('Number') }}</x-label>
        <x-input type="number" id="number" name="number" value="{{ old('number') }}" />
        <x-label for="holder_name">{{ __('Holder') }}</x-label>
        <x-input id="holder_name" name="holder_name" value="{{ old('holder_name') }}" />
        <div>
            <x-label for="security_code">{{ __('Security Code') }}</x-label>
            <x-input type="number" id="security_code" name="security_code" value="{{ old('security_code') }}" />
            <x-label for="due_day">{{ __('Due Day') }}</x-label>
            <x-input type="number" id="due_day" name="due_day" value="{{ old('due_day') }}" />
        </div>
                
        <x-label for="credit">{{ __('Ammount') }}</x-label>
        <x-input type="number" id="credit" name="credit" value="{{ old('credit') }}"/>
        <x-label for="flag">{{ __('Flag') }}</x-label>
        <x-input id="flag" name="flag" value="{{ old('flag') }}" />
        <x-label for="financial_entity_id">{{ __('Instituição Financeira') }}</x-label>
        <x-select name="financial_entity_id" id="financial_entity_id">
            @foreach($financialEntities as $entity)
                <x-select-option value="{{ $entity->id }}">{{ $entity->name }}</x-select-option>
            @endforeach
        </x-select>
        <div class="mt-2">
            <x-link href="{{ route('financial_entity.create') }}" target="_blank">
                {{ __('new') }}
            </x-link>
        </div>
        <x-label for="type">{{ __('Type') }}</x-label>
        <x-select name="type">
            <x-select-option value="credit">{{ __('Credit') }}</x-select-option>
            <x-select-option value="debit">{{ __('Debit') }}</x-select-option>
            <x-select-option value="multiple">{{ __('Multiple') }}</x-select-option>
            <x-select-option value="prepaid">{{ __('Prepaid') }}</x-select-option>
            <x-select-option value="virtual">{{ __('Digital') }}</x-select-option>
        </x-select>
        <x-label for="status">{{ __('Status') }}</x-label>
        <x-select name="status">
            <x-select-option value="active">{{ __('Active') }}</x-select-option>
            <x-select-option value="inactive">{{ __('Inactive') }}</x-select-option>
            <x-select-option value="locked">{{ __('Locked') }}</x-select-option>
            <x-select-option value="unlocked">{{ __('Unlocked') }}</x-select-option>
            <x-select-option value="canceled">{{ __('Canceled') }}</x-select-option>
        </x-select>
        <x-errors-card :erros="$errors"></x-errors-card>
        <x-form-action-buttons>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>