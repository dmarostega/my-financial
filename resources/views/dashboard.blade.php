<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1  class="mb-4 ">{{ __('Month') }}: ({{ $month }}) {{ date('M') }}</h1>
                    <div style="width: 90%; margin: 0 auto; display: flex">
                        <div class="mb-4 p-6">
                            <p>{{ __('Sum Contracts') }}</p>
                            <p>{{ $summary->contracts->sum('value') }}</p>
                            <p>{{ __('Balance') }}</p>
                            <p>{{
                                    $summary->contracts->sum('value') -  $summary->transactions->map(function($transaction){
                                                                            return $transaction->transactionParts->whereNotNull('payment_date')->sum('value_paid');
                                                                        })->sum()
                                }}
                            </p>
                        </div>

                        <div class="mb-4 p-6 ">
                            <p>{{ __('Total bills to pay') }}</p>
                            <p>{{ $summary->bills->where('type','to_pay')->sum('value') }}</p>
                            <p>{{ __('Paid out') }}:
                            {{ 
                                $summary->transactions->whereNotNull('bill_id')
                                                        ->whereNull('card_id')->map(function($transaction){
                                                            return $transaction->transactionParts->whereNotNull('payment_date')->sum('value_paid');
                                                        })->sum()
                            }}
                            </p>
                            <p>{{ __('Balance') }}</p>
                            <p>{{  $summary->bills->where('type','to_pay')->sum('value')  -  $summary->transactions->map(function($transaction){
                                                                            return $transaction->transactionParts->whereNotNull('payment_date')->sum('value_paid');
                                                                        })->sum() }}</p>
                        </div>       
                        
                        <div class="mb-4 p-6 ">
                            <p>{{ __('Bills to receive') }}</p>
                            <p>{{ $summary->bills->where('type','to_receive')->sum('value') }}</p>
                        </div>                    

                        <div class="mb-4 p-6 ">
                            <p>
                                {{ __('All transactions') }}
                            </p>
                            <p>
                                {{ $summary->transactions->sum('value') }}
                            </p>
                        </div>

                        {{-- <div class="mb-4 p-6">
                            <p>{{ __('Balance Transactions') }}</p>
                            <p>{{ $summary->contracts->sum('value') - $summary->transactions->sum('value') }}</p>
                        </div> --}}



                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
