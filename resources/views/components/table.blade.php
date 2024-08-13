
@props(['headers'])

<table class="table table-dark table-default">
    <thead class="thead-dark">
        {{ $headers }}
    </thead>
    <tbody>
        {{ $body }}
    </tbody>
    @if(isset($footer))
        <tfoot>
            {{ $footer }}
        </tfoot>
    @endif
</table>