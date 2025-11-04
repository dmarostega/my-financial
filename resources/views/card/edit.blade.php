<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Editing') }} {{ __('Card') }}</h2>
    </x-slot>
    <x-form :action="route('card.update',['id' => $card->id])" :method="__('put')">
        <x-label for="title">{{ __('Title') }}</x-label>
        <x-input id="title" name="title" value="{{ $card->title }}" />
        <x-label for="number" >{{ __('Number') }}</x-label>
        <x-input id="number" name="number" value="{{ $card->number }}" />
        <x-label for="holder_name">{{ __('Holder') }}</x-label>
        <x-input id="holder_name" name="holder_name" value="{{ $card->holder_name }}" />
       
        <div>
            <x-label for="security_code">{{ __('Security Code') }}</x-label>
            <x-input id="security_code" name="security_code" value="{{ $card->security_code }}" />
            <x-label for="due_day">{{ __('Due day') }}</x-label>
            <x-input type="number" id="due_day" name="due_day" value="{{ $card->creditCard ? $card->creditCard->due_day : '' }}" />
        </div>
                
        <x-label for="credit">{{ __('Ammout') }}</x-label>
        <x-input id="credit" name="credit" value="{{ $card->creditCard ? $card->creditCard->credit : '' }}"/>
        <x-label for="flag">{{ __('Flag') }}</x-label>
        <x-input id="flag" name="flag" value="{{ $card->flag }}" />
        <x-label for="financial_entity_id">Instituição Financeira</x-label>
        <x-select name="financial_entity_id" id="financial_entity_id">
            @foreach($financialEntities as $entity)
                <x-select-option value="{{ $entity->id }}" :isSelected="($card->financial_entity_id === $entity->id)">{{ $entity->name }}</x-select-option>
            @endforeach
        </x-select>
        <x-label for="type">{{ __('Type') }}</x-label>
        <x-select name="type">
            <x-select-option value="credit" :isSelected="( $card->type === 'credit')">{{ __('Crédito') }}</x-select-option>
            <x-select-option value="debit"  :isSelected="( $card->type === 'debit')">{{ __('Débito') }}</x-select-option>
            <x-select-option value="multiple"  :isSelected="( $card->type === 'multiple')">{{ __('Múltiplo') }}</x-select-option>
            <x-select-option value="prepaid"  :isSelected="( $card->type === 'prepaid')">{{ __('Pré-pago') }}</x-select-option>
            <x-select-option value="virtual"  :isSelected="( $card->type === 'virtual')">{{ __('Digital') }}</x-select-option>
        </x-select>
        <x-label for="status">{{ __('Status') }}</x-label>
        <x-select name="status">
            <x-select-option value="active" :isSelected="( $card->status === 'active')">{{ __('Ativo') }}</x-select-option>
            <x-select-option value="inactive"  :isSelected="( $card->status === 'inactive')">{{ __('Inativo') }}</x-select-option>
            <x-select-option value="locked"  :isSelected="( $card->status === 'locked')">{{ __('Bloqueado') }}</x-select-option>
            <x-select-option value="unlocked"  :isSelected="( $card->status === 'unlocked')">{{ __('Desbloqueado') }}</x-select-option>
            <x-select-option value="canceled"  :isSelected="( $card->status === 'canceled')">{{ __('Cancelado') }}</x-select-option>
        </x-select>

        <x-errors-card :erros="$errors"></x-errors-card>
        <x-form-action-buttons>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>