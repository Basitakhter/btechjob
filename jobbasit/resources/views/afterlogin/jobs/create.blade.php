@extends('layouts.header')
@section('title','Create New Job')
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
            width: 50px;
            height: 50px;
            border-radius: 8px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
            overflow: hidden;
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
</head>
<body>
    <div class="job-container">
        <div class="card">
            <div class="card-header">
                <h2>Post a New Job</h2>
            </div>
            <div class="card-body">
                <!-- Step Indicator -->
                <div class="step-indicator">
                    <div class="step completed" id="step1">
                        <div class="step-number">1</div>
                        <div class="step-text">Company</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step active" id="step2">
                        <div class="step-number">2</div>
                        <div class="step-text">Job Details</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step" id="step3">
                        <div class="step-number">3</div>
                        <div class="step-text">Preview & Post</div>
                    </div>
                </div>
                
                <!-- Company Section (Step 1) -->
                <div class="form-section active" id="companySection">
                    <!-- Company Check -->
                    <div id="companyCheckArea">
                        <!-- This will be filled dynamically -->
                    </div>
                    
                    <!-- Company Form -->
                    <div id="companyForm" style="display: none;">
                        <div class="form-title">
                            <i class="fas fa-building me-2"></i>Create Your Company Profile
                        </div>
                        
                        <form id="companyFormData">
                            <div class="form-group">
                                <label class="form-label">Company Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="companyName" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Company Logo</label>
                                <div style="border: 2px dashed var(--gray-300); border-radius: 8px; padding: 20px; text-align: center;">
                                    <div class="company-logo mx-auto mb-3" id="logoPreview" style="width: 100px; height: 100px;">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <p>Drag and drop your logo or</p>
                                    <input type="file" id="logoUpload" class="d-none" accept="image/*" onchange="previewLogo(event)">
                                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('logoUpload').click()">
                                        <i class="fas fa-upload"></i> Upload Logo
                                    </button>
                                    <p class="text-muted mt-2">Recommended: 400x400px, PNG or JPG (Max 2MB)</p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Company Tagline</label>
                                <input type="text" class="form-control" id="companyTagline" placeholder="Brief description of your company">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Company Description <span class="required">*</span></label>
                                <textarea class="form-control" id="companyDescription" rows="4" required placeholder="Tell us about your company"></textarea>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Industry <span class="required">*</span></label>
                                    <select class="form-select" id="companyIndustry" required>
                                        <option value="">Select Industry</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Education">Education</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="Real Estate">Real Estate</option>
                                        <option value="Hospitality">Hospitality</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Company Size <span class="required">*</span></label>
                                    <select class="form-select" id="companySize" required>
                                        <option value="">Select Size</option>
                                        <option value="1-10">1-10 employees</option>
                                        <option value="11-50">11-50 employees</option>
                                        <option value="51-200">51-200 employees</option>
                                        <option value="201-500">201-500 employees</option>
                                        <option value="501-1000">501-1000 employees</option>
                                        <option value="1000+">1000+ employees</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input type="url" class="form-control" id="companyWebsite" placeholder="https://example.com">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Location <span class="required">*</span></label>
                                <input type="text" class="form-control" id="companyLocation" required placeholder="City, Country">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Contact Email <span class="required">*</span></label>
                                <input type="email" class="form-control" id="companyEmail" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Contact Phone</label>
                                <input type="tel" class="form-control" id="companyPhone">
                            </div>
                            
                            <div class="form-actions">
                                <button type="button" class="btn btn-secondary" onclick="cancelCompany()">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="saveCompany()">
                                    <i class="fas fa-save"></i> Save Company & Continue
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Job Details Section (Step 2) -->
                <div class="form-section" id="jobDetailsSection">
                    <div class="form-title">
                        <i class="fas fa-briefcase me-2"></i>Job Details
                    </div>
                    
                    <form id="jobForm">
                        <div class="form-group">
                            <label class="form-label">Job Title <span class="required">*</span></label>
                            <input type="text" class="form-control" id="jobTitle" required placeholder="e.g., Senior Software Engineer">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Job Type <span class="required">*</span></label>
                            <div class="form-row">
                                <select class="form-select" id="jobType" required>
                                    <option value="">Select Type</option>
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Remote">Remote</option>
                                </select>
                                
                                <select class="form-select" id="jobExperience" required>
                                    <option value="">Experience Level</option>
                                    <option value="Entry Level">Entry Level</option>
                                    <option value="Mid Level">Mid Level</option>
                                    <option value="Senior Level">Senior Level</option>
                                    <option value="Lead">Lead</option>
                                    <option value="Director">Director</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Job Description <span class="required">*</span></label>
                            <textarea class="form-control" id="jobDescription" rows="6" required placeholder="Describe the role, responsibilities, and expectations"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Requirements <span class="required">*</span>
                                <span class="tooltip">
                                    <i class="fas fa-info-circle"></i>
                                    <span class="tooltiptext">Enter each requirement on a new line. Use bullet points or simple sentences.</span>
                                </span>
                            </label>
                            <textarea class="form-control" id="jobRequirements" rows="4" required placeholder="• Minimum 3 years of experience
• Proficiency in JavaScript
• Strong communication skills"></textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Salary Range (per year)</label>
                                <div class="form-row">
                                    <input type="number" class="form-control" id="salaryMin" placeholder="Min" min="0">
                                    <input type="number" class="form-control" id="salaryMax" placeholder="Max" min="0">
                                    <select class="form-select" id="salaryCurrency">
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                        <option value="INR">INR</option>
                                        <option value="PKR">PKR</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Location <span class="required">*</span></label>
                                <input type="text" class="form-control" id="jobLocation" required value="San Francisco, CA">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Work Setup</label>
                                <select class="form-select" id="workSetup">
                                    <option value="On-site">On-site</option>
                                    <option value="Remote">Remote</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Application Deadline</label>
                                <input type="date" class="form-control" id="applicationDeadline">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Number of Vacancies</label>
                                <input type="number" class="form-control" id="vacancies" min="1" value="1">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Benefits
                                <span class="tooltip">
                                    <i class="fas fa-info-circle"></i>
                                    <span class="tooltiptext">List the benefits you offer (health insurance, remote work, etc.)</span>
                                </span>
                            </label>
                            <textarea class="form-control" id="jobBenefits" rows="3" placeholder="• Health insurance
• Flexible work hours
• Professional development
• Paid time off"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Application Instructions</label>
                            <textarea class="form-control" id="applicationInstructions" rows="3" placeholder="How should candidates apply?"></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" onclick="previousStep()">
                                <i class="fas fa-arrow-left"></i> Back
                            </button>
                            <button type="button" class="btn btn-primary" onclick="previewJob()">
                                <i class="fas fa-eye"></i> Preview & Continue
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
                    <div class="company-preview">
                        <div class="company-header">
                            <div class="company-logo" id="previewCompanyLogo">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="company-info">
                                <h4 id="previewCompanyName">Your Company</h4>
                                <p id="previewCompanyTagline">Company tagline will appear here</p>
                            </div>
                        </div>
                        <div class="edit-company-btn">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="editCompanyFromPreview()">
                                <i class="fas fa-edit"></i> Edit Company
                            </button>
                        </div>
                    </div>
                    
                    <!-- Job Preview -->
                    <div class="job-preview" id="jobPreviewContent">
                        <!-- Job preview will be generated here -->
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="previousStep()">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                        <button type="button" class="btn btn-success" onclick="postJob()">
                            <i class="fas fa-paper-plane"></i> Post Job Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Edit Company Modal -->
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
            company: null, // null means no company exists
            currentStep: 1,
            jobData: {},
            hasCompany: false // Check if user already has a company
        };

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            checkCompanyStatus();
        });

        // Check if user already has a company
        function checkCompanyStatus() {
            // Simulate API call to check company status
            setTimeout(() => {
                // For demo: Check localStorage or simulate server response
                const savedCompany = localStorage.getItem('userCompany');
                
                if (savedCompany) {
                    appState.company = JSON.parse(savedCompany);
                    appState.hasCompany = true;
                    showCompanyExists();
                } else {
                    appState.hasCompany = false;
                    showNoCompany();
                }
            }, 500);
        }

        // Show "No Company" screen
        function showNoCompany() {
            const companyCheckArea = document.getElementById('companyCheckArea');
            companyCheckArea.innerHTML = `
                <div class="no-company-card">
                    <div class="no-company-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3 class="no-company-title">Company Profile Required</h3>
                    <p class="no-company-text">
                        Before posting jobs, you need to create a company profile. 
                        This helps job seekers learn about your organization and builds trust.
                    </p>
                    <button class="btn btn-primary" onclick="createNewCompany()">
                        <i class="fas fa-plus"></i> Create Company Profile
                    </button>
                </div>
            `;
        }

        // Show existing company
        function showCompanyExists() {
            const companyCheckArea = document.getElementById('companyCheckArea');
            companyCheckArea.innerHTML = `
                <div class="company-exists">
                    <div class="company-exists-info">
                        <div class="company-exists-logo" id="existingCompanyLogo">
                            ${appState.company.logo ? 
                                `<img src="${appState.company.logo}" alt="${appState.company.name}">` : 
                                `<i class="fas fa-building"></i>`
                            }
                        </div>
                        <div>
                            <div class="company-exists-name">${appState.company.name}</div>
                            <div class="text-muted">${appState.company.location}</div>
                        </div>
                    </div>
                    <a href="#" class="company-exists-edit" onclick="editCompany()">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary" onclick="goToJobDetails()">
                        <i class="fas fa-arrow-right"></i> Continue to Job Details
                    </button>
                </div>
            `;
        }

        // Create new company
        function createNewCompany() {
            document.getElementById('companyCheckArea').style.display = 'none';
            document.getElementById('companyForm').style.display = 'block';
        }

        // Cancel company creation
        function cancelCompany() {
            document.getElementById('companyCheckArea').style.display = 'block';
            document.getElementById('companyForm').style.display = 'none';
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

        // Save company
        function saveCompany() {
            // Get form values
            const companyData = {
                id: Date.now(), // Generate unique ID
                name: document.getElementById('companyName').value,
                tagline: document.getElementById('companyTagline').value,
                description: document.getElementById('companyDescription').value,
                industry: document.getElementById('companyIndustry').value,
                size: document.getElementById('companySize').value,
                website: document.getElementById('companyWebsite').value,
                location: document.getElementById('companyLocation').value,
                email: document.getElementById('companyEmail').value,
                phone: document.getElementById('companyPhone').value,
                logo: getLogoPreview(),
                createdAt: new Date().toISOString()
            };

            // Validate required fields
            if (!companyData.name || !companyData.description || !companyData.industry || 
                !companyData.size || !companyData.location || !companyData.email) {
                alert('Please fill in all required fields.');
                return;
            }

            // Save company data
            appState.company = companyData;
            appState.hasCompany = true;
            
            // Save to localStorage (in real app, send to server)
            localStorage.setItem('userCompany', JSON.stringify(companyData));
            
            // Show success message
            alert('Company profile created successfully!');
            
            // Go to job details
            goToJobDetails();
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
            
            // Set company location as default job location
            if (appState.company && appState.company.location) {
                document.getElementById('jobLocation').value = appState.company.location;
            }
        }

        // Go to previous step
        function previousStep() {
            if (appState.currentStep === 2) {
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
            document.getElementById('editCompanyName').value = appState.company.name;
            document.getElementById('editCompanyTagline').value = appState.company.tagline || '';
            document.getElementById('editCompanyDescription').value = appState.company.description;
            document.getElementById('editCompanyLocation').value = appState.company.location;
            
            document.getElementById('editCompanyModal').style.display = 'block';
        }

        // Close edit modal
        function closeEditModal() {
            document.getElementById('editCompanyModal').style.display = 'none';
        }

        // Save company edits
        function saveCompanyEdit() {
            // Update company data
            appState.company.name = document.getElementById('editCompanyName').value;
            appState.company.tagline = document.getElementById('editCompanyTagline').value;
            appState.company.description = document.getElementById('editCompanyDescription').value;
            appState.company.location = document.getElementById('editCompanyLocation').value;
            
            // Save to localStorage
            localStorage.setItem('userCompany', JSON.stringify(appState.company));
            
            // Close modal and refresh display
            closeEditModal();
            showCompanyExists();
            
            alert('Company details updated successfully!');
        }

        // Edit company from preview
        function editCompanyFromPreview() {
            editCompany();
        }

        // Preview job
        function previewJob() {
            // Collect job data
            const jobData = {
                title: document.getElementById('jobTitle').value,
                type: document.getElementById('jobType').value,
                experience: document.getElementById('jobExperience').value,
                description: document.getElementById('jobDescription').value,
                requirements: document.getElementById('jobRequirements').value,
                salary: {
                    min: document.getElementById('salaryMin').value,
                    max: document.getElementById('salaryMax').value,
                    currency: document.getElementById('salaryCurrency').value
                },
                location: document.getElementById('jobLocation').value,
                workSetup: document.getElementById('workSetup').value,
                deadline: document.getElementById('applicationDeadline').value,
                vacancies: document.getElementById('vacancies').value,
                benefits: document.getElementById('jobBenefits').value,
                instructions: document.getElementById('applicationInstructions').value,
                postedDate: new Date().toLocaleDateString()
            };

            // Validate required fields
            if (!jobData.title || !jobData.type || !jobData.experience || 
                !jobData.description || !jobData.requirements || !jobData.location) {
                alert('Please fill in all required fields.');
                return;
            }

            appState.jobData = jobData;
            
            // Update preview
            updatePreview();
            
            // Go to preview step
            appState.currentStep = 3;
            document.getElementById('step2').classList.remove('active');
            document.getElementById('step3').classList.add('active');
            
            document.getElementById('jobDetailsSection').classList.remove('active');
            document.getElementById('previewSection').classList.add('active');
        }

        // Update job preview
        function updatePreview() {
            // Update company preview
            document.getElementById('previewCompanyName').textContent = appState.company.name;
            document.getElementById('previewCompanyTagline').textContent = appState.company.tagline || '';
            
            const previewLogo = document.getElementById('previewCompanyLogo');
            if (appState.company.logo) {
                previewLogo.innerHTML = `<img src="${appState.company.logo}" style="width: 100%; height: 100%; object-fit: cover;">`;
            } else {
                previewLogo.innerHTML = '<i class="fas fa-building"></i>';
            }
            
            // Generate job preview
            const job = appState.jobData;
            let salaryText = '';
            if (job.salary.min && job.salary.max) {
                salaryText = `${job.salary.min} - ${job.salary.max} ${job.salary.currency}/year`;
            } else if (job.salary.min) {
                salaryText = `From ${job.salary.min} ${job.salary.currency}/year`;
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
            if (job.benefits) {
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
            
            const jobPreview = document.getElementById('jobPreviewContent');
            jobPreview.innerHTML = `
                <div class="job-header">
                    <div>
                        <div class="job-title">${job.title}</div>
                        <div class="job-company">${appState.company.name}</div>
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
                        <span>${job.workSetup}</span>
                    </div>
                    ${job.vacancies > 1 ? `
                        <div class="meta-item">
                            <i class="fas fa-users"></i>
                            <span>${job.vacancies} openings</span>
                        </div>
                    ` : ''}
                    ${job.deadline ? `
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Apply by ${new Date(job.deadline).toLocaleDateString()}</span>
                        </div>
                    ` : ''}
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
                
                ${job.instructions ? `
                    <div class="job-section">
                        <div class="section-title">How to Apply</div>
                        <div class="job-description">${job.instructions.replace(/\n/g, '<br>')}</div>
                    </div>
                ` : ''}
                
                <div class="job-section">
                    <div class="section-title">About ${appState.company.name}</div>
                    <div class="job-description">${appState.company.description}</div>
                </div>
            `;
        }

        // Post job
        function postJob() {
            // In a real app, send jobData to server
            console.log('Posting job:', appState.jobData);
            
            // Generate job ID
            const jobId = Date.now();
            
            // Save job to localStorage (simulating database)
            const savedJobs = JSON.parse(localStorage.getItem('userJobs') || '[]');
            const jobToSave = {
                id: jobId,
                ...appState.jobData,
                company: appState.company,
                status: 'active',
                createdAt: new Date().toISOString(),
                applications: 0,
                views: 0
            };
            
            savedJobs.push(jobToSave);
            localStorage.setItem('userJobs', JSON.stringify(savedJobs));
            
            // Show success message
            alert('Job posted successfully!');
            
            // Redirect to jobs page or dashboard
            setTimeout(() => {
                window.location.href = 'dashboard.html'; // Change to your actual dashboard URL
            }, 1500);
        }

        // Add form validation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
            });
        });

        // Set default deadline to 30 days from now
        const today = new Date();
        const nextMonth = new Date(today);
        nextMonth.setDate(today.getDate() + 30);
        document.getElementById('applicationDeadline').min = today.toISOString().split('T')[0];
        document.getElementById('applicationDeadline').value = nextMonth.toISOString().split('T')[0];
    </script>

@endsection
