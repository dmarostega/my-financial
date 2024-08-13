<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Editando') }} {{  __('uma') }} {{ __('Transação') }}</h2>
    </x-slot>
    <x-form :action="route('transaction.destroy',['id' => $transaction->id])" :method="__('delete')">
        <x-dialog-message>
            Deseja realmente deletar essa transação? <span style="font-style: italic;">
                {{ $transaction->title }}
            </span>
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                {{ __('Deletar') }}
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>