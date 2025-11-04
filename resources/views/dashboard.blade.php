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
                    <h1  class="mb-4 ">{{ __('Month') }}: ({{ $today->month }}) {{ date('M') }}</h1>
                    <h2>{{  $lastMonth->month }}</h2>
                    <h3>{{  $nextMonth->month }}</h3>
                    <div style="width: 90%; margin: 0 auto; display: flex">
                        <div class="mb-4 p-6">
                            
                            <p><strong>{{ __('Contracts') }}</strong></p>
                            @if($summary->contracts->count() > 0)
                                <p>{{ $summary->contracts()->isActive()->sum('value') }}</p>
                            @endif
                            <p><strong>{{ __('Contracts to Receive') }}</strong></p>      
                            <p>
                                @if($summary->transactions->count() > 0)
                                    {{ $summary->transactions()->contractsToReceive()->sum('value') }}
                                @endif
                            </p>

                            <p><strong>{{ __('Contracts Received') }}</strong></p>
                            @if($summary->transactions->count() > 0)
                              <p>{{ 
                              $total_received ?? 0
                            }}</p>
                            @endif
                        </div>
                        {{-- BILLS --}}
                        <div class="mb-4 p-6 ">
                            <p><strong>{{ __('Bills') }}</strong></p>
                            <div> {{ __('All') }}
                                {{ 
                                    $summary->transactions->filter(function($item) {                                    
                                        return $item->bill && $item->bill->type == 'to_pay' && !$item->card && $item->bill->status = 1;
                                    })->sum('value')
                                }} 
                                <small>
                                    {{
                                        (
                                            $summary->contracts()->isActive()->sum('value') ?? 0
                                        )
                                        -
                                        $summary->transactions->filter(function($item) {                                    
                                           return $item->bill && $item->bill->type == 'to_pay' && !$item->card && $item->bill->status = 1;
                                        })->sum('value')
                                    }}
                                </small>
                            </div>
                            <p>{{ __('Fixed') }}
                                {{ 
                                    $summary->transactions->filter(function($item) {                                    
                                        return $item->bill && $item->bill->type == 'to_pay' && !$item->card && $item->bill->status = 1;
                                    })->sum('value')
                                }} 
                            </p>
                            <hr/>
                            <p>{{ __('Paid out') }}</p>
                                @if($summary->transactions->count() > 0)
                                    <p>{{ 
                                        $summary->transactions->filter(function($item) {
                                            return $item->bill && $item->bill->type == 'to_pay'
                                            &&
                                            $item->transactionParts->first()->payment_date != null;
                                        })->sum('value') }}
                                @endif
                            <p>{{ __('Balance') }}</p>
                            <p>
                                @if($summary->transactions->count() > 0)
                                    {{
                                        (
                                            $total_received ?? 0
                                        )
                                        -
                                        ($summary->transactions->filter(function($item) {
                                            return $item->bill && $item->bill->type == 'to_pay'
                                            &&
                                            $item->transactionParts->first()->payment_date != null;
                                        })->sum('value'))
                                    }}
                                @endif
                            </p>
                        </div>       
                        <div class="mb-4 p-6">
                            <div class="pb-3">
                                {{-- SPENDING --}}
                                <strong>{{ __('Spending') }}</strong>
                                <p> {{ __('All') }}: 
                                    @if(isset($expenses))
                                        {{
                                           $expenses->sum('value') 
                                        }}
                                    @endif
                                </p>
                                <p> {{ __('To pay') }}: 
                                    @if(isset($expenses_to_pay))
                                    {{
                                        $expenses_to_pay
                                            ->sum('value') 
                                    }}
                                @endif
                                </p>
                                <p> {{ __('Paided') }}: 
                                    @if(isset($expenses_paided))
                                        {{
                                            $expenses_paided
                                                ->sum('value') 
                                        }}
                                    @endif
                                </p>
                            </div>
                            <div>
                                <h4><strong>{{__('Per Payment Type')}}</strong></h4>
                                @foreach ($summary->transactions->pluck('paymentType.name','paymentType.id')->unique() as $paymentType => $name)
                                    <p> 
                                        {{ $name }}: 
                                        @if($summary->transactions->count() > 0)
                                        {{  
                                            $summary->transactions->filter(function($item) use ($paymentType) {
                                                return !$item->bill && $item->payment_type_id == $paymentType;
                                            })->sum('value')
                                        }}
                                        @endif
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <div  class="mb-4 p-6">
                            <h3><strong>{{ __('Balance') }}</strong></h3>
                            <h2>
                                @if($summary->transactions->count() > 0)
                                    {{ 
                                        (
                                            $total_received ?? 0
                                        )
                                       -
                                       (
                                        $expenses_paided
                                                ->sum('value') 
                                        +
                                        $summary->transactions
                                            ->filter(function($item) {
                                                return $item->bill && $item->bill->type == 'to_pay';
                                            })
                                            ->sum('value')
                                       )
                                    }}
                                @endif
                            </h2>
                        </div>
                        <div  class="mb-4 p-6">
                                <h2><strong>{{ __('Prevision for') }} {{$nextMonth->format('F')}}({{$nextMonth->month}})</strong></h2>
                                 <p>
                                    {{
                                        $summary->contracts()->isActive()->sum('value')                                         
                                        -
                                        $expenses_to_pay
                                                ->sum('value') 
                                        -
                                        \App\Models\Bill::isActive()->where('type','to_pay')->sum('value') 
                                    }}
                                </p>
                        </div>
                          
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div  style="display:flex">
                        <div class="p-6 bg-white border border-gray-200">
                            <h1  class="mb-4 "><strong>{{ __('My Accounts') }}</strong></h1>
                            <div style="width: 90%; margin: 0 auto; display: flex">
                                <div class="mb-4 p-6">
                                    <h3 class="pb-8"> Total: {{ $summary->financialAccounts->sum('balance') }}</h3>
                                    @foreach($summary->financialAccounts as $account)
                                        <div class="pb-3">
                                            <p>{{ __('Entity') }}: {{ $account->entity->name }}</p>
                                            <p>   {{ __('Balance') }}: {{ $account->balance }} <small><a href="{{ route('financial_account.edit', ['id' => $account->id]) }}" style="color: blue">Atualizar</a></small></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>                    
                        </div>
                        <div class="p-6 bg-white border border-gray-200">
                            <h2><strong>{{__('Daily Expenses')}}</strong></h2>
                            @if(isset($daily_expenses))
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{$daily_expenses->sum() }} / {{ ($today->day) }} = 
                                        {{($daily_expenses->sum() > 0 ? $daily_expenses->sum() :1 ) / ( ($today->day) > 0 ?  ($today->day) : 1) }}
                                        @foreach ($daily_expenses as $date => $expensed)
                                            <tr style="padding: 1em; border-botton: 1px solid gray">
                                                <td>{{ date('d/m/Y', strtotime($date)) }}</td>
                                                <td>{{$expensed}}</td>
                                            </tr>                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>

                <div  class="p-6 bg-white border-b border-gray-200">
                    <div style="width: 90%; margin: 0 auto; display: flex">

                        <x-link href="{{ route('check_bills') }}" class="m-1">
                        {{ __('Check Bills') }}
                        </x-link>
                        {{-- <x-link href="{{ route('check_transactions') }}" class="m-3">
                        {{ __('Check transactions') }}
                        </x-link> --}}
                        <x-link href="{{ route('summary.check_month') }}" class="m-3">
                        {{ __('Check Summary Month') }}
                        </x-link>
                  </div> 
                </div>
            </div>
        </div>
    </div>

    {{-- 
        esconde experiência proffisionais para teste
    --}}
    {{-- @include('extra-expertises') --}}
</x-app-layout>
