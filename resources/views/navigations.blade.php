<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Finance Tracker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cashins.index') }}">Cash Ins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cashouts.index') }}">Cash Outs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tags') }}">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

            {{-- Optional search bar included --}}
            @include('search')
