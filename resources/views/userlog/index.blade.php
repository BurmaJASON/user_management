<x-layout>
    <div class="detail">

        <div class="recentLogs">
            <div class="cardHeaders">
                <h3>Total - {{ $logs->total() }}</h3>
            </div>

            @if (count($logs) != 0)
                <table>

                    <tbody>
                        @foreach ($logs as $index => $log)
                            @if ($log->user)
                            <tr>
                                <td>
                                    <span>
                                        <b class="me-2">{{ $log->user->id == Auth()->user()->id ? 'You' : $log->user->name }}</b> <span class="status event">{{ $log->event }}</span>   <b class="mx-2 text-secondary">{{ $log->data['name'] }}({{ $log->data['email'] }})</b>  {{ $log->created_at->diffForHumans() }}.
                                    </span>
                                </td>
                            </tr>
                            @else
                            <tr>

                                <td>
                                    <span>
                                        <b>Unknown User</b> <span class="status event">{{ $log->event }}</span> <b class="mx-2 text-secondary">{{ $log->data['name'] }}({{ $log->data['email'] }})</b>  {{ $log->created_at->diffForHumans() }}.
                                    </span>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                {{ $logs->links() }}
                @else
                <h1 class="text-center text-secondary mt-5">There is No Activity Here!</h1>
            @endif
        </div>
    </div>
</x-layout>
