<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Categories') }}</h2>
    </x-slot>
    <x-button type="button">
        <a class="block mx-auto" href="{{ route('category.create') }}">
            {{ __('new') }}
        </a>
    </x-button>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Update') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($categories as $item)
                <tr>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        {{ $item->description }}
                    </td>
                    <td>
                        {{ $item->updated_at }}
                    </td>
                    <td>
                        <x-link href="{{ route('category.edit',['id' => $item->id]) }}">
                            {{ __('Edit') }}
                        </x-link>
                        <x-link href="{{ route('category.delete',['id' => $item->id]) }}">
                            {{ __('Delete') }}
                        </x-link>
                    </td>
                </tr>            
            @endforeach
        </x-slot>
    </x-table>    
</x-app-layout>