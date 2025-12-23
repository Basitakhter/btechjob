<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>@yield('title') | JobCorner - Find Your Dream Job</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --primary-blue: #0066FF;
            --secondary-blue: #0052CC;
            --accent-teal: #00D4AA;
            --dark-blue: #003D99;
            --light-blue: #E6F0FF;
            --lightest-blue: #F5FAFF;
            --dark-gray: #1E293B;
            --medium-gray: #64748B;
            --light-gray: #F1F5F9;
            --gradient-primary: linear-gradient(135deg, #0066FF 0%, #00D4AA 100%);
            --gradient-secondary: linear-gradient(135deg, #E6F0FF 0%, #F5FAFF 100%);
            --shadow-sm: 0 4px 6px -1px rgba(0, 102, 255, 0.1);
            --shadow-md: 0 10px 25px rgba(0, 102, 255, 0.15);
            --shadow-lg: 0 20px 50px rgba(0, 102, 255, 0.2);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            color: var(--dark-gray);
            line-height: 1.6;
            overflow-x: hidden;
            background-color: white;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        /* ============ NAVBAR ============ */
        .navbar {
            background: white;
            padding: 0.5rem 0;
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid var(--light-blue);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.75rem 0;
            box-shadow: var(--shadow-md);
        }

        .navbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            font-size: 1.75rem;
            color: var(--primary-blue) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand span {
            color: var(--accent-teal);
        }

        .navbar-toggler {
            border: 2px solid var(--light-blue);
            padding: 0.5rem;
            border-radius: 8px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
        }

        .navbar-nav {
            gap: 0.5rem;
        }

        .nav-link {
            color: var(--medium-gray) !important;
            font-weight: 600;
            padding: 0.75rem 1.25rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
            background: var(--light-blue);
            transform: translateY(-2px);
        }

        .nav-link.active {
            color: white !important;
            background: var(--gradient-primary);
            box-shadow: var(--shadow-sm);
        }

        .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            padding: 0.5rem;
            min-width: 200px;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: var(--dark-gray);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--light-blue);
            color: var(--primary-blue);
            transform: translateX(5px);
        }

        .dropdown-divider {
            border-color: var(--light-blue);
            margin: 0.5rem 0;
        }

        /* Auth Buttons */
        .btn-login {
            background: transparent;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            background: var(--light-blue);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-register {
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .user-dropdown-btn {
            background: var(--lightest-blue);
            color: var(--primary-blue);
            border: 2px solid var(--light-blue);
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-dropdown-btn:hover {
            background: var(--light-blue);
            transform: translateY(-2px);
        }

        /* ============ FOOTER ============ */
        .footer {
            background: var(--dark-gray);
            color: white;
            padding: 4rem 0 2rem;
            margin-top: auto;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-primary);
        }

        .footer-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            font-size: 2rem;
            color: white;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-brand span {
            color: var(--accent-teal);
        }

        .footer-tagline {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
            max-width: 300px;
        }

        .footer-section h5 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            font-weight: 700;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .footer-section h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--accent-teal);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .footer-links a:hover {
            color: var(--accent-teal);
            transform: translateX(5px);
        }

        .footer-links a i {
            font-size: 0.9rem;
            width: 20px;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background: var(--primary-blue);
            transform: translateY(-3px);
        }

        .newsletter-form {
            margin-top: 1.5rem;
        }

        .newsletter-input {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 0.875rem 1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
        }

        .newsletter-input:focus {
            outline: none;
            border-color: var(--accent-teal);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(0, 212, 170, 0.1);
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .btn-newsletter {
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.875rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 1rem;
            width: 100%;
        }

        .btn-newsletter:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .footer-divider {
            border-color: rgba(255, 255, 255, 0.1);
            margin: 3rem 0;
        }

        .footer-bottom {
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            padding-top: 2rem;
        }

        /* ============ RESPONSIVE ============ */
        @media (max-width: 992px) {
            .navbar-nav {
                padding: 1rem 0;
            }
            
            .nav-link {
                padding: 0.75rem !important;
            }
            
            .auth-buttons {
                flex-direction: column;
                width: 100%;
                margin-top: 1rem;
            }
            
            .btn-login, .btn-register {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .footer {
                padding: 3rem 0 1.5rem;
            }
            
            .footer-section {
                margin-bottom: 2rem;
            }
            
            .footer-brand {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .footer-social {
                justify-content: center;
            }
        }

        /* ============ ACCESSIBILITY ============ */
        @media (prefers-reduced-motion: reduce) {
            .navbar, .nav-link, .btn-login, .btn-register, 
            .footer-links a, .footer-social a {
                transition: none !important;
                transform: none !important;
            }
        }

        /* High Contrast Mode */
        @media (prefers-contrast: high) {
            .navbar {
                border-bottom: 2px solid black;
            }
            
            .nav-link.active {
                border: 2px solid black;
            }
            
            .footer {
                background: black;
            }
        }

        /* Touch Device Optimizations */
        @media (hover: none) and (pointer: coarse) {
            .nav-link:hover, .btn-login:hover, .btn-register:hover {
                transform: none;
            }
            
            .nav-link:active, .btn-login:active, .btn-register:active {
                transform: scale(0.98);
            }
            
            .nav-link, .btn-login, .btn-register {
                padding: 1rem !important;
                min-height: 48px;
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-briefcase"></i> Job<span>Corner</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#jobcornerNavbar"
                    aria-controls="jobcornerNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="jobcornerNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('jobs') ? 'active' : '' }}" href="/jobs">
                            <i class="fas fa-search"></i> Find Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('companies') ? 'active' : '' }}" href="/companies">
                            <i class="fas fa-building"></i> Companies
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="/services">
                            <i class="fas fa-gear"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">
                            <i class="fas fa-circle-info"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>
                </ul>

                <div class="auth-buttons d-flex gap-2">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-login">
                            <i class="fas fa-right-to-bracket"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-register">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    @else
                        <div class="dropdown">
                            <button class="btn user-dropdown-btn dropdown-toggle" type="button" 
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">
                                    <i class="fas fa-user-circle me-2"></i>My Profile
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('user.applications') }}">
                                    <i class="fas fa-file-alt me-2"></i>Applications
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('user.settings') }}">
                                    <i class="fas fa-cog me-2"></i>Settings
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item text-danger">
                                            <i class="fas fa-right-from-bracket me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h3 class="footer-brand">
                        <i class="fas fa-briefcase"></i> Job<span>Corner</span>
                    </h3>
                    <p class="footer-tagline">
                        Connecting talented professionals with top companies worldwide. 
                        Find your dream job with our AI-powered matching platform.
                    </p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Job Seekers</h5>
                        <ul class="footer-links">
                            <li><a href="/jobs"><i class="fas fa-chevron-right"></i> Find Jobs</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Career Advice</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Resume Builder</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Interview Prep</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Salary Calculator</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Employers</h5>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Post Jobs</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Browse Candidates</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Employer Dashboard</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Hiring Solutions</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Pricing</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Stay Updated</h5>
                        <p class="text-white-50 mb-3">
                            Subscribe to our newsletter for the latest job opportunities and career tips.
                        </p>
                        <form class="newsletter-form">
                            <input type="email" class="newsletter-input" placeholder="Your email address" required>
                            <button type="submit" class="btn btn-newsletter">
                                <i class="fas fa-paper-plane me-2"></i> Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="footer-divider">

            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-bottom">
                        <p class="mb-0">
                            © {{ date('Y') }} JobCorner. All rights reserved. 
                            <a href="/privacy" class="text-white-50 ms-2">Privacy Policy</a> | 
                            <a href="/terms" class="text-white-50 ms-2">Terms of Service</a> | 
                            <a href="/cookies" class="text-white-50 ms-2">Cookie Policy</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <div class="footer-bottom">
                        <p class="mb-0">
                            <i class="fas fa-map-marker-alt me-2"></i> 123 Career Street, Tech City
                            <br class="d-lg-none">
                            <i class="fas fa-phone ms-lg-3 me-2"></i> +1 (555) 123-4567
                            <br class="d-lg-none">
                            <i class="fas fa-envelope ms-lg-3 me-2"></i> info@jobcorner.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Set active nav link based on current page
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });

        // Newsletter form submission
        document.querySelector('.newsletter-form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('.newsletter-input').value;
            
            // Simple validation
            if (email && email.includes('@')) {
                alert('Thank you for subscribing to our newsletter!');
                this.reset();
            } else {
                alert('Please enter a valid email address.');
            }
        });

        // Mobile menu improvements
        document.addEventListener('click', function(e) {
            if (window.innerWidth < 992) {
                const navbarCollapse = document.getElementById('jobcornerNavbar');
                const isNavbarToggler = e.target.closest('.navbar-toggler');
                
                if (!isNavbarToggler && !e.target.closest('#jobcornerNavbar') && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            }
        });

        // Add loading state to buttons
        document.querySelectorAll('.btn-login, .btn-register, .btn-newsletter').forEach(button => {
            button.addEventListener('click', function() {
                if (!this.classList.contains('loading')) {
                    this.classList.add('loading');
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Processing...';
                    
                    // Reset after 2 seconds (for demo)
                    setTimeout(() => {
                        this.classList.remove('loading');
                        if (this.classList.contains('btn-login')) {
                            this.innerHTML = '<i class="fas fa-right-to-bracket"></i> Login';
                        } else if (this.classList.contains('btn-register')) {
                            this.innerHTML = '<i class="fas fa-user-plus"></i> Register';
                        } else if (this.classList.contains('btn-newsletter')) {
                            this.innerHTML = '<i class="fas fa-paper-plane me-2"></i> Subscribe';
                        }
                    }, 2000);
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>