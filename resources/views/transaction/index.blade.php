<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Transactions') }}</h2>
    </x-slot>
    <x-link href="{{ route('transaction.create') }}">
        {{ __('New') }}
    </x-link>
    <x-link href="{{ route('transactions',['actual-month'])}}">only actual month</x-link>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Value') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Payment') }}</th>
                <th>{{ __('Infos') }}</th>
                <th>
                        <p>{{ __('Actions') }}</p> 
                        <p><small>{{ __('Updated at') }}</small></p>
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ date('d/m',strtotime($transaction->date)) }}</td>
                <td>{{ $transaction->title }}</td>
                <td>{{ $transaction->value }}</td>
                <td>{{ $transaction->category->name }}</td>
                <td>
                    <p>{{ $transaction->paymentType->name }}</p>
                    <p>{{ $transaction->card->title ?? '' }}</p>
                </td>
                <td>
                    <p> 
                        @if($transaction->transactionParts->first() && filled($transaction->transactionParts->first()->payment_date) ) 
                            @if ($transaction->bill && $transaction->bill->type == 'to_receive') 
                                {{  __('Received')  }}
                            @else
                                {{  __('Paid Out')  }}
                            @endif
                            <p> {{  $transaction->transactionParts->first()->value_paid }}</p>
                        @endif
                    </p>

                </td>
                <td>
                    <div>
                        <x-link :href="route('transaction.edit',['id' => $transaction->id])">
                            {{ __('Edit') }}
                        </x-link>
                        <x-link class="bg-red-800" :href="route('transaction.delete', ['id' => $transaction->id])">
                            {{ __('Delete') }}
                        </x-link>
                        @if($transaction->transactionParts->first() && !filled($transaction->transactionParts->first()->payment_date))
                            @if($transaction->bill &&  $transaction->bill->type == 'to_pay'  && !$transaction->card)                        
                                <x-link :href="route('resolving.confirm',['id' => $transaction->transactionParts->first()->id])">
                                    {{ __('Pay') }}
                                </x-link>
                            @elseif ($transaction->bill && $transaction->bill->type == 'to_receive')
                                <x-link :href="route('resolving.confirm',['id' => $transaction->transactionParts->first()->id, 'to_receive'])">
                                    {{ __('To receive') }}
                                </x-link>
                            @endif 
                        @else 
                            <x-link :href="route('resolving.confirm', ['id' => $transaction->transactionParts->first()->id])">
                                {{ __('extort') }}
                            </x-link>
                        @endif           
                    </div>
                    <div>
                        <small>
                            {{ $transaction->updated_at }}
                        </small>
                    </div>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>