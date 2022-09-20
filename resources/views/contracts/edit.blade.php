<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Cadastrando')  }} {{ __('um') }}  {{ __('contrato') }}
        </h2>
    </x-slot>
    <x-form :action="route('contract.update',['id' => $contract->id])" :method="__('put')">
        <x-label for="title">{{ __('Título') }}</x-label>
        <x-input id="title" name="title" value="{{ $contract->title }}"/>

        <x-label for="value" class="lg:w-80">{{ __('Valor') }}</x-label>
        <x-input id="value" name="value" value="{{ $contract->value }}" />
    
        <x-label for="prediction" class="lg:w-80">{{ __('Previsão') }}</x-label>
        <x-input id="prediction" name="prediction" class="lg:w-80" value="{{ $contract->prediction }}"/>  

        <x-label for="date_init">{{  __('Inicio') }}</x-label>
        <x-input id="date_init" name="date_init" value="{{ $contract->date_init }}"/>

        <x-label for="date_end">{{ __('Final') }}</x-label>
        <x-input id="date_end" name="date_end" value="{{ $contract->date_end }}" />

        <div>
            <hr>
        </div>

        <h2>Tomador</h2>

        <x-label for="name">{{ __('Nome') }}</x-label>
        <x-input id="name" name="name" value="{{ $contract->person->name }}" />

        <x-label for="last_name">{{ __('Sobrenome') }} {{ __('ou') }} {{ __('razão') }} {{ __('social') }}</x-label>
        <x-input id="last_name" name="last_name" value="{{ $contract->person->last_name }}"/>

        <x-label for="register_number">{{ __('Número de Registro') }}</x-label>
        <x-input id="register_number" name="register_number" value="{{ $contract->person->register_number }}" />

        <x-label for="type">{{ __('Tipo') }}</x-label>
        @php
            $types = ['individual','legal'];
        @endphp
        <x-select>
            @foreach ($types as $type)
                <x-select-option :value="$type" >
                    {{ $type }}
                </x-select-option>
            @endforeach
        </x-select>
    
        @if($errors)
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>