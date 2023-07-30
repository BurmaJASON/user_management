<div class="recentLogs">
    <div class="cardHeaders">
        <h3>Recent Activities</h3>
        <a href="" class="btn">View All</a>
    </div>

    <table>
        {{-- @if (count($logs) != 0) --}}
        <thead>
            <tr>
                <td>Name</td>
                <td>Course</td>
                <td>Price</td>
                <td>Status</td>
            </tr>
        </thead>

        <tbody>

            {{-- @foreach ($enrollments as $enrollment)

                <tr>
                    <td>{{ $enrollment->user->user_name }}</td>
                    <td>{{ $enrollment->course->title }}</td>
                    <td>${{ $enrollment->course->price }}</td>
                    <td>
                        @if ($enrollment->status == 0)
                            <span class="status pending">Pending</span>
                        @elseif ($enrollment->status == 1)
                            <span class="status delivered">Accepted</span>
                        @else
                            <span class="status return">Rejected</span>
                        @endif
                    </td>
                </tr>
            @endforeach --}}
        {{-- @else
            <h1 class="text-center text-secondary mt-5">No Enrollments yet!</h1>
        @endif --}}
        </tbody>
    </table>
</div>
