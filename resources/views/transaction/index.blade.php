<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Transactions') }}</h2>
    </x-slot>
    <div class='btn-line'>
        <x-link href="{{ route('transaction.create') }}">
            {{ __('New') }}
        </x-link>
        <x-link href="{{ route('transactions',['actual-month' => true])}}">only actual month</x-link>
        <x-link href="{{ route('transactions',['only-bills' => true])}}">Only Bills</x-link>
    </div>
    @if($years)
        <div>
            @foreach ($years as $year)
                <x-link href="{{ route('transactions',['year' => $year])}}"> {{ $year }} </x-link>
            @endforeach
        </div>
    @endif
    @if($months)
        <div>
            @foreach ($months as $key => $month)
                <x-link href="{{ route('transactions',['month' => $key])}}"> {{ $month }} </x-link>
            @endforeach
        </div>
    @endif
    <div></div>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th  class="w-8">{{ __('Date') }}</th>
                <th>{{ __('Title') }}</th>
                <th class="w-8">{{ __('Value') }}</th>
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
                <td>{{ date('d/m/Y',strtotime($transaction->date)) }}</td>
                <td>{{ $transaction->title }}</td>
                <td class="text-center">{{ number_format($transaction->value, 2, ',' ,'.') }}</td>
                <td class="text-center">{{ $transaction->category->name }}</td>
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
                            <p> {{  number_format($transaction->transactionParts->first()->value_paid, 2, ',', '.') }}</p>
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
                                <x-link :href="route('resolving.payment',['id' => $transaction->transactionParts->first()->id
                                ])">
                                    {{ __('Pay') }}
                                </x-link>
                            @elseif ($transaction->bill && $transaction->bill->type == 'to_receive')
                                <x-link :href="route('resolving.confirm',['id' => $transaction->transactionParts->first()->id, 'action' => 'resolving.receipt'])">
                                    {{ __('To receive') }}
                                </x-link>
                            @endif 
                        @else 
                            <x-link :href="route('resolving.confirm', ['id' => $transaction->transactionParts->first()->id, 'action' => 'resolving.extort'])">
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
    {{$transactions->links()}}
</x-app-layout>