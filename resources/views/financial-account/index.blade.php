<x-app-layout>
    <x-slot name="header">
        {{ __('Accounts') }}
    </x-slot>
    <x-link :href="route('financial_account.create')">
        {{ __('New') }}
    </x-link>
    <x-table class="table table-dark">
        <x-slot name="headers">
            <tr>
                <th>{{ __('Number') }}</th>
                <th>{{ __('Agency') }}</th>
                <th>{{ __('Accout') }}</th>
                <th>{{ __('Institution') }}</th>
                <th>
                    <p>
                        {{ __('Actions') }}
                    </p>
                    <p>
                        <small>{{ __('Update') }}</small>
                    </p>
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">    
            @foreach($financialAccounts as $financialAccount)
            <tr>
                <td>{{ $financialAccount->entity_number }} - {{ $financialAccount->entity_dv }}</td>
                <td>{{ $financialAccount->account }} - {{ $financialAccount->account_dv }}</td>
                <td>{{ $financialAccount->entity->name }}</td>
                <td>...</td>
                <td></td>
                <td>
                    <x-link :href="route('financial_account.edit',['id' => $financialAccount->id])">
                        {{ __('Edit') }}
                    </x-link>
                    <x-link :href="route('financial_account.delete', ['id' => $financialAccount->id])">
                        {{ __('Delete') }}
                    </x-link>
                    <div>
                        {{ $financialAccount->updated_at }}
                    </div>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>