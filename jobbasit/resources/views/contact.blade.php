@extends('layouts.header')
@section('title','Contact Us | JobCorner - Get in Touch')
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
    p { font-size: clamp(1rem, 2vw, 1.125rem); }
    
    /* Hero Contact Section */
    .contact-hero-section {
        background: var(--gradient-secondary);
        padding: clamp(5rem, 10vw, 8rem) 0 clamp(4rem, 8vw, 6rem);
        position: relative;
        overflow: hidden;
        text-align: center;
    }
    
    .contact-hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
    }
    
    .contact-hero-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(0, 102, 255, 0.1);
        filter: blur(30px);
    }
    
    .contact-shape-1 {
        width: min(500px, 40vw);
        height: min(500px, 40vw);
        top: -20%;
        right: -10%;
        animation: float 8s ease-in-out infinite;
    }
    
    .contact-shape-2 {
        width: min(400px, 30vw);
        height: min(400px, 30vw);
        bottom: -20%;
        left: -10%;
        animation: float 10s ease-in-out infinite reverse;
    }
    
    .contact-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .contact-hero-tagline {
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-teal));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: clamp(1.1rem, 2.5vw, 1.5rem);
        font-weight: 600;
        margin-bottom: 1rem;
        display: inline-block;
    }
    
    .contact-hero-title {
        margin-bottom: 1.5rem;
    }
    
    .contact-hero-subtitle {
        color: var(--medium-gray);
        font-size: clamp(1.1rem, 2.5vw, 1.25rem);
        max-width: 700px;
        margin: 0 auto;
    }
    
    /* Contact Information Cards */
    .contact-info-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: white;
    }
    
    .contact-info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    
    @media (max-width: 992px) {
        .contact-info-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 576px) {
        .contact-info-grid {
            grid-template-columns: 1fr;
        }
    }
    
    .contact-info-card {
        background: var(--lightest-blue);
        border-radius: 20px;
        padding: 2.5rem 2rem;
        border: 2px solid var(--light-blue);
        transition: all 0.3s ease;
        text-align: center;
        height: 100%;
    }
    
    .contact-info-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-blue);
    }
    
    .contact-icon {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 2rem;
    }
    
    .contact-info-card h3 {
        margin-bottom: 1rem;
        color: var(--dark-gray);
    }
    
    .contact-info-card p {
        color: var(--medium-gray);
        margin-bottom: 1.5rem;
    }
    
    .contact-link {
        color: var(--primary-blue);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .contact-link:hover {
        color: var(--accent-teal);
        transform: translateX(5px);
    }
    
    /* Contact Form Section */
    .contact-form-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--lightest-blue);
    }
    
    .contact-form-container {
        max-width: 800px;
        margin: 0 auto;
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
    
    .contact-form {
        background: white;
        border-radius: 24px;
        padding: clamp(2.5rem, 4vw, 3.5rem);
        box-shadow: var(--shadow-md);
        border: 2px solid var(--light-blue);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--dark-gray);
        font-size: 1rem;
    }
    
    .form-control {
        width: 100%;
        padding: 1rem 1.5rem;
        border: 2px solid var(--light-blue);
        border-radius: 12px;
        font-size: 1rem;
        font-family: inherit;
        transition: all 0.3s ease;
        background: white;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 4px rgba(0, 102, 255, 0.1);
    }
    
    .form-control::placeholder {
        color: var(--medium-gray);
        opacity: 0.7;
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }
    
    .btn-submit {
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 1rem 3rem;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        margin-top: 1rem;
        cursor: pointer;
    }
    
    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }
    
    .btn-submit:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    /* FAQ Section */
    .faq-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: white;
    }
    
    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .faq-item {
        background: var(--lightest-blue);
        border-radius: 16px;
        margin-bottom: 1rem;
        border: 2px solid var(--light-blue);
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .faq-item:hover {
        border-color: var(--primary-blue);
    }
    
    .faq-question {
        padding: 1.5rem 2rem;
        font-weight: 600;
        color: var(--dark-gray);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 1.1rem;
    }
    
    .faq-answer {
        padding: 0 2rem 1.5rem;
        color: var(--medium-gray);
        display: none;
    }
    
    .faq-item.active .faq-answer {
        display: block;
    }
    
    .faq-icon {
        color: var(--primary-blue);
        transition: transform 0.3s ease;
    }
    
    .faq-item.active .faq-icon {
        transform: rotate(180deg);
    }
    
    /* Map Section */
    .map-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--lightest-blue);
    }
    
    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 2px solid var(--light-blue);
        height: 400px;
    }
    
    .map-placeholder {
        width: 100%;
        height: 100%;
        background: var(--gradient-secondary);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        padding: 2rem;
        text-align: center;
    }
    
    .map-placeholder i {
        font-size: 4rem;
        margin-bottom: 1.5rem;
    }
    
    .map-placeholder h3 {
        margin-bottom: 1rem;
        color: var(--dark-gray);
    }
    
    /* CTA Section */
    .contact-cta-section {
        padding: clamp(4rem, 8vw, 6rem) 0;
        background: var(--gradient-primary);
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .contact-cta-content {
        position: relative;
        z-index: 2;
    }
    
    .contact-cta-content h2 {
        color: white;
        margin-bottom: 1rem;
    }
    
    .contact-cta-content p {
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto 2rem;
        font-size: clamp(1.1rem, 2.5vw, 1.25rem);
    }
    
    .contact-cta-buttons {
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
        .contact-hero-section {
            padding: 3rem 0;
        }
        
        .contact-cta-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-cta-primary, .btn-cta-secondary {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
        
        .contact-form {
            padding: 2rem;
        }
    }
    
    @media (max-width: 480px) {
        .contact-info-card {
            padding: 2rem 1.5rem;
        }
        
        .faq-question {
            padding: 1.25rem 1.5rem;
            font-size: 1rem;
        }
        
        .map-placeholder i {
            font-size: 3rem;
        }
    }
    
    /* Loading Animation */
    .spinner {
        width: 20px;
        height: 20px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s ease-in-out infinite;
        display: inline-block;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>

<!-- Hero Contact Section -->
<section class="contact-hero-section">
    <div class="contact-hero-bg">
        <div class="contact-hero-shape contact-shape-1"></div>
        <div class="contact-hero-shape contact-shape-2"></div>
    </div>
    <div class="container">
        <div class="contact-hero-content">
            <div class="contact-hero-tagline">
                <i class="fas fa-headset me-2"></i> Get in Touch
            </div>
            <h1 class="contact-hero-title">We're Here to <span style="color: var(--accent-teal);">Help You</span></h1>
            <p class="contact-hero-subtitle">
                Have questions about finding jobs, hiring talent, or using our platform? 
                Our team is ready to assist you with any inquiries.
            </p>
        </div>
    </div>
</section>

<!-- Contact Information Cards -->
<section class="contact-info-section">
    <div class="container">
        <div class="contact-info-grid">
            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Visit Our Office</h3>
                <p>123 Career Street<br>Tech City, TC 10001<br>United States</p>
                <a href="#" class="contact-link" target="_blank">
                    <i class="fas fa-directions"></i> Get Directions
                </a>
            </div>
            
            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <h3>Call Us</h3>
                <p>Mon-Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM<br>Sun: Closed</p>
                <a href="tel:+15551234567" class="contact-link">
                    <i class="fas fa-phone-volume"></i> +1 (555) 123-4567
                </a>
            </div>
            
            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email Us</h3>
                <p>General Inquiries: info@jobcorner.com<br>Support: support@jobcorner.com<br>Partners: partners@jobcorner.com</p>
                <a href="mailto:info@jobcorner.com" class="contact-link">
                    <i class="fas fa-paper-plane"></i> Send Email
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section">
    <div class="container">
        <div class="section-header">
            <h2>Send Us a Message</h2>
            <p class="section-subtitle">
                Fill out the form below and we'll get back to you within 24 hours
            </p>
        </div>
        
        <div class="contact-form-container">
            <form class="contact-form" id="contactForm">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="subject">Subject *</label>
                        <select id="subject" name="subject" class="form-control" required>
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="technical">Technical Support</option>
                            <option value="billing">Billing & Payments</option>
                            <option value="partnership">Partnership Opportunity</option>
                            <option value="feedback">Feedback & Suggestions</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="message">Your Message *</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Type your message here..." required></textarea>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p class="section-subtitle">
                Quick answers to common questions about JobCorner
            </p>
        </div>
        
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">
                    How do I create a job seeker account?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Click the "Register" button in the top right corner, select "Job Seeker," and follow the simple registration process. You'll need to provide your email, create a password, and complete your profile with your skills and experience.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    Is JobCorner free for job seekers?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Yes! JobCorner is completely free for job seekers. You can create a profile, search for jobs, apply to positions, and receive career advice at no cost. We only charge employers for posting jobs and accessing premium hiring features.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    How do I post a job as an employer?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Register as an employer, verify your company, and click "Post a Job" in your dashboard. Fill out the job details, set your budget, and publish. Our AI will help match your job with suitable candidates automatically.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    What types of jobs are available on JobCorner?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    We feature jobs across all industries including Technology, Healthcare, Finance, Marketing, Design, Engineering, and more. We offer full-time, part-time, contract, and remote positions from companies of all sizes.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    How does the AI job matching work?
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Our AI analyzes your profile, skills, experience, and preferences to match you with relevant job opportunities. The more complete your profile, the better the matches. You'll receive personalized job recommendations daily.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="section-header">
            <h2>Find Our Office</h2>
            <p class="section-subtitle">
                Visit us at our headquarters in Tech City
            </p>
        </div>
        
        <div class="map-container">
            <div class="map-placeholder">
                <i class="fas fa-map-marked-alt"></i>
                <h3>JobCorner Headquarters</h3>
                <p>123 Career Street, Tech City, TC 10001</p>
                <p>Open Monday to Friday, 9:00 AM - 6:00 PM</p>
                <a href="#" class="contact-link mt-3">
                    <i class="fas fa-external-link-alt"></i> Open in Google Maps
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="contact-cta-section">
    <div class="container">
        <div class="contact-cta-content">
            <h2>Ready to Start Your Career Journey?</h2>
            <p>
                Join thousands of professionals who have found their dream jobs through JobCorner. 
                Create your profile today and let our AI match you with perfect opportunities.
            </p>
            <div class="contact-cta-buttons">
                <a href="{{ route('register') }}" class="btn btn-cta-primary">
                    <i class="fas fa-user-plus me-2"></i>
                    Create Free Account
                </a>
                <a href="{{ route('jobs') }}" class="btn btn-cta-secondary">
                    <i class="fas fa-briefcase me-2"></i>
                    Browse Jobs
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ Toggle Functionality
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            
            question.addEventListener('click', () => {
                // Close all other items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
                
                // Toggle current item
                item.classList.toggle('active');
            });
        });
        
        // Contact Form Submission
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner"></span> Sending...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual AJAX call)
            setTimeout(() => {
                // Reset form
                contactForm.reset();
                
                // Show success message
                alert('Thank you for your message! We will get back to you within 24 hours.');
                
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 1500);
        });
        
        // Form validation
        const formInputs = contactForm.querySelectorAll('input, textarea, select');
        
        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.checkValidity()) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });
        });
        
        // Add validation styles
        const style = document.createElement('style');
        style.textContent = `
            .is-valid {
                border-color: var(--accent-teal) !important;
            }
            .is-invalid {
                border-color: #dc3545 !important;
            }
        `;
        document.head.appendChild(style);
        
        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 0) {
                    value = value.substring(0, 10);
                    if (value.length > 3 && value.length <= 6) {
                        value = `(${value.substring(0,3)}) ${value.substring(3)}`;
                    } else if (value.length > 6) {
                        value = `(${value.substring(0,3)}) ${value.substring(3,6)}-${value.substring(6)}`;
                    }
                }
                e.target.value = value;
            });
        }
        
        // Animate elements on scroll
        const animateOnScroll = function() {
            const elements = document.querySelectorAll('.contact-info-card, .contact-form, .faq-item, .map-container');
            
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
        document.querySelectorAll('.contact-info-card, .contact-form, .faq-item, .map-container').forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        });
        
        // Trigger animation on load and scroll
        animateOnScroll();
        window.addEventListener('scroll', animateOnScroll);
        
        // Smooth scroll for contact links
        document.querySelectorAll('.contact-link').forEach(link => {
            if (link.getAttribute('href') && link.getAttribute('href').startsWith('#')) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                });
            }
        });
        
        // Enhanced touch interactions for mobile
        if ('ontouchstart' in window) {
            document.querySelectorAll('.contact-info-card, .faq-question, .btn-submit').forEach(element => {
                element.addEventListener('touchstart', function() {
                    this.style.transform = 'scale(0.98)';
                });
                
                element.addEventListener('touchend', function() {
                    this.style.transform = '';
                });
            });
        }
    });
</script>

@endsection