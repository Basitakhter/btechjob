<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | JobCorner</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Inter:wght@400;600&family=Nunito:wght@400;600&family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        .navbar-brand {
    font-size: 22px;
    letter-spacing: 0.5px;
}

.navbar .nav-link {
    color: #333;
    transition: all 0.3s ease;
}

.navbar .nav-link i {
    margin-right: 4px;
    color: #0d6efd;
}

.navbar .nav-link:hover {
    color: #0d6efd;
}
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
            <i class="fa fa-briefcase"></i> Job<span class="text-dark">Corner</span>
        </a>

        <!-- Mobile Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#jobcornerNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="jobcornerNavbar">

            <!-- Center Menu -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/') }}">
                        <i class="fa fa-home"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/jobs') }}">
                        <i class="fa fa-search"></i> Find Jobs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/companies') }}">
                        <i class="fa fa-building"></i> Companies
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/services') }}">
                        <i class="fa fa-cogs"></i> Services
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/about') }}">
                        <i class="fa fa-info-circle"></i> About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/contact') }}">
                        <i class="fa fa-envelope"></i> Contact
                    </a>
                </li>

            </ul>

            <!-- Right Buttons -->
            <div class="d-flex align-items-center gap-2">
                 @if(!Auth::check())
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fa fa-sign-in"></i> Login
                </a>

                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-user-plus"></i> Register
                </a>
                @else
                <div class="dropdown">
                                <a class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" 
                                href="#" 
                                role="button" 
                                id="profileDropdown" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false">
                                    <i class="fa fa-user-circle me-2"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <li><a class="dropdown-item" href="/">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="/">Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item text-danger" type="submit">
                                                <i class="fa fa-sign-out"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif

            

            </div>

        </div>
    </div>
</nav>

@yield ('content')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
