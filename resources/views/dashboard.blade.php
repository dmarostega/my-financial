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
                            
                            <p>{{ __('Contracts to receive') }}</p> 

                            <p>{{ $summary->transactions->toQuery()
                            ->whereHas('bill', function($query){
                                $query->where('type', 'to_receive');
                                $query->whereNotNull('contract_id');    
                            })->whereDoesntHave('transactionParts')->sum('value') }}</p>

                            <p>{{ __('Contracts Received') }}</p>
                            <p>{{ $summary->transactions->toQuery()->whereHas('bill', function($query){
                                $query->where('type', 'to_receive');
                                $query->whereNotNull('contract_id');
                            })->whereHas('transactionParts', function($query){
                                $query->whereNotNull('payment_date');
                            })->sum('value') }}</p>
                        </div>

                        <div class="mb-4 p-6 ">
                            <p>{{ __('Total bills to pay') }}</p>
                            <p>{{ $summary->bills->where('type','to_pay')->sum('value') }}</p>

                            <p>{{ __('Paid out') }}</p>
                            <p>{{ 
                                $summary->transactions->toQuery()
                                ->whereHas('bill', function($query){
                                    $query->where('type','to_pay');
                                })
                                ->whereHas('transactionParts', function($query){
                                    $query->whereNotNull('payment_date');
                                })->sum('value')
                            }}
                            <small>(
                                    {{ 
                                        $summary->bills->toQuery()
                                        ->whereHas('transaction', function($query){
                                            $query->whereHas('card');
                                        })->sum('value')
                                    }}  
                                ) in Card</small>
                            </p>
                            <p>{{ __('Balance payments') }}</p>
                            <p>{{                                  
                            
                            $summary->transactions->toQuery()->whereHas('bill', function($query){
                                $query->where('type', 'to_receive');
                                $query->whereNotNull('contract_id');
                            })->whereHas('transactionParts', function($query){
                                $query->whereNotNull('payment_date');
                            })->sum('value') 
                            -
                            $summary->transactions->toQuery()->whereHas('bill', function($query){
                                $query->where('type','to_pay');
                            })
                            ->whereHas('transactionParts', function($query){
                                $query->whereNotNull('payment_date');
                            })->sum('value')
                            
                            }}</p>
                        </div>       
                        <div class="mb-4 p-6">
                            <p>{{ __('Spending') }}</p>
                            <p>
                               Money: {{
                                   $summary->transactions->toQuery()
                                    ->whereHas('paymentType', function($query){
                                        $query->where('id',1);
                                    })
                                    ->whereDoesntHave('bill')
                                    ->whereDoesntHave('card')
                                    ->sum('value')
                                }}
                            </p>
                            <p>
                                Debit: {{ 
                                    $summary->transactions->toQuery()
                                        ->whereDoesntHave('bill')
                                        ->whereHas('card', function($query){
                                            $query->whereIn('type',['debit','multiple']);
                                        })
                                        ->whereHas('paymentType', function($query){
                                            $query->whereIn('id', [3,4]);   
                                        })
                                        ->sum('value')
                                       }}
                            </p>
                            
                            <p>
                                Credit: {{ 
                                    $summary->transactions->toQuery()
                                        ->whereDoesntHave('bill')
                                        ->whereHas('card')
                                        ->whereHas('paymentType', function($query){
                                            $query->whereIn('id', [2]);   
                                        })
                                        ->sum('value')
                                       }}
                            </p>
                        
                            <p>

                                {{ $summary->transactions->sum('value') }}

                            </p>
                        </div>
                        <div  class="mb-4 p-6">
                            <h3>Balance</h3>
                            <h2>
                                {{ 
                                    (   
                                        $summary->transactions->toQuery()
                                            ->whereHas('bill', function($query){
                                                $query->where('type', 'to_receive');
                                                // $query->whereNotNull('contract_id');
                                            })->whereHas('transactionParts', function($query){
                                                $query->whereNotNull('payment_date');
                                            })->sum('value') 
                                    )
                                    -
                                    (
                                        $summary->transactions->toQuery()
                                            ->whereHas('bill', function($query){
                                                $query->where('type','to_pay');
                                            })
                                            ->whereHas('transactionParts', function($query){
                                                $query->whereNotNull('payment_date');
                                            })->sum('value') 
                                            +
                                        $summary->transactions->toQuery()
                                            ->whereHas('paymentType', function($query){
                                                $query->where('id',1);
                                            })
                                            ->whereDoesntHave('bill')
                                            ->whereDoesntHave('card')
                                            ->sum('value')
                                        +
                                        $summary->transactions->toQuery()
                                            ->whereDoesntHave('bill')
                                            // ->whereHas('card', function($query){
                                            //     $query->whereIn('type',['debit','multiple']);
                                            // })
                                            ->whereHas('paymentType', function($query){
                                                $query->whereIn('id', [3,4]);   
                                            })
                                                ->sum('value')                                       
                                    )
                                }}
                            </h2>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
