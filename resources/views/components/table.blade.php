
@props(['headers'])

<table class="table table-dark">
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