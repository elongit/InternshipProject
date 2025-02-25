@props(['name'])
@error($name)
       <p class='font-italic text-red-600 text-sm font-semibold'> {{$message}}</p>
@enderror