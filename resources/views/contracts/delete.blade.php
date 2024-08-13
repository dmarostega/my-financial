<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Deletendo') }} {{ __('um') }} {{ __('contrato') }}</h2>
    </x-slot>
    <x-form :action="route('contract.destroy',['id' => $contract->id])" :method="__('delete')">
        <x-dialog-message>
            Deseja excluir o contrato <span style="font-style: italic">{{ $contract->title }} </span>?
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                Deletar
            </x-slot>
        </x-form-action-buttons>
    </x-form>  
</x-app-layout>