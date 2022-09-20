<x-app-layout>   
    <x-flex-box>
      <x-system-icon :link="__(route('users'))">
        Transações
      </x-system-icon>
      <x-system-icon :link="__(route('users'))">
        <div>
          Usuários          
        </div>
      </x-system-icon>
      <x-system-icon :link="__(route('categories'))">
        <div>
          Categorias
        </div>
      </x-system-icon>
      <x-system-icon :link="__(route('contracts'))">
        Contratos
      </x-system-icon>
      <x-system-icon :link="__(route('financial_entities'))">
        Agências bancárias
      </x-system-icon>
      <x-system-icon :link="__(route('users'))">
        Contas Bancárias
      </x-system-icon>
      <x-system-icon :link="__(route('users'))">
         Cartões de Crédito
      </x-system-icon>
      <x-system-icon :link="__(route('payment_types'))">
        {{ __('tipos') }} de {{ __('pagamento') }}
      </x-system-icon>
    </x-flex-box>      
</x-app-layout>