<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Listando') }} {{ __('contratos') }}</h2>
    </x-slot>
    
        <x-link :href="route('contract.create')">
            Novo
        </x-link>
    
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Título') }}</th>
                <th>{{ __('Valor') }}</th>
                <th>{{ __('Nome') }}</th>
                <th>{{ __('Registro') }}</th>
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
                    {{ $contract->person->name }}
                </td>
                <td>
                    {{ $contract->person->register_number }}
                </td>
                <td>
                    <x-link :href="route('contract.edit',['id' => $contract->id])">{{ __('Editar') }}</x-link>
                    <x-link :href="route('contract.delete',['id' => $contract->id])">{{ __('Deletar') }}</x-link>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>