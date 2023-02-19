<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Users') }}</h2>
    </x-slot>
    <x-link href="{{ route('user.create') }}">
        {{ __('new') }}
    </x-link>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Update') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->updated_at }}</td>   
                    <td>
                        <x-link href="{{ route('user.edit', ['id' => $user->id]) }}">
                            {{ __('edit') }}
                        </x-link>
                        <x-link href="{{ route('user.delete', ['id' => $user->id]) }}">
                            {{ __('remove') }}
                        </x-link>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>    
</x-app-layout>