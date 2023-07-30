<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>
    <div class="search">
        @if (request()->routeIs('user.index'))
            <form action="">
                <label>
                    @if (request('status'))
                        <input
                        type="hidden"
                        name="status"
                        value="{{ request('status') }}"
                        />
                    @endif
                    <input type="text" name="search"  placeholder="Search users here.." class="ms-1" value="{{ request('search') }}">
                    <ion-icon name="search-outline" class="mt-2 p-1"></ion-icon>
                </label>
            </form>
        @else
            <h2 class="text-muted">{{ auth()->user()->name }}'s Dashboard</h2>
        @endif


    </div>
    <div class="user">
        <a href="">
            <img src="{{ asset('assets/imgs/abstract-user-flat-4.png') }}" alt="Admin Profile" title="{{ auth()->user()->name }}'s Profile">
        </a>
    </div>

</div>
