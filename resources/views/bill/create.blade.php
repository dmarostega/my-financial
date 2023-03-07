<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }}  {{  __('Conta') }}</h2>
    </x-slot>
    <x-form :action="route('bill.store')" method="post">
        <x-label for="title">{{ __('Title') }}</x-label>
        <x-input type="text" id="title" name="title" value="{{ old('title') }}"/>
        <x-label for="value">{{ __('Value') }}</x-label>
        <x-input type="text" id="value" name="value" value="{{ old('value') }}"/>
        <x-label for="due_date">{{ __('Due Date') }}</x-label>
        <x-input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}"/>
        <x-label for="type">{{ __('Type') }}</x-label>
        <x-select name="type" id="type">
            @foreach($types as $key => $type)
                <x-select-option :value="$key">
                    {{ $type }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="category_id">{{ __('Category') }}</x-label>
        <x-select name="category_id" id="category_id">
            @foreach($categories as $category)
                <x-select-option :value="$category->id">
                    {{ $category->name }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="frequency">{{ __('Frequency') }}</x-label>
        <x-select name="frequency">
            @foreach($frequencies as $key => $frequency)
                <x-select-option :value="$key">
                    {{ $frequency }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="status">{{ __('Status') }}</x-label>
        <x-select name="status">
            @foreach($statuses as $key => $status)
                <x-select-option :value="$key">
                    {{ $status }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-label for="contract">Contracts</x-label>
        <x-select name="contract_id" id="contract">
            <x-select-option></x-select-option> 
            @foreach($contracts as $contract)
                <x-select-option :value="$contract->id">
                    {{ $contract->title }}
                </x-select-option>
            @endforeach
        </x-select>
        <x-form-action-buttons></x-form-action-buttons>
    </x-form>
</x-app-layout>