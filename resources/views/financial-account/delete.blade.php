<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Deletando') }} {{ __('conta') }} {{ __('bancária') }}</h2>
    </x-slot>
    <x-form :action="route('financial_account.destroy', ['id' => $financialAccount->id])" :method="__('delete')">
        <x-dialog-message>
            Deseja realmente deletar a conta bancária da(o) <span style="font-style: italic;">
                    {{ $financialAccount->entity->name }}
                </span>
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                Deletar
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>