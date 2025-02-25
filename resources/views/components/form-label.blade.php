@props(['name'])

<label for="{{ $name }}" {{$attributes->merge(['class' => 'text-lg'])}} >
    {{ $slot }}
</label>
