<x-app-layout>
    <x-slot name="header">
        <h2> {{ __('Payment Confirm') }}</h2>
    </x-slot>
    <x-form :action="route('paying.paying',['id' => $transactionPart->id ])" >
        <x-dialog-message>
            <h2>{{ __('Confirm payment?') }}</h2>
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                {{ __('To Pay') }}
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>