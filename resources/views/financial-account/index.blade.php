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
                <th>{{ __('Account') }}</th>
                <th>{{ __('Balance') }}</th>
                <th>{{ __('Institution') }}</th>
                <th class="action-col">
                    <p>
                        {{ __('Actions') }}
                    </p>
                    <p>
                        <small>{{ __('Update at') }}</small>
                    </p>
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">    
            @foreach($financialAccounts as $financialAccount)
            <tr>
                <td>{{ $financialAccount->entity_number }} - {{ $financialAccount->entity_dv }}</td>
                <td>{{ $financialAccount->account }} - {{ $financialAccount->account_dv }}</td>
                <td>{{ $financialAccount->balance }}</td>
                <td>{{ $financialAccount->entity->name }}</td>
                <td class="action-col">
                    <x-link :href="route('financial_account.edit',['id' => $financialAccount->id])">
                        {{ __('Edit') }}
                    </x-link>
                    <x-link :href="route('financial_account.delete', ['id' => $financialAccount->id])">
                        {{ __('Delete') }}
                    </x-link>
                    <div>
                        <small>
                            {{ $financialAccount->updated_at }}
                        </small>
                    </div>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>