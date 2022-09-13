<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Categorias') }}</h2>
    </x-slot>
    <x-button type="button">
        <a class="block mx-auto" href="{{ route('category.create') }}">Novo</a>
    </x-button>
    <table>
        <thead>
            <tr>
                <td>{{ __('name') }}</td>
                <td>{{ __('description') }}</td>
                <td>{{ __('created at') }}</td>
                <td>{{ __('updated at') }}</td>
                <td>{{ __('deleted at') }}</td>
                <td>{{ __('actions') }}</td>
            </tr>            
        </thead>
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
                <td>
                    {{ $item->deleted_at }}
                </td>
                <td>
                    <ul>
                        <li>
                            <a href="{{ route('category.edit',['id' => $item->id]) }}">{{ __('edit') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('category.delete',['id' => $item->id]) }}">{{ __('delete') }}</a>
                        </li>
                    </ul>
                </td>
            </tr>            
        @endforeach
    </table>    
</x-app-layout>