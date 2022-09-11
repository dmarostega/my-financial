<x-app-layout>
    <x-slot name="header">
        Cadastrando Usuário
    </x-slot>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            @if($errors)
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach         
            @endif
            <div>
                <button type="button">Cancelar</button>
                <button type="submit">Salvar</button>
            </div>
        </div>
    </form>
</x-app-layout>