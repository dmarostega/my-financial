<x-app-layout>
    <x-slot name="header">
        {{ __('Suas') }}{{ __('Contas') }} {{ __('Bancárias') }}
    </x-slot>
    <div>
        <x-link :href="route('financial_account.create')">
            Novo
        </x-link>
    </div>
    <x-table class="table table-dark">
        <x-slot name="headers">
            <tr>
                <th>{{ __('Number') }}</th>
                <th>{{ __('Agency') }}</th>
                <th>{{ __('Accout') }}</th>
                <th>{{ __('Institution') }}</th>
                <th>{{ __('Update') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </x-slot>
        <x-slot name="body">    
            @foreach($financialAccounts as $financialAccount)
            <tr>
                <td>{{ $financialAccount->entity_number }} - {{ $financialAccount->entity_dv }}</td>
                <td>{{ $financialAccount->account }} - {{ $financialAccount->account_dv }}</td>
                <td>{{ $financialAccount->entity->name }}</td>
                <td>{{ $financialAccount->created_at }}</td>
                <td>{{ $financialAccount->updated_at }}</td>
                <td>
                    <x-link :href="route('financial_account.edit',['id' => $financialAccount->id])">
                        {{ __('Edit') }}
                    </x-link>
                    <x-link :href="route('financial_account.delete', ['id' => $financialAccount->id])">
                        {{ __('Delete') }}
                    </x-link>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>