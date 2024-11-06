<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('buildings.index') }}">Building Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('buildings.*') ? 'active' : '' }}" href="{{ route('buildings.index') }}">Building List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('report') ? 'active' : '' }}" href="{{ route('report') }}">Bill Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tariffs.*') ? 'active' : '' }}" href="{{ route('tariffs.index') }}">Tariff Editor</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
