<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Transações') }}</h2>
    </x-slot>
    <x-link href="{{ route('transaction.create') }}">
        Novo
    </x-link>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Data') }}</th>
                <th>{{ __('Título') }}</th>
                <th>{{ __('Valor') }}</th>
                <th>{{ __('Categoria') }}</th>
                <th>{{ __('Pagamento') }}</th>
                <th>{{ __('Bandeira') }}</th>
                <th>{{ __('Ações') }}</th>
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
                <td>
                    <x-link :href="route('transaction.edit',['id' => $transaction->id])">
                        {{ __('Editar') }}
                    </x-link>
                    <x-link :href="route('transaction.delete', ['id' => $transaction->id])">
                        {{ __('Deletar') }}
                    </x-link>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>