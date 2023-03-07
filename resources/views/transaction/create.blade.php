<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }} {{  __('uma') }} {{ __('transação') }}</h2>
    </x-slot>
    <x-form :action="route('transaction.store')">
        <x-label for="date">{{ __('Data') }}</x-label>
        <x-input id="date" name="date" value="{{ @date(old('date')) }}"/>
        <x-label for="title">{{ __('Título') }}</x-label>
        <x-input id="title" name="title" value="{{ old('title') }}" />
        <x-label for="description">{{ __('Descrição') }}</x-label>
        <x-textarea id="description" name="description"></x-textarea>
        <x-label for="value">{{ __('Valor') }}</x-label>
        <x-input id="value" name="value" value="{{ old('value') }}" />
        <x-label for="payment_type_id">{{ __('Tipo') }} {{ __('Pagamento') }}</x-label>
        <x-select id="payment_type_id" name="payment_type_id">
            @foreach($types as $type)
                <x-select-option value="{{ $type->id }}">{{ $type->name }}</x-select-option>
            @endforeach
        </x-select>
        <x-label for="card_id">{{ __('Card') }}</x-label>
        <x-select id="card_id" name="card_id">
            @foreach($cards as $card)
                <x-select-option value="{{ $card->id }}">{{ $card->title }}</x-select-option>
            @endforeach
        </x-select>
        <x-label for="category_id">{{ __('Categoria') }}</x-label>
        <x-select id="category_id" name="category_id">
            @foreach($categories as $category)
                <x-select-option value="{{ $category->id }}">{{ $category->name }}</x-select-option>
            @endforeach
        </x-select>
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>