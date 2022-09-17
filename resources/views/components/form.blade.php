<form action="{{ $action ?? '#' }}" method="{{ $method ?? 'post' }}">
    @csrf
    <div class="flex flex-col">
        {{ $content ?? 'no-content' }}
    </div>
</form>