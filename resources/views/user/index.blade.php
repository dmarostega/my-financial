<x-app-layout>
    <h1 class="text-center h-20 text-lg">Lista de usuários cadastrados.</h1>
    <a type="button" href="{{ route('register') }}">Novo</a>
    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Create at</td>
                <td>Updated at</td>
                <td>Delete at</td>
                <td>Actons</td>
            </tr>
            
        </thead>
        @foreach ($listUser as $user)
            <tr>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->created_at }}
                    </td>
                    <td>
                        {{ $user->updated_at }}
                    </td>
                    <td>
                        {{ $user->deleted_at }}
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="{{ route('user.edit',['id' => $user->id]) }}">Edit</a>
                            </li>
                            <li>
                                <a href="{{ route('user.delete',['id' => $user->id]) }}">Delete</a>
                            </li>
                        </ul>
                    </td>
            </tr>            
        @endforeach
    </table>
</x-app-layout>