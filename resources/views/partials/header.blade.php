{{-- Navbar --}}
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Job<span>Finder</span></a>
        <div class="d-flex">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="nav-link {{ request()->routeIs('jobs.index') ? 'active' : '' }}"
                href="{{ route('jobs.index') }}">Jobs</a>
        </div>
    </div>
</nav>