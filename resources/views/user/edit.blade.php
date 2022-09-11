<x-app-layout>
    <form action="{{ route('user.update',['id'=> $user->id]) }}" method="post">
        @csrf
        @method('PUT')
        <h1>Cadastro Usuário</h1>
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
        <label for="email">EmailK</label>
        <input type="text" name="email" id="email" value="{{ $user->email }}">
        
        <div>
            <button type="button">Cancelar</button>
            <button type="submit">Salvar</button>
        </div>
    </form>
</x-app-layout>