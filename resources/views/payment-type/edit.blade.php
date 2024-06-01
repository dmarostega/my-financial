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
        <x-label for="status">{{ __('Status') }}</x-label>
        <x-select name="status">
            @foreach($statuses as $key => $status)
                <x-select-option :value="$key" :isSelected="(bool)($paymentType->status == $key)">
                    {{ $status }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="discount_timing">{{ __('Timing Discount') }}</x-label>
        <x-select id="discount_timing" name="discount_timing">
            @foreach($timings as $key => $timing)
                <x-select-option :value="$timing" :isSelected="(bool)($paymentType->discount_timing == $timing)">
                    {{ $timing }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-radio-button id="is_default" name="is_default" :isChecked="(bool)($paymentType->is_default)">
            is Default
        </x-radio-button>
        @if($errors)
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach         
        @endif
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>