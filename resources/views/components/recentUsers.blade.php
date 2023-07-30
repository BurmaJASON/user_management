@if(request()->routeIs('dashboard'))
    <div class="recentUsers">
        <div class="cardHeaders">
            <h3>Recent Users</h3>
        </div>

        <table>
            @if (count($users) != 0)
                @foreach ($users as $user)
                    <tr>
                        <td width="60px">
                            <div class="imgBx">
                                <img src="{{ asset('assets/imgs/abstract-user-flat-4.png') }}" alt="">
                            </div>
                        </td>
                        <td>
                            <h4>{{ $user->name }} <br> <span>{{ $user->email }}</span></h4>
                        </td>
                    </tr>
                @endforeach
            @else
                <h1 class="text-center text-secondary mt-5">Noone yet!</h1>
            @endif
        </table>
    </div>
@endif

