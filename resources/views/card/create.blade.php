<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }} {{ __('cartão') }}</h2>
    </x-slot>
    <x-form :action="route('card.store')">
        <x-label for="title">{{ __('Título') }}</x-label>
        <x-input id="title" name="title" value="{{ old('title') }}" />
        <x-label for="number" >{{ __('number') }}</x-label>
        <x-input type="number" id="number" name="number" value="{{ old('number') }}" />
        <x-label for="holder_name">{{ __('Títular') }}</x-label>
        <x-input id="holder_name" name="holder_name" value="{{ old('holder_name') }}" />
        <x-label for="security_code">{{ __('Código') }} {{ __('de') }} {{ __('segurança') }}</x-label>
        <x-input type="number" id="security_code" name="security_code" value="{{ old('security_code') }}" />
        <x-label for="credit">Limite</x-label>
        <x-input type="number" id="credit" name="credit" value="{{ old('credit') }}"/>
        <x-label for="flag">{{ __('Bandeira') }}</x-label>
        <x-input id="flag" name="flag" value="{{ old('flag') }}" />
        <x-label for="financial_entity_id">Instituição Financeira</x-label>
        <x-select name="financial_entity_id" id="financial_entity_id">
            @foreach($financialEntities as $entity)
                <x-select-option value="{{ $entity->id }}">{{ $entity->name }}</x-select-option>
            @endforeach
        </x-select>
        <div class="mt-2">
            <x-link href="{{ route('financial_entity.create') }}" target="_blanck">
                {{ __('new') }}
            </x-link>
        </div>
        <x-label for="type">{{ __('Tipo') }}</x-label>
        <x-select name="type">
            <x-select-option value="credit">{{ __('Crédito') }}</x-select-option>
            <x-select-option value="debit">{{ __('Débito') }}</x-select-option>
            <x-select-option value="multiple">{{ __('Múltiplo') }}</x-select-option>
            <x-select-option value="prepaid">{{ __('Pré-pago') }}</x-select-option>
            <x-select-option value="virtual">{{ __('Digital') }}</x-select-option>
        </x-select>
        <x-label for="status">{{ __('Status') }}</x-label>
        <x-select name="status">
            <x-select-option value="active">{{ __('Ativo') }}</x-select-option>
            <x-select-option value="inactive">{{ __('Inativo') }}</x-select-option>
            <x-select-option value="locked">{{ __('Bloqueado') }}</x-select-option>
            <x-select-option value="unlocked">{{ __('Desbloqueado') }}</x-select-option>
            <x-select-option value="canceled">{{ __('Cancelado') }}</x-select-option>
        </x-select>
        <x-errors-card :erros="$errors"></x-errors-card>
        <x-form-action-buttons>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>