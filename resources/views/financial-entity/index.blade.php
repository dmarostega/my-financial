<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Agências Bancárias') }}</h2>
    </x-slot>
    <x-button type="button">
        <a href="{{ route('financial_entity.create') }}">
        {{ __('novo') }}</a></x-button>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>{{ __('code') }}</th>
                <th>{{ __('name') }}</th>
                <th>{{__('created') }}</th>
                <th>{{ __('updated') }}</th>
                <th>{{ __('deleted') }}</th>
                <th>{{ __('actions') }}</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($financialEntities  as $financialEntity)
                <tr>
                    <td>
                        {{ $financialEntity->code }}
                    </td>
                    <td>
                        {{ $financialEntity->name }}
                    </td>
                    <td>
                        {{ $financialEntity->created_at }}
                    </td>
                    <td>
                        {{ $financialEntity->updated_at }}
                    </td>
                    <td>
                        {{ $financialEntity->deleted_at }}
                    </td>
                    <td>
                        <x-link :href="route('financial_entity.edit',['id' => $financialEntity->id])">{{ __('edit') }}</x-link>
                        <x-link :href="route('financial_entity.delete',['id' => $financialEntity->id]) ">
                            Deletar
                        </x-link>
                    </td>
                </tr>                 
             @endforeach
        </tbody>
    </table>
</x-app-layout>