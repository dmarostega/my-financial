<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Editando') }}  {{  __('Conta') }}</h2>
    </x-slot>
    <x-form :action="route('bill.update', ['id' => $bill->id])" :method="__('put')">
        <x-label for="title">{{ __('Title') }}</x-label>
        <x-input type="text" id="title" name="title" value="{{ $bill->title }}"/>
        <x-label for="value">{{ __('Value') }}</x-label>
        <x-input type="number" id="value" name="value" value="{{ $bill->value }}"/>
        <x-label for="due_date">{{ __('due_date') }}</x-label>
        <x-input type="date" id="due_date" name="due_date" value="{{ $bill->due_date }}"/>
        <x-label for="type">{{ __('Type') }}</x-label>
        <x-select name="type" id="type">
            @foreach($types as $key => $type)
                <x-select-option :value="$key" :isSelected="(bool)( $bill->type == $key)">
                    {{ $type }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="category">{{ __('Category') }}</x-label>
        <x-select name="category" id="category">
            @foreach($categories as $category)
                <x-select-option :value="(string)$category->id" :isSelected="(bool)($bill->category_id == $category->id)">
                    {{ $category->name }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="frequency">{{ __('Frequency') }}</x-label>
        <x-select name="frequency">
            @foreach($frequencies as $key => $frequency)
                <x-select-option :value="$key" :isSelected="(bool)($bill->frequency == $key)">
                    {{ $frequency }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="status">{{ __('Status') }}</x-label>
        <x-select name="status">
            @foreach($statuses as $key => $status)
                <x-select-option :value="$key" :isSelected="(bool)($bill->status == $key)">
                    {{ $status }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="contract">Contracts</x-label>
        <x-select name="contract" id="contract">
            @foreach($contracts as $contract)
                <x-select-option :value="$contract->id" :isSelected="(bool)($bill->contract_id == $contract->id)">
                    {{ $contract->title }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>