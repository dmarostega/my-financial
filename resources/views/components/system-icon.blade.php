@props(['link'])

<div style="
    border: 1px solid rgb(67, 82, 75);
    width: 5em;
    height: 5em;
    background: rgb(46, 47, 59);
    color: white;
    margin: .5em;
    text-align: center;"
>
    <a 
    style="display: block; height: inherit;"
    href="{{ $link }}" >
        {{ $slot }}
    </a>
</div>