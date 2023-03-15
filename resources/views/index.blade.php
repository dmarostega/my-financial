<x-app-layout>  
  <x-flex-box>
    <div>
        <div>
          <x-link href="{{ route('check_bills') }}">
            {{ __('Check bills') }}
          </x-link>
          <x-link href="{{ route('check_transactions') }}">
            {{ __('Check transactions') }}
          </x-link>
        </div> 
        <x-system-icon :link="route('transactions')">
          {{ __('Transações') }}
        </x-system-icon>
        <x-system-icon :link="route('bills')">
          {{ __('Contas') }}
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
          {{ __('Financial entities') }} {{ __('bancárias') }}
        </x-system-icon>
        <x-system-icon :link="route('financial_accounts')">
          {{ __('Fin. account') }} {{ __('Bancárias') }}
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
      </div>
    </x-flex-box> 
</x-app-layout>