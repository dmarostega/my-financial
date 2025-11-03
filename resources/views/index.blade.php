<x-app-layout>  
  <x-flex-box>
    <div>
        <x-system-icon :link="route('transactions')">
          {{ __('Transações') }}
        </x-system-icon>
        <x-system-icon :link="route('bills')">
          {{ __('Contas') }}
        </x-system-icon>
      </div>
      <div>
        <x-system-icon :link="route('categories')">
          {{ __('Categorias') }}
        </x-system-icon>
        <x-system-icon :link="route('contracts')">
          {{ __('Contratos') }}
        </x-system-icon>
        <x-system-icon :link="route('financial_entities')">
          {{ __('Bancos') }}
        </x-system-icon>
        <x-system-icon :link="route('financial_accounts')">
          {{ __('Contas Bancárias') }}
        </x-system-icon>
        <x-system-icon :link="route('cards')">
          {{ __('Cartões') }} 
        </x-system-icon>
        <x-system-icon :link="route('payment_types')">
          {{ __('Tipos de Pagamento') }}
        </x-system-icon>
        <x-system-icon :link="route('users')">
          {{ __('Usuários') }}      
        </x-system-icon>
        <x-system-icon :link="route('summaries')">
          {{ __('Relatórios') }}
        </x-system-icon>
      </div>
    </x-flex-box> 
</x-app-layout>