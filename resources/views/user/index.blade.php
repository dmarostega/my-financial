<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Users') }}</h2>
    </x-slot>
    <x-link href="{{ route('user.create') }}">
        {{ __('New') }}
    </x-link>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>
                    <p>
                        {{ __('Actions') }}
                    </p>
                    <p><small>{{ __('Updated at') }}</small></p>
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>                    
                    <td>
                        <div>
                            <x-link href="{{ route('user.edit', ['id' => $user->id]) }}">
                                {{ __('Edit') }}
                            </x-link>
                            <x-link href="{{ route('user.delete', ['id' => $user->id]) }}">
                                {{ __('Delete') }}
                            </x-link>
                        </div>
                        <div>
                            {{ $user->updated_at }}
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>    
</x-app-layout>