<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }} {{ __('conta') }} {{ __('bancária') }}</h2>     
    </x-slot>
    <x-form :action="route('financial_account.store')" >
        <x-label for="entity_number">{{ __('Nùmero') }}</x-label>
        <x-input id="entity_number" name="entity_number"  value="{{ old('entity_number') }}"/>
        <x-label for="entity_dv">{{ __('Digito') }}</x-label>
        <x-input id="entity_dv" name="entity_dv" value="{{ old('entity_dv') }}"/>
        <x-label for="account">{{ __('Conta') }}</x-label>
        <x-input id="account" name="account" value="{{ old('account') }}"/>
        <x-label for="account_dv">{{ __('Digito') }}</x-label>
        <x-input id="account_dv" name="account_dv" value="{{ old('account_dv') }}"/>
        <x-label for="financial_entity_id">{{ __('Instituição') }}</x-label>
        <x-select id="financial_entity_id" name="financial_entity_id">
            @foreach($entities as $entity)
                <x-select-option :value="$entity->id">
                    {{ $entity->name }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-errors-card :errors="$errors"></x-errors-card>
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>