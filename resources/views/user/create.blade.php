<x-app-layout>
    <x-slot name="header">
       <h2> Cadastrando Usuário </h2>
    </x-slot>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <x-label for="name">Nome</x-label>
            <x-input type="text" name="name" id="name" />
            <x-label for="email">Email</x-label>
            <x-input type="text" name="email" id="email"/>
            @if($errors)
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach         
            @endif
            <x-form-action-buttons></x-form-action-buttons>
        </div>
    </form>
</x-app-layout>