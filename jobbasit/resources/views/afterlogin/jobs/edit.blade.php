@extends('layouts.header')
@section('title','Edit Job')
@section('content')  <!-- Add this line -->
<div class="container-fluid">
    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    
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
        
        .job-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), #1d4ed8);
            color: white;
            padding: 20px;
        }
        
        .card-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 15px;
            position: relative;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gray-300);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-bottom: 10px;
            z-index: 2;
        }
        
        .step.active .step-number {
            background: var(--primary);
        }
        
        .step.completed .step-number {
            background: var(--secondary);
        }
        
        .step-text {
            font-size: 0.9rem;
            color: var(--gray-700);
            font-weight: 500;
        }
        
        .step.active .step-text {
            color: var(--primary);
            font-weight: 600;
        }
        
        .step-line {
            position: absolute;
            top: 20px;
            left: 50px;
            width: 70px;
            height: 2px;
            background: var(--gray-300);
        }
        
        .form-section {
            display: none;
        }
        
        .form-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .form-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-light);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--gray-700);
        }
        
        .form-label .required {
            color: var(--danger);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--gray-300);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }
        
        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--gray-300);
            border-radius: 8px;
            font-size: 1rem;
            background: white;
            cursor: pointer;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .btn {
            padding: 12px 25px;
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
        
        .btn-secondary {
            background: var(--gray-300);
            color: var(--gray-900);
        }
        
        .btn-secondary:hover {
            background: var(--gray-400);
        }
        
        .btn-success {
            background: var(--secondary);
            color: white;
        }
        
        .btn-success:hover {
            background: #0da271;
        }
        
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--gray-200);
        }
        
        .company-preview {
            background: var(--gray-100);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--gray-200);
        }
        
        .company-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .company-logo {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .company-info h4 {
            margin: 0 0 5px 0;
            color: var(--gray-900);
        }
        
        .company-info p {
            margin: 0;
            color: var(--gray-700);
            font-size: 0.9rem;
        }
        
        .company-details {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .detail-item {
            margin-bottom: 10px;
        }
        
        .detail-label {
            font-size: 0.85rem;
            color: var(--gray-700);
            margin-bottom: 3px;
        }
        
        .detail-value {
            font-weight: 500;
            color: var(--gray-900);
        }
        
        .edit-company-btn {
            text-align: right;
            margin-top: 15px;
        }
        
        .job-preview {
            background: white;
            border-radius: 10px;
            padding: 25px;
            border: 1px solid var(--gray-200);
            margin-bottom: 20px;
        }
        
        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .job-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 5px;
        }
        
        .job-company {
            color: var(--primary);
            font-weight: 500;
            margin-bottom: 10px;
        }
        
        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-700);
        }
        
        .meta-item i {
            color: var(--primary);
        }
        
        .job-section {
            margin-bottom: 20px;
        }
        
        .section-title {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        .job-description {
            line-height: 1.6;
            color: var(--gray-700);
        }
        
        .requirements-list {
            list-style: none;
            padding: 0;
        }
        
        .requirements-list li {
            padding: 5px 0;
            color: var(--gray-700);
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        
        .requirements-list li:before {
            content: "•";
            color: var(--primary);
            font-weight: bold;
        }
        
        .salary-tag {
            background: var(--primary-light);
            color: var(--primary);
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
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
            max-width: 500px;
            margin: 50px auto;
            border-radius: 12px;
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
        
        .no-company-card {
            text-align: center;
            padding: 40px 20px;
        }
        
        .no-company-icon {
            width: 80px;
            height: 80px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 20px;
        }
        
        .no-company-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 10px;
        }
        
        .no-company-text {
            color: var(--gray-700);
            margin-bottom: 25px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .company-exists {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--gray-100);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .company-exists-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
                .company-exists-logo {
        width: 100px;
        height: 100px;
        border-radius: 8px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden; /* IMPORTANT */
        }

        .company-exists-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* shows full image */
        }
        
        .company-exists-name {
            font-weight: 600;
            color: var(--gray-900);
        }
        
        .company-exists-edit {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .company-exists-edit:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .job-container {
                padding: 10px;
            }
            
            .card-body {
                padding: 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .step-line {
                width: 40px;
            }
            
            .company-details {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .form-actions .btn {
                width: 100%;
            }
            
            .job-header {
                flex-direction: column;
                gap: 10px;
            }
            
            .job-meta {
                flex-direction: column;
                gap: 10px;
            }
        }
        
        .tooltip {
            position: relative;
            display: inline-block;
            color: var(--gray-700);
        }
        
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: var(--gray-900);
            color: white;
            text-align: center;
            border-radius: 6px;
            padding: 10px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -100px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 0.9rem;
            font-weight: normal;
        }
        
        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: var(--gray-900) transparent transparent transparent;
        }
        
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>

    <div class="job-container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Your Job</h2>
            </div>
            <div class="card-body">
                <div class="form-section {{ Auth::user()->company ? 'active' : '' }}" id="jobDetailsSection">
                    <div class="form-title">
                        <i class="fas fa-briefcase me-2"></i> {{ $vacancy->job_title }}</H3>
                        </div>
                    
                    @if(Auth::user()->company)
                    <div class="company-exists">
                        <div class="company-exists-info">
                            <div class="company-exists-logo">
                                @if(Auth::user()->company->logo)
                                    <img src="{{ asset('storage/' . Auth::user()->company->logo) }}" alt="{{ Auth::user()->company->name }}">
                                @else
                                    <i class="fas fa-building"></i>
                                @endif
                            </div>
                            <div>
                                <div class="company-exists-name">
                                    {{ Auth::user()->company->name }}
                                </div>
                                <div class="text-muted">
                                    {{ Auth::user()->company->location }}
                                    <p class="company-description mb-0 fs-6">
                                        {{ \Illuminate\Support\Str::limit(Auth::user()->company->description, 200) }}
                                    </p>
                                    <p><small> <i class="fa fa-clock-o"></i> {{ Auth::user()->company->created_at->diffForHumans() }}</small></p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('company.edit', Auth::user()->company->id) }}" class="company-exists-edit">
        <i                  class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                    @endif
                    
                    <form id="jobForm" action="{{ route('jobs.update',$vacancy->id) }}" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label class="form-label">Job Title <span class="required">*</span></label>
                            <input type="text" class="form-control" name="job_title" id="jobTitle" required placeholder="e.g., Senior Software Engineer" value="{{ $vacancy->job_title }}">
                            @error('job_title')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Job Type <span class="required">*</span></label>
                            <div class="form-row">
                                <select class="form-select" name="job_type" id="jobType" required>
                                    <option value="">Select Type</option>
                                    <option value="Full-time" {{ $vacancy->job_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="Part-time" {{ $vacancy->job_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="Contract" {{ $vacancy->job_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                                    <option value="Internship" {{ $vacancy->job_type == 'Internship' ? 'selected' : '' }}>Internship</option>
                                    <option value="Remote" {{ $vacancy->job_type == 'Remote' ? 'selected' : '' }}>Remote</option>
                                </select>
                                @error('job_type')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                
                                <select class="form-select" name="experience" id="jobExperience" required>
                                    <option value="">Experience Level</option>
                                    <option value="Entry Level" {{ $vacancy->experience == 'Entry Level' ? 'selected' : '' }}>Entry Level</option>
                                    <option value="Mid Level" {{ $vacancy->experience == 'Mid Level' ? 'selected' : '' }}>Mid Level</option>
                                    <option value="Senior Level" {{ $vacancy->experience == 'Senior Level' ? 'selected' : '' }}>Senior Level</option>
                                    <option value="Lead" {{ $vacancy->experience == 'Lead' ? 'selected' : '' }}>Lead</option>
                                    <option value="Director" {{ $vacancy->experience == 'Director' ? 'selected' : '' }}>Director</option>
                                </select>
                                @error('experience')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Job Description <span class="required">*</span></label>
                            <textarea class="form-control" id="jobDescription" name="job_description" rows="6" required placeholder="Describe the role, responsibilities, and expectations">{{ $vacancy->job_description }}</textarea>
                            @error('description')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Requirements <span class="required">*</span>
                                <span class="tooltip">
                                    <i class="fas fa-info-circle"></i>
                                    <span class="tooltiptext">Enter each requirement on a new line. Use bullet points or simple sentences.</span>
                                </span>
                            </label>
                            <textarea class="form-control" id="jobRequirements" name="requirements" rows="4" required placeholder="• Minimum 3 years of experience
• Proficiency in JavaScript
• Strong communication skills">{{ $vacancy->requirements }}</textarea>
                            @error('requirements')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" name="salary_range" {{ $vacancy->salary_range }}>Salary Range (per year)</label>
                                <div class="form-row">
                                    <input type="number" class="form-control" name="salary_min" id="salaryMin" placeholder="Min" min="0" value="{{ $vacancy->salary_min }}">
                                    <input type="number" class="form-control" name="salary_max" id="salaryMax" placeholder="Max" min="0" value="{{ $vacancy->salary_max }}">
                                    <select class="form-select" name="salary_currency" id="salaryCurrency">
                                        <option value="USD" {{ $vacancy->salary_currency == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="EUR" {{ $vacancy->salary_currency == 'EUR' ? 'selected' : '' }}>EUR</option>
                                        <option value="GBP" {{ $vacancy->salary_currency == 'GBP' ? 'selected' : '' }}>GBP</option>
                                        <option value="INR" {{ $vacancy->salary_currency == 'INR' ? 'selected' : '' }}>INR</option>
                                        <option value="PKR" {{ $vacancy->salary_currency == 'PKR' ? 'selected' : '' }}>PKR</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Location <span class="required">*</span></label>
                                <input type="text" class="form-control" name="location" id="jobLocation" required value="{{ $vacancy->location }}">
                                @error('location')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Work Setup</label>
                                <select class="form-select" name="work_setup" id="workSetup">
                                    <option value="On-site" {{ $vacancy->work_setup == 'On-site' ? 'selected' : '' }}>On-site</option>
                                    <option value="Remote" {{ $vacancy->work_setup == 'Remote' ? 'selected' : '' }}>Remote</option>
                                    <option value="Hybrid" {{ $vacancy->work_setup == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                </select>
                                @error('work_setup')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Application Deadline</label>
                                <input type="date" class="form-control" name="application_deadline" id="applicationDeadline" value="{{ $vacancy->application_deadline }}">
                                @error('application_deadline')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Number of Vacancies</label>
                                <input type="number" class="form-control" name="vacancies" id="vacancies" min="1" value="{{ $vacancy->vacancies }}">
                                @error('vacancies')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Benefits
                                <span class="tooltip">
                                    <i class="fas fa-info-circle"></i>
                                    <span class="tooltiptext">List the benefits you offer (health insurance, remote work, etc.)</span>
                                </span>
                            </label>
                            <textarea class="form-control" id="jobBenefits" rows="3" name="benefits" placeholder="• Health insurance
• Flexible work hours
• Professional development
• Paid time off">{{ $vacancy->benefits }}</textarea>
                            @error('benefits')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Application Instructions</label>
                            <textarea class="form-control" id="applicationInstructions" rows="3" name="instructions" placeholder="How should candidates apply?">{{ $vacancy->instructions }}</textarea>
                            @error('instructions')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
             <div class="col-md-12 mb-3">
                <div class="input-group">
                    <span class="input-group-text">@if($vacancy->status == 0) <i class="fa fa-check-circle text-success"></i> @else <i class="fa fa-check-circle text-danger"></i> @endif</span>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option value="0" {{ $vacancy->status == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ $vacancy->status == 1 ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                @error('status')
                    <div class="invalid-feedback d-block">
                        <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
                        <div class="form-actions">
                            @if(!Auth::user()->company)
                            <button type="button" class="btn btn-secondary" onclick="previousStep()">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            @endif
                            <button type="button" class="btn btn-primary" onclick="previewJob()">
                                <i class="fas fa-eye"></i> Preview & Continue
                            </button>
                            <button type="submit" class="btn btn-success" id="submitJobBtn" style="display: none;">
                                <i class="fas fa-paper-plane"></i> Post Job Now
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Preview Section (Step 3) -->
                <div class="form-section" id="previewSection">
                    <div class="form-title">
                        <i class="fas fa-eye me-2"></i>Preview & Post
                    </div>
                    
                    <!-- Company Preview -->
                     
                    @if(Auth::user()->company)
    <div class="company-preview company-exists">
        <div class="company-exists-info d-flex gap-3">
            
            <div class="company-exists-logo">
                @if(Auth::user()->company->logo)
                    <img src="{{ asset('storage/' . Auth::user()->company->logo) }}"
                         alt="{{ Auth::user()->company->name }}">
                @else
                    <i class="fas fa-building"></i>
                @endif
            </div>

            <div class="company-info">
                <div class="company-exists-name">
                    {{ Auth::user()->company->name }}
                </div>

                <div class="text-muted">
                    {{ Auth::user()->company->location }}

                    <p class="company-description mb-0 fs-6">
                        {{ \Illuminate\Support\Str::limit(Auth::user()->company->description, 200) }}
                    </p>

                    <p class="mb-0">
                        <small>
                            <i class="fa fa-clock-o"></i>
                            {{ Auth::user()->company->created_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
            </div>

        </div>
    </div>
@else
    <div class="company-preview text-center text-muted">
        <i class="fas fa-building fs-2 mb-2"></i>
        <p>Your company details will appear here</p>
    </div>
@endif
                        @if(Auth::user()->company)
                        <div class="edit-company-btn">
                            <a href="" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit Company
                            </a>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Job Preview -->
                    <div class="job-preview" id="jobPreviewContent">
                        <!-- Job preview will be generated here -->
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="previousStep()">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                        <button type="button" class="btn btn-success" onclick="submitJobForm()">
                            <i class="fas fa-paper-plane"></i> Post Job Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Edit Company Modal (for JS functionality) -->
    <div class="modal-overlay" id="editCompanyModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Company Details</h3>
                <button class="modal-close" onclick="closeEditModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="editCompanyName">
                </div>
                <div class="form-group">
                    <label class="form-label">Company Tagline</label>
                    <input type="text" class="form-control" id="editCompanyTagline">
                </div>
                <div class="form-group">
                    <label class="form-label">Company Description</label>
                    <textarea class="form-control" id="editCompanyDescription" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control" id="editCompanyLocation">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeEditModal()">Cancel</button>
                <button class="btn btn-primary" onclick="saveCompanyEdit()">Save Changes</button>
            </div>
        </div>
    </div>

    <script>
        // Application state
        let appState = {
            company: @json(Auth::user()->company ?: null),
            currentStep: {{ Auth::user()->company ? 2 : 1 }},
            jobData: {},
            hasCompany: {{ Auth::user()->company ? 'true' : 'false' }}
        };

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            // Set default deadline to 30 days from now
            const today = new Date();
            const nextMonth = new Date(today);
            nextMonth.setDate(today.getDate() + 30);
            
            const deadlineInput = document.getElementById('applicationDeadline');
            if (deadlineInput && !deadlineInput.value) {
                deadlineInput.min = today.toISOString().split('T')[0];
                deadlineInput.value = nextMonth.toISOString().split('T')[0];
            }
            
            // If user has company, set company location as default job location
            if (appState.company && appState.company.location) {
                const jobLocation = document.getElementById('jobLocation');
                if (jobLocation && !jobLocation.value) {
                    jobLocation.value = appState.company.location;
                }
            }
        });

        // Show "No Company" screen functions
        function showNoCompany() {
            document.getElementById('companyCheckArea').style.display = 'block';
            document.getElementById('companyForm').style.display = 'none';
        }

        // Create new company
        function createNewCompany() {
            document.getElementById('companyCheckArea').style.display = 'none';
            document.getElementById('companyForm').style.display = 'block';
        }

        // Cancel company creation
        function cancelCompany() {
            showNoCompany();
            document.getElementById('companyFormData').reset();
        }

        // Preview logo upload
        function previewLogo(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const logoPreview = document.getElementById('logoPreview');
                    logoPreview.innerHTML = `<img src="${e.target.result}" style="width: 100%; height: 100%; object-fit: cover;">`;
                };
                reader.readAsDataURL(file);
            }
        }

        // Get logo preview
        function getLogoPreview() {
            const logoImg = document.querySelector('#logoPreview img');
            return logoImg ? logoImg.src : null;
        }

        // Go to job details step
        function goToJobDetails() {
            // Update steps
            document.getElementById('step1').classList.remove('active');
            document.getElementById('step1').classList.add('completed');
            document.getElementById('step2').classList.add('active');
            
            // Show job details section
            document.getElementById('companySection').classList.remove('active');
            document.getElementById('jobDetailsSection').classList.add('active');
            
            appState.currentStep = 2;
        }

        // Go to previous step
        function previousStep() {
            if (appState.currentStep === 2 && !appState.hasCompany) {
                // Go back to company section
                appState.currentStep = 1;
                document.getElementById('step2').classList.remove('active');
                document.getElementById('step1').classList.add('active');
                document.getElementById('step1').classList.remove('completed');
                
                document.getElementById('jobDetailsSection').classList.remove('active');
                document.getElementById('companySection').classList.add('active');
            } else if (appState.currentStep === 3) {
                // Go back to job details
                appState.currentStep = 2;
                document.getElementById('step3').classList.remove('active');
                document.getElementById('step2').classList.add('active');
                
                document.getElementById('previewSection').classList.remove('active');
                document.getElementById('jobDetailsSection').classList.add('active');
            }
        }

        // Edit company
        function editCompany() {
            // This would be handled by Laravel route
            window.location.href = "";
        }

        // Close edit modal
        function closeEditModal() {
            document.getElementById('editCompanyModal').style.display = 'none';
        }

        // Save company edits
        function saveCompanyEdit() {
            // This would be handled by Laravel route
            closeEditModal();
        }

        // Preview job
        function previewJob() {
            // Validate required fields
            const requiredFields = ['jobTitle', 'jobType', 'jobExperience', 'jobDescription', 'jobRequirements', 'jobLocation'];
            let isValid = true;
            
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field && !field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else if (field) {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                alert('Please fill in all required fields marked with *.');
                return;
            }
            
            // Collect job data
            const jobData = {
                title: document.getElementById('jobTitle').value,
                type: document.getElementById('jobType').value,
                experience: document.getElementById('jobExperience').value,
                description: document.getElementById('jobDescription').value,
                requirements: document.getElementById('jobRequirements').value,
                salary_min: document.getElementById('salaryMin').value,
                salary_max: document.getElementById('salaryMax').value,
                salary_currency: document.getElementById('salaryCurrency').value,
                location: document.getElementById('jobLocation').value,
                work_setup: document.getElementById('workSetup').value,
                deadline: document.getElementById('applicationDeadline').value,
                vacancies: document.getElementById('vacancies').value,
                benefits: document.getElementById('jobBenefits').value,
                instructions: document.getElementById('applicationInstructions').value,
                postedDate: new Date().toLocaleDateString()
            };

            appState.jobData = jobData;
            
            // Update preview
            updatePreview();
            
            // Go to preview step
            appState.currentStep = 3;
            document.getElementById('step2').classList.remove('active');
            document.getElementById('step3').classList.add('active');
            
            document.getElementById('jobDetailsSection').classList.remove('active');
            document.getElementById('previewSection').classList.add('active');
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Update job preview
        function updatePreview() {
            const job = appState.jobData;
            const company = appState.company;
            
            let salaryText = '';
            if (job.salary_min && job.salary_max) {
                salaryText = `${job.salary_min} - ${job.salary_max} ${job.salary_currency}/year`;
            } else if (job.salary_min) {
                salaryText = `From ${job.salary_min} ${job.salary_currency}/year`;
            } else if (job.salary_max) {
                salaryText = `Up to ${job.salary_max} ${job.salary_currency}/year`;
            }
            
            // Format requirements as list
            const requirementsList = job.requirements.split('\n')
                .filter(req => req.trim())
                .map(req => {
                    let reqText = req.trim();
                    // Remove bullet if present
                    if (reqText.startsWith('•') || reqText.startsWith('-')) {
                        reqText = reqText.substring(1).trim();
                    }
                    return `<li>${reqText}</li>`;
                }).join('');
            
            // Format benefits if present
            let benefitsHTML = '';
            if (job.benefits && job.benefits.trim()) {
                const benefitsList = job.benefits.split('\n')
                    .filter(benefit => benefit.trim())
                    .map(benefit => {
                        let benefitText = benefit.trim();
                        if (benefitText.startsWith('•') || benefitText.startsWith('-')) {
                            benefitText = benefitText.substring(1).trim();
                        }
                        return `<li>${benefitText}</li>`;
                    }).join('');
                
                benefitsHTML = `
                    <div class="job-section">
                        <div class="section-title">Benefits</div>
                        <ul class="requirements-list">
                            ${benefitsList}
                        </ul>
                    </div>
                `;
            }
            
            // Format deadline if present
            let deadlineHTML = '';
            if (job.deadline) {
                const deadlineDate = new Date(job.deadline);
                deadlineHTML = `
                    <div class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Apply by ${deadlineDate.toLocaleDateString()}</span>
                    </div>
                `;
            }
            
            const jobPreview = document.getElementById('jobPreviewContent');
            jobPreview.innerHTML = `
                <div class="job-header">
                    <div>
                        <div class="job-title">${job.title}</div>
                        <div class="job-company">${company ? company.name : 'Your Company'}</div>
                    </div>
                    ${salaryText ? `<div class="salary-tag">${salaryText}</div>` : ''}
                </div>
                
                <div class="job-meta">
                    <div class="meta-item">
                        <i class="fas fa-briefcase"></i>
                        <span>${job.type}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-chart-line"></i>
                        <span>${job.experience}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>${job.location}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-home"></i>
                        <span>${job.work_setup}</span>
                    </div>
                    ${job.vacancies > 1 ? `
                        <div class="meta-item">
                            <i class="fas fa-users"></i>
                            <span>${job.vacancies} openings</span>
                        </div>
                    ` : ''}
                    ${deadlineHTML}
                </div>
                
                <div class="job-section">
                    <div class="section-title">Job Description</div>
                    <div class="job-description">${job.description.replace(/\n/g, '<br>')}</div>
                </div>
                
                <div class="job-section">
                    <div class="section-title">Requirements</div>
                    <ul class="requirements-list">
                        ${requirementsList}
                    </ul>
                </div>
                
                ${benefitsHTML}
                
                ${job.instructions && job.instructions.trim() ? `
                    <div class="job-section">
                        <div class="section-title">How to Apply</div>
                        <div class="job-description">${job.instructions.replace(/\n/g, '<br>')}</div>
                    </div>
                ` : ''}
                
                ${company && company.description ? `
                    <div class="job-section">
                        <div class="section-title">About ${company.name}</div>
                        <div class="job-description">${company.description}</div>
                    </div>
                ` : ''}
            `;
        }

        // Submit job form
        function submitJobForm() {
            document.getElementById('jobForm').submit();
        }

        // Add form validation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                // Basic validation can be added here
                // The main validation will be done by Laravel
            });
        });

        // Add validation styles to invalid fields
        document.querySelectorAll('.form-control, .form-select').forEach(field => {
            field.addEventListener('blur', function() {
                if (!this.value.trim() && this.hasAttribute('required')) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        });
    </script>

@endsection