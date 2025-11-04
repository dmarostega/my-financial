<x-app-layout>
    <x-slot name="header">
        <h2> {{ __('Deleting') }} {{ __('Bill') }}</h2>
    </x-slot>
    <x-form :action="route('bill.destroy',['id' => $bill->id ])" :method="__('delete')">
        <x-dialog-message>
            {{ __('Confirm removal of') }}  {{ $bill->title }} ? 
        </x-dialog-message>
        <x-form-action-buttons>
            <x-slot name="submitTitle">
                {{ __('Delete') }}
            </x-slot>
        </x-form-action-buttons>
    </x-form>
</x-app-layout>