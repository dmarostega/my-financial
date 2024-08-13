@props(['value' => '', 'isSelected' => false])

<option value="{{ $value }}" {!! $attributes->merge(['class'=>'hidden space-x-8 sm:-my-px sm:ml-10 sm:flex']) !!} {{ $isSelected == 1 ? 'selected' : ''}}>
    {{ $slot }}
</option>