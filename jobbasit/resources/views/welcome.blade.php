@extends('layouts.header')
@section('title','Find Your Dream Job | Web Career')
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
        
        /* Hero Section - Ultra Modern */
        .hero-section {
            background: var(--gradient-secondary);
            padding: clamp(3rem, 8vw, 6rem) 0 clamp(3rem, 8vw, 5rem);
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .hero-bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }
        
        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 102, 255, 0.1);
            filter: blur(20px);
        }
        
        .floating-element:nth-child(1) {
            width: min(400px, 40vw);
            height: min(400px, 40vw);
            top: -10%;
            right: -5%;
            animation: float 8s ease-in-out infinite;
        }
        
        .floating-element:nth-child(2) {
            width: min(300px, 30vw);
            height: min(300px, 30vw);
            bottom: -10%;
            left: -5%;
            animation: float 10s ease-in-out infinite reverse;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .logo-brand {
            display: inline-flex;
            align-items: center;
            margin-bottom: clamp(1rem, 3vw, 1.5rem);
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 900;
            color: var(--primary-blue);
            text-decoration: none;
        }
        
        .logo-brand span {
            color: var(--accent-teal);
            margin-left: 0.25rem;
        }
        
        .logo-brand i {
            margin-right: 0.75rem;
            font-size: 1.2em;
        }
        
        .hero-tagline {
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-teal));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: clamp(1rem, 2vw, 1.25rem);
            font-weight: 600;
            margin-bottom: 1rem;
            display: inline-block;
        }
        
        .hero-subtitle {
            color: var(--medium-gray);
            margin-bottom: clamp(1.5rem, 4vw, 2.5rem);
            max-width: min(600px, 90%);
            font-size: clamp(1rem, 2vw, 1.25rem);
        }
        
        /* AI-Powered Search */
        .ai-search-container {
            background: white;
            border-radius: 24px;
            padding: clamp(1.5rem, 3vw, 2.5rem);
            box-shadow: var(--shadow-xl);
            margin-top: clamp(1.5rem, 4vw, 3rem);
            position: relative;
            border: 1px solid rgba(0, 102, 255, 0.1);
        }
        
        .search-type-selector {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        
        .search-type-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            background: white;
            color: var(--medium-gray);
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            min-width: 140px;
            justify-content: center;
        }
        
        .search-type-btn:hover, .search-type-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
            transform: translateY(-2px);
        }
        
        .search-type-btn.active {
            box-shadow: 0 8px 20px rgba(0, 102, 255, 0.2);
        }
        
        .ai-search-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .search-input-group {
            position: relative;
        }
        
        .search-input-group input, .search-input-group select {
            width: 100%;
            padding: 1rem 1rem 1rem 3.5rem;
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            font-size: clamp(0.9rem, 2vw, 1rem);
            transition: all 0.3s ease;
            background: white;
            min-height: 56px;
        }
        
        .search-input-group input:focus, .search-input-group select:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px rgba(0, 102, 255, 0.1);
        }
        
        .search-input-group i {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-blue);
            font-size: 1.25rem;
        }
        
        .ai-feature-badge {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 212, 170, 0.1);
            color: var(--accent-teal);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .search-action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .btn-ai-search {
            flex: 2;
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 700;
            font-size: clamp(0.9rem, 2vw, 1rem);
            transition: all 0.3s ease;
            min-height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }
        
        .btn-ai-search:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-ai-search::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-ai-search:hover::after {
            left: 100%;
        }
        
        .btn-voice-search {
            flex: 1;
            background: var(--light-blue);
            color: var(--primary-blue);
            border: 2px solid rgba(0, 102, 255, 0.2);
            border-radius: 12px;
            padding: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            min-height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-voice-search:hover {
            background: var(--primary-blue);
            color: white;
        }
        
        .hero-stats {
            display: flex;
            justify-content: space-between;
            margin-top: clamp(2rem, 5vw, 3rem);
            padding-top: clamp(1.5rem, 4vw, 2rem);
            border-top: 2px solid rgba(0, 102, 255, 0.1);
            flex-wrap: wrap;
            gap: 1.5rem;
        }
        
        .stat-item {
            text-align: center;
            flex: 1;
            min-width: 120px;
        }
        
        .stat-number {
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: var(--medium-gray);
            font-size: clamp(0.8rem, 2vw, 0.9rem);
            font-weight: 500;
        }
        
        /* 3D Hero Image */
        .hero-visual {
            position: relative;
            perspective: 1000px;
        }
        
        .job-search-illustration {
            width: 100%;
            height: auto;
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            transform: rotate3d(0.5, 1, 0, 15deg);
            transition: transform 0.6s ease;
            animation: float3d 6s ease-in-out infinite;
        }
        
        .hero-visual:hover .job-search-illustration {
            transform: rotate3d(0, 0, 0, 0deg);
        }
        
        .floating-job-card {
            position: absolute;
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: float 4s ease-in-out infinite;
            z-index: 10;
            max-width: 250px;
        }
        
        .floating-job-card:nth-child(2) {
            top: 10%;
            right: 5%;
            animation-delay: 1s;
        }
        
        .floating-job-card:nth-child(3) {
            bottom: 15%;
            left: 5%;
            animation-delay: 2s;
        }
        
        .job-card-icon {
            width: 48px;
            height: 48px;
            background: var(--gradient-primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        
        .job-card-content h4 {
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
            color: var(--dark-gray);
        }
        
        .job-card-content p {
            font-size: 0.75rem;
            color: var(--medium-gray);
        }
        
        /* Categories Section - Interactive */
        .categories-section {
            padding: clamp(3rem, 8vw, 6rem) 0;
            background: white;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: clamp(2rem, 5vw, 4rem);
        }
        
        .section-subtitle {
            color: var(--medium-gray);
            max-width: min(700px, 90%);
            margin: 1rem auto 0;
            font-size: clamp(1rem, 2vw, 1.125rem);
        }
        
        /* Fixed Grid System for Categories */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 columns for desktop */
            gap: clamp(1rem, 3vw, 1.5rem);
        }
        
        /* Tablet: 2 columns */
        @media (max-width: 992px) {
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        /* Mobile: 1 column */
        @media (max-width: 576px) {
            .category-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .category-card {
            background: white;
            border-radius: 20px;
            padding: 2rem 1.5rem;
            border: 2px solid var(--light-blue);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-align: center;
            height: 100%;
            min-height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        
        .category-card:hover::before {
            transform: scaleX(1);
        }
        
        .category-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow-lg);
        }
        
        .category-icon-wrapper {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            position: relative;
        }
        
        .category-icon-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
            border-radius: 50%;
            opacity: 0.1;
        }
        
        .category-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2.5rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .category-title {
            margin-bottom: 0.75rem;
            color: var(--dark-gray);
            font-size: clamp(1.1rem, 2vw, 1.25rem);
        }
        
        .category-stats {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        
        .job-count {
            background: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.375rem 1rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.875rem;
        }
        
        .trending-badge {
            background: var(--accent-teal);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        /* Featured Jobs Section */
        .featured-jobs-section {
            padding: clamp(3rem, 8vw, 6rem) 0;
            background: var(--lightest-blue);
        }
        
        .jobs-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: clamp(2rem, 5vw, 3rem);
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .view-controls {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        
        .view-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            background: white;
            color: var(--medium-gray);
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: clamp(0.875rem, 2vw, 1rem);
        }
        
        .view-btn:hover, .view-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(min(350px, 100%), 1fr));
            gap: clamp(1rem, 3vw, 1.5rem);
        }
        
        .job-card {
            background: white;
            border-radius: 20px;
            padding: clamp(1.5rem, 3vw, 2rem);
            border: 2px solid var(--light-blue);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .job-card.featured::after {
            content: 'FEATURED';
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--gradient-primary);
            color: white;
            padding: 0.375rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .job-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow-lg);
        }
        
        .job-header {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
            margin-bottom: 1.25rem;
        }
        
        .company-avatar {
            width: 60px;
            height: 60px;
            background: var(--gradient-secondary);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.5rem;
            color: var(--primary-blue);
            border: 2px solid var(--light-blue);
        }
        
        .job-info h3 {
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
            line-height: 1.3;
        }
        
        .company-name {
            color: var(--medium-gray);
            font-weight: 500;
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
        }
        
        .job-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 1.25rem 0;
        }
        
        .job-tag {
            background: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.375rem 0.875rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }
        
        .job-salary {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--success-green);
            margin: 1rem 0;
        }
        
        .job-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 2px solid var(--light-blue);
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .btn-apply {
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 700;
            transition: all 0.3s ease;
            font-size: 1rem;
            min-height: 48px;
        }
        
        .btn-apply:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        .job-posted {
            color: var(--medium-gray);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .view-all-container {
            text-align: center;
            margin-top: clamp(2rem, 5vw, 3rem);
        }
        
        .btn-view-all {
            background: transparent;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            border-radius: 12px;
            padding: 1rem 3rem;
            font-weight: 700;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.1rem;
        }
        
        .btn-view-all:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }
        
        /* Process Section - FIXED FOR RESPONSIVENESS */
        .process-section {
            padding: clamp(3rem, 8vw, 6rem) 0;
            background: white;
        }
        
        .process-steps {
            display: grid;
            /* Desktop: 4 columns in one row */
            grid-template-columns: repeat(4, 1fr);
            gap: clamp(1.5rem, 4vw, 3rem);
            position: relative;
        }
        
        /* Tablet: 2 columns */
        @media (max-width: 992px) {
            .process-steps {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .step-connector {
                display: none !important;
            }
        }
        
        /* Mobile: 1 column */
        @media (max-width: 576px) {
            .process-steps {
                grid-template-columns: 1fr;
            }
        }
        
        .process-step {
            text-align: center;
            position: relative;
            z-index: 2;
            padding: 2rem 1.5rem;
            background: var(--lightest-blue);
            border-radius: 20px;
            border: 2px solid var(--light-blue);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            min-height: 280px;
        }
        
        .process-step:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-blue);
        }
        
        .step-number {
            width: 70px;
            height: 70px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            font-weight: 800;
            margin: 0 auto 1.5rem;
            position: relative;
            z-index: 2;
            border: 5px solid white;
            box-shadow: var(--shadow-md);
        }
        
        /* Connector lines only for desktop */
        @media (min-width: 993px) {
            .step-connector {
                position: absolute;
                top: 35px;
                left: 50%;
                width: calc(100% - 70px);
                height: 4px;
                background: linear-gradient(90deg, var(--primary-blue), var(--accent-teal));
                opacity: 0.2;
                z-index: 1;
            }
            
            .process-step:last-child .step-connector {
                display: none;
            }
        }
        
        .step-content h3 {
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }
        
        .step-content p {
            color: var(--medium-gray);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        /* Testimonials */
        .testimonials-section {
            padding: clamp(3rem, 8vw, 6rem) 0;
            background: var(--lightest-blue);
        }
        
        .testimonial-slider {
            position: relative;
        }
        
        .testimonial-card {
            background: white;
            border-radius: 24px;
            padding: clamp(2rem, 4vw, 3rem);
            box-shadow: var(--shadow-md);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .quote-icon {
            font-size: 3rem;
            color: var(--primary-blue);
            opacity: 0.1;
            margin-bottom: 1.5rem;
        }
        
        .testimonial-text {
            font-size: 1.125rem;
            line-height: 1.8;
            color: var(--dark-gray);
            margin-bottom: 2rem;
            position: relative;
            flex-grow: 1;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: auto;
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
        
        /* Employers CTA */
        .employers-cta {
            padding: clamp(3rem, 8vw, 6rem) 0;
            background: var(--gradient-primary);
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .employers-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }
        
        .employers-content h2, .employers-content p {
            color: white;
        }
        
        .employers-content h2 {
            margin-bottom: 1rem;
        }
        
        .employers-content p {
            max-width: min(700px, 90%);
            margin: 0 auto 2rem;
            opacity: 0.9;
        }
        
        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-employer-primary {
            background: white;
            color: var(--primary-blue);
            border: none;
            border-radius: 12px;
            padding: 1rem 2.5rem;
            font-weight: 700;
            transition: all 0.3s ease;
            min-height: 56px;
            font-size: 1.1rem;
        }
        
        .btn-employer-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-employer-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
            border-radius: 12px;
            padding: 1rem 2.5rem;
            font-weight: 700;
            transition: all 0.3s ease;
            min-height: 56px;
            font-size: 1.1rem;
        }
        
        .btn-employer-secondary:hover {
            background: white;
            color: var(--primary-blue);
            transform: translateY(-3px);
        }
        
        /* Trusted Companies Section (Missing Section Added) */
        .companies-section {
            padding: clamp(3rem, 8vw, 6rem) 0;
            background: white;
        }
        
        .companies-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 2rem;
            align-items: center;
        }
        
        @media (max-width: 1200px) {
            .companies-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .companies-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .companies-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        .company-logo {
            background: var(--lightest-blue);
            border-radius: 16px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            transition: all 0.3s ease;
            border: 2px solid var(--light-blue);
        }
        
        .company-logo:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-blue);
        }
        
        .company-logo i {
            font-size: 2.5rem;
            color: var(--primary-blue);
            opacity: 0.8;
        }
        
        .company-logo:hover i {
            opacity: 1;
        }
        
        /* Blog/Resources Section (Missing Section Added) */
        .resources-section {
            padding: clamp(3rem, 8vw, 6rem) 0;
            background: var(--lightest-blue);
        }
        
        .resources-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: clamp(1.5rem, 3vw, 2rem);
        }
        
        @media (max-width: 992px) {
            .resources-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .resources-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .resource-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 2px solid var(--light-blue);
        }
        
        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-blue);
        }
        
        .resource-image {
            height: 200px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }
        
        .resource-content {
            padding: 1.5rem;
        }
        
        .resource-content h3 {
            margin-bottom: 0.75rem;
            font-size: 1.25rem;
        }
        
        .resource-content p {
            color: var(--medium-gray);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }
        
        .resource-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.875rem;
            color: var(--medium-gray);
        }
        
        /* Final CTA */
        .final-cta {
            padding: clamp(3rem, 8vw, 6rem) 0;
            text-align: center;
            background: white;
        }
        
        .final-cta h2 {
            margin-bottom: 1rem;
        }
        
        .final-cta p {
            max-width: min(700px, 90%);
            margin: 0 auto 2rem;
            color: var(--medium-gray);
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes float3d {
            0%, 100% { transform: rotate3d(0.5, 1, 0, 15deg) translateY(0); }
            50% { transform: rotate3d(0.5, 1, 0, 15deg) translateY(-15px); }
        }
        
        /* Responsive Design Fixes */
        @media (max-width: 768px) {
            .hero-section {
                padding: 2rem 0;
                min-height: auto;
            }
            
            .search-type-selector {
                flex-direction: column;
            }
            
            .search-type-btn {
                width: 100%;
            }
            
            .search-action-buttons {
                flex-direction: column;
            }
            
            .btn-ai-search, .btn-voice-search {
                width: 100%;
            }
            
            .hero-stats {
                justify-content: center;
                gap: 1rem;
            }
            
            .stat-item {
                flex: 0 0 calc(50% - 1rem);
            }
            
            .floating-job-card {
                display: none;
            }
            
            .jobs-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .view-controls {
                justify-content: center;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-employer-primary, .btn-employer-secondary {
                width: 100%;
                max-width: 300px;
            }
        }
        
        @media (max-width: 480px) {
            .stat-item {
                flex: 0 0 100%;
            }
            
            .job-card.featured::after {
                position: static;
                display: inline-block;
                margin-bottom: 1rem;
            }
            
            .job-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .btn-apply {
                width: 100%;
            }
            
            .step-number {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }
        
        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
        
        /* High Contrast Mode */
        @media (prefers-contrast: high) {
            .category-card, .job-card, .testimonial-card, .resource-card {
                border: 2px solid black;
            }
            
            .btn-ai-search, .btn-apply, .btn-employer-primary {
                border: 2px solid black;
            }
        }
        
        /* Print Styles */
        @media print {
            .ai-search-container, .btn-voice-search, .floating-job-card {
                display: none !important;
            }
            
            .hero-section, .employers-cta {
                background: white !important;
                color: black !important;
            }
            
            .hero-visual {
                display: none;
            }
        }
        
        /* Safe Area Support */
        @supports (padding: max(0px)) {
            .hero-section, .categories-section, .featured-jobs-section,
            .process-section, .testimonials-section, .employers-cta, 
            .companies-section, .resources-section, .final-cta {
                padding-left: max(1rem, env(safe-area-inset-left));
                padding-right: max(1rem, env(safe-area-inset-right));
            }
        }
        
        /* Zoom Support */
        @media (max-zoom: 1.5) {
            .search-input-group input, .search-input-group select,
            .btn-ai-search, .btn-voice-search, .btn-apply {
                min-height: 60px;
                font-size: 1.125rem;
            }
            
            .search-type-btn, .view-btn {
                padding: 1rem 2rem;
            }
        }
        
        /* Touch Device Optimizations */
        @media (hover: none) and (pointer: coarse) {
            .category-card:hover, .job-card:hover, .btn-ai-search:hover,
            .process-step:hover, .resource-card:hover {
                transform: none;
            }
            
            .category-card:active, .job-card:active, .btn-ai-search:active,
            .process-step:active, .resource-card:active {
                transform: scale(0.98);
            }
            
            .search-input-group input, .search-input-group select,
            .btn-ai-search, .btn-voice-search, .btn-apply {
                min-height: 64px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-bg-animation">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <a href="#" class="logo-brand">
                            <i class="fas fa-briefcase"></i>
                            Job<span>Corner</span>
                        </a>
                        <div class="hero-tagline">
                            <i class="fas fa-bolt"></i> AI-Powered Job Matching
                        </div>
                        <h1>Find Your <span style="color: var(--accent-teal);">Dream Job</span> in Tech & Beyond</h1>
                        <p class="hero-subtitle">
                            Discover thousands of verified opportunities from top companies. 
                            Our AI matches you with perfect roles based on your skills, experience, and career goals.
                        </p>
                        
                        <!-- AI-Powered Search -->
                        <div class="ai-search-container">
                            <div class="search-type-selector">
                                <button class="search-type-btn active" data-type="jobs">
                                    <i class="fas fa-briefcase"></i>
                                    Find Jobs
                                </button>
                                <button class="search-type-btn" data-type="companies">
                                    <i class="fas fa-building"></i>
                                    Browse Companies
                                </button>
                                <button class="search-type-btn" data-type="remote">
                                    <i class="fas fa-globe"></i>
                                    Remote Work
                                </button>
                            </div>
                            
                            <form class="ai-search-form" id="jobSearchForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="search-input-group">
                                            <i class="fas fa-search"></i>
                                            <input type="text" class="form-control" placeholder="Job title, skills, or keywords">
                                            <span class="ai-feature-badge">
                                                <i class="fas fa-robot"></i>
                                                AI-Powered
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="search-input-group">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <input type="text" class="form-control" placeholder="City, state, or remote">
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <div class="search-input-group">
                                            <i class="fas fa-filter"></i>
                                            <select class="form-select">
                                                <option value="">Job Type</option>
                                                <option value="full-time">Full Time</option>
                                                <option value="part-time">Part Time</option>
                                                <option value="contract">Contract</option>
                                                <option value="remote">Remote</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="search-input-group">
                                            <i class="fas fa-chart-line"></i>
                                            <select class="form-select">
                                                <option value="">Experience Level</option>
                                                <option value="entry">Entry Level</option>
                                                <option value="mid">Mid Level</option>
                                                <option value="senior">Senior</option>
                                                <option value="executive">Executive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="search-action-buttons">
                                    <button type="submit" class="btn btn-ai-search">
                                        <i class="fas fa-search"></i>
                                        Find Perfect Jobs
                                    </button>
                                    <button type="button" class="btn btn-voice-search">
                                        <i class="fas fa-microphone"></i>
                                        Voice Search
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Stats -->
                        <div class="hero-stats">
                            <div class="stat-item">
                                <div class="stat-number" data-count="25400">25K+</div>
                                <div class="stat-label">Active Jobs</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-count="5200">5K+</div>
                                <div class="stat-label">Companies</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-count="15400">15K+</div>
                                <div class="stat-label">Hired Candidates</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-count="89">89%</div>
                                <div class="stat-label">Success Rate</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="hero-visual">
                        <img src="https://cdn.pixabay.com/photo/2021/08/04/13/06/software-developer-6521720_1280.jpg" 
                             alt="Modern job search interface" 
                             class="job-search-illustration"
                             loading="lazy">
                        
                        <div class="floating-job-card">
                            <div class="job-card-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div class="job-card-content">
                                <h4>Senior React Developer</h4>
                                <p>$120K - $150K • Remote</p>
                            </div>
                        </div>
                        
                        <div class="floating-job-card">
                            <div class="job-card-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="job-card-content">
                                <h4>Product Manager</h4>
                                <p>$95K - $130K • NYC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container">
            <div class="section-header">
                <h2>Explore Top Categories</h2>
                <p class="section-subtitle">
                    Find your perfect role in high-demand industries with thousands of opportunities
                </p>
            </div>
            
            <div class="category-grid">
                <div class="category-card">
                    <div class="category-icon-wrapper">
                        <div class="category-icon-bg"></div>
                        <i class="fas fa-laptop-code category-icon"></i>
                    </div>
                    <h3 class="category-title">Technology</h3>
                    <p>Software, DevOps, Cloud, Cybersecurity</p>
                    <div class="category-stats">
                        <span class="job-count">4,238 Jobs</span>
                        <span class="trending-badge">
                            <i class="fas fa-fire"></i>
                            Trending
                        </span>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon-wrapper">
                        <div class="category-icon-bg"></div>
                        <i class="fas fa-chart-line category-icon"></i>
                    </div>
                    <h3 class="category-title">Business & Marketing</h3>
                    <p>Strategy, Sales, Digital Marketing</p>
                    <div class="category-stats">
                        <span class="job-count">3,567 Jobs</span>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon-wrapper">
                        <div class="category-icon-bg"></div>
                        <i class="fas fa-heartbeat category-icon"></i>
                    </div>
                    <h3 class="category-title">Healthcare</h3>
                    <p>Medical, Nursing, Research, Pharma</p>
                    <div class="category-stats">
                        <span class="job-count">2,891 Jobs</span>
                        <span class="trending-badge">
                            <i class="fas fa-fire"></i>
                            Trending
                        </span>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon-wrapper">
                        <div class="category-icon-bg"></div>
                        <i class="fas fa-graduation-cap category-icon"></i>
                    </div>
                    <h3 class="category-title">Education</h3>
                    <p>Teaching, EdTech, Administration</p>
                    <div class="category-stats">
                        <span class="job-count">1,945 Jobs</span>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon-wrapper">
                        <div class="category-icon-bg"></div>
                        <i class="fas fa-paint-brush category-icon"></i>
                    </div>
                    <h3 class="category-title">Creative & Design</h3>
                    <p>UI/UX, Graphic Design, Content</p>
                    <div class="category-stats">
                        <span class="job-count">2,345 Jobs</span>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon-wrapper">
                        <div class="category-icon-bg"></div>
                        <i class="fas fa-calculator category-icon"></i>
                    </div>
                    <h3 class="category-title">Finance</h3>
                    <p>Banking, Investment, Accounting</p>
                    <div class="category-stats">
                        <span class="job-count">3,127 Jobs</span>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon-wrapper">
                        <div class="category-icon-bg"></div>
                        <i class="fas fa-cogs category-icon"></i>
                    </div>
                    <h3 class="category-title">Engineering</h3>
                    <p>Mechanical, Electrical, Civil</p>
                    <div class="category-stats">
                        <span class="job-count">2,678 Jobs</span>
                    </div>
                </div>
                
                <div class="category-card">
                    <div class="category-icon-wrapper">
                        <div class="category-icon-bg"></div>
                        <i class="fas fa-shopping-cart category-icon"></i>
                    </div>
                    <h3 class="category-title">Sales & Retail</h3>
                    <p>Retail, E-commerce, Customer Success</p>
                    <div class="category-stats">
                        <span class="job-count">1,892 Jobs</span>
                    </div>
                </div>
            </div>
            
            <div class="view-all-container">
                <button class="btn btn-view-all">
                    View All Categories
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>
    
    <!-- Featured Jobs -->
    <section class="featured-jobs-section">
        <div class="container">
            <div class="jobs-header">
                <div>
                    <h2>Featured Jobs</h2>
                    <p class="section-subtitle">Hand-picked opportunities from innovative companies</p>
                </div>
                <div class="view-controls">
                    <button class="view-btn active" data-filter="all">All</button>
                    <button class="view-btn" data-filter="remote">Remote</button>
                    <button class="view-btn" data-filter="tech">Tech</button>
                    <button class="view-btn" data-filter="high-salary">High Salary</button>
                </div>
            </div>
            
            <div class="jobs-grid">
                <div class="job-card featured" data-category="tech remote">
                    <div class="job-header">
                        <div class="company-avatar">
                            <i class="fab fa-apple"></i>
                        </div>
                        <div class="job-info">
                            <h3>Senior React Developer</h3>
                            <p class="company-name">TechVision Inc.</p>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Remote
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Full Time
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Senior Level
                                </span>
                            </div>
                        </div>
                    </div>
                    <p>Lead frontend development using React, TypeScript, and modern web technologies...</p>
                    <div class="job-salary">$120,000 - $150,000</div>
                    <div class="job-footer">
                        <div class="job-posted">
                            <i class="far fa-clock"></i>
                            Posted 2 days ago
                        </div>
                        <button class="btn btn-apply">
                            Apply Now
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
                
                <div class="job-card" data-category="tech">
                    <div class="job-header">
                        <div class="company-avatar">
                            <i class="fab fa-google"></i>
                        </div>
                        <div class="job-info">
                            <h3>Product Manager</h3>
                            <p class="company-name">Innovate Solutions</p>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-map-marker-alt"></i>
                                    San Francisco
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Full Time
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Mid Level
                                </span>
                            </div>
                        </div>
                    </div>
                    <p>Drive product strategy and work with cross-functional teams to deliver amazing products...</p>
                    <div class="job-salary">$130,000 - $160,000</div>
                    <div class="job-footer">
                        <div class="job-posted">
                            <i class="far fa-clock"></i>
                            Posted 1 week ago
                        </div>
                        <button class="btn btn-apply">
                            Apply Now
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
                
                <div class="job-card" data-category="tech high-salary">
                    <div class="job-header">
                        <div class="company-avatar">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div class="job-info">
                            <h3>AI/ML Engineer</h3>
                            <p class="company-name">DataMind AI</p>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-map-marker-alt"></i>
                                    New York
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Full Time
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Senior Level
                                </span>
                            </div>
                        </div>
                    </div>
                    <p>Develop cutting-edge machine learning models and AI solutions for enterprise clients...</p>
                    <div class="job-salary">$140,000 - $180,000</div>
                    <div class="job-footer">
                        <div class="job-posted">
                            <i class="far fa-clock"></i>
                            Posted 3 days ago
                        </div>
                        <button class="btn btn-apply">
                            Apply Now
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
                
                <div class="job-card" data-category="remote">
                    <div class="job-header">
                        <div class="company-avatar">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <div class="job-info">
                            <h3>Senior UX Designer</h3>
                            <p class="company-name">Creative Labs</p>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Remote
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Contract
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Senior Level
                                </span>
                            </div>
                        </div>
                    </div>
                    <p>Design beautiful user experiences for web and mobile applications...</p>
                    <div class="job-salary">$90,000 - $120,000</div>
                    <div class="job-footer">
                        <div class="job-posted">
                            <i class="far fa-clock"></i>
                            Posted 5 days ago
                        </div>
                        <button class="btn btn-apply">
                            Apply Now
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="view-all-container">
                <button class="btn btn-view-all">
                    View All Jobs
                    <i class="fas fa-briefcase ms-2"></i>
                </button>
            </div>
        </div>
    </section>
    
    <!-- How It Works -->
    <section class="process-section">
        <div class="container">
            <div class="section-header">
                <h2>How JobCorner Works</h2>
                <p class="section-subtitle">
                    Get your dream job in 4 simple steps with our intelligent platform
                </p>
            </div>
            
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-connector"></div>
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Create Smart Profile</h3>
                        <p>Build your profile with skills, experience, and career preferences</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-connector"></div>
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>AI Job Matching</h3>
                        <p>Our AI finds perfect matches based on your profile and goals</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-connector"></div>
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>One-Click Apply</h3>
                        <p>Apply to jobs instantly with your optimized profile</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Get Hired Faster</h3>
                        <p>Track applications and connect with employers directly</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Trusted Companies Section (Added Missing Section) -->
    <section class="companies-section">
        <div class="container">
            <div class="section-header">
                <h2>Trusted by Leading Companies</h2>
                <p class="section-subtitle">
                    Join thousands of companies who trust us to find their best talent
                </p>
            </div>
            
            <div class="companies-grid">
                <div class="company-logo">
                    <i class="fab fa-apple"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-google"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-microsoft"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-amazon"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-meta"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-netflix"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-uber"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-airbnb"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-spotify"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-slack"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-dropbox"></i>
                </div>
                <div class="company-logo">
                    <i class="fab fa-adobe"></i>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2>Success Stories</h2>
                <p class="section-subtitle">
                    Hear from professionals who transformed their careers with JobCorner
                </p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="testimonial-text">
                            "JobCorner's AI matching found me opportunities I never would have discovered on my own. Landed my dream remote role in just 3 weeks!"
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">SR</div>
                            <div class="author-info">
                                <h4>Sarah Rodriguez</h4>
                                <p>Senior Product Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="testimonial-text">
                            "The platform's smart recommendations and interview prep tools helped me negotiate a 50% salary increase. Absolutely game-changing!"
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">MJ</div>
                            <div class="author-info">
                                <h4>Michael Johnson</h4>
                                <p>Lead Software Engineer</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="testimonial-card">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="testimonial-text">
                            "As a career changer, JobCorner helped me transition smoothly into tech. The learning resources and mentorship were invaluable."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-avatar">EP</div>
                            <div class="author-info">
                                <h4>Emma Parker</h4>
                                <p>UX Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Resources/Blog Section (Added Missing Section) -->
    <section class="resources-section">
        <div class="container">
            <div class="section-header">
                <h2>Career Resources & Tips</h2>
                <p class="section-subtitle">
                    Stay updated with the latest career advice, industry trends, and job search strategies
                </p>
            </div>
            
            <div class="resources-grid">
                <div class="resource-card">
                    <div class="resource-image">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="resource-content">
                        <h3>How to Ace Your Technical Interview</h3>
                        <p>Master the art of technical interviews with our comprehensive guide covering coding challenges, system design, and behavioral questions.</p>
                        <div class="resource-meta">
                            <span><i class="far fa-clock"></i> 5 min read</span>
                            <span><i class="far fa-calendar"></i> Nov 15, 2023</span>
                        </div>
                    </div>
                </div>
                
                <div class="resource-card">
                    <div class="resource-image">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Top Tech Skills in Demand 2024</h3>
                        <p>Discover the most sought-after technical skills that will boost your employability and salary potential in the coming year.</p>
                        <div class="resource-meta">
                            <span><i class="far fa-clock"></i> 7 min read</span>
                            <span><i class="far fa-calendar"></i> Nov 10, 2023</span>
                        </div>
                    </div>
                </div>
                
                <div class="resource-card">
                    <div class="resource-image">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="resource-content">
                        <h3>Negotiating Your Salary Like a Pro</h3>
                        <p>Learn proven strategies to negotiate your salary and benefits package to ensure you get paid what you're worth.</p>
                        <div class="resource-meta">
                            <span><i class="far fa-clock"></i> 6 min read</span>
                            <span><i class="far fa-calendar"></i> Nov 5, 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="view-all-container mt-4">
                <button class="btn btn-view-all">
                    View All Resources
                    <i class="fas fa-book ms-2"></i>
                </button>
            </div>
        </div>
    </section>
    
    <!-- Employers CTA -->
    <section class="employers-cta">
        <div class="container">
            <div class="employers-content">
                <h2>Hire Smarter with JobCorner</h2>
                <p>
                    Access our pool of pre-vetted, highly skilled professionals. 
                    Use our AI tools to find the perfect candidates faster and reduce hiring time by 60%.
                </p>
                <div class="cta-buttons">
                    <button class="btn btn-employer-primary">
                        <i class="fas fa-building me-2"></i>
                        Post Jobs Free
                    </button>
                    <button class="btn btn-employer-secondary">
                        <i class="fas fa-play-circle me-2"></i>
                        Watch Demo
                    </button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Final CTA -->
    <section class="final-cta">
        <div class="container">
            <h2>Ready to Transform Your Career?</h2>
            <p>
                Join thousands of professionals who have accelerated their careers with JobCorner. 
                Create your free account and let our AI find your perfect job matches.
            </p>
            <div class="cta-buttons">
                <button class="btn btn-employer-primary" style="background: var(--primary-blue);">
                    <i class="fas fa-user-plus me-2"></i>
                    Sign Up Free
                </button>
                <button class="btn btn-employer-secondary" style="color: var(--primary-blue); border-color: var(--primary-blue);">
                    <i class="fas fa-play me-2"></i>
                    See How It Works
                </button>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search Type Selector
            const searchTypeBtns = document.querySelectorAll('.search-type-btn');
            searchTypeBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    searchTypeBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update search form based on selection
                    const type = this.dataset.type;
                    updateSearchForm(type);
                });
            });
            
            function updateSearchForm(type) {
                const form = document.getElementById('jobSearchForm');
                const inputs = form.querySelectorAll('input, select');
                
                switch(type) {
                    case 'jobs':
                        inputs[0].placeholder = "Job title, skills, or keywords";
                        break;
                    case 'companies':
                        inputs[0].placeholder = "Company name or industry";
                        break;
                    case 'remote':
                        inputs[0].placeholder = "Remote job title or skills";
                        inputs[1].value = "remote";
                        break;
                }
            }
            
            // Job Filtering
            const viewBtns = document.querySelectorAll('.view-btn');
            const jobCards = document.querySelectorAll('.job-card');
            
            viewBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    viewBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filter = this.dataset.filter;
                    
                    jobCards.forEach(card => {
                        if (filter === 'all' || card.dataset.category.includes(filter)) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
            
            // Animated Counter
            const statNumbers = document.querySelectorAll('.stat-number');
            
            const animateCounter = (element) => {
                const target = parseInt(element.dataset.count || element.textContent.replace(/[^0-9]/g, ''));
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
                        const statNumber = entry.target.querySelector('.stat-number');
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
            
            // Apply button functionality
            const applyBtns = document.querySelectorAll('.btn-apply');
            applyBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const jobTitle = this.closest('.job-card').querySelector('h3').textContent;
                    alert(`Applying for: ${jobTitle}\n\nYou'll be redirected to the application page.`);
                });
            });
            
            // Voice search functionality
            const voiceSearchBtn = document.querySelector('.btn-voice-search');
            if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
                const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                const recognition = new SpeechRecognition();
                
                recognition.continuous = false;
                recognition.interimResults = false;
                
                voiceSearchBtn.addEventListener('click', function() {
                    recognition.start();
                    this.innerHTML = '<i class="fas fa-microphone-slash"></i> Listening...';
                    this.style.background = '#FF6B6B';
                    
                    recognition.onresult = function(event) {
                        const transcript = event.results[0][0].transcript;
                        document.querySelector('#jobSearchForm input[type="text"]').value = transcript;
                        voiceSearchBtn.innerHTML = '<i class="fas fa-microphone"></i> Voice Search';
                        voiceSearchBtn.style.background = '';
                    };
                    
                    recognition.onerror = function() {
                        voiceSearchBtn.innerHTML = '<i class="fas fa-microphone"></i> Voice Search';
                        voiceSearchBtn.style.background = '';
                    };
                    
                    recognition.onend = function() {
                        voiceSearchBtn.innerHTML = '<i class="fas fa-microphone"></i> Voice Search';
                        voiceSearchBtn.style.background = '';
                    };
                });
            } else {
                voiceSearchBtn.style.display = 'none';
            }
            
            // Enhanced touch interactions for mobile
            if ('ontouchstart' in window) {
                document.querySelectorAll('.category-card, .job-card, .process-step, .resource-card').forEach(card => {
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
            
            // Mobile menu toggle for better UX
            const menuToggle = document.querySelector('.navbar-toggler');
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    document.body.classList.toggle('menu-open');
                });
            }
        });
    </script>

@endsection