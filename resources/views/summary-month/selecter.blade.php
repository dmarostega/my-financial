<x-app-layout>
    <h2>
        {{ __('Select resources to last month.') }}
    </h2>
    <h3>
        {{ $month }}
    </h3>
    <x-form :action="route('summary.create_resources',['month' => $month])">
        <div class="mb-5">
            <p>{{ __('Bills') }}</p>
            @foreach ($resources->bills as $bill)
                <div>
                    <input type="checkbox" name="bills" id="bill_{{ $bill->id }}">
                    <label for="bill_{{ $bill->id }}">{{ $bill->title }}</label>
                    <div>
                        <input type="text" name="bills[{{ $bill->id }}]" >
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mb-5">
            <p>{{ __('Contracts') }}</p>
            @foreach ($resources->contracts as $contract)
                <div>
                    <label for="contract_{{ $contract->id }}">
                        <input type="checkbox" name="contracts" id="contract_{{ $contract->id }}">
                        {{ $contract->title }}
                    </label>
                    <div>
                        <input type="text" name="contracts[{{ $contract->id }}]" >
                    </div> 
                </div>                
            @endforeach
        </div>
        <div >
            <p>{{ __('Financial Accounts') }}</p>
            @foreach ($resources->financialAccounts as $account)
                <div>
                    <div>
                        <input type="checkbox" name="financial_accounts" id="financial_account_{{ $account->id }}">
                        <label for="financial_account_{{ $account->id }}">{{ $account->entity->name }}</label>
                    </div>
                    <div>
                        <input type="text" name="financial_accounts[{{ $account->id }}]" >
                    </div>
                </div>
            @endforeach
        </div>
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>