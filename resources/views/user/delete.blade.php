<x-app-layout>
    <x-slot name="header">
        Removendo usuário: {{ $user->name }}
    </x-slot>
    <form action="{{ route('user.destroy',['id'=> $user->id]) }}" method="post" >
        @csrf
        @method('delete')
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                Deletar
            </x-slot>
        </x-form-action-buttons>
    </form>
</x-app-layout>