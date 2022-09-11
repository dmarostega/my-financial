<x-app-layout>
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <h1>Cadastro Usuário</h1>
        <label for="name">Nome</label>
        <input type="text" name="name" id="name">
        <label for="email">EmailK</label>
        <input type="text" name="email" id="email">
        
        <div>
            <button type="button">Cancelar</button>
            <button type="submit">Salvar</button>
        </div>
    </form>
</x-app-layout>