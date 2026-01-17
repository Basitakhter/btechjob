@extends('layouts.header')
@section('title','Your All Jobs')
@section('content')

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h1 class="h2 mb-0 fw-bold text-dark">
            <i class="fas fa-list-alt me-2"></i>My Jobs
        </h1>
        <div class="d-flex gap-3 align-items-center flex-wrap">
            <div class="position-relative search-box" style="min-width: 300px;">
                <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                <input type="text" class="form-control ps-5" id="searchInput" placeholder="Search jobs by title, company...">
            </div>
            <a href="{{ route('jobs.create') }}" class="btn btn-primary d-flex align-items-center">
    <i class="fas fa-plus me-2"></i> Post New Job
</a>
        </div>
    </div>
    
    <!-- Company Info Bar -->
    <div class="card mb-4 company-info-bar border-0 shadow-sm" style="background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);">
        <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white p-3 rounded shadow-sm">
                        <i class="fas fa-building text-primary fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-1 fw-bold">Tech Solutions Inc.</h5>
                        <p class="text-muted mb-0">
                            <i class="fas fa-industry me-1"></i> Technology • 
                            <i class="fas fa-users me-1 ms-2"></i> 250 employees • 
                            <i class="fas fa-map-marker-alt me-1 ms-2"></i> San Francisco, CA
                        </p>
                    </div>
                </div>
                <button class="btn btn-outline-primary btn-sm d-flex align-items-center mt-2 mt-md-0">
                    <i class="fas fa-edit me-1"></i> Edit Company
                </button>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 stats-card border-start border-success border-3 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success bg-opacity-10 text-success me-3" style="width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-play-circle fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-0 fw-bold">{{ Auth::user()->vacancy()->where('status', '0')->count() }}</h2>
                        <p class="text-muted mb-0">Active Jobs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 stats-card border-start border-warning border-3 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3" style="width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-pause-circle fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-0 fw-bold">{{ Auth::user()->vacancy()->where('status', '2')->count() }}</h2>
                        <p class="text-muted mb-0">Draft Jobs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 stats-card border-start border-secondary border-3 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-secondary bg-opacity-10 text-secondary me-3" style="width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-stop-circle fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-0 fw-bold">{{ Auth::user()->vacancy()->where('status', '1')->count() }}</h2>
                        <p class="text-muted mb-0">Closed Jobs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 stats-card border-start border-primary border-3 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3" style="width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-eye fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-0 fw-bold">{{ Auth::user()->vacancy->sum('views') }}</h2>
                        <p class="text-muted mb-0">Total Views</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 stats-card border-start border-info border-3 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-info bg-opacity-10 text-info me-3" style="width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-users fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-0 fw-bold">{{ Auth::user()->vacancy->sum('applications_count') }}</h2>
                        <p class="text-muted mb-0">Total Applications</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 stats-card border-start border-purple border-3 shadow-sm" style="border-left-color: #6f42c1 !important;">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-purple bg-opacity-10 me-3" style="width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; background-color: rgba(111, 66, 193, 0.1); color: #6f42c1;">
                        <i class="fas fa-briefcase fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-0 fw-bold">{{ Auth::user()->vacancy->count() }}</h2>
                        <p class="text-muted mb-0">All Jobs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Filters Section -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="d-flex gap-2 mb-3 flex-wrap">
                <button class="btn btn-primary btn-sm filter-btn active" onclick="filterJobs('all')">All Jobs</button>
                <button class="btn btn-outline-primary btn-sm filter-btn" onclick="filterJobs('active')">Active</button>
                <button class="btn btn-outline-primary btn-sm filter-btn" onclick="filterJobs('draft')">Draft</button>
                <button class="btn btn-outline-primary btn-sm filter-btn" onclick="filterJobs('closed')">Closed</button>
            </div>
            
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-medium">Job Type</label>
                    <select class="form-select" id="typeFilter">
                        <option value="">All Types</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Internship">Internship</option>
                        <option value="Remote">Remote</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label fw-medium">Experience Level</label>
                    <select class="form-select" id="experienceFilter">
                        <option value="">All Levels</option>
                        <option value="Entry Level">Entry Level</option>
                        <option value="Mid Level">Mid Level</option>
                        <option value="Senior Level">Senior Level</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label fw-medium">Date Posted</label>
                    <select class="form-select" id="dateFilter">
                        <option value="">Any Time</option>
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label fw-medium">Sort By</label>
                    <select class="form-select" id="sortFilter">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="applications">Most Applications</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-3">
                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center" onclick="resetFilters()">
                    <i class="fas fa-redo me-2"></i> Reset Filters
                </button>
            </div>
        </div>
    </div>
    
    <!-- Jobs List -->
<div class="jobs-list" id="jobsList">
    @forelse($vacancies as $vacancy)
        @php
            // Determine border color based on status
            $borderColor = '#6c757d'; // default gray for closed/unknown
            $statusClass = 'secondary';
            
            if($vacancy->status === 'active') {
                $borderColor = '#198754';
                $statusClass = 'success';
            } elseif($vacancy->status === 'draft') {
                $borderColor = '#ffc107';
                $statusClass = 'warning';
            }
            
            // Determine experience level text
            $experienceLevel = '';
            switch($vacancy->experience_level) {
                case 'entry': $experienceLevel = 'Entry Level'; break;
                case 'mid': $experienceLevel = 'Mid Level'; break;
                case 'senior': $experienceLevel = 'Senior Level'; break;
                default: $experienceLevel = $vacancy->experience_level;
            }
            
            // Calculate time since posted
            $postedDate = \Carbon\Carbon::parse($vacancy->created_at);
            $timeAgo = $postedDate->diffForHumans();
        @endphp
        
        <!-- Job Card -->
        <div class="card mb-3 shadow-sm" style="border-left: 4px solid {{ $borderColor }}; transition: all 0.3s ease;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap">
                    <div class="mb-2">
                        <h5 class="card-title mb-1 fw-bold">{{ $vacancy->job_title }}</h5>
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <span class="text-primary fw-medium">
                                <i class="fas fa-building me-1"></i> {{ Auth::user()->company->name }}
                            </span>
                            <span class="badge bg-primary">{{ $vacancy->employment_type }}</span>
                            <span class="text-muted">
                                <i class="fas fa-chart-line me-1"></i> {{ $experienceLevel }}
                            </span>
                            <span class="badge {{ $vacancy->status == 0 ? 'bg-success text-white' : ($vacancy->status == 1 ? 'bg-danger text-white' : 'bg-secondary text-white') }} fs-9 py-0.5 px-2">
    <i class="fas fa-circle me-0.5" style="font-size: 0.3rem;"></i> 
    {{ $vacancy->status == 0 ? 'Active' : ($vacancy->status == 1 ? 'Close' : ucfirst($vacancy->status)) }}
</span>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="d-flex gap-3">
                            <span class="text-muted">
                                <i class="fas fa-eye me-1"></i> {{ $vacancy->views ?? 0 }} views
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-user-check me-1"></i> {{ $vacancy->applications_count ?? 0 }} applications
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-3 mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                            <div>
                                <small class="text-muted">Location</small>
                                <p class="mb-0 fw-medium">{{ $vacancy->location ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-money-bill-wave text-primary"></i>
                            <div>
                                <small class="text-muted">Salary</small>
                                <p class="mb-0 fw-medium">
                                    @if($vacancy->salary_min && $vacancy->salary_max)
                                        ${{ number_format($vacancy->salary_min) }} - ${{ number_format($vacancy->salary_max) }}/year
                                    @elseif($vacancy->salary)
                                        {{ $vacancy->salary }}
                                    @else
                                        Not specified
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-calendar-alt text-primary"></i>
                            <div>
                                <small class="text-muted">Posted</small>
                                <p class="mb-0 fw-medium">{{ $timeAgo }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-users text-primary"></i>
                            <div>
                                <small class="text-muted">Vacancies</small>
                                <p class="mb-0 fw-medium">{{ $vacancy->vacancy_count ?? 1 }} position(s)</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('jobs.show',$vacancy->id) }}">
                    <button class="btn btn-primary btn-sm" style="min-width: 120px;" onclick="viewJob({{ $vacancy->id }})">
                        <i class="fas fa-eye me-1"></i> View Details
                    </button>
                    </a>
                    <a href="{{ route('jobs.edit', $vacancy->id)}}">
                        <button class="btn btn-outline-primary btn-sm" style="min-width: 120px;" onclick="editJob({{ $vacancy->id }})">
                        <i class="fas fa-edit me-1"></i> Edit
                    </button>
                    </a>
                    <button class="btn btn-outline-secondary btn-sm" style="min-width: 120px;" onclick="quickActions({{ $vacancy->id }}, '{{ addslashes($vacancy->title) }}')">
                        <i class="fas fa-cog me-1"></i> Quick Actions
                    </button>
                    <button class="btn btn-outline-danger btn-sm" style="min-width: 120px;" onclick="deleteJob({{ $vacancy->id }}, '{{ addslashes($vacancy->title) }}')">
                        <i class="fas fa-trash me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    @empty
        <!-- No Jobs Found -->
        <div class="card mb-3 shadow-sm">
            <div class="card-body text-center py-5">
                <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                <h5 class="card-title">No Jobs Found</h5>
                <p class="text-muted">You haven't posted any job vacancies yet.</p>
                <button class="btn btn-primary" onclick="createNewJob()">
                    <i class="fas fa-plus me-1"></i> Create Your First Job Posting
                </button>
            </div>
        </div>
    @endforelse
</div>
        
    </div>
    <!-- Pagination -->
    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                {{ $vacancies->links('pagination::bootstrap-5') }}
            </li>
        </ul>
    </nav>
</div>

<!-- Job Details Modal -->
<div class="modal fade" id="jobDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Job Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="jobDetailsContent">
                <!-- Content will be populated by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="editCurrentJob()">
                    <i class="fas fa-edit me-1"></i> Edit Job
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
                    <form id="deleteForm" method="POST">      
                @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Delete Job</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
                    </div>
                    <h4 class="text-center mb-3">Are you sure?</h4>
                    <p class="text-center text-muted" id="deleteJobTitle"></p>
                    <p class="text-center text-muted mb-0">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Job</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Quick Actions Modal -->
<div class="modal fade" id="quickActionsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="quickActionsTitle">Quick Actions</h5>
<button onclick="quickActions({{ $vacancy->id }}, '{{ $vacancy->title }}')" 
        class="btn btn-sm btn-outline-primary">
    <i class="fas fa-ellipsis-h"></i> Actions
</button>            </div>

            <div class="modal-body">
                <p class="text-muted mb-4">Choose an action for this job posting:</p>

                <div class="d-flex flex-column gap-3">
                    <!-- Activate Job → status = 0 -->
                    <button type="button" class="btn btn-outline-success text-start py-3" onclick="changeStatus(0)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-play me-3 fs-5"></i>
                            <div class="text-start">
                                <strong class="d-block">Activate Job</strong>
                                <small class="text-muted">Make this job visible to candidates</small>
                            </div>
                        </div>
                    </button>

                    <!-- Save as Draft → status = 2 -->
                    <button type="button" class="btn btn-outline-warning text-start py-3" onclick="changeStatus(2)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-pause me-3 fs-5"></i>
                            <div class="text-start">
                                <strong class="d-block">Save as Draft</strong>
                                <small class="text-muted">Hide job temporarily</small>
                            </div>
                        </div>
                    </button>

                    <!-- Close Job → status = 1 -->
                    <button type="button" class="btn btn-outline-secondary text-start py-3" onclick="changeStatus(1)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-stop me-3 fs-5"></i>
                            <div class="text-start">
                                <strong class="d-block">Close Job</strong>
                                <small class="text-muted">Stop accepting applications</small>
                            </div>
                        </div>
                    </button>

                    <!-- Duplicate Job -->
                    <button type="button" class="btn btn-outline-primary text-start py-3" onclick="duplicateJob()">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-copy me-3 fs-5"></i>
                            <div class="text-start">
                                <strong class="d-block">Duplicate Job</strong>
                                <small class="text-muted">Create a copy of this job</small>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Simple JavaScript for modals -->
<script>
    let currentJobId = null;
    let currentJobTitle = '';
    
    function viewJob(jobId) {
        // For demo - just show a simple message
        const modal = new bootstrap.Modal(document.getElementById('jobDetailsModal'));
        document.getElementById('jobDetailsContent').innerHTML = `
            <div class="text-center py-4">
                <i class="fas fa-info-circle fa-4x text-primary mb-3"></i>
                <h4>Job ID: ${jobId}</h4>
                <p class="text-muted">Viewing job details. In a real application, this would load data from the server.</p>
                <div class="alert alert-info">
                    This is where the job description, requirements, and other details would appear.
                </div>
            </div>
        `;
        modal.show();
    }
    
    function editJob(jobId) {
        alert(`Redirecting to edit job ID: ${jobId}`);
        // In real app: window.location.href = `/jobs/${jobId}/edit`;
    }
    
       
    // function quickActions(jobId, jobTitle) {
    //     currentJobId = jobId;
    //     currentJobTitle = jobTitle;
    //     document.getElementById('quickActionsTitle').textContent = jobTitle;
    //     const modal = new bootstrap.Modal(document.getElementById('quickActionsModal'));
    //     modal.show();
    // }
    
    // function confirmDelete() {
    //     alert(`Deleting job: "${currentJobTitle}" (ID: ${currentJobId})`);
    //     // In real app: Send AJAX request to delete job
    //     bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
    // }
    
    // function changeStatus(status) {
    //     alert(`Changing job "${currentJobTitle}" to ${status} status`);
    //     // In real app: Send AJAX request to update status
    //     bootstrap.Modal.getInstance(document.getElementById('quickActionsModal')).hide();
    // }
    
    // function duplicateJob() {
    //     alert(`Duplicating job: "${currentJobTitle}"`);
    //     // In real app: Send AJAX request to duplicate job
    //     bootstrap.Modal.getInstance(document.getElementById('quickActionsModal')).hide();
    // }
    // Add these variables at the top (add this line)
let currentJobId = null;
let currentJobTitle = null;

// Keep this function but update if needed
function quickActions(jobId, jobTitle) {
    currentJobId = jobId;
    currentJobTitle = jobTitle;
    document.getElementById('quickActionsTitle').textContent = jobTitle;
    const modal = new bootstrap.Modal(document.getElementById('quickActionsModal'));
    modal.show();
}

// REMOVE confirmDelete() function completely - delete it

// REPLACE changeStatus() function with this:
function changeStatus(status) {
    const statusMap = {
        0: 'Activate',
        1: 'Close', 
        2: 'Save as Draft'
    };
    
    const actionName = statusMap[status] || 'Update';
    
    if (confirm(`Are you sure you want to ${actionName} this job?`)) {
        fetch(`/vacancies/${currentJobId}/status`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => {
            if (response.ok) {
                alert(`Job ${actionName.toLowerCase()}d successfully!`);
                bootstrap.Modal.getInstance(document.getElementById('quickActionsModal')).hide();
                location.reload();
            } else {
                alert('Failed to update job status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred');
        });
    }
}

// ADD this new function:
function duplicateJob() {
    if (confirm(`Duplicate job: "${currentJobTitle}"?`)) {
        fetch(`/vacancies/${currentJobId}/duplicate`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                alert('Job duplicated successfully!');
                bootstrap.Modal.getInstance(document.getElementById('quickActionsModal')).hide();
                location.reload();
            } else {
                alert('Failed to duplicate job');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred');
        });
    }
}
    function createNewJob() {
        alert('Redirecting to create new job page');
        // In real app: window.location.href = '/jobs/create';
    }
    
    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('typeFilter').value = '';
        document.getElementById('experienceFilter').value = '';
        document.getElementById('dateFilter').value = '';
        document.getElementById('sortFilter').value = 'newest';
        
        // Reset filter buttons
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.classList.add('btn-outline-primary');
        });
        document.querySelector('.filter-btn').classList.add('active');
        document.querySelector('.filter-btn').classList.remove('btn-outline-primary');
        
        alert('Filters have been reset!');
    }
    
    function filterJobs(status) {
        // Update active button
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.classList.add('btn-outline-primary');
        });
        event.target.classList.add('active');
        event.target.classList.remove('btn-outline-primary');
        
        alert(`Filtering jobs by: ${status}`);
        // In real app: This would filter the job cards
    }
    
    // Add hover effects to job cards
    document.addEventListener('DOMContentLoaded', function() {
        const jobCards = document.querySelectorAll('.card');
        jobCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 2px 5px rgba(0,0,0,0.05)';
            });
        });
        
        // Add hover effect to stats cards
        const statsCards = document.querySelectorAll('.stats-card');
        statsCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>


<script>
function deleteJob(jobId, jobTitle) {
    // Update modal text
    document.getElementById('deleteJobTitle').textContent =
        `You are about to delete "${jobTitle}"`;

    // Update form action dynamically
    const form = document.getElementById('deleteForm');
    form.action = `/jobs/${jobId}`; // MUST match your route

    // Show modal
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endsection