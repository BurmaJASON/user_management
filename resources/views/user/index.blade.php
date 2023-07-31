<x-layout>
    <div class="detail">

        <div class="recentLogs">
            <div class="cardHeaders">
                <h3>Total - {{ $users->total() }}</h3>
                <a href="{{ route('user.create') }}" class="btn">Create User</a>
            </div>

            @if (count($users) != 0)
                <table>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Access</td>
                            <td>Joined Date</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td class="">{{ $user->name }} {{ $user->id == Auth()->user()->id ? '(You)' : '' }}</td>
                                <td  class="">{{ $user->email }}</td>
                                <td  class="">
                                    @if ($user->status == 2)
                                        <span class="status delivered">Approved</span>
                                    @else
                                        <span class="status return">Rejected</span>
                                    @endif

                                </td>
                                <td  class="">{{ $user->created_at->format('d F Y') }}</td>
                                <td class="">
                                    @if ($user->id == Auth()->user()->id)

                                    @else

                                        <a href="" class="btn btn-link-primary">
                                            <ion-icon name="eye"></ion-icon>
                                        </a>
                                        @if (Auth()->user()->status == 2)
                                            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-link-primary" title="edit">
                                                <ion-icon name="pencil-outline"></ion-icon>
                                            </a>

                                            <form action="{{ route('user.destroy',$user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-link-primary">
                                                    <ion-icon name="trash"></ion-icon>
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
             @else
                <h1 class="text-center text-secondary mt-5">There is Noone Here!</h1>
            @endif
        </div>
    </div>
</x-layout>
