<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Payment Types') }}
        </h2>
    </x-slot>
    <x-link :href="route('payment_type.create')">
        {{ __('New') }}
    </x-link>
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
            @foreach ($paymentTypes as $paymentType)
                <tr>
                    <td>
                        {{ $paymentType->name }}
                    </td>
                    <td>
                        {{ $paymentType->description }}
                    </td>                 
                    <td>
                        {{ $paymentType->updated_at }}
                    </td>
                    <td>
                        <x-link :href="route('payment_type.edit', ['id' => $paymentType->id])">
                            {{ __('Edit') }}
                        </x-link>
                        <x-link :href="route('payment_type.delete', ['id' => $paymentType->id])">
                            {{ __('Delete') }}
                        </x-link>
                    </td>
                </tr>
            @endforeach
        </x-slot>      
    </x-table>
</x-app-layout>