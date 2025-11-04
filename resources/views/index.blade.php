<x-app-layout>  
  <x-flex-box>
    <div>
        <x-system-icon :link="route('transactions')">
          {{ __('Transactions') }}
        </x-system-icon>
        <x-system-icon :link="route('bills')">
          {{ __('Accounts') }}
        </x-system-icon>
      </div>
      <div>
        <x-system-icon :link="route('categories')">
          {{ __('Categories') }}
        </x-system-icon>
        <x-system-icon :link="route('contracts')">
          {{ __('Contracts') }}
        </x-system-icon>
        <x-system-icon :link="route('financial_entities')">
          {{ __('Financial Entities') }}
        </x-system-icon>
        <x-system-icon :link="route('financial_accounts')">
          {{ __('Financial Accounts') }}
        </x-system-icon>
        <x-system-icon :link="route('cards')">
          {{ __('Cards') }} 
        </x-system-icon>
        <x-system-icon :link="route('payment_types')">
          {{ __('Payment Types') }}
        </x-system-icon>
        <x-system-icon :link="route('users')">
          {{ __('Users') }}      
        </x-system-icon>
        <x-system-icon :link="route('summaries')">
          {{ __('Summaries') }}
        </x-system-icon>
      </div>
    </x-flex-box> 
</x-app-layout>