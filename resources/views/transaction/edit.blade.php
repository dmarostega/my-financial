<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Editando') }}</h2>
    </x-slot>
    <x-form :action="route('transaction.update', ['id' => $transaction->id])" :method="__('put')">
        <x-label for="date">{{ __('Data') }}</x-label>
        <x-input id="date" name="date" value="{{ @date($transaction->date) }}"/>
        <x-label for="title">{{ __('Título') }}</x-label>
        <x-input id="title" name="title" value="{{ $transaction->title }}" />
        <x-label for="description">{{ __('Descrição') }}</x-label>
        <x-textarea id="description" name="description"></x-textarea>
        <x-label for="value">{{ __('Valor') }}</x-label>
        <x-input id="value" name="value" value="{{ $transaction->value }}" />
        <x-label for="payment_type_id">{{ __('Tipo') }} {{ __('Pagamento') }}</x-label>
        <x-select id="payment_type_id" name="payment_type_id">
            @foreach($types as $type)
                <x-select-option value="{{ $type->id }}" :isSelected="(bool)($type->id === $transaction->paymentType->id)">{{ $type->name }}</x-select-option>
            @endforeach
        </x-select>
        <x-label for="card_id">{{ __('Card') }}</x-label>        
        <x-select id="card_id" name="card_id">
            <x-select-option></x-select-option>
            @foreach($cards as $card)
                <x-select-option value="{{ $card->id }}" :isSelecte="(bool)($transaction->card_id === $card->id)">{{ $card->title }}</x-select-option>
            @endforeach
        </x-select>
        <x-label for="category_id">{{ __('Categoria') }}</x-label>
        <x-select id="category_id" name="category_id">
            @foreach($categories as $category)
                <x-select-option value="{{ $category->id }}" :isSelected="(bool)($category->id == $transaction->category->id)">{{ $category->name }}</x-select-option>
            @endforeach
        </x-select>
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>