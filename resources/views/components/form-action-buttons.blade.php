<div class="mt-2">
   <x-button type="button" onclick="javascript:window.history.back()">
        {{ __('Cancelar') }}
   </x-button>
   <x-button>
       {{ $submitTitle ?? __('Salvar') }}
   </x-button>
</div>