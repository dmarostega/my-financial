<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Listando') }} {{ __('Cartões') }}</h2>
    </x-slot>
    <div>
        <x-link :href="route('card.create')">Novo</x-link>
    </div>
    <x-table>
        <x-slot name="headers">            
                <tr>
                    <th>{{ __('Título') }}</td>
                    <th>{{ __('Número') }}</th>
                    <th>{{ __('Títular') }}</th>
                    <th>{{ __('Código Segurança') }}</th>
                    <th>{{ __('Bandeira') }}</th>
                    <th>{{ __('Tipo') }}</th>
                    <th>{{ __('Limite') }}</th>
                    <th>{{ __('Usado') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Ações') }}</th>
                </tr>
        </x-slot>
        <x-slot name="body">
            @foreach($cards as $card)
                <tr>
                    <td>{{ $card->title }}</td>
                    <td>{{ $card->number }}</td>
                    <td>{{ $card->holder_name }}</td>
                    <td>{{ $card->security_code }}</td>
                    <td>{{ $card->flag }}</td>
                    <td>{{ $card->type }}</td>
                    <td>{{ $card->creditCard ? $card->creditCard->credit : '' }}</td>
                    <td>{{ $card->creditCard ? $card->creditCard->amount : '' }}</td>
                    <td>{{ $card->status }}</td>
                    <td>
                        <x-link :href="route('card.edit', ['id' => $card->id])">
                            Editar
                        </x-link>
                        <x-link :href="route('card.delete', ['id' => $card->id])">
                            Deletar
                        </x-link>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>