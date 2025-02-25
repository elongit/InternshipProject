@props(['name'])
@props(['active' => false])
<a href="{{$name}}"
    {{$attributes->merge(['class' => $active ? 'text-blue-500 font-bold' : 'text-black'])}}>
    {{$slot}}
</a>
