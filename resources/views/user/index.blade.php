<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Users') }}</h2>
    </x-slot>
    <h1 class="text-center h-20 text-lg">Lista de usuários cadastrados.</h1>
    <a type="button" href="{{ route('user.create') }}">Novo</a>
    <table>
        <thead>
            <tr>
                <td>{{ __('name') }}</td>
                <td>{{ __('email') }}</td>
                <td>{{ __('created at') }}</td>
                <td>{{ __('updated at') }}</td>
                <td>{{ __('deleted at') }}</td>
                <td>{{ __('actions') }}</td>
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
                                <a href="{{ route('user.edit',['id' => $user->id]) }}">{{ __('edit') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('user.delete',['id' => $user->id]) }}">{{ __('delete') }}</a>
                            </li>
                        </ul>
                    </td>
            </tr>            
        @endforeach
    </table>
</x-app-layout>