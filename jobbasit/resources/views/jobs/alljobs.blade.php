@extends('layouts.header')
@section('title','Find Jobs | Web Career')
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
        
        h1 { font-size: clamp(2.5rem, 6vw, 3.5rem); }
        h2 { font-size: clamp(2rem, 5vw, 2.5rem); }
        h3 { font-size: clamp(1.5rem, 4vw, 1.75rem); }
        p { font-size: clamp(1rem, 2vw, 1.125rem); }
        
        /* Jobs Page Header */
        .jobs-header-section {
            background: var(--gradient-secondary);
            padding: clamp(3rem, 8vw, 5rem) 0 clamp(2rem, 6vw, 3rem);
            position: relative;
            overflow: hidden;
        }
        
        .jobs-header-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }
        
        .jobs-bg-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 102, 255, 0.05);
            filter: blur(40px);
        }
        
        .jobs-bg-element:nth-child(1) {
            width: min(300px, 40vw);
            height: min(300px, 40vw);
            top: -10%;
            right: -5%;
            animation: float 8s ease-in-out infinite;
        }
        
        .jobs-bg-element:nth-child(2) {
            width: min(200px, 30vw);
            height: min(200px, 30vw);
            bottom: -10%;
            left: -5%;
            animation: float 10s ease-in-out infinite reverse;
        }
        
        .jobs-header-content {
            position: relative;
            z-index: 2;
        }
        
        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }
        
        .breadcrumb-nav a {
            color: var(--medium-gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb-nav a:hover {
            color: var(--primary-blue);
        }
        
        .breadcrumb-nav i {
            font-size: 0.75rem;
            color: var(--medium-gray);
        }
        
        .jobs-header-tagline {
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-teal));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: clamp(1rem, 2vw, 1.25rem);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: inline-block;
        }
        
        .jobs-header-subtitle {
            color: var(--medium-gray);
            margin-bottom: clamp(1.5rem, 4vw, 2.5rem);
            max-width: min(600px, 90%);
            font-size: clamp(1rem, 2vw, 1.125rem);
        }
        
        /* Advanced Search Section */
        .advanced-search-section {
            background: white;
            border-radius: 24px;
            padding: clamp(1.5rem, 3vw, 2.5rem);
            box-shadow: var(--shadow-xl);
            margin-top: clamp(1rem, 3vw, 2rem);
            position: relative;
            border: 1px solid rgba(0, 102, 255, 0.1);
        }
        
        .search-filters-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .search-filters-header h3 {
            margin-bottom: 0;
            font-size: 1.5rem;
        }
        
        .filter-toggle-btn {
            background: var(--light-blue);
            color: var(--primary-blue);
            border: 2px solid rgba(0, 102, 255, 0.2);
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .filter-toggle-btn:hover {
            background: var(--primary-blue);
            color: white;
        }
        
        .advanced-search-form {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }
        
        @media (max-width: 1200px) {
            .advanced-search-form {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .advanced-search-form {
                grid-template-columns: 1fr;
            }
        }
        
        .search-input-group {
            position: relative;
        }
        
        .search-input-group input, .search-input-group select {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
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
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-blue);
            font-size: 1.25rem;
        }
        
        .search-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .btn-search-jobs {
            flex: 1;
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
            max-width: 300px;
        }
        
        .btn-search-jobs:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-clear-filters {
            background: transparent;
            color: var(--medium-gray);
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            min-height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-clear-filters:hover {
            background: var(--light-blue);
            color: var(--primary-blue);
        }
        
        .save-search-btn {
            background: var(--lightest-blue);
            color: var(--primary-blue);
            border: 2px solid rgba(0, 102, 255, 0.2);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            min-height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .save-search-btn:hover {
            background: var(--primary-blue);
            color: white;
        }
        
        /* Quick Filters */
        .quick-filters {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }
        
        .quick-filter-btn {
            background: white;
            color: var(--medium-gray);
            border: 2px solid var(--light-blue);
            border-radius: 20px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }
        
        .quick-filter-btn:hover, .quick-filter-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        /* Main Content Layout */
        .jobs-main-section {
            padding: clamp(2rem, 5vw, 3rem) 0;
            background: white;
        }
        
        .jobs-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
        }
        
        @media (max-width: 992px) {
            .jobs-container {
                grid-template-columns: 1fr;
            }
            
            .sidebar-filters {
                position: fixed;
                top: 0;
                right: -400px;
                width: 350px;
                height: 100vh;
                background: white;
                z-index: 1000;
                padding: 2rem;
                overflow-y: auto;
                transition: right 0.3s ease;
                box-shadow: var(--shadow-xl);
            }
            
            .sidebar-filters.active {
                right: 0;
            }
            
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
        }
        
        @media (max-width: 480px) {
            .sidebar-filters {
                width: 100%;
                right: -100%;
            }
        }
        
        /* Sidebar Filters */
        .sidebar-filters {
            background: var(--lightest-blue);
            border-radius: 20px;
            padding: 2rem;
            height: fit-content;
            position: sticky;
            top: 2rem;
        }
        
        .filter-section {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid rgba(0, 102, 255, 0.1);
        }
        
        .filter-section:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .filter-section h4 {
            margin-bottom: 1rem;
            font-size: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .filter-section h4 .clear-filter {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--primary-blue);
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }
        
        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .filter-option {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .filter-option:hover {
            background: rgba(0, 102, 255, 0.05);
        }
        
        .filter-option input[type="checkbox"],
        .filter-option input[type="radio"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-blue);
        }
        
        .filter-option label {
            cursor: pointer;
            flex: 1;
            font-size: 0.95rem;
        }
        
        .filter-count {
            background: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            min-width: 30px;
            text-align: center;
        }
        
        .salary-range {
            padding: 1rem 0;
        }
        
        .salary-inputs {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .salary-input {
            flex: 1;
            position: relative;
        }
        
        .salary-input input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 2px solid var(--light-blue);
            border-radius: 8px;
            font-size: 0.95rem;
        }
        
        .salary-input span {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--medium-gray);
            font-weight: 600;
        }
        
        /* Jobs Results */
        .jobs-results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .results-count {
            font-size: 1.125rem;
            font-weight: 600;
        }
        
        .results-count span {
            color: var(--primary-blue);
        }
        
        .sort-options {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .sort-label {
            color: var(--medium-gray);
            font-size: 0.95rem;
        }
        
        .sort-select {
            padding: 0.75rem 1rem;
            border: 2px solid var(--light-blue);
            border-radius: 8px;
            background: white;
            font-size: 0.95rem;
            min-width: 200px;
        }
        
        .view-toggle {
            display: flex;
            gap: 0.5rem;
        }
        
        .view-toggle-btn {
            width: 40px;
            height: 40px;
            border: 2px solid var(--light-blue);
            border-radius: 8px;
            background: white;
            color: var(--medium-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .view-toggle-btn:hover, .view-toggle-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        /* Jobs Grid/List View */
        .jobs-grid-view {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(min(350px, 100%), 1fr));
            gap: 1.5rem;
        }
        
        .jobs-list-view {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .jobs-list-view .job-card {
            flex-direction: row;
            align-items: center;
            padding: 1.5rem;
        }
        
        .jobs-list-view .job-header {
            flex: 1;
            margin-bottom: 0;
            align-items: center;
        }
        
        .jobs-list-view .job-info {
            flex: 1;
        }
        
        .jobs-list-view .job-tags {
            margin: 0;
        }
        
        .jobs-list-view .job-salary {
            margin: 0 2rem;
        }
        
        .jobs-list-view .job-footer {
            margin-top: 0;
            border-top: none;
            padding-top: 0;
        }
        
        @media (max-width: 768px) {
            .jobs-list-view .job-card {
                flex-direction: column;
                align-items: stretch;
            }
            
            .jobs-list-view .job-salary {
                margin: 1rem 0;
            }
        }
        
        /* Job Card */
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
        
        .job-card.urgent::after {
            content: 'URGENT';
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #FF6B6B;
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
        
        .job-card .job-save-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 40px;
            height: 40px;
            background: white;
            border: 2px solid var(--light-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--medium-gray);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 2;
        }
        
        .job-card .job-save-btn:hover, .job-card .job-save-btn.saved {
            background: #FF6B6B;
            color: white;
            border-color: #FF6B6B;
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
        
        .job-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--medium-gray);
            font-size: 0.9rem;
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
        
        .job-description {
            color: var(--medium-gray);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            line-height: 1.6;
            flex: 1;
        }
        
        .job-description p {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: inherit;
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
        
        /* Pagination */
        .jobs-pagination {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid var(--light-blue);
        }
        
        .pagination-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .pagination-btn {
            width: 48px;
            height: 48px;
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            background: white;
            color: var(--medium-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .pagination-btn:hover, .pagination-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        .pagination-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .pagination-ellipsis {
            padding: 0 0.5rem;
            color: var(--medium-gray);
        }
        
        /* Email Alerts CTA */
        .email-alert-cta {
            background: var(--lightest-blue);
            border-radius: 20px;
            padding: clamp(2rem, 4vw, 3rem);
            text-align: center;
            margin-top: 3rem;
            border: 2px solid var(--light-blue);
        }
        
        .email-alert-cta h3 {
            margin-bottom: 1rem;
        }
        
        .email-alert-cta p {
            color: var(--medium-gray);
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .email-alert-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
            gap: 1rem;
        }
        
        @media (max-width: 576px) {
            .email-alert-form {
                flex-direction: column;
            }
        }
        
        .email-alert-form input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            font-size: 1rem;
        }
        
        .btn-email-alert {
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 700;
            transition: all 0.3s ease;
            min-width: 150px;
        }
        
        .btn-email-alert:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        /* Mobile Sidebar Close Button */
        .sidebar-close-btn {
            display: none;
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 40px;
            height: 40px;
            background: var(--light-blue);
            border: none;
            border-radius: 50%;
            color: var(--primary-blue);
            font-size: 1.25rem;
            cursor: pointer;
            z-index: 1001;
        }
        
        @media (max-width: 992px) {
            .sidebar-close-btn {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .jobs-header-section {
                padding: 2rem 0;
            }
            
            .search-filters-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-toggle-btn {
                width: 100%;
                justify-content: center;
            }
            
            .search-actions {
                flex-direction: column;
            }
            
            .btn-search-jobs, .btn-clear-filters, .save-search-btn {
                width: 100%;
                max-width: none;
            }
            
            .jobs-results-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .sort-options {
                flex-direction: column;
                align-items: stretch;
            }
            
            .sort-select {
                width: 100%;
            }
            
            .view-toggle {
                align-self: center;
            }
        }
        
        @media (max-width: 480px) {
            .advanced-search-form {
                gap: 0.75rem;
            }
            
            .search-input-group input, .search-input-group select {
                min-height: 52px;
                padding: 0.875rem 0.875rem 0.875rem 2.5rem;
            }
            
            .quick-filters {
                justify-content: center;
            }
            
            .job-card {
                padding: 1.25rem;
            }
            
            .job-footer {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn-apply {
                width: 100%;
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
    </style>

    <!-- Jobs Page Header -->
    <section class="jobs-header-section">
        <div class="jobs-header-bg">
            <div class="jobs-bg-element"></div>
            <div class="jobs-bg-element"></div>
        </div>
        <div class="container">
            <div class="jobs-header-content">
                <nav class="breadcrumb-nav">
                    <a href="/"><i class="fas fa-home"></i> Home</a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Find Jobs</span>
                </nav>
                
                <div class="jobs-header-tagline">
                    <i class="fas fa-search"></i> Advanced Job Search
                </div>
                <h1>Find Your Perfect Job</h1>
                <p class="jobs-header-subtitle">
                    Search through 25,000+ opportunities from top companies. Use our advanced filters to find jobs that match your skills, preferences, and career goals.
                </p>
                
                <!-- Advanced Search Section -->
                <div class="advanced-search-section">
                    <div class="search-filters-header">
                        <h3>What are you looking for?</h3>
                        <button class="filter-toggle-btn" id="mobileFilterToggle">
                            <i class="fas fa-filter"></i>
                            Show Filters
                        </button>
                    </div>
                    
                    <form class="advanced-search-form" id="jobsSearchForm">
                        <div class="search-input-group">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Job title, keywords, or company">
                        </div>
                        
                        <div class="search-input-group">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" placeholder="City, state, or remote">
                        </div>
                        
                        <div class="search-input-group">
                            <i class="fas fa-briefcase"></i>
                            <select>
                                <option value="">Job Type</option>
                                <option value="full-time">Full Time</option>
                                <option value="part-time">Part Time</option>
                                <option value="contract">Contract</option>
                                <option value="internship">Internship</option>
                                <option value="remote">Remote</option>
                            </select>
                        </div>
                        
                        <div class="search-input-group">
                            <i class="fas fa-chart-line"></i>
                            <select>
                                <option value="">Experience Level</option>
                                <option value="entry">Entry Level</option>
                                <option value="mid">Mid Level</option>
                                <option value="senior">Senior</option>
                                <option value="lead">Lead</option>
                                <option value="executive">Executive</option>
                            </select>
                        </div>
                    </form>
                    
                    <div class="search-actions">
                        <button type="submit" class="btn btn-search-jobs">
                            <i class="fas fa-search"></i>
                            Search Jobs
                        </button>
                        <button type="button" class="btn btn-clear-filters">
                            <i class="fas fa-redo"></i>
                            Clear All
                        </button>
                        <button type="button" class="btn save-search-btn">
                            <i class="fas fa-bell"></i>
                            Save Search
                        </button>
                    </div>
                    
                    <div class="quick-filters">
                        <button class="quick-filter-btn active">
                            <i class="fas fa-bolt"></i>
                            Quick Apply
                        </button>
                        <button class="quick-filter-btn">
                            <i class="fas fa-home"></i>
                            Remote Only
                        </button>
                        <button class="quick-filter-btn">
                            <i class="fas fa-star"></i>
                            Featured Jobs
                        </button>
                        <button class="quick-filter-btn">
                            <i class="fas fa-clock"></i>
                            Posted Last 24h
                        </button>
                        <button class="quick-filter-btn">
                            <i class="fas fa-dollar-sign"></i>
                            $100K+ Salary
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Main Content -->
    <section class="jobs-main-section">
        <div class="container">
            <!-- Mobile Filter Overlay -->
            <div class="sidebar-overlay" id="sidebarOverlay"></div>
            
            <div class="jobs-container">
                <!-- Sidebar Filters -->
                <aside class="sidebar-filters" id="sidebarFilters">
                    <button class="sidebar-close-btn" id="sidebarClose">
                        <i class="fas fa-times"></i>
                    </button>
                    
                    <div class="filter-section">
                        <h4>
                            Job Type
                            <button class="clear-filter">Clear</button>
                        </h4>
                        <div class="filter-options">
                            <div class="filter-option">
                                <input type="checkbox" id="full-time" checked>
                                <label for="full-time">Full Time</label>
                                <span class="filter-count">1,245</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="part-time">
                                <label for="part-time">Part Time</label>
                                <span class="filter-count">356</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="contract" checked>
                                <label for="contract">Contract</label>
                                <span class="filter-count">789</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="remote">
                                <label for="remote">Remote</label>
                                <span class="filter-count">892</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="internship">
                                <label for="internship">Internship</label>
                                <span class="filter-count">145</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="filter-section">
                        <h4>
                            Experience Level
                            <button class="clear-filter">Clear</button>
                        </h4>
                        <div class="filter-options">
                            <div class="filter-option">
                                <input type="checkbox" id="entry-level">
                                <label for="entry-level">Entry Level</label>
                                <span class="filter-count">567</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="mid-level" checked>
                                <label for="mid-level">Mid Level</label>
                                <span class="filter-count">1,234</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="senior-level" checked>
                                <label for="senior-level">Senior Level</label>
                                <span class="filter-count">876</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="executive">
                                <label for="executive">Executive</label>
                                <span class="filter-count">89</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="filter-section">
                        <h4>
                            Salary Range
                            <button class="clear-filter">Clear</button>
                        </h4>
                        <div class="salary-range">
                            <input type="range" min="0" max="500000" value="80000" step="10000" class="form-range" id="salaryRange">
                            <div class="salary-inputs">
                                <div class="salary-input">
                                    <span>$</span>
                                    <input type="number" placeholder="Min" value="50000">
                                </div>
                                <div class="salary-input">
                                    <span>$</span>
                                    <input type="number" placeholder="Max" value="200000">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="filter-section">
                        <h4>
                            Date Posted
                            <button class="clear-filter">Clear</button>
                        </h4>
                        <div class="filter-options">
                            <div class="filter-option">
                                <input type="radio" id="24h" name="datePosted" checked>
                                <label for="24h">Last 24 hours</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="3days" name="datePosted">
                                <label for="3days">Last 3 days</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="week" name="datePosted">
                                <label for="week">Last week</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="month" name="datePosted">
                                <label for="month">Last month</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="anytime" name="datePosted">
                                <label for="anytime">Any time</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="filter-section">
                        <h4>
                            Company Size
                            <button class="clear-filter">Clear</button>
                        </h4>
                        <div class="filter-options">
                            <div class="filter-option">
                                <input type="checkbox" id="startup">
                                <label for="startup">Startup (1-50)</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="small" checked>
                                <label for="small">Small (51-200)</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="medium" checked>
                                <label for="medium">Medium (201-1000)</label>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" id="large">
                                <label for="large">Large (1000+)</label>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn-search-jobs" style="width: 100%; margin-top: 1rem;">
                        <i class="fas fa-filter"></i>
                        Apply Filters
                    </button>
                </aside>
                
                <!-- Jobs Results -->
                <main class="jobs-results">
                    <div class="jobs-results-header">
                        <div class="results-count">
                            Showing <span>1-12</span> of <span>1,245</span> jobs
                        </div>
                        <div class="sort-options">
                            <span class="sort-label">Sort by:</span>
                            <select class="sort-select">
                                <option value="relevance">Relevance</option>
                                <option value="newest">Newest</option>
                                <option value="salary-high">Salary: High to Low</option>
                                <option value="salary-low">Salary: Low to High</option>
                            </select>
                            <div class="view-toggle">
                                <button class="view-toggle-btn active" data-view="grid">
                                    <i class="fas fa-th-large"></i>
                                </button>
                                <button class="view-toggle-btn" data-view="list">
                                    <i class="fas fa-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Jobs Grid/List View -->
                    <div class="jobs-grid-view" id="jobsView">
                        <!-- Job Card 1 -->
                        <div class="job-card featured" data-job-id="1">
                            <button class="job-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="job-header">
                                <div class="company-avatar">
                                    <i class="fab fa-apple"></i>
                                </div>
                                <div class="job-info">
                                    <h3>Senior React Developer</h3>
                                    <p class="company-name">TechVision Inc.</p>
                                    <div class="job-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        San Francisco, CA • Remote
                                    </div>
                                </div>
                            </div>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Full Time
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Senior Level
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-bolt"></i>
                                    Quick Apply
                                </span>
                            </div>
                            <div class="job-description">
                                <p>We're looking for an experienced React developer to join our growing team. You'll work on cutting-edge web applications using React, TypeScript, and modern web technologies.</p>
                            </div>
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
                        
                        <!-- Job Card 2 -->
                        <div class="job-card urgent" data-job-id="2">
                            <button class="job-save-btn saved">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="job-header">
                                <div class="company-avatar">
                                    <i class="fab fa-google"></i>
                                </div>
                                <div class="job-info">
                                    <h3>Product Manager</h3>
                                    <p class="company-name">Innovate Solutions</p>
                                    <div class="job-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        New York, NY
                                    </div>
                                </div>
                            </div>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Full Time
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Mid Level
                                </span>
                            </div>
                            <div class="job-description">
                                <p>Drive product strategy and work with cross-functional teams to deliver amazing products. Experience with Agile methodologies and user-centered design required.</p>
                            </div>
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
                        
                        <!-- Job Card 3 -->
                        <div class="job-card" data-job-id="3">
                            <button class="job-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="job-header">
                                <div class="company-avatar">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <div class="job-info">
                                    <h3>AI/ML Engineer</h3>
                                    <p class="company-name">DataMind AI</p>
                                    <div class="job-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Remote • Anywhere
                                    </div>
                                </div>
                            </div>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Full Time
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Senior Level
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-bolt"></i>
                                    Quick Apply
                                </span>
                            </div>
                            <div class="job-description">
                                <p>Develop cutting-edge machine learning models and AI solutions for enterprise clients. Strong Python skills and experience with TensorFlow/PyTorch required.</p>
                            </div>
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
                        
                        <!-- Job Card 4 -->
                        <div class="job-card" data-job-id="4">
                            <button class="job-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="job-header">
                                <div class="company-avatar">
                                    <i class="fas fa-paint-brush"></i>
                                </div>
                                <div class="job-info">
                                    <h3>Senior UX Designer</h3>
                                    <p class="company-name">Creative Labs</p>
                                    <div class="job-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Remote
                                    </div>
                                </div>
                            </div>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Contract
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Senior Level
                                </span>
                            </div>
                            <div class="job-description">
                                <p>Design beautiful user experiences for web and mobile applications. Must have portfolio showcasing UX/UI design skills and experience with Figma/Sketch.</p>
                            </div>
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
                        
                        <!-- Job Card 5 -->
                        <div class="job-card" data-job-id="5">
                            <button class="job-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="job-header">
                                <div class="company-avatar">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="job-info">
                                    <h3>Data Scientist</h3>
                                    <p class="company-name">Analytics Pro</p>
                                    <div class="job-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Boston, MA • Hybrid
                                    </div>
                                </div>
                            </div>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Full Time
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Mid Level
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-bolt"></i>
                                    Quick Apply
                                </span>
                            </div>
                            <div class="job-description">
                                <p>Analyze complex datasets and build predictive models to drive business decisions. Strong statistical background and proficiency in Python/R required.</p>
                            </div>
                            <div class="job-salary">$110,000 - $140,000</div>
                            <div class="job-footer">
                                <div class="job-posted">
                                    <i class="far fa-clock"></i>
                                    Posted 2 weeks ago
                                </div>
                                <button class="btn btn-apply">
                                    Apply Now
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Job Card 6 -->
                        <div class="job-card featured" data-job-id="6">
                            <button class="job-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="job-header">
                                <div class="company-avatar">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="job-info">
                                    <h3>Cybersecurity Analyst</h3>
                                    <p class="company-name">SecureNet Systems</p>
                                    <div class="job-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Austin, TX
                                    </div>
                                </div>
                            </div>
                            <div class="job-tags">
                                <span class="job-tag">
                                    <i class="fas fa-clock"></i>
                                    Full Time
                                </span>
                                <span class="job-tag">
                                    <i class="fas fa-star"></i>
                                    Senior Level
                                </span>
                            </div>
                            <div class="job-description">
                                <p>Protect our infrastructure from security threats and implement security best practices. Experience with SIEM tools and incident response required.</p>
                            </div>
                            <div class="job-salary">$95,000 - $130,000</div>
                            <div class="job-footer">
                                <div class="job-posted">
                                    <i class="far fa-clock"></i>
                                    Posted 1 day ago
                                </div>
                                <button class="btn btn-apply">
                                    Apply Now
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="jobs-pagination">
                        <div class="pagination-container">
                            <button class="pagination-btn disabled">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="pagination-btn active">1</button>
                            <button class="pagination-btn">2</button>
                            <button class="pagination-btn">3</button>
                            <span class="pagination-ellipsis">...</span>
                            <button class="pagination-btn">10</button>
                            <button class="pagination-btn">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Email Alerts CTA -->
                    <div class="email-alert-cta">
                        <h3>Get Job Alerts Delivered to Your Inbox</h3>
                        <p>Never miss an opportunity! Sign up for personalized job alerts based on your preferences and get notified when new jobs are posted.</p>
                        <form class="email-alert-form">
                            <input type="email" placeholder="Enter your email address" required>
                            <button type="submit" class="btn btn-email-alert">
                                <i class="fas fa-bell"></i>
                                Get Alerts
                            </button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Filter Toggle
            const mobileFilterToggle = document.getElementById('mobileFilterToggle');
            const sidebarFilters = document.getElementById('sidebarFilters');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const sidebarClose = document.getElementById('sidebarClose');
            
            if (mobileFilterToggle && sidebarFilters) {
                mobileFilterToggle.addEventListener('click', function() {
                    sidebarFilters.classList.add('active');
                    sidebarOverlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
                
                sidebarClose.addEventListener('click', closeSidebar);
                sidebarOverlay.addEventListener('click', closeSidebar);
                
                function closeSidebar() {
                    sidebarFilters.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
                
                // Update button text based on sidebar state
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.attributeName === 'class') {
                            if (sidebarFilters.classList.contains('active')) {
                                mobileFilterToggle.innerHTML = '<i class="fas fa-times"></i> Hide Filters';
                            } else {
                                mobileFilterToggle.innerHTML = '<i class="fas fa-filter"></i> Show Filters';
                            }
                        }
                    });
                });
                
                observer.observe(sidebarFilters, { attributes: true });
            }
            
            // View Toggle (Grid/List)
            const viewToggleBtns = document.querySelectorAll('.view-toggle-btn');
            const jobsView = document.getElementById('jobsView');
            
            viewToggleBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    viewToggleBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    const viewType = this.dataset.view;
                    if (viewType === 'list') {
                        jobsView.classList.remove('jobs-grid-view');
                        jobsView.classList.add('jobs-list-view');
                    } else {
                        jobsView.classList.remove('jobs-list-view');
                        jobsView.classList.add('jobs-grid-view');
                    }
                });
            });
            
            // Save Job Functionality
            const saveButtons = document.querySelectorAll('.job-save-btn');
            saveButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const jobId = this.closest('.job-card').dataset.jobId;
                    const isSaved = this.classList.contains('saved');
                    
                    if (isSaved) {
                        this.classList.remove('saved');
                        this.innerHTML = '<i class="far fa-heart"></i>';
                        showNotification(`Job #${jobId} removed from saved jobs`);
                    } else {
                        this.classList.add('saved');
                        this.innerHTML = '<i class="fas fa-heart"></i>';
                        showNotification(`Job #${jobId} saved to your favorites`);
                    }
                });
            });
            
            // Apply Button Functionality
            const applyButtons = document.querySelectorAll('.btn-apply');
            applyButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const jobTitle = this.closest('.job-card').querySelector('h3').textContent;
                    const companyName = this.closest('.job-card').querySelector('.company-name').textContent;
                    
                    // Create a modal or show confirmation
                    showApplicationModal(jobTitle, companyName);
                });
            });
            
            // Quick Filter Functionality
            const quickFilterBtns = document.querySelectorAll('.quick-filter-btn');
            quickFilterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    this.classList.toggle('active');
                    
                    // Update search based on active filters
                    updateSearchResults();
                });
            });
            
            // Clear Filter Buttons
            const clearFilterBtns = document.querySelectorAll('.clear-filter');
            clearFilterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filterSection = this.closest('.filter-section');
                    const checkboxes = filterSection.querySelectorAll('input[type="checkbox"]');
                    const radios = filterSection.querySelectorAll('input[type="radio"]');
                    
                    checkboxes.forEach(cb => cb.checked = false);
                    radios.forEach(radio => radio.checked = false);
                    
                    // Reset salary range
                    if (filterSection.querySelector('#salaryRange')) {
                        const salaryRange = filterSection.querySelector('#salaryRange');
                        const minInput = filterSection.querySelector('.salary-input:first-child input');
                        const maxInput = filterSection.querySelector('.salary-input:last-child input');
                        
                        salaryRange.value = 80000;
                        minInput.value = 50000;
                        maxInput.value = 200000;
                    }
                });
            });
            
            // Salary Range Sync
            const salaryRange = document.getElementById('salaryRange');
            const minSalaryInput = document.querySelector('.salary-input:first-child input');
            const maxSalaryInput = document.querySelector('.salary-input:last-child input');
            
            if (salaryRange && minSalaryInput && maxSalaryInput) {
                salaryRange.addEventListener('input', function() {
                    minSalaryInput.value = this.value;
                });
                
                minSalaryInput.addEventListener('change', function() {
                    salaryRange.value = this.value;
                });
                
                maxSalaryInput.addEventListener('change', function() {
                    // Ensure max is greater than min
                    if (parseInt(this.value) < parseInt(minSalaryInput.value)) {
                        this.value = parseInt(minSalaryInput.value) + 10000;
                    }
                });
            }
            
            // Search Form Submission
            const searchForm = document.getElementById('jobsSearchForm');
            if (searchForm) {
                searchForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    updateSearchResults();
                    showNotification('Searching for jobs...');
                });
            }
            
            // Clear Filters Button
            const clearFiltersBtn = document.querySelector('.btn-clear-filters');
            if (clearFiltersBtn) {
                clearFiltersBtn.addEventListener('click', function() {
                    // Clear all filters
                    document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
                    document.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);
                    
                    // Reset quick filters
                    quickFilterBtns.forEach(btn => btn.classList.remove('active'));
                    
                    // Reset form inputs
                    searchForm.reset();
                    
                    showNotification('All filters cleared');
                    updateSearchResults();
                });
            }
            
            // Save Search Button
            const saveSearchBtn = document.querySelector('.save-search-btn');
            if (saveSearchBtn) {
                saveSearchBtn.addEventListener('click', function() {
                    const searchParams = getCurrentSearchParams();
                    localStorage.setItem('savedSearch', JSON.stringify(searchParams));
                    showNotification('Search saved! You will receive alerts for new matching jobs.');
                });
            }
            
            // Email Alert Form
            const emailAlertForm = document.querySelector('.email-alert-form');
            if (emailAlertForm) {
                emailAlertForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const email = this.querySelector('input[type="email"]').value;
                    const searchParams = getCurrentSearchParams();
                    
                    // In a real app, you would send this to your backend
                    console.log('Email alert subscription:', { email, searchParams });
                    showNotification(`Job alerts will be sent to ${email}`);
                    this.reset();
                });
            }
            
            // Pagination
            const paginationBtns = document.querySelectorAll('.pagination-btn:not(.disabled)');
            paginationBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (this.classList.contains('active')) return;
                    
                    document.querySelectorAll('.pagination-btn').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Simulate loading new page
                    showNotification('Loading more jobs...');
                    setTimeout(() => {
                        showNotification('Page loaded successfully');
                    }, 800);
                });
            });
            
            // Helper Functions
            function updateSearchResults() {
                // In a real application, this would make an API call
                // For now, we'll just show a notification
                const activeFilters = [];
                document.querySelectorAll('.quick-filter-btn.active').forEach(btn => {
                    activeFilters.push(btn.textContent.trim());
                });
                
                showNotification(`Searching with ${activeFilters.length} active filters...`);
                
                // Simulate API call delay
                setTimeout(() => {
                    document.querySelector('.results-count span:first-child').textContent = '1-12';
                    showNotification(`Found 1,245 matching jobs`);
                }, 1000);
            }
            
            function getCurrentSearchParams() {
                const params = {
                    keywords: searchForm.querySelector('input[type="text"]').value,
                    location: searchForm.querySelectorAll('input[type="text"]')[1].value,
                    jobType: searchForm.querySelector('select').value,
                    experience: searchForm.querySelectorAll('select')[1].value,
                    filters: []
                };
                
                // Add active quick filters
                document.querySelectorAll('.quick-filter-btn.active').forEach(btn => {
                    params.filters.push(btn.textContent.trim());
                });
                
                return params;
            }
            
            function showNotification(message) {
                // Create notification element
                const notification = document.createElement('div');
                notification.className = 'notification';
                notification.innerHTML = `
                    <div style="position: fixed; top: 20px; right: 20px; background: var(--primary-blue); color: white; padding: 1rem 1.5rem; border-radius: 12px; box-shadow: var(--shadow-md); z-index: 9999; display: flex; align-items: center; gap: 0.75rem; animation: slideIn 0.3s ease;">
                        <i class="fas fa-info-circle"></i>
                        <span>${message}</span>
                    </div>
                `;
                
                document.body.appendChild(notification);
                
                // Remove after 3 seconds
                setTimeout(() => {
                    notification.remove();
                }, 3000);
                
                // Add animation
                const style = document.createElement('style');
                style.textContent = `
                    @keyframes slideIn {
                        from { transform: translateX(100%); opacity: 0; }
                        to { transform: translateX(0); opacity: 1; }
                    }
                `;
                document.head.appendChild(style);
            }
            
            function showApplicationModal(jobTitle, companyName) {
                // Create modal
                const modal = document.createElement('div');
                modal.className = 'application-modal';
                modal.innerHTML = `
                    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center; z-index: 9999; padding: 1rem;">
                        <div style="background: white; border-radius: 20px; padding: 2rem; max-width: 500px; width: 100%; box-shadow: var(--shadow-xl);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                                <h3 style="margin: 0;">Apply for ${jobTitle}</h3>
                                <button class="close-modal" style="background: none; border: none; font-size: 1.5rem; color: var(--medium-gray); cursor: pointer;">×</button>
                            </div>
                            <p style="color: var(--medium-gray); margin-bottom: 2rem;">at ${companyName}</p>
                            
                            <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                                <div>
                                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Upload Resume/CV</label>
                                    <input type="file" style="width: 100%; padding: 1rem; border: 2px dashed var(--light-blue); border-radius: 12px;">
                                </div>
                                <div>
                                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Cover Letter (Optional)</label>
                                    <textarea rows="4" style="width: 100%; padding: 1rem; border: 2px solid var(--light-blue); border-radius: 12px; resize: vertical;" placeholder="Tell us why you're a great fit for this role..."></textarea>
                                </div>
                            </div>
                            
                            <div style="display: flex; gap: 1rem;">
                                <button class="submit-application" style="flex: 1; background: var(--gradient-primary); color: white; border: none; border-radius: 12px; padding: 1rem; font-weight: 700; cursor: pointer;">Submit Application</button>
                                <button class="close-modal" style="background: transparent; color: var(--medium-gray); border: 2px solid var(--light-blue); border-radius: 12px; padding: 1rem 2rem; font-weight: 600; cursor: pointer;">Cancel</button>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                document.body.style.overflow = 'hidden';
                
                // Add event listeners
                modal.querySelectorAll('.close-modal').forEach(btn => {
                    btn.addEventListener('click', () => {
                        modal.remove();
                        document.body.style.overflow = '';
                    });
                });
                
                modal.querySelector('.submit-application').addEventListener('click', () => {
                    showNotification(`Application submitted for ${jobTitle} at ${companyName}!`);
                    modal.remove();
                    document.body.style.overflow = '';
                });
                
                // Close on ESC key
                document.addEventListener('keydown', function closeOnEsc(e) {
                    if (e.key === 'Escape') {
                        modal.remove();
                        document.body.style.overflow = '';
                        document.removeEventListener('keydown', closeOnEsc);
                    }
                });
            }
            
            // Initialize search
            updateSearchResults();
        });
    </script>

@endsection