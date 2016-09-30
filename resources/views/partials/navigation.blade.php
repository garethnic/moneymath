<nav class="navBar">
    <ul>
        @if (Auth::check())
            <li class="nav-item"><a href="/logout">Logout</a></li>
        @else
            <li class="nav-item"><a href="/login">Login</a></li>
        @endif

        <li class="nav-item"><a href="/register">Register</a></li>
    </ul>
</nav>

<script>
    $(document).ready(function () {
        $('.navBar').slicknav({label: ''});
    });
</script>