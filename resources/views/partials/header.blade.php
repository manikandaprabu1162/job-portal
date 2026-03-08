{{-- Modern Navbar --}}
<nav class="navbar navbar-expand-lg modern-navbar">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand brand-logo" href="{{ route('home') }}">
            <i class="bi bi-briefcase-fill me-2"></i>
            Job<span>Finder</span>
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">

            <ul class="navbar-nav align-items-center">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('jobs.index') ? 'active' : '' }}"
                        href="{{ route('jobs.index') }}">
                        <i class="bi bi-briefcase me-1"></i> Jobs
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>