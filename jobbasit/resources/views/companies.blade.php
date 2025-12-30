@extends('layouts.header')
@section('title','Find Companies | Web Career')
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
        
        /* Companies Page Header */
        .companies-header-section {
            background: var(--gradient-secondary);
            padding: clamp(3rem, 8vw, 5rem) 0 clamp(2rem, 6vw, 3rem);
            position: relative;
            overflow: hidden;
        }
        
        .companies-header-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }
        
        .companies-bg-element {
            position: absolute;
            border-radius: 50%;
            background: rgba(0, 102, 255, 0.05);
            filter: blur(40px);
        }
        
        .companies-bg-element:nth-child(1) {
            width: min(300px, 40vw);
            height: min(300px, 40vw);
            top: -10%;
            right: -5%;
            animation: float 8s ease-in-out infinite;
        }
        
        .companies-bg-element:nth-child(2) {
            width: min(200px, 30vw);
            height: min(200px, 30vw);
            bottom: -10%;
            left: -5%;
            animation: float 10s ease-in-out infinite reverse;
        }
        
        .companies-header-content {
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
        
        .companies-header-tagline {
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-teal));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: clamp(1rem, 2vw, 1.25rem);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: inline-block;
        }
        
        .companies-header-subtitle {
            color: var(--medium-gray);
            margin-bottom: clamp(1.5rem, 4vw, 2.5rem);
            max-width: min(600px, 90%);
            font-size: clamp(1rem, 2vw, 1.125rem);
        }
        
        /* Companies Stats */
        .companies-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-top: clamp(2rem, 5vw, 3rem);
            padding-top: clamp(1.5rem, 4vw, 2rem);
            border-top: 2px solid rgba(0, 102, 255, 0.1);
        }
        
        @media (max-width: 992px) {
            .companies-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .companies-stats {
                grid-template-columns: 1fr;
            }
        }
        
        .company-stat-item {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 16px;
            border: 2px solid var(--light-blue);
            transition: all 0.3s ease;
        }
        
        .company-stat-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-blue);
        }
        
        .company-stat-number {
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 0.5rem;
        }
        
        .company-stat-label {
            color: var(--medium-gray);
            font-size: clamp(0.8rem, 2vw, 0.9rem);
            font-weight: 500;
        }
        
        /* Advanced Search Section */
        .companies-search-section {
            background: white;
            border-radius: 24px;
            padding: clamp(1.5rem, 3vw, 2.5rem);
            box-shadow: var(--shadow-xl);
            margin-top: clamp(1rem, 3vw, 2rem);
            position: relative;
            border: 1px solid rgba(0, 102, 255, 0.1);
        }
        
        .companies-search-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .companies-search-header h3 {
            margin-bottom: 0;
            font-size: 1.5rem;
        }
        
        .company-filter-toggle-btn {
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
        
        .company-filter-toggle-btn:hover {
            background: var(--primary-blue);
            color: white;
        }
        
        .companies-search-form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        
        @media (max-width: 992px) {
            .companies-search-form {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .companies-search-form {
                grid-template-columns: 1fr;
            }
        }
        
        .company-search-input-group {
            position: relative;
        }
        
        .company-search-input-group input, .company-search-input-group select {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid var(--light-blue);
            border-radius: 12px;
            font-size: clamp(0.9rem, 2vw, 1rem);
            transition: all 0.3s ease;
            background: white;
            min-height: 56px;
        }
        
        .company-search-input-group input:focus, .company-search-input-group select:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px rgba(0, 102, 255, 0.1);
        }
        
        .company-search-input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-blue);
            font-size: 1.25rem;
        }
        
        .company-search-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .btn-search-companies {
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
        
        .btn-search-companies:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-clear-company-filters {
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
        
        .btn-clear-company-filters:hover {
            background: var(--light-blue);
            color: var(--primary-blue);
        }
        
        /* Quick Filters */
        .company-quick-filters {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }
        
        .company-quick-filter-btn {
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
        
        .company-quick-filter-btn:hover, .company-quick-filter-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        /* Main Content Layout */
        .companies-main-section {
            padding: clamp(2rem, 5vw, 3rem) 0;
            background: white;
        }
        
        .companies-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
        }
        
        @media (max-width: 992px) {
            .companies-container {
                grid-template-columns: 1fr;
            }
            
            .company-sidebar-filters {
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
            
            .company-sidebar-filters.active {
                right: 0;
            }
            
            .company-sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            
            .company-sidebar-overlay.active {
                display: block;
            }
        }
        
        @media (max-width: 480px) {
            .company-sidebar-filters {
                width: 100%;
                right: -100%;
            }
        }
        
        /* Sidebar Filters */
        .company-sidebar-filters {
            background: var(--lightest-blue);
            border-radius: 20px;
            padding: 2rem;
            height: fit-content;
            position: sticky;
            top: 2rem;
        }
        
        .company-filter-section {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid rgba(0, 102, 255, 0.1);
        }
        
        .company-filter-section:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .company-filter-section h4 {
            margin-bottom: 1rem;
            font-size: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .company-filter-section h4 .clear-company-filter {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--primary-blue);
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }
        
        .company-filter-options {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .company-filter-option {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .company-filter-option:hover {
            background: rgba(0, 102, 255, 0.05);
        }
        
        .company-filter-option input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-blue);
        }
        
        .company-filter-option label {
            cursor: pointer;
            flex: 1;
            font-size: 0.95rem;
        }
        
        .company-filter-count {
            background: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            min-width: 30px;
            text-align: center;
        }
        
        /* Companies Results */
        .companies-results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .company-results-count {
            font-size: 1.125rem;
            font-weight: 600;
        }
        
        .company-results-count span {
            color: var(--primary-blue);
        }
        
        .company-sort-options {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .company-sort-label {
            color: var(--medium-gray);
            font-size: 0.95rem;
        }
        
        .company-sort-select {
            padding: 0.75rem 1rem;
            border: 2px solid var(--light-blue);
            border-radius: 8px;
            background: white;
            font-size: 0.95rem;
            min-width: 200px;
        }
        
        .company-view-toggle {
            display: flex;
            gap: 0.5rem;
        }
        
        .company-view-toggle-btn {
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
        
        .company-view-toggle-btn:hover, .company-view-toggle-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        /* Companies Grid/List View */
        .companies-grid-view {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(min(350px, 100%), 1fr));
            gap: 1.5rem;
        }
        
        .companies-list-view {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .companies-list-view .company-card {
            flex-direction: row;
            align-items: center;
            padding: 1.5rem;
        }
        
        .companies-list-view .company-logo-wrapper {
            margin: 0 1.5rem 0 0;
            width: 100px;
            height: 100px;
        }
        
        .companies-list-view .company-info {
            flex: 1;
        }
        
        .companies-list-view .company-tags {
            margin: 0 2rem;
        }
        
        .companies-list-view .company-footer {
            margin-top: 0;
            border-top: none;
            padding-top: 0;
        }
        
        @media (max-width: 768px) {
            .companies-list-view .company-card {
                flex-direction: column;
                align-items: stretch;
            }
            
            .companies-list-view .company-logo-wrapper {
                margin: 0 auto 1.5rem;
            }
            
            .companies-list-view .company-tags {
                margin: 1rem 0;
            }
        }
        
        /* Company Card */
        .company-card {
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
            align-items: center;
            text-align: center;
        }
        
        .company-card.featured::after {
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
        
        .company-card.hiring::after {
            content: 'HIRING';
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #10B981;
            color: white;
            padding: 0.375rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .company-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow-lg);
        }
        
        .company-card .company-save-btn {
            position: absolute;
            top: 1rem;
            left: 1rem;
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
        
        .company-card .company-save-btn:hover, .company-card .company-save-btn.saved {
            background: #FF6B6B;
            color: white;
            border-color: #FF6B6B;
        }
        
        .company-logo-wrapper {
            width: 120px;
            height: 120px;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .company-logo-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: var(--gradient-secondary);
            border-radius: 24px;
            border: 3px solid var(--light-blue);
        }
        
        .company-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            color: var(--primary-blue);
        }
        
        .company-info {
            width: 100%;
        }
        
        .company-info h3 {
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
            line-height: 1.3;
        }
        
        .company-industry {
            color: var(--medium-gray);
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }
        
        .company-location {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: var(--medium-gray);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .company-description {
            color: var(--medium-gray);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            line-height: 1.6;
            flex: 1;
        }
        
        .company-description p {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: inherit;
        }
        
        .company-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 1.25rem 0;
            justify-content: center;
        }
        
        .company-tag {
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
        
        .company-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin: 1.5rem 0;
            width: 100%;
        }
        
        .company-stat {
            text-align: center;
            padding: 0.75rem;
            background: var(--lightest-blue);
            border-radius: 12px;
            border: 1px solid var(--light-blue);
        }
        
        .company-stat-number {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--primary-blue);
            margin-bottom: 0.25rem;
        }
        
        .company-stat-label {
            font-size: 0.75rem;
            color: var(--medium-gray);
        }
        
        .company-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 2px solid var(--light-blue);
            width: 100%;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .btn-view-company {
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 700;
            transition: all 0.3s ease;
            font-size: 1rem;
            min-height: 48px;
            flex: 1;
        }
        
        .btn-view-company:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        .btn-view-jobs {
            background: transparent;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            border-radius: 12px;
            padding: 0.875rem 1.5rem;
            font-weight: 700;
            transition: all 0.3s ease;
            font-size: 1rem;
            min-height: 48px;
            flex: 1;
        }
        
        .btn-view-jobs:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Pagination */
        .companies-pagination {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid var(--light-blue);
        }
        
        .companies-pagination-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .company-pagination-btn {
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
        
        .company-pagination-btn:hover, .company-pagination-btn.active {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        .company-pagination-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .company-pagination-ellipsis {
            padding: 0 0.5rem;
            color: var(--medium-gray);
        }
        
        /* Top Companies Section */
        .top-companies-section {
            background: var(--lightest-blue);
            border-radius: 24px;
            padding: clamp(2rem, 4vw, 3rem);
            margin-top: 3rem;
            border: 2px solid var(--light-blue);
        }
        
        .top-companies-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .top-companies-header h3 {
            margin-bottom: 0.5rem;
        }
        
        .top-companies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(min(200px, 100%), 1fr));
            gap: 1.5rem;
        }
        
        .top-company-item {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            border: 2px solid var(--light-blue);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .top-company-item:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
            box-shadow: var(--shadow-md);
        }
        
        .top-company-logo {
            width: 80px;
            height: 80px;
            background: var(--gradient-secondary);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 1rem;
            border: 2px solid var(--light-blue);
        }
        
        .top-company-name {
            font-weight: 700;
            margin-bottom: 0.25rem;
        }
        
        .top-company-jobs {
            color: var(--primary-blue);
            font-weight: 600;
            font-size: 0.875rem;
        }
        
        /* Mobile Sidebar Close Button */
        .company-sidebar-close-btn {
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
            .company-sidebar-close-btn {
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
            .companies-header-section {
                padding: 2rem 0;
            }
            
            .companies-search-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .company-filter-toggle-btn {
                width: 100%;
                justify-content: center;
            }
            
            .company-search-actions {
                flex-direction: column;
            }
            
            .btn-search-companies, .btn-clear-company-filters {
                width: 100%;
                max-width: none;
            }
            
            .companies-results-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .company-sort-options {
                flex-direction: column;
                align-items: stretch;
            }
            
            .company-sort-select {
                width: 100%;
            }
            
            .company-view-toggle {
                align-self: center;
            }
            
            .company-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 480px) {
            .companies-search-form {
                gap: 0.75rem;
            }
            
            .company-search-input-group input, .company-search-input-group select {
                min-height: 52px;
                padding: 0.875rem 0.875rem 0.875rem 2.5rem;
            }
            
            .company-quick-filters {
                justify-content: center;
            }
            
            .company-card {
                padding: 1.25rem;
            }
            
            .company-footer {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn-view-company, .btn-view-jobs {
                width: 100%;
            }
            
            .company-stats {
                grid-template-columns: 1fr;
            }
            
            .top-companies-grid {
                grid-template-columns: repeat(2, 1fr);
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

    <!-- Companies Page Header -->
    <section class="companies-header-section">
        <div class="companies-header-bg">
            <div class="companies-bg-element"></div>
            <div class="companies-bg-element"></div>
        </div>
        <div class="container">
            <div class="companies-header-content">
                <nav class="breadcrumb-nav">
                    <a href="/"><i class="fas fa-home"></i> Home</a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Companies</span>
                </nav>
                
                <div class="companies-header-tagline">
                    <i class="fas fa-building"></i> Discover Top Employers
                </div>
                <h1>Find Your Dream Company</h1>
                <p class="companies-header-subtitle">
                    Explore 5,000+ companies hiring now. Find employers that match your values, culture preferences, and career goals.
                </p>
                
                <!-- Companies Stats -->
                <div class="companies-stats">
                    <div class="company-stat-item">
                        <div class="company-stat-number" data-count="5200">5,200+</div>
                        <div class="company-stat-label">Active Companies</div>
                    </div>
                    <div class="company-stat-item">
                        <div class="company-stat-number" data-count="24300">24K+</div>
                        <div class="company-stat-label">Open Positions</div>
                    </div>
                    <div class="company-stat-item">
                        <div class="company-stat-number" data-count="89">89%</div>
                        <div class="company-stat-label">Hiring Now</div>
                    </div>
                    <div class="company-stat-item">
                        <div class="company-stat-number" data-count="92">92%</div>
                        <div class="company-stat-label">Positive Reviews</div>
                    </div>
                </div>
                
                <!-- Advanced Search Section -->
                <div class="companies-search-section">
                    <div class="companies-search-header">
                        <h3>Find Companies That Fit You</h3>
                        <button class="company-filter-toggle-btn" id="mobileCompanyFilterToggle">
                            <i class="fas fa-filter"></i>
                            Show Filters
                        </button>
                    </div>
                    
                    <form class="companies-search-form" id="companiesSearchForm">
                        <div class="company-search-input-group">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Company name, industry, or keyword">
                        </div>
                        
                        <div class="company-search-input-group">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" placeholder="Location or remote">
                        </div>
                        
                        <div class="company-search-input-group">
                            <i class="fas fa-industry"></i>
                            <select>
                                <option value="">Industry</option>
                                <option value="tech">Technology</option>
                                <option value="finance">Finance</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="retail">Retail</option>
                                <option value="manufacturing">Manufacturing</option>
                            </select>
                        </div>
                    </form>
                    
                    <div class="company-search-actions">
                        <button type="submit" class="btn btn-search-companies">
                            <i class="fas fa-search"></i>
                            Search Companies
                        </button>
                        <button type="button" class="btn btn-clear-company-filters">
                            <i class="fas fa-redo"></i>
                            Clear All
                        </button>
                    </div>
                    
                    <div class="company-quick-filters">
                        <button class="company-quick-filter-btn active">
                            <i class="fas fa-star"></i>
                            Top Rated
                        </button>
                        <button class="company-quick-filter-btn">
                            <i class="fas fa-bolt"></i>
                            Hiring Now
                        </button>
                        <button class="company-quick-filter-btn">
                            <i class="fas fa-home"></i>
                            Remote-First
                        </button>
                        <button class="company-quick-filter-btn">
                            <i class="fas fa-leaf"></i>
                            Eco-Friendly
                        </button>
                        <button class="company-quick-filter-btn">
                            <i class="fas fa-users"></i>
                            Diverse Teams
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Main Content -->
    <section class="companies-main-section">
        <div class="container">
            <!-- Mobile Filter Overlay -->
            <div class="company-sidebar-overlay" id="companySidebarOverlay"></div>
            
            <div class="companies-container">
                <!-- Sidebar Filters -->
                <aside class="company-sidebar-filters" id="companySidebarFilters">
                    <button class="company-sidebar-close-btn" id="companySidebarClose">
                        <i class="fas fa-times"></i>
                    </button>
                    
                    <div class="company-filter-section">
                        <h4>
                            Industry
                            <button class="clear-company-filter">Clear</button>
                        </h4>
                        <div class="company-filter-options">
                            <div class="company-filter-option">
                                <input type="checkbox" id="tech-industry" checked>
                                <label for="tech-industry">Technology</label>
                                <span class="company-filter-count">1,245</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="finance-industry">
                                <label for="finance-industry">Finance & Banking</label>
                                <span class="company-filter-count">567</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="healthcare-industry" checked>
                                <label for="healthcare-industry">Healthcare</label>
                                <span class="company-filter-count">432</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="retail-industry">
                                <label for="retail-industry">Retail & E-commerce</label>
                                <span class="company-filter-count">345</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="manufacturing-industry">
                                <label for="manufacturing-industry">Manufacturing</label>
                                <span class="company-filter-count">278</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="company-filter-section">
                        <h4>
                            Company Size
                            <button class="clear-company-filter">Clear</button>
                        </h4>
                        <div class="company-filter-options">
                            <div class="company-filter-option">
                                <input type="checkbox" id="startup-size">
                                <label for="startup-size">Startup (1-50)</label>
                                <span class="company-filter-count">1,234</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="small-size" checked>
                                <label for="small-size">Small (51-200)</label>
                                <span class="company-filter-count">876</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="medium-size" checked>
                                <label for="medium-size">Medium (201-1000)</label>
                                <span class="company-filter-count">567</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="large-size">
                                <label for="large-size">Large (1000+)</label>
                                <span class="company-filter-count">345</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="company-filter-section">
                        <h4>
                            Company Type
                            <button class="clear-company-filter">Clear</button>
                        </h4>
                        <div class="company-filter-options">
                            <div class="company-filter-option">
                                <input type="checkbox" id="public-company">
                                <label for="public-company">Public Company</label>
                                <span class="company-filter-count">456</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="private-company" checked>
                                <label for="private-company">Private Company</label>
                                <span class="company-filter-count">1,234</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="nonprofit">
                                <label for="nonprofit">Non-profit</label>
                                <span class="company-filter-count">189</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="government">
                                <label for="government">Government</label>
                                <span class="company-filter-count">67</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="company-filter-section">
                        <h4>
                            Work Arrangement
                            <button class="clear-company-filter">Clear</button>
                        </h4>
                        <div class="company-filter-options">
                            <div class="company-filter-option">
                                <input type="checkbox" id="remote-first" checked>
                                <label for="remote-first">Remote-First</label>
                                <span class="company-filter-count">789</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="hybrid">
                                <label for="hybrid">Hybrid</label>
                                <span class="company-filter-count">1,234</span>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="office-based">
                                <label for="office-based">Office-Based</label>
                                <span class="company-filter-count">876</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="company-filter-section">
                        <h4>
                            Benefits
                            <button class="clear-company-filter">Clear</button>
                        </h4>
                        <div class="company-filter-options">
                            <div class="company-filter-option">
                                <input type="checkbox" id="health-insurance" checked>
                                <label for="health-insurance">Health Insurance</label>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="flexible-hours" checked>
                                <label for="flexible-hours">Flexible Hours</label>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="stock-options">
                                <label for="stock-options">Stock Options</label>
                            </div>
                            <div class="company-filter-option">
                                <input type="checkbox" id="parental-leave">
                                <label for="parental-leave">Parental Leave</label>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn-search-companies" style="width: 100%; margin-top: 1rem;">
                        <i class="fas fa-filter"></i>
                        Apply Filters
                    </button>
                </aside>
                
                <!-- Companies Results -->
                <main class="companies-results">
                    <div class="companies-results-header">
                        <div class="company-results-count">
                            Showing <span>1-12</span> of <span>5,200</span> companies
                        </div>
                        <div class="company-sort-options">
                            <span class="company-sort-label">Sort by:</span>
                            <select class="company-sort-select">
                                <option value="relevance">Relevance</option>
                                <option value="rating">Highest Rated</option>
                                <option value="jobs">Most Jobs</option>
                                <option value="newest">Newly Added</option>
                            </select>
                            <div class="company-view-toggle">
                                <button class="company-view-toggle-btn active" data-view="grid">
                                    <i class="fas fa-th-large"></i>
                                </button>
                                <button class="company-view-toggle-btn" data-view="list">
                                    <i class="fas fa-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Companies Grid/List View -->
                    <div class="companies-grid-view" id="companiesView">
                        <!-- Company Card 1 -->
                        <div class="company-card featured hiring" data-company-id="1">
                            <button class="company-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="company-logo-wrapper">
                                <div class="company-logo-bg"></div>
                                <i class="fab fa-apple company-logo"></i>
                            </div>
                            <div class="company-info">
                                <h3>TechVision Inc.</h3>
                                <p class="company-industry">Technology • Software</p>
                                <div class="company-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    San Francisco, CA • Remote
                                </div>
                                <div class="company-description">
                                    <p>A leading tech company specializing in innovative software solutions and digital transformation services for enterprises worldwide.</p>
                                </div>
                            </div>
                            <div class="company-tags">
                                <span class="company-tag">
                                    <i class="fas fa-star"></i>
                                    4.8/5
                                </span>
                                <span class="company-tag">
                                    <i class="fas fa-users"></i>
                                    501-1000
                                </span>
                            </div>
                            <div class="company-stats">
                                <div class="company-stat">
                                    <div class="company-stat-number">124</div>
                                    <div class="company-stat-label">Open Jobs</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">4.8</div>
                                    <div class="company-stat-label">Rating</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">89%</div>
                                    <div class="company-stat-label">Recommended</div>
                                </div>
                            </div>
                            <div class="company-footer">
                                <button class="btn btn-view-company">
                                    View Company
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                                <button class="btn btn-view-jobs">
                                    <i class="fas fa-briefcase"></i>
                                    124 Jobs
                                </button>
                            </div>
                        </div>
                        
                        <!-- Company Card 2 -->
                        <div class="company-card" data-company-id="2">
                            <button class="company-save-btn saved">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="company-logo-wrapper">
                                <div class="company-logo-bg"></div>
                                <i class="fab fa-google company-logo"></i>
                            </div>
                            <div class="company-info">
                                <h3>Innovate Solutions</h3>
                                <p class="company-industry">Technology • AI/ML</p>
                                <div class="company-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    New York, NY • Hybrid
                                </div>
                                <div class="company-description">
                                    <p>Pioneering artificial intelligence solutions that transform businesses through cutting-edge machine learning algorithms.</p>
                                </div>
                            </div>
                            <div class="company-tags">
                                <span class="company-tag">
                                    <i class="fas fa-star"></i>
                                    4.7/5
                                </span>
                                <span class="company-tag">
                                    <i class="fas fa-users"></i>
                                    201-500
                                </span>
                            </div>
                            <div class="company-stats">
                                <div class="company-stat">
                                    <div class="company-stat-number">89</div>
                                    <div class="company-stat-label">Open Jobs</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">4.7</div>
                                    <div class="company-stat-label">Rating</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">92%</div>
                                    <div class="company-stat-label">Recommended</div>
                                </div>
                            </div>
                            <div class="company-footer">
                                <button class="btn btn-view-company">
                                    View Company
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                                <button class="btn btn-view-jobs">
                                    <i class="fas fa-briefcase"></i>
                                    89 Jobs
                                </button>
                            </div>
                        </div>
                        
                        <!-- Company Card 3 -->
                        <div class="company-card hiring" data-company-id="3">
                            <button class="company-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="company-logo-wrapper">
                                <div class="company-logo-bg"></div>
                                <i class="fas fa-heartbeat company-logo"></i>
                            </div>
                            <div class="company-info">
                                <h3>HealthFirst Medical</h3>
                                <p class="company-industry">Healthcare • Medical</p>
                                <div class="company-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Boston, MA
                                </div>
                                <div class="company-description">
                                    <p>Leading healthcare provider with innovative medical solutions and patient-centered care across multiple states.</p>
                                </div>
                            </div>
                            <div class="company-tags">
                                <span class="company-tag">
                                    <i class="fas fa-star"></i>
                                    4.6/5
                                </span>
                                <span class="company-tag">
                                    <i class="fas fa-users"></i>
                                    1000+
                                </span>
                            </div>
                            <div class="company-stats">
                                <div class="company-stat">
                                    <div class="company-stat-number">156</div>
                                    <div class="company-stat-label">Open Jobs</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">4.6</div>
                                    <div class="company-stat-label">Rating</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">88%</div>
                                    <div class="company-stat-label">Recommended</div>
                                </div>
                            </div>
                            <div class="company-footer">
                                <button class="btn btn-view-company">
                                    View Company
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                                <button class="btn btn-view-jobs">
                                    <i class="fas fa-briefcase"></i>
                                    156 Jobs
                                </button>
                            </div>
                        </div>
                        
                        <!-- Company Card 4 -->
                        <div class="company-card" data-company-id="4">
                            <button class="company-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="company-logo-wrapper">
                                <div class="company-logo-bg"></div>
                                <i class="fas fa-graduation-cap company-logo"></i>
                            </div>
                            <div class="company-info">
                                <h3>EduTech Solutions</h3>
                                <p class="company-industry">Education • EdTech</p>
                                <div class="company-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Remote • Worldwide
                                </div>
                                <div class="company-description">
                                    <p>Revolutionizing education through technology with interactive learning platforms used by millions of students globally.</p>
                                </div>
                            </div>
                            <div class="company-tags">
                                <span class="company-tag">
                                    <i class="fas fa-star"></i>
                                    4.9/5
                                </span>
                                <span class="company-tag">
                                    <i class="fas fa-users"></i>
                                    51-200
                                </span>
                            </div>
                            <div class="company-stats">
                                <div class="company-stat">
                                    <div class="company-stat-number">67</div>
                                    <div class="company-stat-label">Open Jobs</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">4.9</div>
                                    <div class="company-stat-label">Rating</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">95%</div>
                                    <div class="company-stat-label">Recommended</div>
                                </div>
                            </div>
                            <div class="company-footer">
                                <button class="btn btn-view-company">
                                    View Company
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                                <button class="btn btn-view-jobs">
                                    <i class="fas fa-briefcase"></i>
                                    67 Jobs
                                </button>
                            </div>
                        </div>
                        
                        <!-- Company Card 5 -->
                        <div class="company-card featured" data-company-id="5">
                            <button class="company-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="company-logo-wrapper">
                                <div class="company-logo-bg"></div>
                                <i class="fas fa-leaf company-logo"></i>
                            </div>
                            <div class="company-info">
                                <h3>GreenFuture Energy</h3>
                                <p class="company-industry">Energy • Renewable</p>
                                <div class="company-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Denver, CO • Hybrid
                                </div>
                                <div class="company-description">
                                    <p>Leading renewable energy company focused on sustainable solutions and reducing carbon footprint globally.</p>
                                </div>
                            </div>
                            <div class="company-tags">
                                <span class="company-tag">
                                    <i class="fas fa-star"></i>
                                    4.7/5
                                </span>
                                <span class="company-tag">
                                    <i class="fas fa-users"></i>
                                    501-1000
                                </span>
                            </div>
                            <div class="company-stats">
                                <div class="company-stat">
                                    <div class="company-stat-number">78</div>
                                    <div class="company-stat-label">Open Jobs</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">4.7</div>
                                    <div class="company-stat-label">Rating</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">91%</div>
                                    <div class="company-stat-label">Recommended</div>
                                </div>
                            </div>
                            <div class="company-footer">
                                <button class="btn btn-view-company">
                                    View Company
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                                <button class="btn btn-view-jobs">
                                    <i class="fas fa-briefcase"></i>
                                    78 Jobs
                                </button>
                            </div>
                        </div>
                        
                        <!-- Company Card 6 -->
                        <div class="company-card hiring" data-company-id="6">
                            <button class="company-save-btn">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="company-logo-wrapper">
                                <div class="company-logo-bg"></div>
                                <i class="fas fa-shield-alt company-logo"></i>
                            </div>
                            <div class="company-info">
                                <h3>SecureNet Systems</h3>
                                <p class="company-industry">Technology • Cybersecurity</p>
                                <div class="company-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Austin, TX • Remote
                                </div>
                                <div class="company-description">
                                    <p>Top cybersecurity firm providing cutting-edge security solutions to protect businesses from digital threats.</p>
                                </div>
                            </div>
                            <div class="company-tags">
                                <span class="company-tag">
                                    <i class="fas fa-star"></i>
                                    4.8/5
                                </span>
                                <span class="company-tag">
                                    <i class="fas fa-users"></i>
                                    201-500
                                </span>
                            </div>
                            <div class="company-stats">
                                <div class="company-stat">
                                    <div class="company-stat-number">92</div>
                                    <div class="company-stat-label">Open Jobs</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">4.8</div>
                                    <div class="company-stat-label">Rating</div>
                                </div>
                                <div class="company-stat">
                                    <div class="company-stat-number">93%</div>
                                    <div class="company-stat-label">Recommended</div>
                                </div>
                            </div>
                            <div class="company-footer">
                                <button class="btn btn-view-company">
                                    View Company
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                                <button class="btn btn-view-jobs">
                                    <i class="fas fa-briefcase"></i>
                                    92 Jobs
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="companies-pagination">
                        <div class="companies-pagination-container">
                            <button class="company-pagination-btn disabled">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="company-pagination-btn active">1</button>
                            <button class="company-pagination-btn">2</button>
                            <button class="company-pagination-btn">3</button>
                            <span class="company-pagination-ellipsis">...</span>
                            <button class="company-pagination-btn">20</button>
                            <button class="company-pagination-btn">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Top Companies Section -->
                    <div class="top-companies-section">
                        <div class="top-companies-header">
                            <h3>Top Hiring Companies</h3>
                            <p>These companies have the most job openings right now</p>
                        </div>
                        <div class="top-companies-grid">
                            <div class="top-company-item">
                                <div class="top-company-logo">
                                    <i class="fab fa-microsoft"></i>
                                </div>
                                <div class="top-company-name">Microsoft</div>
                                <div class="top-company-jobs">234 Jobs</div>
                            </div>
                            <div class="top-company-item">
                                <div class="top-company-logo">
                                    <i class="fab fa-amazon"></i>
                                </div>
                                <div class="top-company-name">Amazon</div>
                                <div class="top-company-jobs">198 Jobs</div>
                            </div>
                            <div class="top-company-item">
                                <div class="top-company-logo">
                                    <i class="fab fa-meta"></i>
                                </div>
                                <div class="top-company-name">Meta</div>
                                <div class="top-company-jobs">167 Jobs</div>
                            </div>
                            <div class="top-company-item">
                                <div class="top-company-logo">
                                    <i class="fab fa-netflix"></i>
                                </div>
                                <div class="top-company-name">Netflix</div>
                                <div class="top-company-jobs">89 Jobs</div>
                            </div>
                            <div class="top-company-item">
                                <div class="top-company-logo">
                                    <i class="fab fa-uber"></i>
                                </div>
                                <div class="top-company-name">Uber</div>
                                <div class="top-company-jobs">145 Jobs</div>
                            </div>
                            <div class="top-company-item">
                                <div class="top-company-logo">
                                    <i class="fab fa-airbnb"></i>
                                </div>
                                <div class="top-company-name">Airbnb</div>
                                <div class="top-company-jobs">112 Jobs</div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Filter Toggle for Companies
            const mobileCompanyFilterToggle = document.getElementById('mobileCompanyFilterToggle');
            const companySidebarFilters = document.getElementById('companySidebarFilters');
            const companySidebarOverlay = document.getElementById('companySidebarOverlay');
            const companySidebarClose = document.getElementById('companySidebarClose');
            
            if (mobileCompanyFilterToggle && companySidebarFilters) {
                mobileCompanyFilterToggle.addEventListener('click', function() {
                    companySidebarFilters.classList.add('active');
                    companySidebarOverlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
                
                companySidebarClose.addEventListener('click', closeCompanySidebar);
                companySidebarOverlay.addEventListener('click', closeCompanySidebar);
                
                function closeCompanySidebar() {
                    companySidebarFilters.classList.remove('active');
                    companySidebarOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
                
                // Update button text based on sidebar state
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.attributeName === 'class') {
                            if (companySidebarFilters.classList.contains('active')) {
                                mobileCompanyFilterToggle.innerHTML = '<i class="fas fa-times"></i> Hide Filters';
                            } else {
                                mobileCompanyFilterToggle.innerHTML = '<i class="fas fa-filter"></i> Show Filters';
                            }
                        }
                    });
                });
                
                observer.observe(companySidebarFilters, { attributes: true });
            }
            
            // View Toggle (Grid/List) for Companies
            const companyViewToggleBtns = document.querySelectorAll('.company-view-toggle-btn');
            const companiesView = document.getElementById('companiesView');
            
            companyViewToggleBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    companyViewToggleBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    const viewType = this.dataset.view;
                    if (viewType === 'list') {
                        companiesView.classList.remove('companies-grid-view');
                        companiesView.classList.add('companies-list-view');
                    } else {
                        companiesView.classList.remove('companies-list-view');
                        companiesView.classList.add('companies-grid-view');
                    }
                });
            });
            
            // Save Company Functionality
            const companySaveButtons = document.querySelectorAll('.company-save-btn');
            companySaveButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const companyId = this.closest('.company-card').dataset.companyId;
                    const isSaved = this.classList.contains('saved');
                    
                    if (isSaved) {
                        this.classList.remove('saved');
                        this.innerHTML = '<i class="far fa-heart"></i>';
                        showNotification(`Company #${companyId} removed from saved companies`);
                    } else {
                        this.classList.add('saved');
                        this.innerHTML = '<i class="fas fa-heart"></i>';
                        showNotification(`Company #${companyId} saved to your favorites`);
                    }
                });
            });
            
            // View Company Button Functionality
            const viewCompanyButtons = document.querySelectorAll('.btn-view-company');
            viewCompanyButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const companyName = this.closest('.company-card').querySelector('h3').textContent;
                    const companyIndustry = this.closest('.company-card').querySelector('.company-industry').textContent;
                    
                    // In a real application, this would navigate to company profile page
                    showCompanyModal(companyName, companyIndustry);
                });
            });
            
            // View Jobs Button Functionality
            const viewJobsButtons = document.querySelectorAll('.btn-view-jobs');
            viewJobsButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const companyName = this.closest('.company-card').querySelector('h3').textContent;
                    const jobCount = this.textContent.match(/\d+/)[0];
                    
                    // In a real application, this would navigate to jobs page filtered by company
                    showNotification(`Loading ${jobCount} jobs at ${companyName}...`);
                });
            });
            
            // Quick Filter Functionality for Companies
            const companyQuickFilterBtns = document.querySelectorAll('.company-quick-filter-btn');
            companyQuickFilterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    this.classList.toggle('active');
                    
                    // Update search based on active filters
                    updateCompanySearchResults();
                });
            });
            
            // Clear Filter Buttons for Companies
            const clearCompanyFilterBtns = document.querySelectorAll('.clear-company-filter');
            clearCompanyFilterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filterSection = this.closest('.company-filter-section');
                    const checkboxes = filterSection.querySelectorAll('input[type="checkbox"]');
                    
                    checkboxes.forEach(cb => cb.checked = false);
                    
                    showNotification('Filters cleared');
                    updateCompanySearchResults();
                });
            });
            
            // Search Form Submission for Companies
            const companySearchForm = document.getElementById('companiesSearchForm');
            if (companySearchForm) {
                companySearchForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    updateCompanySearchResults();
                    showNotification('Searching for companies...');
                });
            }
            
            // Clear Filters Button for Companies
            const clearCompanyFiltersBtn = document.querySelector('.btn-clear-company-filters');
            if (clearCompanyFiltersBtn) {
                clearCompanyFiltersBtn.addEventListener('click', function() {
                    // Clear all filters
                    document.querySelectorAll('.company-sidebar-filters input[type="checkbox"]').forEach(cb => cb.checked = false);
                    
                    // Reset quick filters
                    companyQuickFilterBtns.forEach(btn => btn.classList.remove('active'));
                    
                    // Reset form inputs
                    companySearchForm.reset();
                    
                    showNotification('All filters cleared');
                    updateCompanySearchResults();
                });
            }
            
            // Apply Filters Button
            const applyFiltersBtn = document.querySelector('.company-sidebar-filters .btn-search-companies');
            if (applyFiltersBtn) {
                applyFiltersBtn.addEventListener('click', function() {
                    updateCompanySearchResults();
                    showNotification('Applying filters...');
                });
            }
            
            // Pagination for Companies
            const companyPaginationBtns = document.querySelectorAll('.company-pagination-btn:not(.disabled)');
            companyPaginationBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (this.classList.contains('active')) return;
                    
                    document.querySelectorAll('.company-pagination-btn').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Simulate loading new page
                    showNotification('Loading more companies...');
                    setTimeout(() => {
                        showNotification('Page loaded successfully');
                    }, 800);
                });
            });
            
            // Animated Counter for Stats
            const companyStatNumbers = document.querySelectorAll('.company-stat-number');
            
            const animateCompanyCounter = (element) => {
                const text = element.textContent;
                const isPercentage = text.includes('%');
                const target = parseInt(text.replace(/[^0-9]/g, ''));
                const duration = 2000;
                const step = Math.ceil(target / (duration / 16));
                let current = 0;
                
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        element.textContent = target.toLocaleString() + (isPercentage ? '%' : '+');
                        clearInterval(timer);
                    } else {
                        element.textContent = current.toLocaleString() + (isPercentage ? '%' : '+');
                    }
                }, 16);
            };
            
            // Animate stats on page load
            companyStatNumbers.forEach(stat => {
                setTimeout(() => {
                    animateCompanyCounter(stat);
                }, 500);
            });
            
            // Helper Functions
            function updateCompanySearchResults() {
                // In a real application, this would make an API call
                // For now, we'll just show a notification
                const activeFilters = [];
                document.querySelectorAll('.company-quick-filter-btn.active').forEach(btn => {
                    activeFilters.push(btn.textContent.trim());
                });
                
                const activeCheckboxes = document.querySelectorAll('.company-sidebar-filters input[type="checkbox"]:checked').length;
                
                showNotification(`Searching with ${activeFilters.length} quick filters and ${activeCheckboxes} detailed filters...`);
                
                // Simulate API call delay
                setTimeout(() => {
                    document.querySelector('.company-results-count span:first-child').textContent = '1-12';
                    showNotification(`Found 5,200 matching companies`);
                }, 1000);
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
                
                // Add animation if not already present
                if (!document.querySelector('style[data-notification-animation]')) {
                    const style = document.createElement('style');
                    style.setAttribute('data-notification-animation', 'true');
                    style.textContent = `
                        @keyframes slideIn {
                            from { transform: translateX(100%); opacity: 0; }
                            to { transform: translateX(0); opacity: 1; }
                        }
                    `;
                    document.head.appendChild(style);
                }
            }
            
            function showCompanyModal(companyName, companyIndustry) {
                // Create modal
                const modal = document.createElement('div');
                modal.className = 'company-modal';
                modal.innerHTML = `
                    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center; z-index: 9999; padding: 1rem;">
                        <div style="background: white; border-radius: 20px; padding: 2rem; max-width: 600px; width: 100%; box-shadow: var(--shadow-xl); max-height: 90vh; overflow-y: auto;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                                <h3 style="margin: 0;">${companyName}</h3>
                                <button class="close-company-modal" style="background: none; border: none; font-size: 1.5rem; color: var(--medium-gray); cursor: pointer;">×</button>
                            </div>
                            <p style="color: var(--medium-gray); margin-bottom: 2rem;">${companyIndustry}</p>
                            
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-bottom: 2rem;">
                                <div style="background: var(--lightest-blue); padding: 1.5rem; border-radius: 12px; border: 2px solid var(--light-blue);">
                                    <div style="font-size: 2rem; color: var(--primary-blue); margin-bottom: 0.5rem;">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div style="font-weight: 700; font-size: 1.25rem;">124 Jobs</div>
                                    <div style="color: var(--medium-gray); font-size: 0.875rem;">Open Positions</div>
                                </div>
                                <div style="background: var(--lightest-blue); padding: 1.5rem; border-radius: 12px; border: 2px solid var(--light-blue);">
                                    <div style="font-size: 2rem; color: var(--primary-blue); margin-bottom: 0.5rem;">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div style="font-weight: 700; font-size: 1.25rem;">4.8/5</div>
                                    <div style="color: var(--medium-gray); font-size: 0.875rem;">Employee Rating</div>
                                </div>
                                <div style="background: var(--lightest-blue); padding: 1.5rem; border-radius: 12px; border: 2px solid var(--light-blue);">
                                    <div style="font-size: 2rem; color: var(--primary-blue); margin-bottom: 0.5rem;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div style="font-weight: 700; font-size: 1.25rem;">501-1000</div>
                                    <div style="color: var(--medium-gray); font-size: 0.875rem;">Employees</div>
                                </div>
                                <div style="background: var(--lightest-blue); padding: 1.5rem; border-radius: 12px; border: 2px solid var(--light-blue);">
                                    <div style="font-size: 2rem; color: var(--primary-blue); margin-bottom: 0.5rem;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div style="font-weight: 700; font-size: 1.25rem;">San Francisco</div>
                                    <div style="color: var(--medium-gray); font-size: 0.875rem;">Headquarters</div>
                                </div>
                            </div>
                            
                            <div style="margin-bottom: 2rem;">
                                <h4 style="margin-bottom: 1rem;">About ${companyName}</h4>
                                <p style="color: var(--medium-gray); line-height: 1.6;">
                                    A leading tech company specializing in innovative software solutions and digital transformation services for enterprises worldwide. We're committed to creating cutting-edge technology that solves real-world problems.
                                </p>
                            </div>
                            
                            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                <button class="view-all-jobs" style="flex: 1; background: var(--gradient-primary); color: white; border: none; border-radius: 12px; padding: 1rem; font-weight: 700; cursor: pointer; min-width: 200px;">
                                    <i class="fas fa-briefcase"></i>
                                    View All Jobs
                                </button>
                                <button class="follow-company" style="flex: 1; background: transparent; color: var(--primary-blue); border: 2px solid var(--primary-blue); border-radius: 12px; padding: 1rem; font-weight: 700; cursor: pointer; min-width: 200px;">
                                    <i class="fas fa-bell"></i>
                                    Follow Company
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                document.body.style.overflow = 'hidden';
                
                // Add event listeners
                modal.querySelectorAll('.close-company-modal').forEach(btn => {
                    btn.addEventListener('click', () => {
                        modal.remove();
                        document.body.style.overflow = '';
                    });
                });
                
                modal.querySelector('.view-all-jobs').addEventListener('click', () => {
                    showNotification(`Loading all jobs at ${companyName}...`);
                    modal.remove();
                    document.body.style.overflow = '';
                });
                
                modal.querySelector('.follow-company').addEventListener('click', () => {
                    showNotification(`You're now following ${companyName}`);
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
            
            // Initialize company search
            updateCompanySearchResults();
        });
    </script>

@endsection