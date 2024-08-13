<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Categories') }}</h2>
    </x-slot>
    <x-link :href="route('category.create')">
        {{ __('New') }}
    </x-link>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>
                    <p>
                        {{ __('Actions') }}
                    </p>
                    <p>
                        <small>{{ __('Updated at') }}</small>
                    </p>
                </th>
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
                        <x-link href="{{ route('category.edit',['id' => $item->id]) }}">
                            {{ __('Edit') }}
                        </x-link>
                        <x-link href="{{ route('category.delete',['id' => $item->id]) }}">
                            {{ __('Delete') }}
                        </x-link>
                        <div>
                            <small>
                               {{ $item->updated_at }}
                            </small>
                        </div>
                    </td>
                </tr>            
            @endforeach
        </x-slot>
    </x-table>    
</x-app-layout>