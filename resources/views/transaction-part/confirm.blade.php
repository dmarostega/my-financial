<x-app-layout>
    <x-slot name="header">
        <h2> {{ __('Transaction Confirm') }}</h2>
    </x-slot>
    <x-form :action="route('resolving.payment',['id' => $transactionPart->id ])" >
        <x-dialog-message>
            <h2>{{ __('Confirm action transaction?') }}</h2>
        </x-dialog-message>
        <x-label for="value">
            {{  $transactionPart->transaction->value }}
        </x-label>
        <x-form-action-buttons>            
            <x-slot name="submitTitle">
                {{ __('Ok') }}
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>