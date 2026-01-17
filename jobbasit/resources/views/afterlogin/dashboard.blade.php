@extends('layouts.header')
@section('title','Dashboard')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<div class="dashboard-container">
    <div class="header">
        <h1>Dashboard Overview</h1>
        <div class="header-controls">
            <div class="user-type-toggle">
                <div class="toggle-btn active" id="regular-user-btn">Regular User</div>
                <div class="toggle-btn" id="company-user-btn">Company User</div>
            </div>
            <div class="date-info">
                <i class="far fa-clock"></i>
                <span>{{ date('g:i A') }}</span>
                <span>•</span>
                <span>{{ date('d/m/Y') }}</span>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="stats-container" id="stats-container">
        <!-- Regular user stats will be loaded here -->
    </div>
    
    <!-- Recent Activity -->
    <div class="activity-container">
        <div class="activity-card">
            <h3>Recent Applications</h3>
            <ul class="activity-list" id="recent-applications">
                <!-- Recent applications will be loaded here -->
            </ul>
        </div>
        
        <div class="activity-card">
            <h3>Recent Job Posts</h3>
            <ul class="activity-list" id="recent-jobs">
                <!-- Recent job posts will be loaded here -->
            </ul>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

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
        background-color: #f5f7fb;
        color: var(--gray-900);
    }

    .dashboard-container {
        padding: 2rem;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .header h1 {
        font-size: 1.8rem;
        color: var(--gray-900);
    }

    .header-controls {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-type-toggle {
        background: white;
        border-radius: 8px;
        padding: 0.5rem;
        display: flex;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .toggle-btn {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.2s;
    }

    .toggle-btn.active {
        background-color: var(--primary);
        color: white;
    }

    .date-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-700);
        font-size: 0.9rem;
    }

    /* Stats Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        display: flex;
        align-items: center;
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.2rem;
    }

    .icon-submitted { background-color: #e0f2fe; color: #0369a1; }
    .icon-applied { background-color: #f0f9ff; color: var(--primary); }
    .icon-saved { background-color: #fef3c7; color: var(--warning); }
    .icon-views { background-color: #dcfce7; color: var(--secondary); }
    .icon-created { background-color: #f3e8ff; color: #7c3aed; }
    .icon-company-views { background-color: #fce7f3; color: #be185d; }

    .stat-info h3 {
        font-size: 1.8rem;
        margin-bottom: 0.2rem;
    }

    .stat-info p {
        color: var(--gray-700);
        font-size: 0.9rem;
    }

    /* Recent Activity */
    .activity-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .activity-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .activity-card h3 {
        margin-bottom: 1.2rem;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid var(--gray-200);
        color: var(--gray-900);
    }

    .activity-list {
        list-style: none;
    }

    .activity-item {
        padding: 0.8rem 0;
        border-bottom: 1px solid var(--gray-100);
        display: flex;
        align-items: center;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: var(--primary-light);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 0.8rem;
        font-size: 0.9rem;
    }

    .activity-details h4 {
        font-size: 0.95rem;
        margin-bottom: 0.2rem;
    }

    .activity-details p {
        color: var(--gray-700);
        font-size: 0.85rem;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: var(--gray-700);
    }

    .empty-state i {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: var(--gray-300);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stats-container {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
        
        .activity-container {
            grid-template-columns: 1fr;
        }
        
        .header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
    }

    @media (max-width: 480px) {
        .dashboard-container {
            padding: 1rem;
        }
        
        .stats-container {
            grid-template-columns: 1fr;
        }
    }
</style>


<script>
    // Sample data for regular user
    const regularUserStats = [
        { id: 1, title: "Jobs Submitted", value: "24", icon: "fas fa-paper-plane", colorClass: "icon-submitted", description: "Jobs you've posted" },
        { id: 2, title: "Jobs Applied", value: "18", icon: "fas fa-file-signature", colorClass: "icon-applied", description: "Applications sent" },
        { id: 3, title: "Saved Jobs", value: "12", icon: "fas fa-bookmark", colorClass: "icon-saved", description: "Jobs saved for later" },
        { id: 4, title: "Profile Views", value: "156", icon: "fas fa-eye", colorClass: "icon-views", description: "People viewed your profile" }
    ];

    // Sample data for company user
    const companyUserStats = [
        { id: 1, title: "Jobs Created", value: "42", icon: "fas fa-briefcase", colorClass: "icon-created", description: "Jobs posted by your company" },
        { id: 2, title: "Applications Received", value: "189", icon: "fas fa-inbox", colorClass: "icon-applied", description: "Applications for your jobs" },
        { id: 3, title: "Company Views", value: "523", icon: "fas fa-building", colorClass: "icon-company-views", description: "Views on your company page" },
        { id: 4, title: "Job Views", value: "2,847", icon: "fas fa-eye", colorClass: "icon-views", description: "Total views on your jobs" }
    ];

    // Recent applications data
    const recentApplications = [
        { id: 1, title: "Frontend Developer", company: "TechCorp Inc.", date: "2 days ago", status: "Under Review" },
        { id: 2, title: "UX Designer", company: "Creative Solutions", date: "3 days ago", status: "Applied" },
        { id: 3, title: "Full Stack Engineer", company: "Digital Innovations", date: "1 week ago", status: "Viewed" },
        { id: 4, title: "Product Manager", company: "StartUp Labs", date: "1 week ago", status: "Under Review" }
    ];

    // Recent job posts data (for company users)
    const recentJobPosts = [
        { id: 1, title: "Senior Backend Developer", applicants: 24, date: "1 day ago", status: "Active" },
        { id: 2, title: "DevOps Engineer", applicants: 18, date: "3 days ago", status: "Active" },
        { id: 3, title: "Mobile App Developer", applicants: 32, date: "1 week ago", status: "Active" },
        { id: 4, title: "Data Analyst", applicants: 15, date: "2 weeks ago", status: "Closed" }
    ];

    // DOM Elements
    const regularUserBtn = document.getElementById('regular-user-btn');
    const companyUserBtn = document.getElementById('company-user-btn');
    const statsContainer = document.getElementById('stats-container');
    const recentApplicationsList = document.getElementById('recent-applications');
    const recentJobsList = document.getElementById('recent-jobs');

    // Initialize dashboard as regular user
    let isCompanyUser = false;

    // Function to render stats cards
    function renderStatsCards(isCompany) {
        const statsData = isCompany ? companyUserStats : regularUserStats;
        
        statsContainer.innerHTML = '';
        
        statsData.forEach(stat => {
            const statCard = document.createElement('div');
            statCard.className = 'stat-card';
            statCard.innerHTML = `
                <div class="stat-icon ${stat.colorClass}">
                    <i class="${stat.icon}"></i>
                </div>
                <div class="stat-info">
                    <h3>${stat.value}</h3>
                    <p>${stat.title}</p>
                    <p style="font-size: 0.8rem; color: #9ca3af;">${stat.description}</p>
                </div>
            `;
            statsContainer.appendChild(statCard);
        });
    }

    // Function to render recent applications
    function renderRecentApplications() {
        recentApplicationsList.innerHTML = '';
        
        if (recentApplications.length === 0) {
            recentApplicationsList.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-file-alt"></i>
                    <p>No recent applications</p>
                </div>
            `;
            return;
        }
        
        recentApplications.forEach(application => {
            const applicationItem = document.createElement('li');
            applicationItem.className = 'activity-item';
            applicationItem.innerHTML = `
                <div class="activity-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="activity-details">
                    <h4>${application.title}</h4>
                    <p>${application.company} • Applied ${application.date} • <span style="color: ${getStatusColor(application.status)}">${application.status}</span></p>
                </div>
            `;
            recentApplicationsList.appendChild(applicationItem);
        });
    }

    // Function to render recent job posts
    function renderRecentJobPosts(isCompany) {
        recentJobsList.innerHTML = '';
        
        if (isCompany) {
            if (recentJobPosts.length === 0) {
                recentJobsList.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-briefcase"></i>
                        <p>No job posts yet</p>
                    </div>
                `;
                return;
            }
            
            recentJobPosts.forEach(job => {
                const jobItem = document.createElement('li');
                jobItem.className = 'activity-item';
                jobItem.innerHTML = `
                    <div class="activity-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="activity-details">
                        <h4>${job.title}</h4>
                        <p>${job.applicants} applicants • Posted ${job.date} • <span style="color: ${getStatusColor(job.status)}">${job.status}</span></p>
                    </div>
                `;
                recentJobsList.appendChild(jobItem);
            });
        } else {
            // For regular users, show saved jobs or other relevant info
            recentJobsList.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-info-circle"></i>
                    <p>Create a company account to post jobs</p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem;">Upgrade to company account to access job posting features</p>
                </div>
            `;
        }
    }

    // Helper function to get status color
    function getStatusColor(status) {
        switch(status) {
            case 'Active':
            case 'Under Review':
                return '#10b981';
            case 'Applied':
            case 'Viewed':
                return '#3b82f6';
            case 'Closed':
                return '#6b7280';
            default:
                return '#6b7280';
        }
    }

    // Event listeners for user type toggle
    regularUserBtn.addEventListener('click', () => {
        isCompanyUser = false;
        regularUserBtn.classList.add('active');
        companyUserBtn.classList.remove('active');
        renderStatsCards(false);
        renderRecentJobPosts(false);
    });

    companyUserBtn.addEventListener('click', () => {
        isCompanyUser = true;
        companyUserBtn.classList.add('active');
        regularUserBtn.classList.remove('active');
        renderStatsCards(true);
        renderRecentJobPosts(true);
    });

    // Initialize dashboard
    function initDashboard() {
        renderStatsCards(false);
        renderRecentApplications();
        renderRecentJobPosts(false);
    }

    // Start the dashboard
    document.addEventListener('DOMContentLoaded', initDashboard);
</script>
@endsection