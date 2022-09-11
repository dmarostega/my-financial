<x-app-layout >
    <x-slot name="header">
        <h2> Editando Usuário </h2>
    </x-slot>
    <form  action="{{ route('user.update',['id'=> $user->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="flex flex-col">        
            <label for="name" class="text-base">Nome</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ $user->email }}">                    
            @if($errors)
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach         
            @endif
            <x-form-action-buttons></x-form-action-buttons>
        </div>
    </form>
</x-app-layout>