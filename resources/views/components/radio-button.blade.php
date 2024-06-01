@props(['value' => '', 'isChecked' => false])

<div>
    <input {{ $attributes->merge(['type' => 'radio', 'class' => 'inline-flex']) }}
        @if($isChecked)
            checked
        @endif       
    />
    <label  style="text-align: center" for="">{{$slot}}</label>
</div>

