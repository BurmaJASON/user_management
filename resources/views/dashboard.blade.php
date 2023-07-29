<x-layout>


    @if(auth()->check())
    <div class="details">
        Hello {{ auth()->user()->name }}
    </div>

    @endif



</x-layout>
