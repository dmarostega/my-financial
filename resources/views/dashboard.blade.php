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
                            
                            <p>{{ __('Contracts') }}</p>
                            <p>{{ $summary->contracts->sum('value') }}</p>
                            
                            <p>{{ __('Contracts to receive') }}</p>                            
                            <p>
                                {{ $summary->transactions->toQuery()->contractsToReceive()->sum('value') }}
                            </p>

                            <p>{{ __('Contracts Received') }}</p>
                            <p>{{ $summary->transactions->toQuery()->contractsReceived()->sum('value') }}</p>
                        </div>

                        <div class="mb-4 p-6 ">
                            <p>{{ __('BILLS') }}</p>
                            <p>{{ $summary->bills->where('type','to_pay')->sum('value') }}</p>

                            <p>{{ __('Paid out') }}</p>
                            <p>{{ $summary->transactions->toQuery()->paidOut()->sum('value') }}
                            <small>(
                                    {{ 
                                        $summary->bills->toQuery()->inCards()->sum('value')
                                    }}  
                                ) in Card</small>
                            </p>
                            <p>{{ __('Balance') }}</p>
                            <p>
                                {{
                                    $summary->transactions->toQuery()->contractsReceived()->sum('value') 
                                    -
                                    $summary->transactions->toQuery()->paidOut()->sum('value')
                                }}
                            </p>
                        </div>       
                        <div class="mb-4 p-6">
                            <div class="pb-3">
                                {{ __('Spending') }}: 
                                <p>All: 
                                    {{
                                        $summary->transactions->toQuery()
                                        ->whereDoesntHave('bill')                                      
                                        ->sum('value') 
                                    }}
                                </p>
                                <p> To pay: 
                                    {{
                                        $summary->transactions->toQuery()
                                            ->whereDoesntHave('bill')
                                            ->noHasPayment()
                                            ->sum('value') 
                                    }}
                                </p>
                            </div>
                            <div>
                                @foreach ($summary->transactions->pluck('paymentType.name','paymentType.id')->unique() as $paymentType => $name)

                                    <p> {{ $name }}: 
                                        {{ 
                                            $summary->transactions->toQuery()
                                            ->hasPaymentIn([$paymentType])
                                            ->whereDoesntHave('bill')
                                            ->sum('value')
                                            }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <div  class="mb-4 p-6">
                            <h3>Balance</h3>
                            <h2>
                                {{ 
                                    (   
                                        $summary->transactions->toQuery()->contractsReceived()->sum('value')
                                    )
                                    -
                                    (
                                        $summary->transactions->toQuery()->paidOut()->sum('value')
                                            +
                                        $summary->transactions->toQuery()
                                            ->hasPaymentIn(1)
                                            ->whereDoesntHave('bill')
                                            ->whereDoesntHave('card')
                                            ->sum('value')
                                        +
                                        $summary->transactions->toQuery()
                                            ->whereDoesntHave('bill')
                                            ->hasPaymentIn([3,4])
                                            ->sum('value')                                       
                                    )
                                }}
                            </h2>
                        </div>                            
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1  class="mb-4 ">{{ __('My accounts') }}</h1>
                    <div style="width: 90%; margin: 0 auto; display: flex">
                        <div class="mb-4 p-6">
                            <h3 class="pb-8"> Total: {{ $summary->financialAccounts->sum('balance') }}</h3>
                            @foreach($summary->financialAccounts as $account)
                                <div class="pb-3">
                                    <p>{{ __('Entity') }}: {{ $account->entity->name }}</p>
                                    <p>   {{ __('balance') }}: {{ $account->balance }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
