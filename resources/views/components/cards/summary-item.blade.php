@if(isset($item))
    <ul>
        <li>
            {{$item->model}} = {{ $item->ammount }}             
        </li>
    </ul>
@endif