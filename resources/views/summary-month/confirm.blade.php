<x-app-layout>
    <x-form :action="route('summary.selecting_resources')" :get="__('get')">
        <x-dialog-message>
            <p>Não há registros para o mês anterior, gostaria de gerar-los??</p>
        </x-dialog-message> 
        <x-form-action-buttons>            
            <x-slot name="submitTitle">
                {{ __('Yes') }}
            </x-slot>        
        </x-form-action-buttons>
    </x-form>    
</x-app-layout>