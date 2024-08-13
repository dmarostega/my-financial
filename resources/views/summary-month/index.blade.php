<x-app-layout>
    <h1>
        {{ __('Summaries') }}
    </h1>
    <x-table>
        <x-slot name="headers">    
            <tr>
                <th>
                    {{ __('Date') }}
                </th>
                <th>
                    {{ __('Infos') }}
                </th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($summaries as $summary)                
                <tr>
                    <td>
                        {{ $summary->date }}
                    </td>
                    <td>
                        @if($summary->items->count() == 0)
                            <p>Não há itens. Deseja fazer rechecagem?</p>
                        @endif
                        @foreach ($summary->items as $item)
                               @include('components.cards.summary-item', $item)
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>