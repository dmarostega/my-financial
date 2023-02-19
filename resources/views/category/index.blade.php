<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Categorias') }}</h2>
    </x-slot>
    <x-button type="button">
        <a class="block mx-auto" href="{{ route('category.create') }}">
            {{ __('new') }}
        </a>
    </x-button>
    <x-table>
        <x-slot name="headers">
            <tr>
                <td>{{ __('name') }}</td>
                <td>{{ __('description') }}</td>
                <td>{{ __('created at') }}</td>
                <td>{{ __('updated at') }}</td>
                {{-- <td>{{ __('deleted at') }}</td> --}}
                <td>{{ __('actions') }}</td>
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
                        {{ $item->created_at }}
                    </td>
                    <td>
                        {{ $item->updated_at }}
                    </td>
                    {{-- <td>
                        {{ $item->deleted_at }}
                    </td> --}}
                    <td>
                        <x-link href="{{ route('category.edit',['id' => $item->id]) }}">
                            {{ __('edit') }}
                        </x-link>
                        <x-link href="{{ route('category.delete',['id' => $item->id]) }}">
                            {{ __('delete') }}
                        </x-link>
                    </td>
                </tr>            
            @endforeach
        </x-slot>
    </x-table>    
</x-app-layout>