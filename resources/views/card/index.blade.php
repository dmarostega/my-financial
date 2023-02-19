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
                    <th>{{ __('Title') }}</td>
                    <th>{{ __('Number') }}</th>
                    <th>{{ __('Holder') }}</th>
                    <th>{{ __('Secutiry Code') }}</th>
                    <th>{{ __('Flag') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Limit') }}</th>
                    <th>{{ __('Used') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Update') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
        </x-slot>
        <x-slot name="body">
            @foreach($cards as $card)
                <tr>
                    <td>
                        <p>{{ $card->title }}</p>
                        <p>{{ $card->financialEntity->name }}</p>
                    </td>
                    <td>{{ $card->number }}</td>
                    <td>{{ $card->holder_name }}</td>
                    <td>{{ $card->security_code }}</td>
                    <td>{{ $card->flag }}</td>
                    <td>{{ $card->type }}</td>
                    <td>{{ $card->creditCard ? $card->creditCard->credit : '' }}</td>
                    <td>{{ $card->creditCard ? $card->creditCard->amount : '' }}</td>
                    <td>{{ $card->status }}</td>
                    <td>{{ $card->updated_at }}</td>
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