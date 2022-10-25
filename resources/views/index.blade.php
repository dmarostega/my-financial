<x-app-layout>   
    <x-flex-box>
      <x-system-icon :link="__(route('transactions'))">
        {{ __('Transações') }}
      </x-system-icon>
      <x-system-icon :link="__(route('users'))">
        {{ __('Usuários') }}      
      </x-system-icon>
      <x-system-icon :link="__(route('categories'))">
        {{ __('Categorias') }}      
      </x-system-icon>
      <x-system-icon :link="__(route('contracts'))">
        {{ __('Contratos') }}
      </x-system-icon>
      <x-system-icon :link="__(route('financial_entities'))">
        {{ __('Agências') }} {{ __('bancárias') }}
      </x-system-icon>
      <x-system-icon :link="__(route('financial_accounts'))">
        {{ __('Contas') }} {{ __('Bancárias') }}
      </x-system-icon>
      <x-system-icon :link="__(route('cards'))">
         {{ __('Cartões') }} 
      </x-system-icon>
      <x-system-icon :link="__(route('payment_types'))">
        {{ __('Tipos') }} {{ __('de') }} {{ __('pagamento') }}
      </x-system-icon>
    </x-flex-box>      
</x-app-layout>