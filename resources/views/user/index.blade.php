<x-layout>
    <div class="detail">

        <div class="recentLogs">
            <div class="cardHeaders">
                <h3>Total - {{ $users->count() }}</h3>

            </div>

            {{-- @if (count($users) != 0) --}}
                <table>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Status</td>
                            <td>Joined Date</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td class="">{{ $user->name }}</td>
                                <td  class="">{{ $user->email }}</td>
                                <td  class="">
                                    @if ($user->status == 2)
                                        Admin
                                    @else
                                        User
                                    @endif

                                </td>
                                <td  class="">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="">
                                    @if ($user->id == Auth()->user()->id)

                                    @else

                                        <a href="" class="btn btn-link-primary">
                                            <ion-icon name="eye"></ion-icon>
                                        </a>

                                        <a href="" class="btn btn-link-primary" title="edit">
                                            {{-- <ion-icon name="create" ></ion-icon> --}}
                                            <ion-icon name="pencil-outline"></ion-icon>
                                        </a>

                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-link-primary">
                                                <ion-icon name="trash"></ion-icon>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $all->links() }} --}}
            {{-- @else
                <h1 class="text-center text-secondary mt-5">There is Noone Here!</h1>
            @endif --}}
        </div>
    </div>
</x-layout>
