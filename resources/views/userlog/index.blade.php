<x-layout>
    <ul>
        @foreach ($logs as $log)
            @if ($log->user->name)
                {{ $log->user->name }} {{ $log->event }} ({{ $log->data['name'] }} - {{ $log->data['email'] }}) {{ $log->created_at->diffForHumans() }}.
            @else
                Unknown User {{ $log->event }} {{ $log->created_at->diffForHumans() }}
            @endif
        @endforeach



    </ul>
</x-layout>
