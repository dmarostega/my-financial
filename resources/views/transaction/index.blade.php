<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Transactions') }}</h2>
    </x-slot>
    <x-link href="{{ route('transaction.create') }}">
        {{ __('New') }}
    </x-link>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Value') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Payment') }}</th>
                <th>{{ __('Flag') }}</th>
                <th>{{ __('Update') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->title }}</td>
                <td>{{ $transaction->value }}</td>
                <td>{{ $transaction->category->name }}</td>
                <td>{{ $transaction->paymentType->name }}</td>
                <td>.</td>
                <td>{{ $transaction->updated_at }}</td>
                <td>
                    <x-link :href="route('transaction.edit',['id' => $transaction->id])">
                        {{ __('Edit') }}
                    </x-link>
                    <x-link :href="route('transaction.delete', ['id' => $transaction->id])">
                        {{ __('Delete') }}
                    </x-link>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>