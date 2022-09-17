<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Tipos') }} {{ __('de') }} {{ __('pagamento') }}
        </h2>
    </x-slot>
    <x-button type="button">
        <a href="{{ route('payment_type.create') }}">
            {{ __('novo') }}
        </a>
    </x-button>
    <x-table>
        <x-slot name="headers">
            <tr>
                <th>name</th>
                <th>description</th>                
                <th>created</th>
                <th>update</th>
                <th>delete</th>
                <th>actions</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($paymentTypes as $paymentType)
                <tr>
                    <td>
                        {{ $paymentType->name }}
                    </td>
                    <td>
                        {{ $paymentType->description }}
                    </td>
                    <td>
                        {{ $paymentType->created_at }}
                    </td>
                    <td>
                        {{ $paymentType->updated_at }}
                    </td>
                    <td>
                        {{ $paymentType->deleted_at }}
                    </td>
                    <td>
                        <x-link :href="route('payment_type.edit', ['id' => $paymentType->id])">
                            {{ __('Editar') }}
                        </x-link>
                        <x-link :href="route('payment_type.delete', ['id' => $paymentType->id])">
                            {{ __('Deletar') }}
                        </x-link>
                    </td>
                </tr>
            @endforeach
        </x-slot>      
    </x-table>
</x-app-layout>