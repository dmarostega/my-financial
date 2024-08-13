@props(['action','method','get' => false])
<form action="{{ $action ?? '#' }}" method="{{ ($get ? $get : null) ?? 'post' }}"{!! $attributes->merge(['class'=> '']) !!}>
    @csrf
    @if(isset($method))
        @method($method)
    @endif
    <div class="flex flex-col">
        {{ $slot ?? $content ?? 'no-content' }}
    </div>
</form>