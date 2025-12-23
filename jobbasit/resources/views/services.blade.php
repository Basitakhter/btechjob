@extends('layouts.header')
@section('title','Services | JobCorner - Professional Career Solutions')
@section('content')

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
        margin: 0;
        padding: 0;
    }
    
    /* Typography */
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
        line-height: 1.2;
    }
    
    h1 { font-size: clamp(2.5rem, 6vw, 4rem); }
    h2 { font-size: clamp(2rem, 5vw, 3rem); }
    h3 { font-size: clamp(1.5rem, 4vw, 2rem); }
    h4 { font-size: clamp(1.25rem, 3vw, 1.5rem); }
    p { font-size: clamp(1rem, 2vw, 1.125rem); }
    
    /* Hero Services Section */
    .services-hero-section {
        background: var(--gradient-secondary);
        padding: clamp(5rem, 10vw, 8rem) 0 clamp(4rem, 8vw, 6rem);
        position: relative;
        overflow: hidden;
        text-align: center;
    }
    
    .services-hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
    }
    
    .services-hero-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(0, 102, 255, 0.1);
        filter: blur(30px);
    }
    
    .services-shape-1 {
        width: min(500px, 40vw);
        height: min(500px, 40vw);
        top: -20%;
        right: -10%;
        animation: float 8s ease-in-out infinite;
    }
    
    .services-shape-2 {
        width: min(400px, 30vw);
        height: min(400px, 30vw);
        bottom: -20%;
        left: -10%;
        animation: float 10s ease-in-out infinite reverse;
    }
    
    .services-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .services-hero-tagline {
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-teal));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: clamp(1.1rem, 2.5vw, 1.5rem);
        font-weight: 600;
        margin-bottom: 1rem;
        display: inline-block;
    }
    
    .services-hero-title {
        margin-bottom: 1.5rem;
    }
    
    .services-hero-subtitle {
        color: var(--medium-gray);
        font-size: clamp(1.1rem, 2.5vw, 1.25rem);
        max-width: 700px;
        margin: 0 auto;
    }
    
    /* Main Services Section */
    .main-services-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: white;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: clamp(3rem, 6vw, 4rem);
    }
    
    .section-subtitle {
        color: var(--medium-gray);
        max-width: 700px;
        margin: 1rem auto 0;
        font-size: clamp(1rem, 2vw, 1.125rem);
    }
    
    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    
    @media (max-width: 992px) {
        .services-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .services-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .service-card {
        background: var(--lightest-blue);
        border-radius: 20px;
        padding: 2.5rem;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-blue);
    }
    
    .service-card.featured::before {
        content: 'POPULAR';
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: var(--gradient-primary);
        color: white;
        padding: 0.375rem 1rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    
    .service-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        color: white;
        font-size: 2rem;
    }
    
    .service-card h3 {
        margin-bottom: 1rem;
        color: var(--dark-gray);
    }
    
    .service-description {
        color: var(--medium-gray);
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }
    
    .service-features {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0;
    }
    
    .service-features li {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        color: var(--medium-gray);
        font-size: 0.95rem;
    }
    
    .service-features li i {
        color: var(--accent-teal);
        font-size: 1rem;
        margin-top: 0.25rem;
        flex-shrink: 0;
    }
    
    .btn-service {
        background: var(--primary-blue);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 0.875rem 1.75rem;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    
    .btn-service:hover {
        background: var(--secondary-blue);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    .btn-service-outline {
        background: transparent;
        color: var(--primary-blue);
        border: 2px solid var(--primary-blue);
        border-radius: 10px;
        padding: 0.875rem 1.75rem;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    
    .btn-service-outline:hover {
        background: var(--light-blue);
        transform: translateY(-2px);
    }
    
    /* For Job Seekers Section */
    .job-seekers-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--lightest-blue);
    }
    
    .seekers-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    
    @media (max-width: 768px) {
        .seekers-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .seeker-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
    }
    
    .seeker-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary-blue);
    }
    
    .seeker-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .seeker-icon {
        width: 70px;
        height: 70px;
        background: var(--gradient-primary);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        flex-shrink: 0;
    }
    
    /* For Employers Section */
    .employers-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: white;
    }
    
    .employers-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    
    @media (max-width: 768px) {
        .employers-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .employer-card {
        background: var(--lightest-blue);
        border-radius: 20px;
        padding: 2.5rem;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
    }
    
    .employer-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary-blue);
    }
    
    .employer-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .employer-icon {
        width: 70px;
        height: 70px;
        background: var(--gradient-primary);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        flex-shrink: 0;
    }
    
    /* Pricing Section */
    .pricing-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--lightest-blue);
    }
    
    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    
    @media (max-width: 992px) {
        .pricing-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .pricing-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .pricing-card {
        background: white;
        border-radius: 24px;
        padding: 2.5rem;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        height: 100%;
    }
    
    .pricing-card.featured {
        border-color: var(--primary-blue);
        box-shadow: var(--shadow-lg);
        transform: scale(1.05);
    }
    
    .pricing-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-blue);
    }
    
    .pricing-card.featured:hover {
        transform: translateY(-8px) scale(1.05);
    }
    
    .pricing-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--gradient-primary);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 700;
        white-space: nowrap;
    }
    
    .pricing-title {
        margin-bottom: 1rem;
        color: var(--dark-gray);
    }
    
    .pricing-price {
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 800;
        color: var(--primary-blue);
        margin-bottom: 0.5rem;
    }
    
    .pricing-period {
        color: var(--medium-gray);
        margin-bottom: 2rem;
    }
    
    .pricing-features {
        list-style: none;
        padding: 0;
        margin: 2rem 0;
        text-align: left;
    }
    
    .pricing-features li {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
        color: var(--dark-gray);
    }
    
    .pricing-features li i {
        color: var(--accent-teal);
        font-size: 1rem;
    }
    
    .btn-pricing {
        width: 100%;
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 1rem 2rem;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        margin-top: auto;
    }
    
    .btn-pricing:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }
    
    /* Testimonials Section */
    .testimonials-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: white;
    }
    
    .testimonials-slider {
        position: relative;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .testimonial-card {
        background: var(--lightest-blue);
        border-radius: 24px;
        padding: 2.5rem;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
        margin: 1rem;
    }
    
    .testimonial-content {
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--dark-gray);
        margin-bottom: 2rem;
        position: relative;
    }
    
    .testimonial-content::before {
        content: '"';
        font-size: 4rem;
        color: var(--primary-blue);
        opacity: 0.1;
        position: absolute;
        top: -1.5rem;
        left: -0.5rem;
        font-family: Georgia, serif;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    
    .author-info h4 {
        margin-bottom: 0.25rem;
        font-size: 1.125rem;
    }
    
    .author-info p {
        color: var(--medium-gray);
        font-size: 0.875rem;
    }
    
    /* CTA Section */
    .services-cta-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--gradient-primary);
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .services-cta-content {
        position: relative;
        z-index: 2;
    }
    
    .services-cta-content h2 {
        color: white;
        margin-bottom: 1rem;
    }
    
    .services-cta-content p {
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto 2rem;
        font-size: clamp(1.1rem, 2.5vw, 1.25rem);
    }
    
    .services-cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .btn-cta-primary {
        background: white;
        color: var(--primary-blue);
        border: none;
        border-radius: 12px;
        padding: 1rem 2.5rem;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }
    
    .btn-cta-secondary {
        background: transparent;
        color: white;
        border: 2px solid white;
        border-radius: 12px;
        padding: 1rem 2.5rem;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-cta-secondary:hover {
        background: white;
        color: var(--primary-blue);
        transform: translateY(-3px);
    }
    
    /* Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .services-hero-section {
            padding: 3rem 0;
        }
        
        .services-cta-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-cta-primary, .btn-cta-secondary {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
        
        .service-card, .seeker-card, .employer-card, .pricing-card {
            padding: 2rem;
        }
    }
    
    @media (max-width: 480px) {
        .seeker-header, .employer-header {
            flex-direction: column;
            text-align: center;
        }
        
        .pricing-card.featured {
            transform: none;
        }
        
        .pricing-card.featured:hover {
            transform: translateY(-8px);
        }
    }
</style>

<!-- Hero Services Section -->
<section class="services-hero-section">
    <div class="services-hero-bg">
        <div class="services-hero-shape services-shape-1"></div>
        <div class="services-hero-shape services-shape-2"></div>
    </div>
    <div class="container">
        <div class="services-hero-content">
            <div class="services-hero-tagline">
                <i class="fas fa-rocket me-2"></i> Professional Services
            </div>
            <h1 class="services-hero-title">Comprehensive <span style="color: var(--accent-teal);">Career Solutions</span></h1>
            <p class="services-hero-subtitle">
                Discover our full range of services designed to help job seekers find their dream roles 
                and empower employers to hire the best talent efficiently.
            </p>
        </div>
    </div>
</section>

<!-- Main Services Section -->
<section class="main-services-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Core Services</h2>
            <p class="section-subtitle">
                Tailored solutions for every stage of your career journey or hiring process
            </p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3>AI Job Matching</h3>
                <p class="service-description">
                    Our intelligent algorithm matches your skills and preferences with the perfect job opportunities.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Personalized job recommendations</li>
                    <li><i class="fas fa-check"></i> Real-time matching updates</li>
                    <li><i class="fas fa-check"></i> Skill gap analysis</li>
                    <li><i class="fas fa-check"></i> Career path suggestions</li>
                </ul>
                <button class="btn-service">
                    <i class="fas fa-play-circle me-2"></i> Learn More
                </button>
            </div>
            
            <div class="service-card featured">
                <div class="service-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Smart Resume Builder</h3>
                <p class="service-description">
                    Create professional, ATS-friendly resumes that get noticed by employers and recruiters.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> 50+ professional templates</li>
                    <li><i class="fas fa-check"></i> ATS optimization</li>
                    <li><i class="fas fa-check"></i> Real-time formatting</li>
                    <li><i class="fas fa-check"></i> Expert writing tips</li>
                </ul>
                <button class="btn-service">
                    <i class="fas fa-play-circle me-2"></i> Try Now
                </button>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h3>Interview Preparation</h3>
                <p class="service-description">
                    Master your interviews with mock sessions, common questions, and expert feedback.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Mock interview sessions</li>
                    <li><i class="fas fa-check"></i> Industry-specific questions</li>
                    <li><i class="fas fa-check"></i> Performance analytics</li>
                    <li><i class="fas fa-check"></i> Expert feedback</li>
                </ul>
                <button class="btn-service">
                    <i class="fas fa-play-circle me-2"></i> Get Prepared
                </button>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Career Coaching</h3>
                <p class="service-description">
                    One-on-one guidance from experienced career coaches to help you achieve your professional goals.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Personalized coaching sessions</li>
                    <li><i class="fas fa-check"></i> Goal setting and planning</li>
                    <li><i class="fas fa-check"></i> Skill development roadmap</li>
                    <li><i class="fas fa-check"></i> Progress tracking</li>
                </ul>
                <button class="btn-service-outline">
                    <i class="fas fa-calendar me-2"></i> Book Session
                </button>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>Company Research</h3>
                <p class="service-description">
                    In-depth company insights, culture analysis, and interview preparation for specific organizations.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Company culture insights</li>
                    <li><i class="fas fa-check"></i> Salary benchmarking</li>
                    <li><i class="fas fa-check"></i> Employee reviews</li>
                    <li><i class="fas fa-check"></i> Growth opportunities</li>
                </ul>
                <button class="btn-service-outline">
                    <i class="fas fa-search me-2"></i> Explore Companies
                </button>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3>Professional Networking</h3>
                <p class="service-description">
                    Connect with industry professionals, mentors, and potential employers in your field.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Industry-specific groups</li>
                    <li><i class="fas fa-check"></i> Mentorship programs</li>
                    <li><i class="fas fa-check"></i> Virtual networking events</li>
                    <li><i class="fas fa-check"></i> Direct messaging</li>
                </ul>
                <button class="btn-service">
                    <i class="fas fa-users me-2"></i> Join Network
                </button>
            </div>
        </div>
    </div>
</section>

<!-- For Job Seekers Section -->
<section class="job-seekers-section">
    <div class="container">
        <div class="section-header">
            <h2>Services for Job Seekers</h2>
            <p class="section-subtitle">
                Everything you need to land your dream job and advance your career
            </p>
        </div>
        
        <div class="seekers-grid">
            <div class="seeker-card">
                <div class="seeker-header">
                    <div class="seeker-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div>
                        <h3>Profile Optimization</h3>
                        <p class="text-muted">Make your profile stand out to recruiters</p>
                    </div>
                </div>
                <p>Our experts will review and optimize your profile to highlight your strengths and attract the right employers. We'll help you showcase your achievements and skills effectively.</p>
                <button class="btn-service-outline mt-3">
                    <i class="fas fa-magic me-2"></i> Optimize Profile
                </button>
            </div>
            
            <div class="seeker-card">
                <div class="seeker-header">
                    <div class="seeker-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div>
                        <h3>Skill Development</h3>
                        <p class="text-muted">Learn in-demand skills for your career</p>
                    </div>
                </div>
                <p>Access our library of courses and certifications to develop skills that employers are looking for. From technical skills to soft skills, we've got you covered.</p>
                <button class="btn-service-outline mt-3">
                    <i class="fas fa-book-open me-2"></i> Browse Courses
                </button>
            </div>
        </div>
    </div>
</section>

<!-- For Employers Section -->
<section class="employers-section">
    <div class="container">
        <div class="section-header">
            <h2>Services for Employers</h2>
            <p class="section-subtitle">
                Streamline your hiring process and find the perfect candidates
            </p>
        </div>
        
        <div class="employers-grid">
            <div class="employer-card">
                <div class="employer-header">
                    <div class="employer-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div>
                        <h3>Job Posting & Promotion</h3>
                        <p class="text-muted">Reach qualified candidates quickly</p>
                    </div>
                </div>
                <p>Post your job openings across multiple platforms and get them in front of the right candidates. Our promotion tools ensure maximum visibility.</p>
                <button class="btn-service mt-3">
                    <i class="fas fa-plus-circle me-2"></i> Post a Job
                </button>
            </div>
            
            <div class="employer-card">
                <div class="employer-header">
                    <div class="employer-icon">
                        <i class="fas fa-filter"></i>
                    </div>
                    <div>
                        <h3>Candidate Screening</h3>
                        <p class="text-muted">Find the best fit for your team</p>
                    </div>
                </div>
                <p>Our AI-powered screening tools help you identify the most qualified candidates based on skills, experience, and cultural fit.</p>
                <button class="btn-service mt-3">
                    <i class="fas fa-search me-2"></i> Screen Candidates
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section">
    <div class="container">
        <div class="section-header">
            <h2>Choose Your Plan</h2>
            <p class="section-subtitle">
                Flexible pricing options for individuals and businesses
            </p>
        </div>
        
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-badge">BASIC</div>
                <h3 class="pricing-title">Starter</h3>
                <div class="pricing-price">Free</div>
                <div class="pricing-period">For job seekers starting their journey</div>
                
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Basic job search</li>
                    <li><i class="fas fa-check"></i> Profile creation</li>
                    <li><i class="fas fa-check"></i> Apply to 5 jobs/month</li>
                    <li><i class="fas fa-check"></i> Email notifications</li>
                    <li><i class="fas fa-times text-muted"></i> Resume builder</li>
                    <li><i class="fas fa-times text-muted"></i> Interview prep</li>
                    <li><i class="fas fa-times text-muted"></i> Career coaching</li>
                </ul>
                
                <button class="btn-pricing">
                    Get Started Free
                </button>
            </div>
            
            <div class="pricing-card featured">
                <div class="pricing-badge">MOST POPULAR</div>
                <h3 class="pricing-title">Professional</h3>
                <div class="pricing-price">$29<span style="font-size: 1.5rem; color: var(--medium-gray);">/month</span></div>
                <div class="pricing-period">Best for serious job seekers</div>
                
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Unlimited job applications</li>
                    <li><i class="fas fa-check"></i> Advanced resume builder</li>
                    <li><i class="fas fa-check"></i> AI job matching</li>
                    <li><i class="fas fa-check"></i> Interview preparation</li>
                    <li><i class="fas fa-check"></i> Company research</li>
                    <li><i class="fas fa-check"></i> Priority support</li>
                    <li><i class="fas fa-check"></i> Skill assessments</li>
                </ul>
                
                <button class="btn-pricing">
                    <i class="fas fa-star me-2"></i> Choose Professional
                </button>
            </div>
            
            <div class="pricing-card">
                <div class="pricing-badge">PREMIUM</div>
                <h3 class="pricing-title">Enterprise</h3>
                <div class="pricing-price">$99<span style="font-size: 1.5rem; color: var(--medium-gray);">/month</span></div>
                <div class="pricing-period">For employers & teams</div>
                
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Everything in Professional</li>
                    <li><i class="fas fa-check"></i> Unlimited job postings</li>
                    <li><i class="fas fa-check"></i> Advanced candidate search</li>
                    <li><i class="fas fa-check"></i> Team collaboration tools</li>
                    <li><i class="fas fa-check"></i> Custom branding</li>
                    <li><i class="fas fa-check"></i> Analytics dashboard</li>
                    <li><i class="fas fa-check"></i> Dedicated account manager</li>
                </ul>
                
                <button class="btn-pricing">
                    Contact Sales
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <h2>Success Stories</h2>
            <p class="section-subtitle">
                Hear from professionals and companies who transformed with our services
            </p>
        </div>
        
        <div class="testimonials-slider">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    "The AI job matching service connected me with opportunities I never would have found on my own. I went from sending hundreds of applications to getting multiple interview requests within weeks."
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">AJ</div>
                    <div class="author-info">
                        <h4>Alex Johnson</h4>
                        <p>Software Engineer at TechCorp</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    "As a hiring manager, the candidate screening tools saved me countless hours. We found the perfect candidate for a critical role in half the time it usually takes."
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">SR</div>
                    <div class="author-info">
                        <h4>Sarah Rodriguez</h4>
                        <p>HR Director at Innovate Inc.</p>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-content">
                    "The resume builder and interview prep services gave me the confidence to apply for senior roles. I successfully negotiated a 40% salary increase in my new position."
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">MK</div>
                    <div class="author-info">
                        <h4>Michael Kim</h4>
                        <p>Marketing Director</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="services-cta-section">
    <div class="container">
        <div class="services-cta-content">
            <h2>Ready to Transform Your Career?</h2>
            <p>
                Join thousands of professionals and companies who have achieved success with JobCorner. 
                Start your journey today with our comprehensive career services.
            </p>
            <div class="services-cta-buttons">
                <a href="{{ route('register') }}" class="btn btn-cta-primary">
                    <i class="fas fa-user-plus me-2"></i>
                    Start Free Trial
                </a>
                <a href="{{ route('contact') }}" class="btn btn-cta-secondary">
                    <i class="fas fa-calendar me-2"></i>
                    Schedule Demo
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Service card hover effects
        const serviceCards = document.querySelectorAll('.service-card, .seeker-card, .employer-card, .pricing-card');
        
        serviceCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                if (window.innerWidth > 768) {
                    this.style.transform = 'translateY(-10px)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                if (!this.classList.contains('featured') || window.innerWidth <= 768) {
                    this.style.transform = 'translateY(0)';
                } else if (this.classList.contains('featured') && window.innerWidth > 768) {
                    this.style.transform = 'scale(1.05)';
                }
            });
        });
        
        // Pricing card selection
        const pricingCards = document.querySelectorAll('.pricing-card');
        
        pricingCards.forEach(card => {
            card.addEventListener('click', function() {
                // Remove active class from all cards
                pricingCards.forEach(c => c.classList.remove('selected'));
                
                // Add active class to clicked card
                this.classList.add('selected');
                
                // Update selected plan display
                const planName = this.querySelector('.pricing-title').textContent;
                const planPrice = this.querySelector('.pricing-price').textContent;
                
                // You could add logic here to update a cart or selection summary
                console.log(`Selected plan: ${planName} at ${planPrice}`);
            });
        });
        
        // Service button interactions
        const serviceButtons = document.querySelectorAll('.btn-service, .btn-service-outline, .btn-pricing');
        
        serviceButtons.forEach(button => {
            button.addEventListener('click', function() {
                const serviceType = this.closest('.service-card, .seeker-card, .employer-card, .pricing-card')
                    .querySelector('h3').textContent;
                
                // Show loading state
                const originalText = this.innerHTML;
                this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Processing...';
                this.disabled = true;
                
                // Simulate processing (replace with actual logic)
                setTimeout(() => {
                    // Reset button
                    this.innerHTML = originalText;
                    this.disabled = false;
                    
                    // Show success message based on button type
                    if (this.classList.contains('btn-pricing')) {
                        alert(`Thank you for selecting the ${serviceType} plan! You will be redirected to the checkout page.`);
                    } else {
                        alert(`Starting ${serviceType} service...`);
                    }
                }, 1500);
            });
        });
        
        // Testimonial slider (simple version)
        const testimonialCards = document.querySelectorAll('.testimonial-card');
        let currentTestimonial = 0;
        
        function showTestimonial(index) {
            testimonialCards.forEach(card => card.style.display = 'none');
            testimonialCards[index].style.display = 'block';
        }
        
        // Initialize first testimonial
        if (testimonialCards.length > 0) {
            showTestimonial(0);
            
            // Auto-rotate testimonials
            setInterval(() => {
                currentTestimonial = (currentTestimonial + 1) % testimonialCards.length;
                showTestimonial(currentTestimonial);
            }, 5000);
        }
        
        // Scroll animations
        const animateOnScroll = function() {
            const elements = document.querySelectorAll('.service-card, .seeker-card, .employer-card, .pricing-card, .testimonial-card');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                
                if (elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };
        
        // Set initial state for animation
        document.querySelectorAll('.service-card, .seeker-card, .employer-card, .pricing-card, .testimonial-card').forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        });
        
        // Trigger animation on load and scroll
        animateOnScroll();
        window.addEventListener('scroll', animateOnScroll);
        
        // FAQ-like functionality for service features
        const serviceFeatures = document.querySelectorAll('.service-features li');
        
        serviceFeatures.forEach(feature => {
            feature.addEventListener('click', function() {
                this.classList.toggle('expanded');
            });
        });
        
        // Enhanced touch interactions for mobile
        if ('ontouchstart' in window) {
            serviceCards.forEach(card => {
                card.addEventListener('touchstart', function() {
                    this.style.transform = 'scale(0.98)';
                });
                
                card.addEventListener('touchend', function() {
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
            
            // Larger touch targets for mobile
            serviceButtons.forEach(button => {
                button.style.minHeight = '44px';
                button.style.padding = '1rem 2rem';
            });
        }
        
        // Plan comparison highlight
        const planFeatures = document.querySelectorAll('.pricing-features li');
        
        planFeatures.forEach(feature => {
            feature.addEventListener('mouseenter', function() {
                const featureText = this.textContent.trim();
                
                // Highlight same feature in other plans
                planFeatures.forEach(f => {
                    if (f.textContent.trim() === featureText) {
                        f.style.backgroundColor = 'var(--light-blue)';
                        f.style.borderRadius = '8px';
                        f.style.padding = '0.5rem';
                        f.style.transition = 'all 0.3s ease';
                    }
                });
            });
            
            feature.addEventListener('mouseleave', function() {
                // Remove highlights
                planFeatures.forEach(f => {
                    f.style.backgroundColor = '';
                    f.style.padding = '';
                });
            });
        });
    });
</script>

@endsection