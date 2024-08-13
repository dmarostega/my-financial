<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }} {{  __('uma') }} {{ __('transação') }}</h2>
    </x-slot>
    <x-form :action="route('transaction.store')">
        <div class="columns-2">
            <x-label for="date">{{ __('Data') }}</x-label>
            <x-input type="date" class="form-input w-full" id="date" name="date" value="{{ @date(old('date')) }}"/>        
            <x-label for="time">{{ __('Time') }}</x-label>
            <x-input  type="time" class="form-input w-full" id="time" name="time" value="{{ @date(old('date')) }}"/>
        </div>
        <x-label for="title">{{ __('Título') }}</x-label>
        <x-input id="title" name="title" value="{{ old('title') }}" />
        <x-label for="description">{{ __('Descrição') }}</x-label>
        <x-textarea id="description" name="description"></x-textarea>
        <x-label for="value">{{ __('Valor') }}</x-label>
        <x-input id="value" name="value" value="{{ old('value') }}" 
            x-data="moneyMask" 
            type="text" 
            x-model="value" 
            x-on:input="applyMask" 
            placeholder="R$ 0,00" 
        />

        <x-label for="payment_type_id">{{ __('Tipo') }} {{ __('Pagamento') }}</x-label>
        <x-select id="payment_type_id" name="payment_type_id">
            @foreach($types as $type)
                <x-select-option value="{{ $type->id }}" :isSelected="(bool)($type->id == old('payment_type_id'))">{{ $type->name }}</x-select-option>
            @endforeach
        </x-select>
        <x-label for="card_id">{{ __('Card') }}</x-label>
        <x-select id="card_id" name="card_id">
            <x-select-option></x-select-option>
            @foreach($cards as $card)
                <x-select-option value="{{ $card->id }}" :isSelected="(bool)($card->id == old('card_id'))">{{ $card->title }}</x-select-option>
            @endforeach
        </x-select>
        <x-label for="category_id">{{ __('Categoria') }}</x-label>
        <x-select id="category_id" name="category_id">
            @foreach($categories as $category)
                <x-select-option value="{{ $category->id }}" :isSelected="(bool)($category->id == old('category_id'))">{{ $category->name }}</x-select-option>
            @endforeach
        </x-select>
        <label class="mt-2" for="add-more">
            <input type="radio" id="add-more" name="add_more" value="{{ old('add_more') }}">
            <span>Continuar registrando</span>
        </label>
        <x-form-action-buttons></x-form-action-buttons>
        </x-form>
</x-app-layout>