<x-app-layout>   
    <x-flex-box>
      <x-system-icon :link="route('transactions')">
        {{ __('Transações') }}
      </x-system-icon>
      <x-system-icon :link="route('users')">
        {{ __('Usuários') }}      
      </x-system-icon>
      <x-system-icon :link="route('categories')">
        {{ __('Categorias') }}      
      </x-system-icon>
      <x-system-icon :link="route('contracts')">
        {{ __('Contratos') }}
      </x-system-icon>
      <x-system-icon :link="route('financial_entities')">
        {{ __('Agências') }} {{ __('bancárias') }}
      </x-system-icon>
      <x-system-icon :link="route('financial_accounts')">
        {{ __('Contas') }} {{ __('Bancárias') }}
      </x-system-icon>
      <x-system-icon :link="route('cards')">
         {{ __('Cartões') }} 
      </x-system-icon>
      <x-system-icon :link="route('payment_types')">
        {{ __('Tipos') }} {{ __('de') }} {{ __('pagamento') }}
      </x-system-icon>
    </x-flex-box>      
</x-app-layout>