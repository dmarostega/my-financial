<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Deletando') }} {{ __('agência') }} {{ __('bancária') }}
        </h2>
    </x-slot>
    <form action="{{ route('financial_entity.destroy',['id'=> $financialEntity->id]) }}" method="post" >
        @csrf
        @method('delete')
        <x-dialog-message>
            Deseja realmente deleta a categoria <span style="font-style: italic;">{{ $financialEntity->name }}</span>?
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                Deletar
            </x-slot>
        </x-form-action-buttons>
    </form>
</x-app-layout>