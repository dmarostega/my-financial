<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Deletando') }} {{ __('categoria') }}
        </h2>
    </x-slot>
    <form action="{{ route('category.destroy',['id'=> $category->id]) }}" method="post" >
        @csrf
        @method('delete')
        <x-dialog-message>
            Deseja realmente deleta a categoria <span style="font-style: italic;">{{ $category->name }}</span>?
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                Deletar
            </x-slot>
        </x-form-action-buttons>
    </form>
</x-app-layout>