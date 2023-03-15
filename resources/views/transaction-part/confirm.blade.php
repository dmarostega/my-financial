<x-app-layout>
    <x-slot name="header">
        <h2> {{ __('Payment Confirm') }}</h2>
    </x-slot>
    <x-form :action="route('resolving.transaction',['id' => $transactionPart->id ])" >
        <x-dialog-message>
            <h2>{{ __('Confirm payment?') }}</h2>
        </x-dialog-message>
        <x-label for="value">
            {{ __('Value') }}
        </x-label>
        <x-input id="value" name="value" value="{{ $transactionPart->transaction->value }}" />
        <x-label for="discount">
            {{ __('Discount') }}
        </x-label>
        <x-input id="discount" name="discount" value="{{ $transactionPart->discount }}" />
        <x-label for="fees">
            {{ __('Fees') }}
        </x-label>
        <x-input id="fees" name="fees" value="{{ $transactionPart->fees }}"/>
        <x-form-action-buttons>            
            <x-slot name="submitTitle">
                {{ __('To Pay') }}
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>