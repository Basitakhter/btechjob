@extends('layouts.header')
@section('title', $vacancy->job_title)
@section('content')

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 mb-2 fw-bold text-dark">{{ $vacancy->job_title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">My Jobs</a></li>
                    <li class="breadcrumb-item active">{{ $vacancy->job_title }}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('jobs.edit', $vacancy->id) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i> Edit Job
            </a>
            <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to Jobs
            </a>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="row">
        <!-- Left Column - Job Details (col-lg-4) -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <!-- Job Header -->
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <span class="badge bg-primary fs-6">{{ $vacancy->job_type }}</span>
                            <span class="badge ms-2 {{ $vacancy->status == 0 ? 'bg-success' : ($vacancy->status == 1 ? 'bg-secondary' : 'bg-warning') }}">
                                {{ $vacancy->status == 0 ? 'Active' : ($vacancy->status == 1 ? 'Closed' : 'Draft') }}
                            </span>
                        </div>
                        <div class="text-muted">
                            <small>ID: {{ $vacancy->id }}</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            @if(Auth::user()->company->logo)
                                <img src="{{ asset('storage/' . Auth::user()->company->logo) }}" 
                                     alt="{{ Auth::user()->company->name }}" 
                                     class="rounded" 
                                     style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="rounded bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-building text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1">{{ Auth::user()->company->name }}</h5>
                            <p class="text-muted mb-0">
                                <i class="fas fa-map-marker-alt me-1"></i> {{ $vacancy->location }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Job Details -->
                <div class="card-body">
                    <!-- Quick Stats -->
                    <div class="row mb-4">
                        <div class="col-6 text-center">
                            <div class="border rounded p-3">
                                <h4 class="mb-1 fw-bold">{{ $vacancy->views ?? 0 }}</h4>
                                <small class="text-muted">Views</small>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="border rounded p-3">
                                <h4 class="mb-1 fw-bold">{{ $vacancy->applications_count ?? 0 }}</h4>
                                <small class="text-muted">Applications</small>
                            </div>
                        </div>
                    </div>

                    <!-- Job Information -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-primary mb-3">Job Information</h6>
                        <div class="row g-3">
                            <div class="col-6">
                                <div>
                                    <small class="text-muted">Experience Level</small>
                                    <p class="mb-0 fw-medium">{{ $vacancy->experience }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <small class="text-muted">Work Setup</small>
                                    <p class="mb-0 fw-medium">{{ $vacancy->work_setup }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <small class="text-muted">Vacancies</small>
                                    <p class="mb-0 fw-medium">{{ $vacancy->vacancies }} position(s)</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <small class="text-muted">Deadline</small>
                                    <p class="mb-0 fw-medium">
                                        {{ $vacancy->application_deadline ? \Carbon\Carbon::parse($vacancy->application_deadline)->format('M d, Y') : 'No deadline' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Salary Information -->
                    @if($vacancy->salary_range)
                    <div class="mb-4">
                        <h6 class="fw-bold text-primary mb-3">Salary Information</h6>
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-wave text-success me-3 fs-5"></i>
                                <div>
                                    <h5 class="mb-1">{{ $vacancy->salary_range }}</h5>
                                    <small class="text-muted">Annual salary range</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Posted Information -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-primary mb-3">Posted Information</h6>
                        <div class="row g-3">
                            <div class="col-6">
                                <div>
                                    <small class="text-muted">Posted Date</small>
                                    <p class="mb-0 fw-medium">
                                        {{ \Carbon\Carbon::parse($vacancy->created_at)->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <small class="text-muted">Last Updated</small>
                                    <p class="mb-0 fw-medium">
                                        {{ \Carbon\Carbon::parse($vacancy->updated_at)->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <small class="text-muted">Posted By</small>
                                    <p class="mb-0 fw-medium">{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Actions -->
                    <div class="mt-4 pt-3 border-top">
                        <h6 class="fw-bold text-primary mb-3">Quick Actions</h6>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" onclick="quickActions({{ $vacancy->id }}, '{{ addslashes($vacancy->job_title) }}')">
                                <i class="fas fa-cog me-2"></i> Status Actions
                            </button>
                            <button class="btn btn-outline-danger" onclick="deleteJob({{ $vacancy->id }}, '{{ addslashes($vacancy->job_title) }}')">
                                <i class="fas fa-trash me-2"></i> Delete Job
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Blank/Reserved for future content (col-lg-8) -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column align-items-center justify-content-center text-center py-5">
                    <!-- Placeholder for future content -->
                    <div class="mb-4">
                        <i class="fas fa-puzzle-piece fa-4x text-muted opacity-25"></i>
                    </div>
                    <h4 class="text-muted mb-3">Content Area</h4>
                    <p class="text-muted mb-4">
                        This area is reserved for additional job details,<br>
                        applications, analytics, or other related content.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <i class="fas fa-users text-primary mb-2"></i>
                                <h6>Applications</h6>
                                <p class="small text-muted mb-0">View applicants</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <i class="fas fa-chart-bar text-primary mb-2"></i>
                                <h6>Analytics</h6>
                                <p class="small text-muted mb-0">Performance metrics</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <i class="fas fa-share-alt text-primary mb-2"></i>
                                <h6>Share</h6>
                                <p class="small text-muted mb-0">Share this job</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Description & Requirements (Full Width Below) -->
    <div class="row mt-4">
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-align-left text-primary me-2"></i> Job Description
                    </h5>
                </div>
                <div class="card-body">
                    <div class="job-description-content">
                        {!! nl2br(e($vacancy->job_description)) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-tasks text-primary me-2"></i> Requirements
                    </h5>
                </div>
                <div class="card-body">
                    <div class="requirements-content">
                        {!! nl2br(e($vacancy->requirements)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits & Instructions (if available) -->
    @if($vacancy->benefits || $vacancy->instructions)
    <div class="row mt-4">
        @if($vacancy->benefits)
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-gift text-primary me-2"></i> Benefits & Perks
                    </h5>
                </div>
                <div class="card-body">
                    <div class="benefits-content">
                        {!! nl2br(e($vacancy->benefits)) !!}
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($vacancy->instructions)
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-info-circle text-primary me-2"></i> Application Instructions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="instructions-content">
                        {!! nl2br(e($vacancy->instructions)) !!}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif
</div>

<!-- Include Modals from jobs.blade.php (same as before) -->
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
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-4">Choose an action for this job posting:</p>
                <div class="d-flex flex-column gap-3">
                    <button type="button" class="btn btn-outline-success text-start py-3" onclick="changeStatus(0)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-play me-3 fs-5"></i>
                            <div class="text-start">
                                <strong class="d-block">Activate Job</strong>
                                <small class="text-muted">Make this job visible to candidates</small>
                            </div>
                        </div>
                    </button>
                    <button type="button" class="btn btn-outline-warning text-start py-3" onclick="changeStatus(2)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-pause me-3 fs-5"></i>
                            <div class="text-start">
                                <strong class="d-block">Save as Draft</strong>
                                <small class="text-muted">Hide job temporarily</small>
                            </div>
                        </div>
                    </button>
                    <button type="button" class="btn btn-outline-secondary text-start py-3" onclick="changeStatus(1)">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-stop me-3 fs-5"></i>
                            <div class="text-start">
                                <strong class="d-block">Close Job</strong>
                                <small class="text-muted">Stop accepting applications</small>
                            </div>
                        </div>
                    </button>
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

<script>
let currentJobId = null;
let currentJobTitle = null;

function quickActions(jobId, jobTitle) {
    currentJobId = jobId;
    currentJobTitle = jobTitle;
    document.getElementById('quickActionsTitle').textContent = jobTitle;
    const modal = new bootstrap.Modal(document.getElementById('quickActionsModal'));
    modal.show();
}

function deleteJob(jobId, jobTitle) {
    document.getElementById('deleteJobTitle').textContent = `You are about to delete "${jobTitle}"`;
    const form = document.getElementById('deleteForm');
    form.action = `/jobs/${jobId}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

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

// Add some interactivity to the right column placeholders
document.addEventListener('DOMContentLoaded', function() {
    const placeholders = document.querySelectorAll('.col-lg-8 .border.rounded');
    placeholders.forEach(placeholder => {
        placeholder.addEventListener('click', function() {
            const title = this.querySelector('h6').textContent;
            alert(`${title} feature will be available soon!`);
        });
        
        placeholder.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
            this.style.cursor = 'pointer';
        });
        
        placeholder.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });
});
</script>

<style>
.job-description-content,
.requirements-content,
.benefits-content,
.instructions-content {
    line-height: 1.8;
    font-size: 15px;
    color: #333;
}

.job-description-content p,
.requirements-content p,
.benefits-content p,
.instructions-content p {
    margin-bottom: 1rem;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.08) !important;
}

.col-lg-8 .card {
    min-height: 400px;
}
</style>

@endsection