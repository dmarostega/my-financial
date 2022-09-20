@props(['value' => '#'])

<option value="{{ $value }}" {!! $attributes->merge(['class'=>'hidden space-x-8 sm:-my-px sm:ml-10 sm:flex']) !!} >
    {{ $slot }}
</option>