@extends('layouts.header')
@section('title','About Us | JobCorner - Find Your Dream Job')
@section('content')

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

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
        --success-green: #10B981;
        --warning-orange: #F59E0B;
        --gradient-primary: linear-gradient(135deg, #0066FF 0%, #00D4AA 100%);
        --gradient-secondary: linear-gradient(135deg, #E6F0FF 0%, #F5FAFF 100%);
        --shadow-sm: 0 4px 6px -1px rgba(0, 102, 255, 0.1);
        --shadow-md: 0 10px 25px rgba(0, 102, 255, 0.15);
        --shadow-lg: 0 20px 50px rgba(0, 102, 255, 0.2);
        --shadow-xl: 0 25px 60px rgba(0, 102, 255, 0.25);
    }
    
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    
    html {
        font-size: 16px;
        scroll-behavior: smooth;
        -webkit-text-size-adjust: 100%;
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
    
    /* Typography Responsiveness */
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
        line-height: 1.2;
    }
    
    h1 { font-size: clamp(2.5rem, 6vw, 4rem); }
    h2 { font-size: clamp(2rem, 5vw, 3rem); }
    h3 { font-size: clamp(1.5rem, 4vw, 2rem); }
    p { font-size: clamp(1rem, 2vw, 1.125rem); }
    
    /* Hero About Section */
    .about-hero-section {
        background: var(--gradient-secondary);
        padding: clamp(5rem, 10vw, 8rem) 0 clamp(3rem, 8vw, 5rem);
        position: relative;
        overflow: hidden;
        text-align: center;
    }
    
    .about-hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
    }
    
    .about-hero-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(0, 102, 255, 0.1);
        filter: blur(30px);
    }
    
    .about-shape-1 {
        width: min(500px, 40vw);
        height: min(500px, 40vw);
        top: -20%;
        right: -10%;
        animation: float 8s ease-in-out infinite;
    }
    
    .about-shape-2 {
        width: min(400px, 30vw);
        height: min(400px, 30vw);
        bottom: -20%;
        left: -10%;
        animation: float 10s ease-in-out infinite reverse;
    }
    
    .about-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .about-hero-tagline {
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-teal));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: clamp(1.1rem, 2.5vw, 1.5rem);
        font-weight: 600;
        margin-bottom: 1rem;
        display: inline-block;
    }
    
    .about-hero-title {
        margin-bottom: 1.5rem;
    }
    
    .about-hero-subtitle {
        color: var(--medium-gray);
        font-size: clamp(1.1rem, 2.5vw, 1.25rem);
        max-width: 700px;
        margin: 0 auto;
    }
    
    /* Stats Section */
    .about-stats-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: white;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }
    
    @media (max-width: 992px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .stat-item-large {
        text-align: center;
        padding: 2rem;
        background: var(--lightest-blue);
        border-radius: 20px;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
    }
    
    .stat-item-large:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: var(--primary-blue);
    }
    
    .stat-number-large {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1;
        margin-bottom: 0.5rem;
    }
    
    .stat-label-large {
        color: var(--medium-gray);
        font-size: clamp(1rem, 2vw, 1.1rem);
        font-weight: 600;
    }
    
    /* Mission & Vision Section */
    .mission-vision-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--lightest-blue);
    }
    
    .mission-card, .vision-card {
        background: white;
        border-radius: 24px;
        padding: clamp(2.5rem, 4vw, 3.5rem);
        box-shadow: var(--shadow-md);
        height: 100%;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
    }
    
    .mission-card:hover, .vision-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-blue);
    }
    
    .mission-icon, .vision-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
        color: white;
        font-size: 2rem;
    }
    
    .mission-card h3, .vision-card h3 {
        margin-bottom: 1.5rem;
        color: var(--primary-blue);
    }
    
    /* Our Story Section */
    .story-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: white;
    }
    
    .story-timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .story-timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--light-blue);
    }
    
    .timeline-item {
        display: flex;
        margin-bottom: 3rem;
        position: relative;
    }
    
    .timeline-item:nth-child(odd) {
        flex-direction: row;
    }
    
    .timeline-item:nth-child(even) {
        flex-direction: row-reverse;
    }
    
    .timeline-content {
        flex: 1;
        padding: 2rem;
        background: white;
        border-radius: 16px;
        border: 2px solid var(--light-blue);
        box-shadow: var(--shadow-sm);
    }
    
    .timeline-year {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 50%;
        margin-left: -40px;
        z-index: 2;
        border: 4px solid white;
    }
    
    @media (max-width: 768px) {
        .story-timeline::before {
            left: 30px;
        }
        
        .timeline-item {
            flex-direction: row !important;
        }
        
        .timeline-content {
            margin-left: 70px;
        }
        
        .timeline-year {
            left: 30px;
            margin-left: 0;
        }
    }
    
    /* Team Section */
    .team-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--lightest-blue);
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
    
    .team-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }
    
    @media (max-width: 1200px) {
        .team-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    
    @media (max-width: 992px) {
        .team-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .team-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .team-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-blue);
    }
    
    .team-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: var(--gradient-primary);
        margin: 2rem auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
    }
    
    .team-info {
        padding: 0 1.5rem 1.5rem;
    }
    
    .team-info h4 {
        margin-bottom: 0.5rem;
        color: var(--dark-gray);
    }
    
    .team-position {
        color: var(--primary-blue);
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1rem;
    }
    
    .team-bio {
        color: var(--medium-gray);
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }
    
    .team-social {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }
    
    .team-social a {
        width: 36px;
        height: 36px;
        background: var(--light-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        transition: all 0.3s ease;
    }
    
    .team-social a:hover {
        background: var(--primary-blue);
        color: white;
        transform: translateY(-3px);
    }
    
    /* Values Section */
    .values-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: white;
    }
    
    .values-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    
    @media (max-width: 992px) {
        .values-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .values-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .value-card {
        background: var(--lightest-blue);
        border-radius: 20px;
        padding: 2.5rem;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
        text-align: center;
    }
    
    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-blue);
    }
    
    .value-icon {
        width: 70px;
        height: 70px;
        background: var(--gradient-primary);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 1.8rem;
    }
    
    .value-card h4 {
        margin-bottom: 1rem;
        color: var(--dark-gray);
    }
    
    /* CTA Section */
    .about-cta-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--gradient-primary);
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .about-cta-content {
        position: relative;
        z-index: 2;
    }
    
    .about-cta-content h2 {
        color: white;
        margin-bottom: 1rem;
    }
    
    .about-cta-content p {
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto 2rem;
        font-size: clamp(1.1rem, 2.5vw, 1.25rem);
    }
    
    .about-cta-buttons {
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
        .about-hero-section {
            padding: 3rem 0;
        }
        
        .about-cta-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-cta-primary, .btn-cta-secondary {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
    }
    
    @media (max-width: 480px) {
        .mission-card, .vision-card {
            padding: 2rem;
        }
        
        .value-card {
            padding: 1.5rem;
        }
    }
</style>

<!-- Hero About Section -->
<section class="about-hero-section">
    <div class="about-hero-bg">
        <div class="about-hero-shape about-shape-1"></div>
        <div class="about-hero-shape about-shape-2"></div>
    </div>
    <div class="container">
        <div class="about-hero-content">
            <div class="about-hero-tagline">
                <i class="fas fa-briefcase me-2"></i> About JobCorner
            </div>
            <h1 class="about-hero-title">Building Careers, <span style="color: var(--accent-teal);">Transforming Lives</span></h1>
            <p class="about-hero-subtitle">
                We're on a mission to bridge the gap between exceptional talent and innovative companies. 
                Through AI-powered matching and human-centric approach, we're revolutionizing the job search experience.
            </p>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="about-stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item-large">
                <div class="stat-number-large">25K+</div>
                <div class="stat-label-large">Jobs Filled</div>
            </div>
            <div class="stat-item-large">
                <div class="stat-number-large">5K+</div>
                <div class="stat-label-large">Companies</div>
            </div>
            <div class="stat-item-large">
                <div class="stat-number-large">89%</div>
                <div class="stat-label-large">Success Rate</div>
            </div>
            <div class="stat-item-large">
                <div class="stat-number-large">15+</div>
                <div class="stat-label-large">Countries Served</div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To empower professionals worldwide by connecting them with meaningful career opportunities through innovative technology and personalized support.</p>
                    <p>We believe that everyone deserves a job they love, and we're committed to making that a reality through our platform.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="vision-card">
                    <div class="vision-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To become the world's most trusted career platform, where talent meets opportunity seamlessly, creating economic growth and personal fulfillment across all industries.</p>
                    <p>We envision a future where job searching is efficient, transparent, and rewarding for everyone involved.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="story-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Journey</h2>
            <p class="section-subtitle">From a simple idea to a leading career platform</p>
        </div>
        
        <div class="story-timeline">
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>The Beginning</h4>
                    <p>Founded in 2018 by tech entrepreneurs who experienced the pain points of traditional job searching firsthand. Started with a small team of 5 passionate individuals.</p>
                </div>
                <div class="timeline-year">2018</div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Platform Launch</h4>
                    <p>Launched our first AI-powered matching algorithm, connecting 1,000+ job seekers with their dream roles. Received our first round of funding from prominent investors.</p>
                </div>
                <div class="timeline-year">2019</div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Rapid Growth</h4>
                    <p>Expanded to serve 10+ countries, onboarded 500+ enterprise clients, and grew our user base to 100,000+ professionals. Introduced remote work features.</p>
                </div>
                <div class="timeline-year">2020</div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Innovation Phase</h4>
                    <p>Launched advanced features including AI resume builder, interview prep tools, and salary insights. Recognized as "Most Innovative Job Platform" by TechAwards.</p>
                </div>
                <div class="timeline-year">2021</div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Global Expansion</h4>
                    <p>Reached 1 million users worldwide, expanded team to 150+ employees, and launched mobile apps. Partnered with leading universities and corporations.</p>
                </div>
                <div class="timeline-year">2022</div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <h4>Today & Beyond</h4>
                    <p>Continuing to innovate with machine learning and blockchain technology. Focused on creating more equitable hiring practices and supporting career growth at every stage.</p>
                </div>
                <div class="timeline-year">2023</div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <div class="section-header">
            <h2>Meet Our Leadership</h2>
            <p class="section-subtitle">The passionate team behind JobCorner's success</p>
        </div>
        
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar">SA</div>
                <div class="team-info">
                    <h4>Sarah Anderson</h4>
                    <div class="team-position">CEO & Founder</div>
                    <p class="team-bio">Former tech executive with 15+ years of experience in HR technology and talent acquisition.</p>
                    <div class="team-social">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="team-card">
                <div class="team-avatar">MR</div>
                <div class="team-info">
                    <h4>Michael Rodriguez</h4>
                    <div class="team-position">CTO</div>
                    <p class="team-bio">AI/ML expert who leads our technology team and product development.</p>
                    <div class="team-social">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="team-card">
                <div class="team-avatar">EP</div>
                <div class="team-info">
                    <h4>Emma Patel</h4>
                    <div class="team-position">Head of Product</div>
                    <p class="team-bio">Product strategist focused on creating exceptional user experiences.</p>
                    <div class="team-social">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="team-card">
                <div class="team-avatar">DC</div>
                <div class="team-info">
                    <h4>David Chen</h4>
                    <div class="team-position">Head of Operations</div>
                    <p class="team-bio">Ensures smooth operations and strategic partnerships across all markets.</p>
                    <div class="team-social">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-medium"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Core Values</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>
        </div>
        
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>People First</h4>
                <p>We prioritize the needs and aspirations of both job seekers and employers, creating win-win solutions.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h4>Innovation Driven</h4>
                <p>We continuously push boundaries with technology to solve complex career challenges.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Trust & Transparency</h4>
                <p>We build relationships based on honesty, clear communication, and ethical practices.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h4>Excellence</h4>
                <p>We strive for excellence in every feature, every match, and every interaction.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h4>Collaboration</h4>
                <p>We believe in the power of teamwork, both internally and with our partners.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h4>Impact Focused</h4>
                <p>We measure success by the positive impact we create in people's careers and lives.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="about-cta-section">
    <div class="container">
        <div class="about-cta-content">
            <h2>Join Our Journey</h2>
            <p>
                Whether you're looking for your dream job or seeking exceptional talent, 
                we're here to support your career journey. Let's build the future of work together.
            </p>
            <div class="about-cta-buttons">
                <a href="{{ route('jobs') }}" class="btn btn-cta-primary">
                    <i class="fas fa-briefcase me-2"></i>
                    Find Your Dream Job
                </a>
                <a href="{{ route('register') }}" class="btn btn-cta-secondary">
                    <i class="fas fa-building me-2"></i>
                    Post Jobs for Free
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animated counter for stats
        const statNumbers = document.querySelectorAll('.stat-number-large');
        
        const animateCounter = (element) => {
            const target = parseInt(element.textContent.replace(/[^0-9]/g, ''));
            const duration = 2000;
            const step = Math.ceil(target / (duration / 16));
            let current = 0;
            
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    element.textContent = target.toLocaleString() + (element.textContent.includes('%') ? '%' : '+');
                    clearInterval(timer);
                } else {
                    element.textContent = current.toLocaleString() + (element.textContent.includes('%') ? '%' : '+');
                }
            }, 16);
        };
        
        // Intersection Observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumber = entry.target.querySelector('.stat-number-large');
                    if (statNumber && !statNumber.classList.contains('animated')) {
                        statNumber.classList.add('animated');
                        animateCounter(statNumber);
                    }
                    
                    // Add fade-in animation
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });
        
        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(section);
        });
        
        // Enhanced touch interactions for mobile
        if ('ontouchstart' in window) {
            document.querySelectorAll('.team-card, .value-card, .mission-card, .vision-card').forEach(card => {
                card.addEventListener('touchstart', function() {
                    this.style.transform = 'scale(0.98)';
                });
                
                card.addEventListener('touchend', function() {
                    this.style.transform = '';
                });
            });
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>

@endsection