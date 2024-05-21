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
                    <h2>{{ $lastMonth }}</h2>
                    <h3>{{ $nextMonth }}</h3>
                    <div style="width: 90%; margin: 0 auto; display: flex">
                        <div class="mb-4 p-6">
                            
                            <p>{{ __('Contracts') }}</p>
                            @if($summary->contracts->count() > 0)
                                <p>{{ $summary->contracts->sum('value') }}</p>
                            @endif
                            <p>{{ __('Contracts to receive') }}</p>                            
                            <p>
                                @if($summary->transactions->count() > 0)
                                    {{ $summary->transactions->toQuery()->contractsToReceive()->sum('value') }}
                                @endif
                            </p>

                            <p>{{ __('Contracts Received') }}</p>
                            @if($summary->transactions->count() > 0)
                              <p>{{ $summary->transactions->toQuery()->contractsReceived()->sum('value') }}</p>
                            @endif
                        </div>

                        <div class="mb-4 p-6 ">
                            <p>{{ __('BILLS') }}</p>
                            @if($summary->bills->count() > 0)
                            <p>{{ $summary->bills->where('type','to_pay')->sum('value') }}</p>
                            @endif

                            <p>{{ __('Paid out') }}</p>
                            @if($summary->transactions->count() > 0)
                                <p>{{ $summary->transactions->toQuery()->paidOut()->sum('value') }}
                            @endif
                            @if($summary->bills->count() > 0)
                            <small>(
                                    {{ 
                                        $summary->bills->toQuery()->inCards()->sum('value')
                                    }}  
                                ) in Card</small>
                            </p>
                            @endif
                            <p>{{ __('Balance') }}</p>
                            <p>
                                @if($summary->transactions->count() > 0)
                                    {{
                                        $summary->transactions->toQuery()->contractsReceived()->sum('value') 
                                        -
                                        $summary->transactions->toQuery()->paidOut()->sum('value')
                                    }}
                                @endif
                            </p>
                        </div>       
                        <div class="mb-4 p-6">
                            <div class="pb-3">
                                {{ __('Spending') }}: 
                                <p>All: 
                                    @if($summary->transactions->count() > 0)
                                        {{
                                            $summary->transactions->toQuery()
                                            ->whereDoesntHave('bill')                                      
                                            ->sum('value') 
                                        }}
                                    @endif
                                </p>
                                <p> To pay: 
                                    @if($summary->transactions->count() > 0)
                                        {{
                                            $summary->transactions->toQuery()
                                                ->whereDoesntHave('bill')
                                                ->noHasPayment()
                                                ->sum('value') 
                                        }}
                                    @endif
                                </p>
                            </div>
                            <div>
                                <h4>{{__('Per Payment Type')}}</h4>
                        @foreach ($summary->transactions->pluck('paymentType.name','paymentType.id')->unique() as $paymentType => $name)                                    <p> {{ $name }}: 
                                @if($summary->transactions->count() > 0)

                                        {{ 
                                            $summary->transactions->toQuery()
                                            ->hasPaymentIn([$paymentType])
                                            ->whereDoesntHave('bill')
                                            ->sum('value')
                                            }}
                                            @endif
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <div  class="mb-4 p-6">
                            <h3>Balance</h3>
                            <h2>
                                @if($summary->transactions->count() > 0)
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
                                @endif
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
                                    <p>   {{ __('balance') }}: {{ $account->balance }} <small><a href="{{ route('financial_account.edit', ['id' => $account->id]) }}" style="color: blue">Atualizar</a></small></p>
                                </div>
                            @endforeach
                        </div>
                    </div>                    
                </div>

                <div  class="p-6 bg-white border-b border-gray-200">
                    <div style="width: 90%; margin: 0 auto; display: flex">

                        <x-link href="{{ route('check_bills') }}" class="m-1">
                        {{ __('Check bills') }}
                        </x-link>
                        {{-- <x-link href="{{ route('check_transactions') }}" class="m-3">
                        {{ __('Check transactions') }}
                        </x-link> --}}
                        <x-link href="{{ route('summary.check_month') }}" class="m-3">
                        {{ __('Check summary month') }}
                        </x-link>
                  </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
