@extends('layouts.header')
@section('title','Your Availibe Jobs')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #dbeafe;
            --secondary: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --gray-100: #f9fafb;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-700: #374151;
            --gray-900: #111827;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .applications-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-900);
            margin: 0;
        }
        
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.5rem;
        }
        
        .stat-icon.submitted { background-color: #dbeafe; color: var(--primary); }
        .stat-icon.viewed { background-color: #fef3c7; color: var(--warning); }
        .stat-icon.shortlisted { background-color: #d1fae5; color: var(--secondary); }
        .stat-icon.rejected { background-color: #fee2e2; color: var(--danger); }
        
        .stat-info h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: var(--gray-900);
        }
        
        .stat-info p {
            color: var(--gray-700);
            margin: 0;
            font-size: 0.9rem;
        }
        
        .filters-section {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .filter-row {
            display: flex;
            gap: 15px;
            align-items: flex-end;
            flex-wrap: wrap;
        }
        
        .filter-group {
            flex: 1;
            min-width: 200px;
        }
        
        .filter-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--gray-700);
            font-size: 0.9rem;
        }
        
        .filter-input, .filter-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--gray-300);
            border-radius: 8px;
            font-size: 0.95rem;
            background: white;
        }
        
        .filter-input:focus, .filter-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(29, 78, 216, 0.2);
        }
        
        .btn-outline {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-outline:hover {
            background: var(--primary-light);
        }
        
        .applications-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .application-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border-left: 4px solid var(--primary);
        }
        
        .application-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .application-card.viewed {
            border-left-color: var(--warning);
        }
        
        .application-card.shortlisted {
            border-left-color: var(--secondary);
        }
        
        .application-card.rejected {
            border-left-color: var(--danger);
            opacity: 0.8;
        }
        
        .application-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .job-title-section h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--gray-900);
            margin: 0 0 8px 0;
        }
        
        .company-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        
        .company-logo-small {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1rem;
            overflow: hidden;
        }
        
        .company-logo-small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .company-name {
            font-weight: 500;
            color: var(--gray-900);
        }
        
        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }
        
        .job-type {
            background: var(--primary-light);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .job-location {
            color: var(--gray-700);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .application-status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-submitted {
            background: #dbeafe;
            color: var(--primary);
        }
        
        .status-viewed {
            background: #fef3c7;
            color: var(--warning);
        }
        
        .status-shortlisted {
            background: #d1fae5;
            color: var(--secondary);
        }
        
        .status-interview {
            background: #e0e7ff;
            color: #6366f1;
        }
        
        .status-rejected {
            background: #fee2e2;
            color: var(--danger);
        }
        
        .status-offered {
            background: #dcfce7;
            color: #16a34a;
        }
        
        .application-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .detail-icon {
            color: var(--primary);
            width: 24px;
            text-align: center;
        }
        
        .detail-label {
            font-size: 0.85rem;
            color: var(--gray-700);
            margin-right: 5px;
        }
        
        .detail-value {
            font-weight: 500;
            color: var(--gray-900);
        }
        
        .application-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .action-btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        
        .action-btn.view {
            background: var(--primary);
            color: white;
        }
        
        .action-btn.withdraw {
            background: #fee2e2;
            color: var(--danger);
        }
        
        .action-btn.save {
            background: var(--primary-light);
            color: var(--primary);
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .application-timeline {
            position: relative;
            padding-left: 30px;
            margin-top: 20px;
        }
        
        .application-timeline::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--gray-300);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 20px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -25px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary);
            border: 3px solid white;
            box-shadow: 0 0 0 2px var(--primary-light);
        }
        
        .timeline-item.current::before {
            background: var(--secondary);
            box-shadow: 0 0 0 2px #d1fae5;
        }
        
        .timeline-date {
            font-size: 0.8rem;
            color: var(--gray-700);
            margin-bottom: 5px;
        }
        
        .timeline-title {
            font-weight: 500;
            color: var(--gray-900);
            margin-bottom: 5px;
        }
        
        .timeline-desc {
            font-size: 0.9rem;
            color: var(--gray-700);
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .empty-icon {
            width: 80px;
            height: 80px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 20px;
        }
        
        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 10px;
        }
        
        .empty-text {
            color: var(--gray-700);
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }
        
        .modal-content {
            background: white;
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            border-radius: 12px;
            max-height: 80vh;
            overflow-y: auto;
            animation: slideIn 0.3s ease;
        }
        
        .modal-header {
            padding: 20px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-header h3 {
            margin: 0;
            color: var(--gray-900);
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--gray-700);
            cursor: pointer;
            padding: 5px;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .modal-footer {
            padding: 20px;
            border-top: 1px solid var(--gray-200);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            gap: 5px;
        }
        
        .page-link {
            padding: 8px 16px;
            border: 1px solid var(--gray-300);
            background: white;
            color: var(--gray-700);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .page-link:hover {
            background: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .page-link.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }
        
        .page-link.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        @media (max-width: 768px) {
            .applications-container {
                padding: 10px;
            }
            
            .header-section {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-row {
                flex-direction: column;
            }
            
            .filter-group {
                min-width: 100%;
            }
            
            .application-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .application-details {
                grid-template-columns: 1fr;
            }
            
            .application-actions {
                flex-direction: column;
            }
            
            .action-btn {
                width: 100%;
                justify-content: center;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
        }
        
        .status-filters {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .status-filter-btn {
            padding: 8px 16px;
            border: 1px solid var(--gray-300);
            background: white;
            color: var(--gray-700);
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.9rem;
        }
        
        .status-filter-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }
        
        .status-filter-btn:hover:not(.active) {
            background: var(--gray-100);
            border-color: var(--gray-400);
        }
        
        .search-box {
            position: relative;
            flex: 2;
            min-width: 300px;
        }
        
        .search-box .filter-input {
            padding-left: 45px;
        }
        
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
        }
        
        .sort-options {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-left: auto;
        }
        
        .sort-label {
            font-size: 0.9rem;
            color: var(--gray-700);
        }
        
        .application-updates {
            background: var(--gray-100);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }
        
        .update-title {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 10px;
            font-size: 0.95rem;
        }
        
        .update-message {
            color: var(--gray-700);
            font-size: 0.9rem;
            margin-bottom: 0;
        }
        
        .application-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid var(--gray-200);
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .application-id {
            font-size: 0.85rem;
            color: var(--gray-700);
        }
        
        .days-ago {
            font-size: 0.85rem;
            color: var(--gray-700);
        }
        
        .interview-badge {
            background: #e0e7ff;
            color: #6366f1;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .salary-badge {
            background: #d1fae5;
            color: var(--secondary);
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .urgent-badge {
            background: #fee2e2;
            color: var(--danger);
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }
        
        .company-rating {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .stars {
            color: #fbbf24;
        }
        
        .rating-text {
            font-size: 0.85rem;
            color: var(--gray-700);
        }
    </style>
</head>
<body>
    <div class="applications-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="page-title">My Applications</h1>
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="filter-input" id="searchInput" placeholder="Search jobs or companies...">
            </div>
            <button class="btn btn-primary" onclick="browseJobs()">
                <i class="fas fa-search"></i> Browse More Jobs
            </button>
        </div>
        
        <!-- Stats Cards -->
        <div class="stats-cards" id="statsCards">
            <!-- Stats will be loaded dynamically -->
        </div>
        
        <!-- Filters Section -->
        <div class="filters-section">
            <div class="status-filters">
                <button class="status-filter-btn active" onclick="filterApplications('all')">All Applications</button>
                <button class="status-filter-btn" onclick="filterApplications('submitted')">Submitted</button>
                <button class="status-filter-btn" onclick="filterApplications('viewed')">Viewed</button>
                <button class="status-filter-btn" onclick="filterApplications('shortlisted')">Shortlisted</button>
                <button class="status-filter-btn" onclick="filterApplications('interview')">Interview</button>
                <button class="status-filter-btn" onclick="filterApplications('offered')">Offered</button>
                <button class="status-filter-btn" onclick="filterApplications('rejected')">Rejected</button>
            </div>
            
            <div class="filter-row">
                <div class="filter-group">
                    <label class="filter-label">Job Type</label>
                    <select class="filter-select" id="typeFilter">
                        <option value="">All Types</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Internship">Internship</option>
                        <option value="Remote">Remote</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Date Applied</label>
                    <select class="filter-select" id="dateFilter">
                        <option value="">Any Time</option>
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                        <option value="3months">Last 3 Months</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Sort By</label>
                    <select class="filter-select" id="sortFilter">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="status">Status</option>
                        <option value="company">Company Name</option>
                    </select>
                </div>
                
                <div class="sort-options">
                    <span class="sort-label">Show:</span>
                    <select class="filter-select" style="width: auto;" id="resultsPerPage">
                        <option value="5">5 per page</option>
                        <option value="10" selected>10 per page</option>
                        <option value="20">20 per page</option>
                        <option value="50">50 per page</option>
                    </select>
                </div>
                
                <button class="btn btn-outline" onclick="resetFilters()">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
        </div>
        
        <!-- Applications List -->
        <div class="applications-list" id="applicationsList">
            <!-- Applications will be loaded dynamically -->
        </div>
        
        <!-- Empty State -->
        <div class="empty-state" id="emptyState" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <h3 class="empty-title">No Applications Yet</h3>
            <p class="empty-text" id="emptyText">You haven't applied to any jobs yet. Start browsing and apply to jobs that match your skills and interests.</p>
            <button class="btn btn-primary" onclick="browseJobs()">
                <i class="fas fa-search"></i> Browse Jobs
            </button>
        </div>
        
        <!-- Pagination -->
        <div class="pagination" id="pagination" style="display: none;">
            <!-- Pagination will be loaded dynamically -->
        </div>
        
        <!-- Application Details Modal -->
        <div class="modal-overlay" id="applicationDetailsModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Application Details</h3>
                    <button class="modal-close" onclick="closeApplicationModal()">&times;</button>
                </div>
                <div class="modal-body" id="applicationDetailsContent">
                    <!-- Application details will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeApplicationModal()">Close</button>
                    <button class="btn btn-primary" onclick="viewJobDetails()">
                        <i class="fas fa-eye"></i> View Job Details
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Withdraw Confirmation Modal -->
        <div class="modal-overlay" id="withdrawModal">
            <div class="modal-content" style="max-width: 500px;">
                <div class="modal-header">
                    <h3>Withdraw Application</h3>
                    <button class="modal-close" onclick="closeWithdrawModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: var(--warning);"></i>
                    </div>
                    <h4 class="text-center mb-3">Are you sure you want to withdraw your application?</h4>
                    <p class="text-center text-muted" id="withdrawJobTitle"></p>
                    <p class="text-center text-muted mb-4">This action cannot be undone. You will need to reapply if you change your mind.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeWithdrawModal()">Cancel</button>
                    <button class="btn btn-danger" onclick="confirmWithdraw()">Withdraw Application</button>
                </div>
            </div>
        </div>
        
        <!-- Interview Details Modal -->
        <div class="modal-overlay" id="interviewModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Interview Details</h3>
                    <button class="modal-close" onclick="closeInterviewModal()">&times;</button>
                </div>
                <div class="modal-body" id="interviewDetailsContent">
                    <!-- Interview details will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeInterviewModal()">Close</button>
                    <button class="btn btn-primary" onclick="addToCalendar()">
                        <i class="fas fa-calendar-plus"></i> Add to Calendar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Application state
        let appState = {
            applications: [],
            filteredApplications: [],
            currentApplication: null,
            currentFilters: {
                status: 'all',
                type: '',
                date: '',
                sort: 'newest',
                search: ''
            },
            currentPage: 1,
            applicationsPerPage: 10
        };

        // Sample data for applications
        const sampleApplications = [
            {
                id: 1,
                jobId: 101,
                jobTitle: "Senior Frontend Developer",
                company: {
                    name: "TechCorp Inc.",
                    logo: null,
                    rating: 4.5
                },
                appliedDate: "2024-01-15",
                status: "shortlisted",
                statusHistory: [
                    { status: "submitted", date: "2024-01-15", note: "Application submitted" },
                    { status: "viewed", date: "2024-01-16", note: "Application viewed by recruiter" },
                    { status: "shortlisted", date: "2024-01-18", note: "Shortlisted for interview" }
                ],
                jobType: "Full-time",
                experience: "Senior Level",
                location: "San Francisco, CA",
                salary: "120,000 - 150,000 USD/year",
                workSetup: "Hybrid",
                lastUpdated: "2 days ago",
                coverLetter: "I'm excited to apply for the Senior Frontend Developer position at TechCorp. With 5+ years of experience in React and modern JavaScript, I believe I can contribute significantly to your team.",
                resume: "John_Smith_Resume_2024.pdf",
                interview: {
                    date: "2024-01-25",
                    time: "10:00 AM",
                    type: "Video Call",
                    interviewer: "Sarah Johnson",
                    link: "https://meet.google.com/xyz-abc-def"
                },
                updates: [
                    "Your application has been shortlisted for the next round.",
                    "Interview scheduled for January 25, 2024."
                ],
                views: 3,
                notes: ""
            },
            {
                id: 2,
                jobId: 102,
                jobTitle: "Product Manager",
                company: {
                    name: "StartUp Labs",
                    logo: null,
                    rating: 4.2
                },
                appliedDate: "2024-01-10",
                status: "interview",
                statusHistory: [
                    { status: "submitted", date: "2024-01-10", note: "Application submitted" },
                    { status: "viewed", date: "2024-01-11", note: "Application reviewed" },
                    { status: "shortlisted", date: "2024-01-12", note: "Shortlisted for technical round" },
                    { status: "interview", date: "2024-01-15", note: "First round interview completed" }
                ],
                jobType: "Full-time",
                experience: "Mid Level",
                location: "Remote",
                salary: "90,000 - 120,000 USD/year",
                workSetup: "Remote",
                lastUpdated: "Today",
                coverLetter: "I'm writing to express my interest in the Product Manager position. My background in agile product development and user-centered design aligns perfectly with your requirements.",
                resume: "John_Smith_Resume_2024.pdf",
                interview: {
                    date: "2024-01-20",
                    time: "2:00 PM",
                    type: "Phone Call",
                    interviewer: "Michael Chen",
                    link: ""
                },
                updates: [
                    "First round interview completed successfully.",
                    "Second round interview scheduled for January 20, 2024."
                ],
                views: 5,
                notes: "Prepare case study for next interview"
            },
            {
                id: 3,
                jobId: 103,
                jobTitle: "UX/UI Designer",
                company: {
                    name: "Creative Digital Agency",
                    logo: null,
                    rating: 4.7
                },
                appliedDate: "2024-01-05",
                status: "viewed",
                statusHistory: [
                    { status: "submitted", date: "2024-01-05", note: "Application submitted" },
                    { status: "viewed", date: "2024-01-07", note: "Portfolio reviewed" }
                ],
                jobType: "Contract",
                experience: "Mid Level",
                location: "New York, NY",
                salary: "80 - 100 USD/hour",
                workSetup: "On-site",
                lastUpdated: "1 week ago",
                coverLetter: "As a passionate UX/UI designer with experience in creating intuitive digital experiences, I'm excited about the opportunity to contribute to your creative team.",
                resume: "John_Smith_Resume_2024.pdf",
                interview: null,
                updates: ["Your portfolio has been reviewed by the design team."],
                views: 2,
                notes: ""
            },
            {
                id: 4,
                jobId: 104,
                jobTitle: "Backend Engineer",
                company: {
                    name: "Cloud Systems Ltd.",
                    logo: null,
                    rating: 4.0
                },
                appliedDate: "2023-12-20",
                status: "rejected",
                statusHistory: [
                    { status: "submitted", date: "2023-12-20", note: "Application submitted" },
                    { status: "viewed", date: "2023-12-22", note: "Application reviewed" },
                    { status: "shortlisted", date: "2023-12-28", note: "Technical assessment passed" },
                    { status: "rejected", date: "2024-01-05", note: "Position filled internally" }
                ],
                jobType: "Full-time",
                experience: "Senior Level",
                location: "Austin, TX",
                salary: "130,000 - 160,000 USD/year",
                workSetup: "Hybrid",
                lastUpdated: "2 weeks ago",
                coverLetter: "With extensive experience in microservices architecture and cloud infrastructure, I'm confident I can help scale your backend systems effectively.",
                resume: "John_Smith_Resume_2024.pdf",
                interview: null,
                updates: ["Unfortunately, the position has been filled internally."],
                views: 4,
                notes: "Keep in touch for future opportunities"
            },
            {
                id: 5,
                jobId: 105,
                jobTitle: "Data Analyst",
                company: {
                    name: "Data Insights Co.",
                    logo: null,
                    rating: 4.3
                },
                appliedDate: "2024-01-18",
                status: "submitted",
                statusHistory: [
                    { status: "submitted", date: "2024-01-18", note: "Application submitted" }
                ],
                jobType: "Part-time",
                experience: "Entry Level",
                location: "Chicago, IL",
                salary: "60,000 - 75,000 USD/year",
                workSetup: "Remote",
                lastUpdated: "Just now",
                coverLetter: "As a recent graduate with strong analytical skills and proficiency in Python and SQL, I'm excited about the opportunity to start my career in data analysis.",
                resume: "John_Smith_Resume_2024.pdf",
                interview: null,
                updates: ["Application submitted successfully."],
                views: 0,
                notes: ""
            },
            {
                id: 6,
                jobId: 106,
                jobTitle: "DevOps Engineer",
                company: {
                    name: "InfraTech Solutions",
                    logo: null,
                    rating: 4.6
                },
                appliedDate: "2024-01-12",
                status: "offered",
                statusHistory: [
                    { status: "submitted", date: "2024-01-12", note: "Application submitted" },
                    { status: "viewed", date: "2024-01-13", note: "Application reviewed" },
                    { status: "shortlisted", date: "2024-01-14", note: "Technical interview scheduled" },
                    { status: "interview", date: "2024-01-16", note: "Technical interview completed" },
                    { status: "interview", date: "2024-01-17", note: "Final round with engineering director" },
                    { status: "offered", date: "2024-01-18", note: "Job offer extended" }
                ],
                jobType: "Full-time",
                experience: "Mid Level",
                location: "Remote",
                salary: "110,000 - 140,000 USD/year",
                workSetup: "Remote",
                lastUpdated: "Today",
                coverLetter: "My experience with CI/CD pipelines and cloud infrastructure management makes me an ideal candidate for your DevOps team.",
                resume: "John_Smith_Resume_2024.pdf",
                interview: {
                    date: "2024-01-22",
                    time: "3:00 PM",
                    type: "Final Discussion",
                    interviewer: "Robert Wilson",
                    link: "https://zoom.us/j/123456789"
                },
                updates: ["Congratulations! Job offer extended. Please review and respond by January 25, 2024."],
                views: 8,
                notes: "Review offer package details"
            }
        ];

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            loadApplications();
            setupEventListeners();
        });

        // Load applications data
        function loadApplications() {
            // Load from localStorage or use sample data
            const savedApplications = localStorage.getItem('userApplications');
            if (savedApplications) {
                appState.applications = JSON.parse(savedApplications);
            } else {
                appState.applications = sampleApplications;
                // Save sample data for demo
                localStorage.setItem('userApplications', JSON.stringify(sampleApplications));
            }
            
            updateStats();
            filterAndDisplayApplications();
        }

        // Update statistics
        function updateStats() {
            const stats = {
                submitted: appState.applications.filter(app => app.status === 'submitted').length,
                viewed: appState.applications.filter(app => app.status === 'viewed').length,
                shortlisted: appState.applications.filter(app => app.status === 'shortlisted').length,
                rejected: appState.applications.filter(app => app.status === 'rejected').length,
                interview: appState.applications.filter(app => app.status === 'interview').length,
                offered: appState.applications.filter(app => app.status === 'offered').length
            };
            
            const totalApplications = appState.applications.length;
            const successRate = totalApplications > 0 ? 
                Math.round((stats.shortlisted + stats.interview + stats.offered) / totalApplications * 100) : 0;
            
            const statsCards = document.getElementById('statsCards');
            statsCards.innerHTML = `
                <div class="stat-card">
                    <div class="stat-icon submitted">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div class="stat-info">
                        <h3>${totalApplications}</h3>
                        <p>Total Applications</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon viewed">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="stat-info">
                        <h3>${stats.viewed}</h3>
                        <p>Viewed</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon shortlisted">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-info">
                        <h3>${stats.shortlisted}</h3>
                        <p>Shortlisted</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon rejected">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>${stats.rejected}</h3>
                        <p>Not Selected</p>
                    </div>
                </div>
            `;
        }

        // Setup event listeners
        function setupEventListeners() {
            // Search input
            document.getElementById('searchInput').addEventListener('input', function(e) {
                appState.currentFilters.search = e.target.value.toLowerCase();
                filterAndDisplayApplications();
            });
            
            // Filter dropdowns
            document.getElementById('typeFilter').addEventListener('change', function(e) {
                appState.currentFilters.type = e.target.value;
                filterAndDisplayApplications();
            });
            
            document.getElementById('dateFilter').addEventListener('change', function(e) {
                appState.currentFilters.date = e.target.value;
                filterAndDisplayApplications();
            });
            
            document.getElementById('sortFilter').addEventListener('change', function(e) {
                appState.currentFilters.sort = e.target.value;
                filterAndDisplayApplications();
            });
            
            document.getElementById('resultsPerPage').addEventListener('change', function(e) {
                appState.applicationsPerPage = parseInt(e.target.value);
                appState.currentPage = 1;
                filterAndDisplayApplications();
            });
        }

        // Filter applications by status
        function filterApplications(status) {
            appState.currentFilters.status = status;
            
            // Update active filter button
            document.querySelectorAll('.status-filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            filterAndDisplayApplications();
        }

        // Apply all filters and display applications
        function filterAndDisplayApplications() {
            let filtered = [...appState.applications];
            
            // Apply status filter
            if (appState.currentFilters.status !== 'all') {
                filtered = filtered.filter(app => app.status === appState.currentFilters.status);
            }
            
            // Apply type filter
            if (appState.currentFilters.type) {
                filtered = filtered.filter(app => app.jobType === appState.currentFilters.type);
            }
            
            // Apply date filter
            if (appState.currentFilters.date) {
                const now = new Date();
                filtered = filtered.filter(app => {
                    const appDate = new Date(app.appliedDate);
                    switch(appState.currentFilters.date) {
                        case 'today':
                            return appDate.toDateString() === now.toDateString();
                        case 'week':
                            const weekAgo = new Date(now);
                            weekAgo.setDate(now.getDate() - 7);
                            return appDate >= weekAgo;
                        case 'month':
                            const monthAgo = new Date(now);
                            monthAgo.setMonth(now.getMonth() - 1);
                            return appDate >= monthAgo;
                        case '3months':
                            const threeMonthsAgo = new Date(now);
                            threeMonthsAgo.setMonth(now.getMonth() - 3);
                            return appDate >= threeMonthsAgo;
                        default:
                            return true;
                    }
                });
            }
            
            // Apply search filter
            if (appState.currentFilters.search) {
                const searchTerm = appState.currentFilters.search.toLowerCase();
                filtered = filtered.filter(app => 
                    app.jobTitle.toLowerCase().includes(searchTerm) ||
                    app.company.name.toLowerCase().includes(searchTerm) ||
                    app.location.toLowerCase().includes(searchTerm)
                );
            }
            
            // Apply sorting
            switch(appState.currentFilters.sort) {
                case 'newest':
                    filtered.sort((a, b) => new Date(b.appliedDate) - new Date(a.appliedDate));
                    break;
                case 'oldest':
                    filtered.sort((a, b) => new Date(a.appliedDate) - new Date(b.appliedDate));
                    break;
                case 'status':
                    const statusOrder = {offered: 1, interview: 2, shortlisted: 3, viewed: 4, submitted: 5, rejected: 6};
                    filtered.sort((a, b) => statusOrder[a.status] - statusOrder[b.status]);
                    break;
                case 'company':
                    filtered.sort((a, b) => a.company.name.localeCompare(b.company.name));
                    break;
            }
            
            appState.filteredApplications = filtered;
            appState.currentPage = 1;
            displayApplications();
        }

        // Display applications with pagination
        function displayApplications() {
            const applicationsList = document.getElementById('applicationsList');
            const emptyState = document.getElementById('emptyState');
            const pagination = document.getElementById('pagination');
            
            if (appState.filteredApplications.length === 0) {
                applicationsList.style.display = 'none';
                emptyState.style.display = 'block';
                pagination.style.display = 'none';
                
                const emptyText = document.getElementById('emptyText');
                if (appState.applications.length === 0) {
                    emptyText.textContent = "You haven't applied to any jobs yet. Start browsing and apply to jobs that match your skills and interests.";
                } else {
                    emptyText.textContent = "No applications match your current filters. Try adjusting your search criteria.";
                }
                return;
            }
            
            applicationsList.style.display = 'block';
            emptyState.style.display = 'none';
            
            // Calculate pagination
            const totalPages = Math.ceil(appState.filteredApplications.length / appState.applicationsPerPage);
            const startIndex = (appState.currentPage - 1) * appState.applicationsPerPage;
            const endIndex = startIndex + appState.applicationsPerPage;
            const currentApps = appState.filteredApplications.slice(startIndex, endIndex);
            
            // Display applications
            applicationsList.innerHTML = '';
            currentApps.forEach(application => {
                const appCard = createApplicationCard(application);
                applicationsList.appendChild(appCard);
            });
            
            // Display pagination
            if (totalPages > 1) {
                displayPagination(totalPages);
                pagination.style.display = 'flex';
            } else {
                pagination.style.display = 'none';
            }
        }

        // Create application card HTML
        function createApplicationCard(application) {
            const card = document.createElement('div');
            card.className = `application-card ${application.status}`;
            card.setAttribute('data-application-id', application.id);
            
            // Format date
            const appliedDate = new Date(application.appliedDate);
            const formattedDate = appliedDate.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            });
            
            // Calculate days ago
            const today = new Date();
            const diffTime = Math.abs(today - appliedDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            const daysAgo = diffDays === 1 ? 'Yesterday' : `${diffDays} days ago`;
            
            // Create status badge
            let statusBadge = '';
            switch(application.status) {
                case 'submitted':
                    statusBadge = '<span class="application-status status-submitted">Submitted</span>';
                    break;
                case 'viewed':
                    statusBadge = '<span class="application-status status-viewed">Viewed</span>';
                    break;
                case 'shortlisted':
                    statusBadge = '<span class="application-status status-shortlisted">Shortlisted</span>';
                    break;
                case 'interview':
                    statusBadge = '<span class="application-status status-interview">Interview</span>';
                    break;
                case 'offered':
                    statusBadge = '<span class="application-status status-offered">Offer Received</span>';
                    break;
                case 'rejected':
                    statusBadge = '<span class="application-status status-rejected">Not Selected</span>';
                    break;
            }
            
            // Create company rating stars
            const stars = '★'.repeat(Math.floor(application.company.rating)) + '☆'.repeat(5 - Math.floor(application.company.rating));
            
            card.innerHTML = `
                <div class="application-header">
                    <div class="job-title-section">
                        <h3>${application.jobTitle}</h3>
                        <div class="company-info">
                            <div class="company-logo-small">
                                ${application.company.logo ? 
                                    `<img src="${application.company.logo}" alt="${application.company.name}">` : 
                                    `<i class="fas fa-building"></i>`
                                }
                            </div>
                            <div>
                                <div class="company-name">${application.company.name}</div>
                                <div class="company-rating">
                                    <span class="stars">${stars}</span>
                                    <span class="rating-text">${application.company.rating}</span>
                                </div>
                            </div>
                        </div>
                        <div class="job-meta">
                            <span class="job-type">${application.jobType}</span>
                            <span class="job-location">
                                <i class="fas fa-map-marker-alt"></i> ${application.location}
                            </span>
                            ${application.salary ? `<span class="salary-badge">${application.salary}</span>` : ''}
                            ${application.interview ? `<span class="interview-badge"><i class="fas fa-calendar-alt"></i> Interview Scheduled</span>` : ''}
                            ${application.status === 'offered' ? `<span class="urgent-badge"><i class="fas fa-exclamation"></i> Respond Required</span>` : ''}
                        </div>
                    </div>
                    <div>
                        ${statusBadge}
                    </div>
                </div>
                
                <div class="application-details">
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <span class="detail-label">Applied:</span>
                            <span class="detail-value">${formattedDate}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div>
                            <span class="detail-label">Experience:</span>
                            <span class="detail-value">${application.experience}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <span class="detail-label">Work Setup:</span>
                            <span class="detail-value">${application.workSetup}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div>
                            <span class="detail-label">Views:</span>
                            <span class="detail-value">${application.views}</span>
                        </div>
                    </div>
                </div>
                
                ${application.updates && application.updates.length > 0 ? `
                    <div class="application-updates">
                        <div class="update-title">Latest Update</div>
                        <p class="update-message">${application.updates[application.updates.length - 1]}</p>
                    </div>
                ` : ''}
                
                ${application.statusHistory && application.statusHistory.length > 0 ? `
                    <div class="application-timeline">
                        <div class="timeline-item ${application.statusHistory[application.statusHistory.length - 1].status === application.status ? 'current' : ''}">
                            <div class="timeline-date">${new Date(application.statusHistory[application.statusHistory.length - 1].date).toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</div>
                            <div class="timeline-title">${application.statusHistory[application.statusHistory.length - 1].note}</div>
                        </div>
                    </div>
                ` : ''}
                
                <div class="application-footer">
                    <div class="application-id">Application #${application.id.toString().padStart(4, '0')}</div>
                    <div class="days-ago">Applied ${daysAgo}</div>
                </div>
                
                <div class="application-actions">
                    <button class="action-btn view" onclick="viewApplicationDetails(${application.id})">
                        <i class="fas fa-eye"></i> View Details
                    </button>
                    ${application.interview ? `
                        <button class="action-btn view" onclick="viewInterviewDetails(${application.id})">
                            <i class="fas fa-calendar-alt"></i> Interview Details
                        </button>
                    ` : ''}
                    ${['submitted', 'viewed', 'shortlisted'].includes(application.status) ? `
                        <button class="action-btn withdraw" onclick="openWithdrawModal(${application.id}, '${application.jobTitle}')">
                            <i class="fas fa-times"></i> Withdraw
                        </button>
                    ` : ''}
                    <button class="action-btn save" onclick="saveJob(${application.jobId})">
                        <i class="fas fa-bookmark"></i> Save Job
                    </button>
                </div>
            `;
            
            return card;
        }

        // Display pagination
        function displayPagination(totalPages) {
            const pagination = document.getElementById('pagination');
            let html = '';
            
            // Previous button
            html += `<button class="page-link ${appState.currentPage === 1 ? 'disabled' : ''}" 
                     onclick="changePage(${appState.currentPage - 1})">&laquo;</button>`;
            
            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || 
                    (i >= appState.currentPage - 1 && i <= appState.currentPage + 1)) {
                    html += `<button class="page-link ${i === appState.currentPage ? 'active' : ''}" 
                             onclick="changePage(${i})">${i}</button>`;
                } else if (i === appState.currentPage - 2 || i === appState.currentPage + 2) {
                    html += `<button class="page-link disabled">...</button>`;
                }
            }
            
            // Next button
            html += `<button class="page-link ${appState.currentPage === totalPages ? 'disabled' : ''}" 
                     onclick="changePage(${appState.currentPage + 1})">&raquo;</button>`;
            
            pagination.innerHTML = html;
        }

        // Change page
        function changePage(page) {
            if (page < 1 || page > Math.ceil(appState.filteredApplications.length / appState.applicationsPerPage)) return;
            appState.currentPage = page;
            displayApplications();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Reset all filters
        function resetFilters() {
            appState.currentFilters = {
                status: 'all',
                type: '',
                date: '',
                sort: 'newest',
                search: ''
            };
            
            // Reset UI
            document.getElementById('searchInput').value = '';
            document.getElementById('typeFilter').value = '';
            document.getElementById('dateFilter').value = '';
            document.getElementById('sortFilter').value = 'newest';
            document.getElementById('resultsPerPage').value = '10';
            
            document.querySelectorAll('.status-filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelector('.status-filter-btn').classList.add('active');
            
            filterAndDisplayApplications();
        }

        // View application details
        function viewApplicationDetails(applicationId) {
            const application = appState.applications.find(app => app.id == applicationId);
            if (!application) return;
            
            appState.currentApplication = application;
            
            // Format application details for modal
            const appliedDate = new Date(application.appliedDate).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            // Create status timeline HTML
            let timelineHTML = '';
            if (application.statusHistory && application.statusHistory.length > 0) {
                timelineHTML = '<h5 class="mt-4 mb-3">Application Timeline</h5>';
                application.statusHistory.forEach((history, index) => {
                    const isCurrent = index === application.statusHistory.length - 1;
                    timelineHTML += `
                        <div class="timeline-item ${isCurrent ? 'current' : ''}" style="margin-bottom: 15px;">
                            <div class="timeline-date">
                                ${new Date(history.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}
                            </div>
                            <div class="timeline-title">
                                <span class="application-status status-${history.status}" style="font-size: 0.8rem; padding: 4px 10px;">
                                    ${history.status.charAt(0).toUpperCase() + history.status.slice(1)}
                                </span>
                            </div>
                            <div class="timeline-desc">${history.note}</div>
                        </div>
                    `;
                });
            }
            
            // Create updates HTML
            let updatesHTML = '';
            if (application.updates && application.updates.length > 0) {
                updatesHTML = '<h5 class="mt-4 mb-3">Updates</h5>';
                application.updates.forEach(update => {
                    updatesHTML += `
                        <div class="alert alert-info mb-2" role="alert">
                            <i class="fas fa-info-circle me-2"></i>${update}
                        </div>
                    `;
                });
            }
            
            const modalContent = document.getElementById('applicationDetailsContent');
            modalContent.innerHTML = `
                <div class="mb-4">
                    <h4>${application.jobTitle}</h4>
                    <div class="d-flex align-items-center mt-2">
                        <div class="company-logo-small me-3">
                            ${application.company.logo ? 
                                `<img src="${application.company.logo}" alt="${application.company.name}">` : 
                                `<i class="fas fa-building"></i>`
                            }
                        </div>
                        <div>
                            <h5 class="mb-1">${application.company.name}</h5>
                            <div class="text-muted">${application.location}</div>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Applied Date:</strong> ${appliedDate}
                        </div>
                        <div class="mb-3">
                            <strong>Job Type:</strong> ${application.jobType}
                        </div>
                        <div class="mb-3">
                            <strong>Experience Level:</strong> ${application.experience}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Current Status:</strong> 
                            <span class="application-status status-${application.status}">
                                ${application.status.charAt(0).toUpperCase() + application.status.slice(1)}
                            </span>
                        </div>
                        <div class="mb-3">
                            <strong>Work Setup:</strong> ${application.workSetup}
                        </div>
                        <div class="mb-3">
                            <strong>Salary:</strong> ${application.salary || 'Not specified'}
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>Cover Letter</h5>
                    <div class="border rounded p-3" style="white-space: pre-line; background-color: var(--gray-100);">
                        ${application.coverLetter}
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>Submitted Resume</h5>
                    <div class="border rounded p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-file-pdf text-danger me-2"></i>
                            <strong>${application.resume}</strong>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="downloadResume('${application.resume}')">
                            <i class="fas fa-download"></i> Download
                        </button>
                    </div>
                </div>
                
                ${updatesHTML}
                ${timelineHTML}
                
                ${application.notes ? `
                    <div class="mt-4">
                        <h5>Your Notes</h5>
                        <div class="border rounded p-3" style="white-space: pre-line; background-color: #fff9db; border-color: #ffd43b !important;">
                            <i class="fas fa-sticky-note text-warning me-2"></i>${application.notes}
                        </div>
                    </div>
                ` : ''}
            `;
            
            // Show modal
            document.getElementById('applicationDetailsModal').style.display = 'block';
        }

        // Close application modal
        function closeApplicationModal() {
            document.getElementById('applicationDetailsModal').style.display = 'none';
        }

        // View job details
        function viewJobDetails() {
            if (!appState.currentApplication) return;
            alert(`Redirecting to job details for: ${appState.currentApplication.jobTitle}`);
            closeApplicationModal();
        }

        // View interview details
        function viewInterviewDetails(applicationId) {
            const application = appState.applications.find(app => app.id == applicationId);
            if (!application || !application.interview) return;
            
            appState.currentApplication = application;
            
            const interview = application.interview;
            const interviewDate = new Date(interview.date);
            const formattedDate = interviewDate.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            const modalContent = document.getElementById('interviewDetailsContent');
            modalContent.innerHTML = `
                <div class="mb-4">
                    <h4>Interview for ${application.jobTitle}</h4>
                    <p class="text-muted">${application.company.name}</p>
                </div>
                
                <div class="alert alert-info mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    Please join the interview 5 minutes before the scheduled time.
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Date:</strong> ${formattedDate}
                        </div>
                        <div class="mb-3">
                            <strong>Time:</strong> ${interview.time}
                        </div>
                        <div class="mb-3">
                            <strong>Duration:</strong> 45-60 minutes
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Type:</strong> ${interview.type}
                        </div>
                        <div class="mb-3">
                            <strong>Interviewer:</strong> ${interview.interviewer}
                        </div>
                        <div class="mb-3">
                            <strong>Your Status:</strong> 
                            <span class="application-status status-interview">Scheduled</span>
                        </div>
                    </div>
                </div>
                
                ${interview.link ? `
                    <div class="mb-4">
                        <h5>Meeting Link</h5>
                        <div class="input-group">
                            <input type="text" class="form-control" value="${interview.link}" readonly>
                            <button class="btn btn-primary" onclick="copyToClipboard('${interview.link}')">
                                <i class="fas fa-copy"></i> Copy
                            </button>
                        </div>
                        <div class="mt-2">
                            <a href="${interview.link}" target="_blank" class="btn btn-success">
                                <i class="fas fa-video"></i> Join Meeting
                            </a>
                        </div>
                    </div>
                ` : `
                    <div class="mb-4">
                        <h5>Contact Information</h5>
                        <p>The interviewer will contact you at the scheduled time via phone or email.</p>
                    </div>
                `}
                
                <div class="mb-4">
                    <h5>Preparation Tips</h5>
                    <ul>
                        <li>Review the job description and your application materials</li>
                        <li>Prepare questions about the role and company</li>
                        <li>Test your audio/video equipment beforehand</li>
                        <li>Find a quiet, well-lit space for the interview</li>
                        <li>Have a copy of your resume and notes ready</li>
                    </ul>
                </div>
                
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    If you need to reschedule or have any questions, please contact the recruiter as soon as possible.
                </div>
            `;
            
            document.getElementById('interviewModal').style.display = 'block';
        }

        // Close interview modal
        function closeInterviewModal() {
            document.getElementById('interviewModal').style.display = 'none';
        }

        // Add to calendar
        function addToCalendar() {
            if (!appState.currentApplication || !appState.currentApplication.interview) return;
            
            const interview = appState.currentApplication.interview;
            alert(`Adding interview to your calendar:\n\n${appState.currentApplication.jobTitle}\n${interview.date} at ${interview.time}\n${appState.currentApplication.company.name}`);
            
            // In a real app, you would create an .ics file or use calendar API
        }

        // Copy to clipboard
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Meeting link copied to clipboard!');
            });
        }

        // Open withdraw modal
        function openWithdrawModal(applicationId, jobTitle) {
            appState.currentApplication = appState.applications.find(app => app.id == applicationId);
            document.getElementById('withdrawJobTitle').textContent = `"${jobTitle}"`;
            document.getElementById('withdrawModal').style.display = 'block';
        }

        // Close withdraw modal
        function closeWithdrawModal() {
            document.getElementById('withdrawModal').style.display = 'none';
        }

        // Confirm withdraw
        function confirmWithdraw() {
            if (!appState.currentApplication) return;
            
            // Update application status to withdrawn
            appState.currentApplication.status = 'withdrawn';
            appState.currentApplication.statusHistory.push({
                status: 'withdrawn',
                date: new Date().toISOString().split('T')[0],
                note: 'Application withdrawn by candidate'
            });
            appState.currentApplication.updates.push('You have withdrawn your application.');
            
            // Save to localStorage
            localStorage.setItem('userApplications', JSON.stringify(appState.applications));
            
            // Update display
            loadApplications();
            
            // Close modal
            closeWithdrawModal();
            
            // Show success message
            alert('Application withdrawn successfully!');
        }

        // Download resume
        function downloadResume(filename) {
            alert(`Downloading resume: ${filename}`);
            // In real app, this would trigger a file download
        }

        // Save job
        function saveJob(jobId) {
            // Get saved jobs from localStorage
            let savedJobs = JSON.parse(localStorage.getItem('savedJobs') || '[]');
            
            // Check if already saved
            if (!savedJobs.includes(jobId)) {
                savedJobs.push(jobId);
                localStorage.setItem('savedJobs', JSON.stringify(savedJobs));
                alert('Job saved to your favorites!');
            } else {
                alert('Job is already saved!');
            }
        }

        // Browse more jobs
        function browseJobs() {
            // In real app, redirect to job search page
            alert('Redirecting to job search page...');
            // window.location.href = 'job-search.html';
        }
    </script>

@endsection