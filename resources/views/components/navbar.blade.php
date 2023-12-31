<div class="navigation">
    <ul class="p-0">
        <li>
            <a href="{{ route('dashboard') }}">
                <span class="icon">
                    <ion-icon name="desktop-outline"></ion-icon>
                </span>
                <span class="title">User Management</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard') }}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>


        <li>
            <a href="{{ route('user.index') }}">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Users</span>
            </a>
        </li>

        <li>
            <a href="{{ route('log.index') }}">
                <span class="icon">
                    <ion-icon name="file-tray-full-outline"></ion-icon>
                </span>
                <span class="title">Logs</span>
            </a>
        </li>




        {{--<li>
            <a href="{{ route('list') }}">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Admins/Users</span>
            </a>
        </li>

        <li>
            <a href="{{ route('category') }}">
                <span class="icon">
                    <ion-icon name="clipboard-outline"></ion-icon>
                </span>
                <span class="title">Subjects</span>
            </a>
        </li>

        <li>
            <a href="{{ route('course') }}">
                <span class="icon">
                    <ion-icon name="albums-outline"></ion-icon>
                </span>
                <span class="title">Courses</span>
            </a>
        </li>

        <li>
            <a href="{{ route('enrollments') }}">
                <span class="icon">
                    <ion-icon name="desktop-outline"></ion-icon>
                </span>
                <span class="title">Enrollments</span>
            </a>
        </li>


        <li>
            <a href="{{ route('comments') }}">
                <span class="icon">
                    <ion-icon name="chatbubble-outline"></ion-icon>
                </span>
                <span class="title">Comments</span>
            </a>
        </li> --}}



        <li>
            <a href="{{ route('password#page') }}">
                <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </span>
                <span class="title">Password</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <form action="{{ route('logout') }}" method="post" >
                    @csrf
                    <button class="title btn btn-secondary-link " type="submit" >Sign Out</button>
                </form>
            </a>
        </li>
    </ul>
</div>
