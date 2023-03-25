<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Financial Entities') }}</h2>
    </x-slot>
    <x-link :href="route('financial_entity.create')">
        {{ __('New') }}
    </x-link>
    <x-table class="table table-dark">
        <x-slot name="headers">
            <tr>
                <th>{{ __('Code') }}</th>
                <th>{{ __('Name') }}</th>
                <th>
                    <p>
                        {{ __('Actions') }}
                    </p>
                    <p>
                        <small>
                            {{ __('Updated at') }}
                        </small>
                    </p>
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">
             @foreach ($financialEntities  as $financialEntity)
                <tr>
                    <td>
                        {{ $financialEntity->code }}
                    </td>
                    <td>
                        {{ $financialEntity->name }}
                    </td>
                    <td>
                        <x-link :href="route('financial_entity.edit',['id' => $financialEntity->id])">
                            {{ __('Edit') }}
                        </x-link>
                        <x-link :href="route('financial_entity.delete',['id' => $financialEntity->id]) ">
                            {{ __('Delete') }}
                        </x-link>
                        <div>
                            {{ $financialEntity->updated_at }}
                        </div>
                    </td>
                </tr>                 
             @endforeach
        </x-slot>
    </x-table>
</x-app-layout>