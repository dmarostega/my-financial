<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Bills') }}</h2>
    </x-slot>
    <div>
        <x-link :href="route('bill.create')">
            {{ __("New") }}
        </x-link>
        <h5>{{ __('All') }}: {{ $bills->where('status','active')->pluck('value')->sum() }}</h5>
        <h5>{{ __('To Pay') }}: {{ $bills->where('status','active')->where('type','to_pay')->pluck('value')->sum() }}</h5>
        <h5>{{ __('To Receive') }}: {{ $bills->where('status','active')->where('type', 'to_receive')->pluck('value')->sum() }}</h5>
    </div>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Value') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Frequency') }}</th>
                <th>{{ __('Status') }}</th>
                <th>
                    <p>
                        {{ __('Actions') }}
                    </p>
                    <p>
                        <small>
                            {{ __('Updated at') }}
                        </small>
                    </p>
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($bills as $bill)
            <tr>
                <td>{{ $bill->title }}</td>
                <td>{{ $bill->value }}</td>
                <td>{{ $types[$bill->type] }}</td>
                <td>{{ $bill->category->name }}</td>
                <td>{{ $frequencies[$bill->frequency] }}</td>
                <td>{{ $statuses[$bill->status] }}</td>
                <td>
                    <x-link :href="route('bill.edit', [$bill->id])">
                        {{ __('Edit') }}
                    </x-link>
                    <x-link :href="route('bill.delete', [$bill->id])">
                        {{ __('Delete') }}
                    </x-link>
                    <div>
                        {{ $bill->updated_at }}
                    </div>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>