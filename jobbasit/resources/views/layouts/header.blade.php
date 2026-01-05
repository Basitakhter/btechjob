<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','JobCorner')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
       <!-- jQuery (for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --primary: #0066FF;
            --primary-light: #E6F0FF;
            --primary-dark: #0052D4;
            --accent: #00D4AA;
            --accent-light: #E6FFF9;
            --accent-dark: #00B894;
            --light: #F8FAFC;
            --light-gray: #E2E8F0;
            --gray: #94A3B8;
            --dark: #1E293B;
            --dark-gray: #475569;
            --sidebar-width: 280px;
            --sidebar-bg: linear-gradient(180deg, #F9FBFF 0%, #F0F7FF 100%);
            --shadow-sm: 0 2px 8px rgba(0, 102, 255, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 102, 255, 0.1);
            --shadow-lg: 0 8px 24px rgba(0, 102, 255, 0.12);
            --border-radius: 12px;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #fff;
            color: var(--dark);
            line-height: 1.6;
        }

        /* ================= HEADER ================= */
        .main-header {
            background: #fff;
            border-bottom: 1px solid var(--light-gray);
            position: sticky;
            top: 0;
            z-index: 1100;
            box-shadow: var(--shadow-sm);
        }

        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand span {
            color: var(--accent);
        }

        .navbar-brand::before {
            content: "💼";
            font-size: 1.5rem;
        }

        .nav-link {
            font-weight: 600;
            color: var(--dark-gray) !important;
            padding: 0.75rem 1.25rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-link.active,
        .nav-link:hover {
            color: var(--primary) !important;
            background-color: var(--primary-light);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 1.25rem;
            right: 1.25rem;
            height: 3px;
            background: var(--primary);
            border-radius: 3px 3px 0 0;
        }

        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .dropdown-menu {
            z-index: 1055;
            border-radius: var(--border-radius);
            border: 1px solid var(--light-gray);
            box-shadow: var(--shadow-lg);
            padding: 0.5rem;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        /* ================= LAYOUT ================= */
        .layout {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        /* ================= SIDEBAR ================= */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            border-right: 1px solid var(--light-gray);
            padding: 2rem 1.5rem;
            position: relative;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        /* Decorative sidebar elements */
        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--light-gray);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            box-shadow: var(--shadow-sm);
        }

        .sidebar h6 {
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .user-email {
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .85rem 1rem;
            border-radius: 10px;
            color: var(--dark-gray);
            text-decoration: none;
            margin-bottom: .5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .sidebar a i:first-child {
            width: 20px;
            text-align: center;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--accent-light));
            color: var(--primary);
            box-shadow: var(--shadow-sm);
            transform: translateX(5px);
        }

        .sidebar a.active::before {
            content: '';
            position: absolute;
            left: -1.5rem;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary);
            border-radius: 0 4px 4px 0;
        }

        .sidebar-section {
            margin-bottom: 2rem;
        }

        .sidebar-section h5 {
            font-size: 0.85rem;
            text-transform: uppercase;
            color: var(--gray);
            letter-spacing: 1px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        /* SIDEBAR DROPDOWN */
        .sidebar-dropdown-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            padding: .85rem 1rem;
            border-radius: 10px;
            color: var(--dark-gray);
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sidebar-dropdown-toggle i:first-child {
            width: 20px;
            text-align: center;
        }

        .sidebar-dropdown-toggle .chevron {
            transition: transform 0.3s ease;
            font-size: 0.8rem;
        }

        .sidebar-dropdown-toggle.active .chevron,
        .sidebar-dropdown-toggle:hover .chevron {
            transform: rotate(180deg);
        }

        .sidebar-dropdown-toggle.active,
        .sidebar-dropdown-toggle:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--accent-light));
            color: var(--primary);
            box-shadow: var(--shadow-sm);
        }

        .sidebar-dropdown {
            margin-left: 2.5rem;
            margin-top: 0.5rem;
            display: none;
            flex-direction: column;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sidebar-dropdown.show {
            display: flex;
        }

        .sidebar-dropdown a {
            padding: .6rem 1rem;
            border-radius: 8px;
            font-size: .9rem;
            margin-bottom: 0.25rem;
            background: transparent;
            color: var(--dark-gray);
        }

        .sidebar-dropdown a:hover,
        .sidebar-dropdown a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid var(--light-gray);
        }

        .sidebar-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .stat-item {
            text-align: center;
            flex: 1;
        }

        .stat-value {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--gray);
        }

        /* ================= CONTENT ================= */
        .content {
            flex: 1;
            padding: 2.5rem;
            background-color: var(--light);
            overflow-y: auto;
        }

        .content-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--light-gray);
        }

        .content-header h1 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .content-header p {
            color: var(--gray);
            margin-bottom: 0;
        }

        /* ================= FOOTER ================= */
        footer {
            background: linear-gradient(135deg, var(--dark), #0F172A);
            color: #fff;
            padding: 3rem 0 2rem;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        .footer-logo {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 2rem;
            color: white;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-logo span {
            color: var(--accent);
        }

        .footer-logo::before {
            content: "💼";
            font-size: 1.8rem;
        }

        .footer-tagline {
            color: #CBD5E1;
            font-size: 1rem;
            margin-bottom: 2rem;
            max-width: 300px;
        }

        .footer-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .footer-column h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 1.25rem;
            font-size: 1.1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-column h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--accent);
            border-radius: 3px;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-column li {
            margin-bottom: 0.75rem;
        }

        .footer-column a {
            color: #94A3B8;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-column a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-column a i {
            width: 20px;
            font-size: 0.9rem;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-icon:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: #94A3B8;
            font-size: 0.9rem;
        }

        .footer-bottom a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        .footer-bottom a:hover {
            text-decoration: underline;
        }

        .newsletter-form {
            display: flex;
            margin-top: 1rem;
        }

        .newsletter-form input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 8px 0 0 8px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .newsletter-form input::placeholder {
            color: #94A3B8;
        }

        .newsletter-form button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-form button:hover {
            background: var(--primary-dark);
        }

        @media(max-width: 992px) {
            .sidebar {
                display: none;
            }
            
            .layout {
                min-height: calc(100vh - 60px);
            }
            
            .content {
                padding: 1.5rem;
            }
            
            .footer-links {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 576px) {
            .footer-links {
                grid-template-columns: 1fr;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .nav-link {
                padding: 0.5rem 1rem !important;
            }
        }
    </style>
</head>
<body>

<!-- ================= HEADER ================= -->
<nav class="navbar navbar-expand-lg main-header">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Job<span>Corner</span>
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link {{ request()->is('/')?'active':'' }}" href="/"><i class="fas fa-home me-1"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about')?'active':'' }}" href="/about"><i class="fas fa-info-circle me-1"></i> About Us</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('services')?'active':'' }}" href="/services"><i class="fas fa-concierge-bell me-1"></i> Services</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('available-jobs')?'active':'' }}" href="/available-jobs"><i class="fas fa-search me-1"></i> Find Jobs</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('companies')?'active':'' }}" href="/companies"><i class="fas fa-building me-1"></i> Companies</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('blog')?'active':'' }}" href="/blog"><i class="fas fa-blog me-1"></i> Blog</a></li>
            </ul>

            @guest
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary"><i class="fas fa-sign-in-alt me-1"></i> Sign in</a>
                    <a href="{{ route('register') }}" class="btn btn-primary"><i class="fas fa-user-plus me-1"></i> Register</a>
                </div>
            @else
                <div class="dropdown">
                    <button type="button"
        class="btn btn-outline-primary dropdown-toggle d-flex align-items-center"
        data-bs-toggle="dropdown"
        aria-expanded="false">
                        <i class="fas fa-user-circle me-2"></i>
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fas fa-gauge me-2"></i> Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><hr></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>

<!-- ================= BODY ================= -->
<div class="layout">

    <!-- SIDEBAR -->
    @auth
    @if (
        request()->routeIs('user.dashboard') ||
        request()->routeIs('user.profile') ||
        request()->routeIs('jobs.*') ||
        request()->routeIs('user.yaj') ||
        request()->routeIs('user.settings')
    )
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="user-avatar">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <h6>{{ Auth::user()->name }}</h6>
                <p class="user-email">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div class="sidebar-section">
            <h5>Main</h5>
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard')?'active':'' }}">
                <i class="fas fa-gauge"></i> Dashboard
            </a>

            <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile')?'active':'' }}">
                <i class="fas fa-user-circle"></i> Profile
            </a>

        </div>

        <div class="sidebar-section">
            <h5>Jobs</h5>
            <!-- MY JOBS DROPDOWN -->
            <div class="mb-2">
                <a class="sidebar-dropdown-toggle {{ request()->routeIs('jobs.*') ? 'active' : '' }}"
                   href="javascript:void(0)">
                    <i class="fas fa-briefcase"></i>
                    My Jobs
                    <i class="fas fa-chevron-down chevron ms-auto"></i>
                </a>

                <div class="sidebar-dropdown {{ request()->routeIs('jobs.*') ? 'show' : '' }}">
                    <a href="{{ route('jobs.create') }}"
                       class="{{ request()->routeIs('jobs.create') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle"></i>
                        Create Job
                    </a>

                    <a href="{{ route('jobs.index') }}"
                       class="{{ request()->routeIs('jobs.index') ? 'active' : '' }}">
                        <i class="fas fa-list"></i>
                        All Jobs
                    </a>
                  
                </div>
            </div>

            <a href="{{ route('user.yaj') }}" class="{{ request()->routeIs('user.yaj')?'active':'' }}">
                <i class="fas fa-file-alt"></i> Applied Jobs
            </a>
                   </div>

        <div class="sidebar-section">
            <h5>Account</h5>
            <a href="{{ route('user.settings') }}" class="{{ request()->routeIs('user.settings')?'active':'' }}">
                <i class="fas fa-cog"></i> Settings
            </a>
           
        </div>
        
        <div class="sidebar-footer">
            <div class="sidebar-stats">
                <div class="stat-item">
                    <div class="stat-value">12</div>
                    <div class="stat-label">Jobs Applied</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">3</div>
                    <div class="stat-label">Interviews</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">5</div>
                    <div class="stat-label">Saved Jobs</div>
                </div>
            </div>
        </div>
    </aside>
    @endif
    @endauth

    <!-- CONTENT -->
    <main class="content">
       
        @yield('content')
    </main>
</div>

<!-- ================= FOOTER ================= -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-logo">Job<span>Corner</span></div>
                <p class="footer-tagline">Find your dream job with confidence. We connect talented professionals with top employers.</p>
                
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="col-lg-8 col-md-6">
                <div class="footer-links">
                    <div class="footer-column">
                        <h5>For Job Seekers</h5>
                        <ul>
                            <li><a href="/available-jobs"><i class="fas fa-search"></i> Find Jobs</a></li>
                            <li><a href="/companies"><i class="fas fa-building"></i> Companies</a></li>
                            <li><a href="/career-advice"><i class="fas fa-graduation-cap"></i> Career Advice</a></li>
                            <li><a href="/resume-builder"><i class="fas fa-file-alt"></i> Resume Builder</a></li>
                            <li><a href="/salary-guide"><i class="fas fa-chart-line"></i> Salary Guide</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h5>For Employers</h5>
                        <ul>
                            <li><a href="/post-job"><i class="fas fa-plus-circle"></i> Post a Job</a></li>
                            <li><a href="/pricing"><i class="fas fa-tag"></i> Pricing</a></li>
                            <li><a href="/employer-dashboard"><i class="fas fa-gauge"></i> Employer Dashboard</a></li>
                            <li><a href="/candidate-search"><i class="fas fa-users"></i> Candidate Search</a></li>
                            <li><a href="/employer-blog"><i class="fas fa-blog"></i> Employer Blog</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h5>Company</h5>
                        <ul>
                            <li><a href="/about"><i class="fas fa-info-circle"></i> About Us</a></li>
                            <li><a href="/contact"><i class="fas fa-envelope"></i> Contact Us</a></li>
                            <li><a href="/careers"><i class="fas fa-briefcase"></i> Careers at JobCorner</a></li>
                            <li><a href="/press"><i class="fas fa-newspaper"></i> Press</a></li>
                            <li><a href="/testimonials"><i class="fas fa-star"></i> Testimonials</a></li>
                        </ul>
                    </div>
                    
                    <!-- <div class="footer-column">
                        <h5>Support</h5>
                        <ul>
                            <li><a href="/help"><i class="fas fa-question-circle"></i> Help Center</a></li>
                            <li><a href="/faq"><i class="fas fa-comments"></i> FAQ</a></li>
                            <li><a href="/privacy"><i class="fas fa-shield-alt"></i> Privacy Policy</a></li>
                            <li><a href="/terms"><i class="fas fa-file-contract"></i> Terms of Service</a></li>
                            <li><a href="/cookies"><i class="fas fa-cookie-bite"></i> Cookie Policy</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-lg-6">
                <h6 class="text-white mb-3">Stay Updated</h6>
                <p class="text-light small mb-3">Subscribe to our newsletter for the latest job alerts and career tips.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit"><i class="fas fa-paper-plane"></i> Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom mt-5">
            <p>&copy; {{ date('Y') }} JobCorner. All rights reserved. | 
                <a href="/privacy">Privacy Policy</a> | 
                <a href="/terms">Terms of Service</a> | 
                <a href="/sitemap">Sitemap</a>
            </p>
            <p class="mt-2">Made with <i class="fas fa-heart text-danger"></i> for job seekers worldwide</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Enhanced sidebar dropdown toggle with animation
    document.querySelectorAll('.sidebar-dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const dropdown = this.nextElementSibling;
            const chevron = this.querySelector('.chevron');
            
            dropdown.classList.toggle('show');
            
            if (chevron) {
                if (dropdown.classList.contains('show')) {
                    chevron.style.transform = 'rotate(180deg)';
                } else {
                    chevron.style.transform = 'rotate(0deg)';
                }
            }
        });
    });
    
    // Add active class to current page in sidebar
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const sidebarLinks = document.querySelectorAll('.sidebar a');
        
        sidebarLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    });
</script>

</body>
</html>