<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Deletando') }} {{ __('tipo') }} {{  __('pagamento') }}</h2>
    </x-slot>
    <x-form :action="route('payment_type.destroy',['id' => $paymentType->id])" :method="__('delete')">        
        <x-dialog-message>
            Deseja realmente deletar o tipo pagamento <span style="font-style: italic;">
                    {{ $paymentType->name }}
                </span>
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                Deletar
            </x-slot>
        </x-form-action-buttons>        
    </x-form>
</x-app-layout>