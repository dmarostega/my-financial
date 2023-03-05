<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Bills') }}</h2>
    </x-slot>
    <x-link :href="route('bill.create')">
        {{ __("New") }}
    </x-link>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Value') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Frequency') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Created at') }}</th>
                <th>{{ __('Updated at') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($bills as $bill)
            <tr>
                <td>{{ $bill->title }}</td>
                <td>{{ $bill->value }}</td>
                <td>{{ $types[$bill->type] }}</td>
                <td>{{ $frequencies[$bill->frequency] }}</td>
                <td>{{ $statuses[$bill->status] }}</td>
                <td>{{ $bill->created_at }}</td>
                <td>{{ $bill->updated_at }}</td>
                <td>
                    <x-link :href="route('bill.edit', [$bill->id])">
                        {{ __('Edit') }}
                    </x-link>
                    <x-link :href="route('bill.delete', [$bill->id])">
                        {{ __('Delete') }}
                    </x-link>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>