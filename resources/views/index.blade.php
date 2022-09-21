<x-app-layout>   
    <x-flex-box>
      <x-system-icon :link="__(route('users'))">
        {{ __('Transações') }}
      </x-system-icon>
      <x-system-icon :link="__(route('users'))">
        <div>
          {{ __('Usuários') }}
        </div>
      </x-system-icon>
      <x-system-icon :link="__(route('categories'))">
        <div>
          {{ __('Categorias') }}
        </div>
      </x-system-icon>
      <x-system-icon :link="__(route('contracts'))">
        {{ __('Contratos') }}
      </x-system-icon>
      <x-system-icon :link="__(route('financial_entities'))">
        {{ __('Agências') }} {{ __('bancárias') }}
      </x-system-icon>
      <x-system-icon :link="__(route('users'))">
        {{ __('Contas') }} {{ __('Bancárias') }}
      </x-system-icon>
      <x-system-icon :link="__(route('users'))">
         {{ __('Cartões') }} {{ __('de') }} {{ __('Crédito') }}
      </x-system-icon>
      <x-system-icon :link="__(route('payment_types'))">
        {{ __('tipos') }} {{ __('de') }} {{ __('pagamento') }}
      </x-system-icon>
    </x-flex-box>      
</x-app-layout>