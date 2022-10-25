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
        <x-label for="type">{{ __('Tipo') }} {{ __('Pagamento') }}</x-label>
        <x-select id="type" name="type">
            @foreach($types as $type)
                <x-select-option value="{{ $type->id }}" :isSelected="(bool)($type->id === $transaction->paymentType->id)">{{ $type->name }}</x-select-option>
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