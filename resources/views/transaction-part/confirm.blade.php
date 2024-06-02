<x-app-layout>
    <x-slot name="header">
        <h2> {{ __('Extort Confirm') }}</h2>
    </x-slot>
    <x-form :action="route('resolving.extort',['id' => $transactionPart->id ])" >
        <x-dialog-message>
            <h2>{{ __('Confirm extort transaction?') }}</h2>
        </x-dialog-message>
        <x-label for="value">
            {{  $transactionPart->transaction->value }}
        </x-label>
<x-form-action-buttons>            
            <x-slot name="submitTitle">
                {{ __('To Extort') }}
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>