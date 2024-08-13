<x-app-layout>
    <x-slot name="header">
        <h2> {{ __('Deletando') }} {{ __('cartão') }}</h2>
    </x-slot>
    <x-form :action="route('card.destroy',['id' => $card->id ])" :method="__('delete')">
        <x-dialog-message>
            <h2>Desena realmente excluir esse Cartão??</h2>
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                {{ __('Deletar') }}
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>