<x-app-layout>
    <x-slot name="header">
        <h2> {{ __('R eceipt Confirm') }}</h2>
    </x-slot>
    <x-form :action="route('resolving.receipt',['id' => $transactionPart->id ])" >
        <x-dialog-message>
            <h2>{{ __('Confirm receipt transaction?') }}</h2>
        </x-dialog-message>
        <x-label for="value">
            {{  $transactionPart->transaction->value }}
        </x-label>
        <x-form-action-buttons>            
            <x-slot name="submitTitle">
                {{ __('To Receipt') }}
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>