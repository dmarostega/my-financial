<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Cadastrando') }} {{ __('tipos') }}  {{ __('de') }} {{ __('pagamento') }}
        </h2>
    </x-slot>
    <x-form :action="route('payment_type.update',['id' => $paymentType->id])" :method="__('put')">        
        <x-label for="name">{{ __('Nome') }}</x-label>
        <x-input id="name" name="name" value="{{ $paymentType->name }}"></x-input>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <x-label for="description">{{ __('Descrição') }}</x-label>
        <x-textarea id="description" name="description">{{ $paymentType->description }}</x-textarea>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
        @if($errors)
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach         
        @endif
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>