<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Contracts') }}</h2>
    </x-slot>
    <x-link :href="route('contract.create')">
        {{ __('New') }}
    </x-link>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Value') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Record') }}</th>
                <th>{{ __('Period') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach($contracts as $contract)
            <tr>
                <td>
                    {{ $contract->title }}
                </td>
                <td>
                    {{ $contract->value }}
                </td>
                <td>
                    <p>
                        {{ $contract->person->name }}
                    </p>
                    <p>
                        {{ $contract->person->last_name }}
                    </p>
                </td>
                <td>
                    {{ $contract->person->register_number }}
                </td>
                <td>
                    <p>
                        {{ $contract->date_init }}
                    </p>
                    <p>
                        {{ !empty($contract->date_end) ? $contract->date_end : ' - ' }}
                    </p>
                </td>
                <td>
                    <x-link :href="route('contract.edit',['id' => $contract->id])">{{ __('Edit') }}</x-link>
                    <x-link :href="route('contract.delete',['id' => $contract->id])">{{ __('Delete') }}</x-link>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>