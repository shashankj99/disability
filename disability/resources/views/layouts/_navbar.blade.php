<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark bg-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        @yield('nav-menu')
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fas fa-lock"></span> {{ __(' साईन आउट') }} </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>