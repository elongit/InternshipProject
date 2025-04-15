@props(['name'])
@props(['active' => false])
<a href="{{$name}}"
    {{$attributes->merge(['class' => $active ? 'text-blue-500 font-bold' : 'text-gray-500'])}}>
    {{$slot}}
</a>
