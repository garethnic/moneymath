<nav class="navBar">
    <ul>
        @if (Auth::check())
            <li class="nav-item"><a href="/login">App</a></li>
            <li class="nav-item"><a href="/contact">Contact</a></li>

            <form action="{{ url('/logout') }}" method="post">
                {{ csrf_field() }}
                <li>
                    <input type="submit" class="nav-item" style="background:none; display:inline; border-width:0px; color:#1b6d85; text-decoration:none;" value="Logout"/>
                </li>
            </form>
        @else
            <li class="nav-item"><a href="/login">Login</a></li>
            <li class="nav-item"><a href="/contact">Contact</a></li>
            <li class="nav-item"><a href="/register">Register</a></li>
        @endif
    </ul>
</nav>