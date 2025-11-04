<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Cadastrando') }} {{ __('categoria') }}</h2>
    </x-slot>
    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="flex flex-col">
            <x-label for="name">
                {{ __('Name') }}
            </x-label>
            <x-input id="name" name="name" type="text" value="{{ $category->name }}" />
            <x-label for="description">{{ __('Description') }}</x-label>
            <x-textarea id="description" name="description" >{{ $category->description }}</x-textarea>
            @if($errors)
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach         
            @endif
            <x-form-action-buttons></x-form-action-buttons>
        </div>
    </form>
</x-app-layout>