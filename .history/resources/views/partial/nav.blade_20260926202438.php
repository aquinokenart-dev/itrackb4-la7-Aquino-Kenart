<nav class="nav">
    <a class="nav-link {{ request()->is('movies*') ? 'active fw-bold text-primary' : '' }}"
       href="{{ route('movies.index') }}">Movie List</a>
    <a class="nav-link" href="{{ route('movies.show', 1) }}">Sample Movie</a>
</nav>