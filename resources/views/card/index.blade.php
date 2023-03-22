<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cards') }}</h2>
    </x-slot>
    <x-link :href="route('card.create')">
        {{ __('New') }}
    </x-link> 
    <x-table>
        <x-slot name="headers">            
                <tr>                    
                    <th>{{ __('Title') }}</td>
                    <th>{{ __('Number') }}</th>
                    <th>{{ __('Holder') }}</th>
                    <th>{{ __('Secutiry Code') }}</th>
                    <th>{{ __('Flag') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Limit / Used') }}</th>
                    <th> <p>
                            {{ __('Infos') }}
                        </p>
                        <p><small>{{ __('Transactions') }}</small></p>
                    </th>
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
                    <td>{{ $card->creditCard ? $card->creditCard->credit : '' }} / {{ $card->creditCard ? $card->creditCard->amount : '' }}</td>
                    <td>
                        <p>All: {{ $card->transactions->count() }}</p>  
                        <p>{{ __('This month') }}: {{ $card->allTransactionOfMonth()->count() }}</p>  
                    </td>
                    <td>{{ $card->status }}</td>
                    <td>
                        <x-link :href="route('card.edit', ['id' => $card->id])">
                            {{ __('Edit') }}
                        </x-link>
                        <x-link :href="route('card.delete', ['id' => $card->id])">
                            {{ __('Delete') }}
                        </x-link>
                        <div>
                            <small>
                                {{ $card->updated_at }}
                            </small>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>