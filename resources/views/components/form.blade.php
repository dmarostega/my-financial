@props(['action','method'])
<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'post' }}"{!! $attributes->merge(['class'=> '']) !!}>
    @csrf
    <div class="flex flex-col">
        {{ $content ?? 'no-content' }}
    </div>
</form>