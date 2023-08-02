<div class="recentLogs">
    <div class="cardHeaders">
        <h3>Recent Activities</h3>
        <a href="{{ route('log.index') }}" class="btn">View All</a>
    </div>

    <table>
        @if (count($logs) != 0)
            @foreach ($logs as $log)

                @if ($log->user)
                <tr>
                    <td>
                        <span>
                            <b>{{ $log->user->name }}</b> {{ $log->event }} an account {{ $log->created_at->diffForHumans() }}.
                        </span>
                    </td>
                </tr>
                @else
                <tr>

                    <td>
                        <span>
                            <b>Unknown User</b> {{ $log->event }} an account {{ $log->created_at->diffForHumans() }}
                        </span>
                    </td>
                </tr>
                @endif
            @endforeach
        @else
            <h1 class="text-center text-secondary mt-5">No Enrollments yet!</h1>
        @endif
    </table>
</div>
