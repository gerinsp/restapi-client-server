<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(45 62 80)">
    <div class="container">
        <a class="navbar-brand text-bold" href="#">REST API Client</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" href="/">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                @if (session()->get('token'))
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ collect(session()->get('user'))->get('name') }}
                    </a>
                @endif
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>
            </li>
        </ul>
        </div>
    </div>
</nav>