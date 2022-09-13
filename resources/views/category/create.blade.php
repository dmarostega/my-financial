<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }} {{ __('categoria') }}</h2>
    </x-slot>
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <x-label for="name">
                {{ __('name') }}
            </x-label>
            <x-input id="name" name="name" type="text" />
            <x-label for="description">{{ __('descrição') }}</x-label>
            <x-textarea id="description" name="description" />
            @if($errors)
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach         
            @endif
            <x-form-action-buttons></x-form-action-buttons>
        </div>
    </form>
</x-app-layout>