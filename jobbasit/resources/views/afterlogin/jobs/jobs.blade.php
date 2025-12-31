@extends('layouts.header')
@section('title','Your All Jobs')
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
        
        .jobs-container {
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
        
        .stat-icon.active { background-color: #d1fae5; color: var(--secondary); }
        .stat-icon.draft { background-color: #fef3c7; color: var(--warning); }
        .stat-icon.closed { background-color: #fee2e2; color: var(--danger); }
        .stat-icon.views { background-color: #dbeafe; color: var(--primary); }
        
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
        
        .btn-success {
            background: var(--secondary);
            color: white;
        }
        
        .btn-success:hover {
            background: #0da271;
        }
        
        .btn-outline {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-outline:hover {
            background: var(--primary-light);
        }
        
        .btn-danger {
            background: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background: #dc2626;
        }
        
        .jobs-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .job-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border-left: 4px solid var(--primary);
        }
        
        .job-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .job-card.draft {
            border-left-color: var(--warning);
            opacity: 0.8;
        }
        
        .job-card.closed {
            border-left-color: var(--gray-300);
            opacity: 0.7;
        }
        
        .job-header {
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
        
        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }
        
        .job-company {
            color: var(--primary);
            font-weight: 500;
        }
        
        .job-type {
            background: var(--primary-light);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .job-experience {
            color: var(--gray-700);
            font-size: 0.9rem;
        }
        
        .job-status {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-active {
            background: #d1fae5;
            color: var(--secondary);
        }
        
        .status-draft {
            background: #fef3c7;
            color: var(--warning);
        }
        
        .status-closed {
            background: #f3f4f6;
            color: var(--gray-700);
        }
        
        .job-details {
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
        
        .job-stats {
            display: flex;
            gap: 20px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid var(--gray-200);
        }
        
        .stat {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-700);
            font-size: 0.9rem;
        }
        
        .stat i {
            color: var(--primary);
        }
        
        .job-actions {
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
        
        .action-btn.edit {
            background: var(--primary-light);
            color: var(--primary);
        }
        
        .action-btn.delete {
            background: #fee2e2;
            color: var(--danger);
        }
        
        .action-btn.duplicate {
            background: #f3f4f6;
            color: var(--gray-700);
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
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
            .jobs-container {
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
            
            .job-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .job-details {
                grid-template-columns: 1fr;
            }
            
            .job-actions {
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
        
        .company-info-bar {
            background: var(--primary-light);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .company-display {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .company-logo-small {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
            overflow: hidden;
        }
        
        .company-logo-small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .company-name {
            font-weight: 600;
            color: var(--gray-900);
        }
        
        .company-meta {
            color: var(--gray-700);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="jobs-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="page-title">My Jobs</h1>
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="filter-input" id="searchInput" placeholder="Search jobs by title or description...">
            </div>
            <button class="btn btn-primary" onclick="createNewJob()">
                <i class="fas fa-plus"></i> Post New Job
            </button>
        </div>
        
        <!-- Company Info Bar -->
        <div class="company-info-bar" id="companyInfoBar">
            <!-- Company info will be loaded here -->
        </div>
        
        <!-- Stats Cards -->
        <div class="stats-cards" id="statsCards">
            <!-- Stats will be loaded dynamically -->
        </div>
        
        <!-- Filters Section -->
        <div class="filters-section">
            <div class="status-filters">
                <button class="status-filter-btn active" onclick="filterJobs('all')">All Jobs</button>
                <button class="status-filter-btn" onclick="filterJobs('active')">Active</button>
                <button class="status-filter-btn" onclick="filterJobs('draft')">Draft</button>
                <button class="status-filter-btn" onclick="filterJobs('closed')">Closed</button>
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
                    <label class="filter-label">Experience Level</label>
                    <select class="filter-select" id="experienceFilter">
                        <option value="">All Levels</option>
                        <option value="Entry Level">Entry Level</option>
                        <option value="Mid Level">Mid Level</option>
                        <option value="Senior Level">Senior Level</option>
                        <option value="Lead">Lead</option>
                        <option value="Director">Director</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Date Posted</label>
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
                        <option value="applications">Most Applications</option>
                        <option value="views">Most Views</option>
                    </select>
                </div>
                
                <button class="btn btn-outline" onclick="resetFilters()">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>
        </div>
        
        <!-- Jobs List -->
        <div class="jobs-list" id="jobsList">
            <!-- Jobs will be loaded dynamically -->
        </div>
        
        <!-- Empty State -->
        <div class="empty-state" id="emptyState" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <h3 class="empty-title">No Jobs Found</h3>
            <p class="empty-text" id="emptyText">You haven't posted any jobs yet. Start by creating your first job posting.</p>
            <button class="btn btn-primary" onclick="createNewJob()">
                <i class="fas fa-plus"></i> Post Your First Job
            </button>
        </div>
        
        <!-- Pagination -->
        <div class="pagination" id="pagination" style="display: none;">
            <!-- Pagination will be loaded dynamically -->
        </div>
        
        <!-- Job Details Modal -->
        <div class="modal-overlay" id="jobDetailsModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Job Details</h3>
                    <button class="modal-close" onclick="closeJobModal()">&times;</button>
                </div>
                <div class="modal-body" id="jobDetailsContent">
                    <!-- Job details will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeJobModal()">Close</button>
                    <button class="btn btn-primary" id="editJobBtn" onclick="editJob()">
                        <i class="fas fa-edit"></i> Edit Job
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Delete Confirmation Modal -->
        <div class="modal-overlay" id="deleteModal">
            <div class="modal-content" style="max-width: 500px;">
                <div class="modal-header">
                    <h3>Delete Job</h3>
                    <button class="modal-close" onclick="closeDeleteModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: var(--danger);"></i>
                    </div>
                    <h4 class="text-center mb-3">Are you sure you want to delete this job?</h4>
                    <p class="text-center text-muted" id="deleteJobTitle"></p>
                    <p class="text-center text-muted mb-4">This action cannot be undone. All applications for this job will also be deleted.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                    <button class="btn btn-danger" onclick="confirmDelete()">Delete Job</button>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions Modal -->
        <div class="modal-overlay" id="quickActionsModal">
            <div class="modal-content" style="max-width: 500px;">
                <div class="modal-header">
                    <h3>Quick Actions</h3>
                    <button class="modal-close" onclick="closeQuickActionsModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <h5 class="mb-3" id="quickActionsTitle"></h5>
                        <p class="text-muted">Choose an action for this job posting:</p>
                    </div>
                    
                    <div class="d-flex flex-column gap-3">
                        <button class="btn btn-outline text-start" onclick="changeJobStatus('active')">
                            <i class="fas fa-play text-success me-2"></i>
                            <div>
                                <strong>Activate Job</strong>
                                <p class="text-muted mb-0">Make this job visible to candidates</p>
                            </div>
                        </button>
                        
                        <button class="btn btn-outline text-start" onclick="changeJobStatus('draft')">
                            <i class="fas fa-pause text-warning me-2"></i>
                            <div>
                                <strong>Save as Draft</strong>
                                <p class="text-muted mb-0">Hide job from candidates temporarily</p>
                            </div>
                        </button>
                        
                        <button class="btn btn-outline text-start" onclick="changeJobStatus('closed')">
                            <i class="fas fa-stop text-danger me-2"></i>
                            <div>
                                <strong>Close Job</strong>
                                <p class="text-muted mb-0">Stop accepting new applications</p>
                            </div>
                        </button>
                        
                        <button class="btn btn-outline text-start" onclick="duplicateJob()">
                            <i class="fas fa-copy text-primary me-2"></i>
                            <div>
                                <strong>Duplicate Job</strong>
                                <p class="text-muted mb-0">Create a copy of this job posting</p>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeQuickActionsModal()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Application state
        let appState = {
            company: null,
            jobs: [],
            filteredJobs: [],
            currentJob: null,
            currentFilters: {
                status: 'all',
                type: '',
                experience: '',
                date: '',
                sort: 'newest',
                search: ''
            },
            currentPage: 1,
            jobsPerPage: 5
        };

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            loadCompanyData();
            loadJobsData();
            setupEventListeners();
        });

        // Load company data
        function loadCompanyData() {
            // Load company from localStorage
            const savedCompany = localStorage.getItem('userCompany');
            if (savedCompany) {
                appState.company = JSON.parse(savedCompany);
                updateCompanyDisplay();
            }
        }

        // Update company display
        function updateCompanyDisplay() {
            const companyInfoBar = document.getElementById('companyInfoBar');
            if (appState.company) {
                companyInfoBar.innerHTML = `
                    <div class="company-display">
                        <div class="company-logo-small" id="companyLogoSmall">
                            ${appState.company.logo ? 
                                `<img src="${appState.company.logo}" alt="${appState.company.name}">` : 
                                `<i class="fas fa-building"></i>`
                            }
                        </div>
                        <div>
                            <div class="company-name">${appState.company.name}</div>
                            <div class="company-meta">
                                ${appState.company.industry} • ${appState.company.size} employees • ${appState.company.location}
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline btn-sm" onclick="editCompany()">
                        <i class="fas fa-edit"></i> Edit Company
                    </button>
                `;
            } else {
                companyInfoBar.innerHTML = `
                    <div class="company-display">
                        <div class="company-logo-small">
                            <i class="fas fa-building"></i>
                        </div>
                        <div>
                            <div class="company-name">No Company Profile</div>
                            <div class="company-meta">Create a company profile to post jobs</div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm" onclick="createCompany()">
                        <i class="fas fa-plus"></i> Create Company
                    </button>
                `;
            }
        }

        // Load jobs data
        function loadJobsData() {
            // Load jobs from localStorage
            const savedJobs = localStorage.getItem('userJobs');
            if (savedJobs) {
                appState.jobs = JSON.parse(savedJobs);
                appState.jobs.sort((a, b) => new Date(b.createdAt) - new Date(a.createdAt));
            }
            
            updateStats();
            filterAndDisplayJobs();
        }

        // Update statistics
        function updateStats() {
            const stats = {
                active: appState.jobs.filter(job => job.status === 'active').length,
                draft: appState.jobs.filter(job => job.status === 'draft').length,
                closed: appState.jobs.filter(job => job.status === 'closed').length,
                totalViews: appState.jobs.reduce((sum, job) => sum + (job.views || 0), 0),
                totalApplications: appState.jobs.reduce((sum, job) => sum + (job.applications || 0), 0)
            };
            
            const statsCards = document.getElementById('statsCards');
            statsCards.innerHTML = `
                <div class="stat-card">
                    <div class="stat-icon active">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>${stats.active}</h3>
                        <p>Active Jobs</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon draft">
                        <i class="fas fa-pause-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>${stats.draft}</h3>
                        <p>Draft Jobs</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon closed">
                        <i class="fas fa-stop-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>${stats.closed}</h3>
                        <p>Closed Jobs</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon views">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="stat-info">
                        <h3>${stats.totalApplications}</h3>
                        <p>Total Applications</p>
                    </div>
                </div>
            `;
        }

        // Setup event listeners
        function setupEventListeners() {
            // Search input
            document.getElementById('searchInput').addEventListener('input', function(e) {
                appState.currentFilters.search = e.target.value.toLowerCase();
                filterAndDisplayJobs();
            });
            
            // Filter dropdowns
            document.getElementById('typeFilter').addEventListener('change', function(e) {
                appState.currentFilters.type = e.target.value;
                filterAndDisplayJobs();
            });
            
            document.getElementById('experienceFilter').addEventListener('change', function(e) {
                appState.currentFilters.experience = e.target.value;
                filterAndDisplayJobs();
            });
            
            document.getElementById('dateFilter').addEventListener('change', function(e) {
                appState.currentFilters.date = e.target.value;
                filterAndDisplayJobs();
            });
            
            document.getElementById('sortFilter').addEventListener('change', function(e) {
                appState.currentFilters.sort = e.target.value;
                filterAndDisplayJobs();
            });
        }

        // Filter jobs by status
        function filterJobs(status) {
            appState.currentFilters.status = status;
            
            // Update active filter button
            document.querySelectorAll('.status-filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            filterAndDisplayJobs();
        }

        // Apply all filters and display jobs
        function filterAndDisplayJobs() {
            let filtered = [...appState.jobs];
            
            // Apply status filter
            if (appState.currentFilters.status !== 'all') {
                filtered = filtered.filter(job => job.status === appState.currentFilters.status);
            }
            
            // Apply type filter
            if (appState.currentFilters.type) {
                filtered = filtered.filter(job => job.type === appState.currentFilters.type);
            }
            
            // Apply experience filter
            if (appState.currentFilters.experience) {
                filtered = filtered.filter(job => job.experience === appState.currentFilters.experience);
            }
            
            // Apply date filter
            if (appState.currentFilters.date) {
                const now = new Date();
                filtered = filtered.filter(job => {
                    const jobDate = new Date(job.createdAt);
                    switch(appState.currentFilters.date) {
                        case 'today':
                            return jobDate.toDateString() === now.toDateString();
                        case 'week':
                            const weekAgo = new Date(now);
                            weekAgo.setDate(now.getDate() - 7);
                            return jobDate >= weekAgo;
                        case 'month':
                            const monthAgo = new Date(now);
                            monthAgo.setMonth(now.getMonth() - 1);
                            return jobDate >= monthAgo;
                        case '3months':
                            const threeMonthsAgo = new Date(now);
                            threeMonthsAgo.setMonth(now.getMonth() - 3);
                            return jobDate >= threeMonthsAgo;
                        default:
                            return true;
                    }
                });
            }
            
            // Apply search filter
            if (appState.currentFilters.search) {
                const searchTerm = appState.currentFilters.search.toLowerCase();
                filtered = filtered.filter(job => 
                    job.title.toLowerCase().includes(searchTerm) ||
                    job.description.toLowerCase().includes(searchTerm) ||
                    job.requirements.toLowerCase().includes(searchTerm)
                );
            }
            
            // Apply sorting
            switch(appState.currentFilters.sort) {
                case 'newest':
                    filtered.sort((a, b) => new Date(b.createdAt) - new Date(a.createdAt));
                    break;
                case 'oldest':
                    filtered.sort((a, b) => new Date(a.createdAt) - new Date(b.createdAt));
                    break;
                case 'applications':
                    filtered.sort((a, b) => (b.applications || 0) - (a.applications || 0));
                    break;
                case 'views':
                    filtered.sort((a, b) => (b.views || 0) - (a.views || 0));
                    break;
            }
            
            appState.filteredJobs = filtered;
            appState.currentPage = 1;
            displayJobs();
        }

        // Display jobs with pagination
        function displayJobs() {
            const jobsList = document.getElementById('jobsList');
            const emptyState = document.getElementById('emptyState');
            const pagination = document.getElementById('pagination');
            
            if (appState.filteredJobs.length === 0) {
                jobsList.style.display = 'none';
                emptyState.style.display = 'block';
                pagination.style.display = 'none';
                
                const emptyText = document.getElementById('emptyText');
                if (appState.jobs.length === 0) {
                    emptyText.textContent = "You haven't posted any jobs yet. Start by creating your first job posting.";
                } else {
                    emptyText.textContent = "No jobs match your current filters. Try adjusting your search criteria.";
                }
                return;
            }
            
            jobsList.style.display = 'block';
            emptyState.style.display = 'none';
            
            // Calculate pagination
            const totalPages = Math.ceil(appState.filteredJobs.length / appState.jobsPerPage);
            const startIndex = (appState.currentPage - 1) * appState.jobsPerPage;
            const endIndex = startIndex + appState.jobsPerPage;
            const currentJobs = appState.filteredJobs.slice(startIndex, endIndex);
            
            // Display jobs
            jobsList.innerHTML = '';
            currentJobs.forEach(job => {
                const jobCard = createJobCard(job);
                jobsList.appendChild(jobCard);
            });
            
            // Display pagination
            if (totalPages > 1) {
                displayPagination(totalPages);
                pagination.style.display = 'flex';
            } else {
                pagination.style.display = 'none';
            }
        }

        // Create job card HTML
        function createJobCard(job) {
            const card = document.createElement('div');
            card.className = `job-card ${job.status}`;
            card.setAttribute('data-job-id', job.id);
            
            // Format date
            const postedDate = new Date(job.createdAt);
            const formattedDate = postedDate.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            });
            
            // Format salary
            let salaryText = '';
            if (job.salary && job.salary.min && job.salary.max) {
                salaryText = `${job.salary.min} - ${job.salary.max} ${job.salary.currency}/year`;
            }
            
            card.innerHTML = `
                <div class="job-header">
                    <div class="job-title-section">
                        <h3>${job.title}</h3>
                        <div class="job-meta">
                            <span class="job-company">${job.company ? job.company.name : 'Your Company'}</span>
                            <span class="job-type">${job.type}</span>
                            <span class="job-experience">${job.experience}</span>
                            <span class="job-status status-${job.status}">${job.status.charAt(0).toUpperCase() + job.status.slice(1)}</span>
                        </div>
                    </div>
                    <div class="job-stats">
                        <div class="stat">
                            <i class="fas fa-eye"></i>
                            <span>${job.views || 0} views</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-user-check"></i>
                            <span>${job.applications || 0} applications</span>
                        </div>
                    </div>
                </div>
                
                <div class="job-details">
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <span class="detail-label">Location:</span>
                            <span class="detail-value">${job.location}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div>
                            <span class="detail-label">Salary:</span>
                            <span class="detail-value">${salaryText || 'Not specified'}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div>
                            <span class="detail-label">Posted:</span>
                            <span class="detail-value">${formattedDate}</span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <span class="detail-label">Vacancies:</span>
                            <span class="detail-value">${job.vacancies || 1}</span>
                        </div>
                    </div>
                </div>
                
                <div class="job-actions">
                    <button class="action-btn view" onclick="viewJobDetails(${job.id})">
                        <i class="fas fa-eye"></i> View Details
                    </button>
                    <button class="action-btn edit" onclick="editExistingJob(${job.id})">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="action-btn duplicate" onclick="openQuickActions(${job.id}, '${job.title}')">
                        <i class="fas fa-cog"></i> Quick Actions
                    </button>
                    <button class="action-btn delete" onclick="openDeleteModal(${job.id}, '${job.title}')">
                        <i class="fas fa-trash"></i> Delete
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
            if (page < 1 || page > Math.ceil(appState.filteredJobs.length / appState.jobsPerPage)) return;
            appState.currentPage = page;
            displayJobs();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Reset all filters
        function resetFilters() {
            appState.currentFilters = {
                status: 'all',
                type: '',
                experience: '',
                date: '',
                sort: 'newest',
                search: ''
            };
            
            // Reset UI
            document.getElementById('searchInput').value = '';
            document.getElementById('typeFilter').value = '';
            document.getElementById('experienceFilter').value = '';
            document.getElementById('dateFilter').value = '';
            document.getElementById('sortFilter').value = 'newest';
            
            document.querySelectorAll('.status-filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelector('.status-filter-btn').classList.add('active');
            
            filterAndDisplayJobs();
        }

        // View job details
        function viewJobDetails(jobId) {
            const job = appState.jobs.find(j => j.id == jobId);
            if (!job) return;
            
            appState.currentJob = job;
            
            // Format job details for modal
            const postedDate = new Date(job.createdAt).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            let salaryText = '';
            if (job.salary && job.salary.min && job.salary.max) {
                salaryText = `${job.salary.min} - ${job.salary.max} ${job.salary.currency} per year`;
            }
            
            // Format requirements as list
            const requirementsList = job.requirements ? 
                job.requirements.split('\n')
                    .filter(req => req.trim())
                    .map(req => `<li>${req.trim()}</li>`)
                    .join('') : '';
            
            // Format benefits as list if available
            let benefitsHTML = '';
            if (job.benefits) {
                benefitsHTML = `
                    <div class="mb-4">
                        <h5>Benefits</h5>
                        <ul class="requirements-list">
                            ${job.benefits.split('\n')
                                .filter(benefit => benefit.trim())
                                .map(benefit => `<li>${benefit.trim()}</li>`)
                                .join('')}
                        </ul>
                    </div>
                `;
            }
            
            const modalContent = document.getElementById('jobDetailsContent');
            modalContent.innerHTML = `
                <div class="mb-4">
                    <h4>${job.title}</h4>
                    <p class="text-muted">${job.company ? job.company.name : 'Your Company'}</p>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Job Type:</strong> ${job.type}
                        </div>
                        <div class="mb-3">
                            <strong>Experience Level:</strong> ${job.experience}
                        </div>
                        <div class="mb-3">
                            <strong>Location:</strong> ${job.location}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Work Setup:</strong> ${job.workSetup || 'Not specified'}
                        </div>
                        <div class="mb-3">
                            <strong>Salary:</strong> ${salaryText || 'Not specified'}
                        </div>
                        <div class="mb-3">
                            <strong>Vacancies:</strong> ${job.vacancies || 1}
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>Job Description</h5>
                    <div style="white-space: pre-line;">${job.description}</div>
                </div>
                
                ${requirementsList ? `
                    <div class="mb-4">
                        <h5>Requirements</h5>
                        <ul class="requirements-list">
                            ${requirementsList}
                        </ul>
                    </div>
                ` : ''}
                
                ${benefitsHTML}
                
                ${job.instructions ? `
                    <div class="mb-4">
                        <h5>Application Instructions</h5>
                        <div style="white-space: pre-line;">${job.instructions}</div>
                    </div>
                ` : ''}
                
                <div class="mt-4 pt-4 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <strong>Status:</strong> 
                                <span class="job-status status-${job.status}">
                                    ${job.status.charAt(0).toUpperCase() + job.status.slice(1)}
                                </span>
                            </div>
                            <div class="mb-2">
                                <strong>Posted:</strong> ${postedDate}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <strong>Views:</strong> ${job.views || 0}
                            </div>
                            <div class="mb-2">
                                <strong>Applications:</strong> ${job.applications || 0}
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Update edit button
            document.getElementById('editJobBtn').setAttribute('onclick', `editExistingJob(${job.id})`);
            
            // Show modal
            document.getElementById('jobDetailsModal').style.display = 'block';
        }

        // Close job modal
        function closeJobModal() {
            document.getElementById('jobDetailsModal').style.display = 'none';
        }

        // Open delete modal
        function openDeleteModal(jobId, jobTitle) {
            appState.currentJob = appState.jobs.find(j => j.id == jobId);
            document.getElementById('deleteJobTitle').textContent = `"${jobTitle}"`;
            document.getElementById('deleteModal').style.display = 'block';
        }

        // Close delete modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Confirm delete
        function confirmDelete() {
            if (!appState.currentJob) return;
            
            // Remove job from array
            appState.jobs = appState.jobs.filter(j => j.id !== appState.currentJob.id);
            
            // Save to localStorage
            localStorage.setItem('userJobs', JSON.stringify(appState.jobs));
            
            // Update display
            loadJobsData();
            
            // Close modal
            closeDeleteModal();
            
            // Show success message
            alert('Job deleted successfully!');
        }

        // Open quick actions modal
        function openQuickActions(jobId, jobTitle) {
            appState.currentJob = appState.jobs.find(j => j.id == jobId);
            document.getElementById('quickActionsTitle').textContent = jobTitle;
            document.getElementById('quickActionsModal').style.display = 'block';
        }

        // Close quick actions modal
        function closeQuickActionsModal() {
            document.getElementById('quickActionsModal').style.display = 'none';
        }

        // Change job status
        function changeJobStatus(status) {
            if (!appState.currentJob) return;
            
            // Update job status
            appState.currentJob.status = status;
            
            // Save to localStorage
            localStorage.setItem('userJobs', JSON.stringify(appState.jobs));
            
            // Update display
            loadJobsData();
            
            // Close modal
            closeQuickActionsModal();
            
            // Show success message
            alert(`Job status changed to ${status}!`);
        }

        // Duplicate job
        function duplicateJob() {
            if (!appState.currentJob) return;
            
            // Create duplicate job
            const duplicate = {
                ...JSON.parse(JSON.stringify(appState.currentJob)),
                id: Date.now(),
                status: 'draft',
                createdAt: new Date().toISOString(),
                applications: 0,
                views: 0
            };
            
            // Remove company reference to prevent circular reference
            delete duplicate.company;
            
            // Add duplicate to jobs array
            appState.jobs.unshift(duplicate);
            
            // Save to localStorage
            localStorage.setItem('userJobs', JSON.stringify(appState.jobs));
            
            // Update display
            loadJobsData();
            
            // Close modal
            closeQuickActionsModal();
            
            // Show success message
            alert('Job duplicated successfully! You can now edit the duplicate.');
        }

        // Create new job
        function createNewJob() {
            if (!appState.company) {
                alert('Please create a company profile first before posting jobs.');
                // In real app, redirect to company creation
                // window.location.href = 'company-create.html';
                return;
            }
            
            // In real app, redirect to job creation page
            // window.location.href = 'job-create.html';
            alert('Redirecting to job creation page...');
            // For demo, we'll simulate redirect
            window.location.href = 'job-posting.html'; // Your job creation page
        }

        // Edit existing job
        function editExistingJob(jobId) {
            // In real app, redirect to job edit page with jobId
            // window.location.href = `job-edit.html?id=${jobId}`;
            alert(`Redirecting to edit job ID: ${jobId}...`);
        }

        // Create company
        function createCompany() {
            // In real app, redirect to company creation
            // window.location.href = 'company-create.html';
            alert('Redirecting to company creation page...');
        }

        // Edit company
        function editCompany() {
            // In real app, redirect to company edit
            // window.location.href = 'company-edit.html';
            alert('Redirecting to company edit page...');
        }
    </script>

@endsection