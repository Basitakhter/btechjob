@extends('layouts.header')
@section('title',Auth::user()->name)
@section('content')
@if($message = session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if($message = session()->get('warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            line-height: 1.6;
        }
        
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
        }
        
        @media (max-width: 768px) {
            .profile-container {
                padding: 10px;
            }
        }
        
        .profile-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .profile-header {
            background: linear-gradient(135deg, var(--primary), #1d4ed8);
            color: white;
            padding: 25px 20px;
            text-align: center;
            position: relative;
        }
        
        @media (max-width: 576px) {
            .profile-header {
                padding: 20px 15px;
            }
        }
        
        .avatar-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.9);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: 600;
            margin: 0 auto;
            overflow: hidden;
            object-fit: cover;
            transition: all 0.3s ease;
        }
        
        .profile-avatar:hover {
            transform: scale(1.05);
        }
        
        @media (max-width: 576px) {
            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
            }
        }
        
        .avatar-edit {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: white;
            color: var(--primary);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            border: 2px solid var(--primary);
        }
        
        .avatar-edit:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }
        
        @media (max-width: 576px) {
            .avatar-edit {
                width: 32px;
                height: 32px;
                bottom: 0;
                right: 0;
            }
        }
        
        .profile-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
            line-height: 1.2;
        }
        
        @media (max-width: 576px) {
            .profile-name {
                font-size: 1.5rem;
            }
        }
        
        .profile-title {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 10px;
        }
        
        @media (max-width: 576px) {
            .profile-title {
                font-size: 1rem;
            }
        }
        
        .profile-location {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.95rem;
            opacity: 0.9;
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        @media (max-width: 576px) {
            .section-title {
                font-size: 1.1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .section-title .edit-btn {
                align-self: flex-end;
            }
        }
        
        .edit-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            white-space: nowrap;
        }
        
        .edit-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(29, 78, 216, 0.2);
        }
        
        .edit-btn-sm {
            padding: 6px 12px;
            font-size: 0.85rem;
        }
        
        .skill-tag {
            background: var(--primary-light);
            color: var(--primary);
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 0 5px 5px 0;
            transition: all 0.2s;
        }
        
        .skill-tag:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        .skill-remove {
            cursor: pointer;
            font-size: 0.8rem;
            opacity: 0.7;
            padding-left: 5px;
        }
        
        .skill-remove:hover {
            opacity: 1;
            transform: scale(1.2);
        }
        
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        
        @media (max-width: 768px) {
            .timeline {
                padding-left: 25px;
            }
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--gray-300);
        }
        
        @media (max-width: 768px) {
            .timeline::before {
                left: 8px;
            }
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 20px;
            padding: 15px;
            background: white;
            border-radius: 8px;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }
        
        .timeline-item:hover {
            border-color: var(--primary);
            box-shadow: 0 3px 10px rgba(37, 99, 235, 0.1);
        }
        
        @media (max-width: 576px) {
            .timeline-item {
                padding: 12px;
            }
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -25px;
            top: 20px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary);
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--primary-light);
        }
        
        @media (max-width: 768px) {
            .timeline-item::before {
                left: -20px;
                width: 10px;
                height: 10px;
            }
        }
        
        .resume-card {
            background: var(--gray-100);
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
            border: 2px dashed var(--gray-300);
            transition: all 0.3s ease;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .resume-card:hover {
            border-color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }
        
        @media (max-width: 576px) {
            .resume-card {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }
            
            .resume-card .btn {
                align-self: flex-end;
            }
        }
        
        .portfolio-item, .certification-item {
            background: white;
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .portfolio-item:hover, .certification-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-color: var(--primary);
        }
        
        .save-all-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 100;
            padding: 12px 30px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.3);
            display: none;
            transition: all 0.3s ease;
        }
        
        .save-all-btn:hover {
            background: #1d4ed8;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(29, 78, 216, 0.4);
        }
        
        @media (max-width: 768px) {
            .save-all-btn {
                bottom: 20px;
                right: 20px;
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
        
        @media (max-width: 576px) {
            .save-all-btn {
                bottom: 15px;
                right: 15px;
                padding: 8px 16px;
                font-size: 0.85rem;
            }
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }
        
        .action-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            border: 1px solid var(--gray-300);
            background: white;
            color: var(--gray-700);
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        
        .action-btn.edit:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .action-btn.delete:hover {
            background: var(--danger);
            color: white;
            border-color: var(--danger);
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.1);
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.85rem;
            color: var(--gray-700);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .info-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            border-color: var(--primary);
            background: rgba(37, 99, 235, 0.02);
        }
        
        .info-label {
            font-size: 0.85rem;
            color: var(--gray-700);
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .info-value {
            font-size: 1rem;
            color: var(--gray-900);
            font-weight: 500;
        }
        
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .modal-header {
            background: var(--primary);
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 20px;
            border-bottom: none;
        }
        
        .modal-body {
            padding: 25px;
        }
        
        @media (max-width: 576px) {
            .modal-body {
                padding: 20px;
            }
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
        }
        
        .nav-tabs .nav-link {
            color: var(--gray-700);
            border: none;
            padding: 10px 20px;
            font-weight: 500;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary);
            border-bottom: 3px solid var(--primary);
            background: transparent;
        }
        
        .nav-tabs .nav-link:hover {
            color: var(--primary);
        }
        
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        
        @media (max-width: 576px) {
            .toast-container {
                top: 10px;
                right: 10px;
                left: 10px;
            }
        }
        
        .toast {
            border-radius: 8px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            animation: slideInRight 0.3s ease;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .file-upload-area {
            border: 2px dashed var(--gray-300);
            border-radius: 8px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .file-upload-area:hover, .file-upload-area.dragover {
            border-color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }
        
        .file-upload-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--gray-700);
        }
        
        .empty-state-icon {
            font-size: 3rem;
            color: var(--gray-300);
            margin-bottom: 15px;
        }
        
        .floating-action-btn {
            position: fixed;
            bottom: 80px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
            z-index: 99;
            transition: all 0.3s ease;
        }
        
        .floating-action-btn:hover {
            transform: scale(1.1);
            background: #1d4ed8;
        }
        
        @media (max-width: 768px) {
            .floating-action-btn {
                bottom: 70px;
                right: 20px;
                width: 45px;
                height: 45px;
            }
            .profile-completion {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border-left: 4px solid var(--primary);
        }
        
        .completion-bar {
            height: 8px;
            background: #e5e7eb;
            border-radius: 4px;
            overflow: hidden;
            margin: 10px 0;
        }
        
        .completion-progress {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s ease;
        }
        
        .resume-generator {
            background: var(--primary-light);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            display: none;
        }
        
        .resume-generator.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .completion-message {
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        .completion-success {
            color: var(--secondary);
            font-weight: 600;
        }
        
        .completion-warning {
            color: var(--warning);
        }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Add Profile Completion Widget -->
    <div class="profile-completion" id="profileCompletion">
        <div class="d-flex justify-content-between align-items-center">
            <strong>Profile Completion</strong>
            <span id="completionPercentage">0%</span>
        </div>
        <div class="completion-bar">
            <div class="completion-progress" id="completionProgress"></div>
        </div>
        <div id="resumeStatus" class="text-muted small mb-2">Complete profile to download resume</div>
        <div class="resume-actions" id="resumeActions" style="display: none;">
            <button class="btn btn-success" onclick="downloadResume()">
                <i class="fas fa-download"></i> Download
            </button>
            <button class="btn btn-primary" onclick="previewResume()">
                <i class="fas fa-eye"></i> Preview
            </button>
        </div>
    </div>
        <!-- Profile Header -->
        <div class="profile-card">
            <div class="profile-header">
                <div class="avatar-wrapper">
                    <img src="" alt="Profile Picture" class="profile-avatar" id="avatarDisplay" onerror="this.style.display='none'; document.getElementById('avatarInitials').style.display='flex';">
                    <div class="profile-avatar" id="avatarInitials" style="display: flex;">
                        JS
                    </div>
                    <div class="avatar-edit" onclick="openAvatarModal()">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
                <h1 class="profile-name" id="displayName">John Smith</h1>
                <p class="profile-title" id="displayTitle">Senior Software Engineer</p>
                <div class="profile-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span id="displayLocation">San Francisco, CA</span>
                </div>
            </div>
                       <!-- Stats Section -->
            <div class="row g-3 p-3 p-md-4">
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-value" id="statApplied">24</div>
                        <div class="stat-label">Jobs Applied</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-value" id="statSaved">12</div>
                        <div class="stat-label">Jobs Saved</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-value" id="statProfileViews">156</div>
                        <div class="stat-label">Profile Views</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="stat-value" id="statResumeViews">89</div>
                        <div class="stat-label">Resume Views</div>
                    </div>
                </div>
            </div>
            
            <!-- Profile Content -->
            <div class="p-3 p-md-4">
                <!-- Personal Information -->
                <div class="mb-5">
                    <div class="section-title">
                        Personal Information
                        <button class="edit-btn edit-btn-sm" onclick="openPersonalInfoModal()">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label" >Full Name</div>
                                <div class="info-value" value="{{ Auth::user()-> }}" name="" id="infoName"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">Email Address</div>
                                <div class="info-value" id="infoEmail">john.smith@example.com</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">Phone Number</div>
                                <div class="info-value" id="infoPhone">+1 (555) 123-4567</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">Job Title</div>
                                <div class="info-value" id="infoJobTitle">Senior Software Engineer</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">Location</div>
                                <div class="info-value" id="infoLocation">San Francisco, California</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-label">Experience</div>
                                <div class="info-value" id="infoExperience">8+ Years</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Skills Section -->
                <div class="mb-5">
                    <div class="section-title">
                        Skills & Expertise
                        <button class="edit-btn edit-btn-sm" onclick="openSkillsModal()">
                            <i class="fas fa-plus"></i> Manage
                        </button>
                    </div>
                    <div class="d-flex flex-wrap gap-2" id="skillsList">
                        <!-- Skills will be loaded here -->
                    </div>
                    <div id="noSkillsMessage" class="empty-state d-none">
                        <div class="empty-state-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <p>No skills added yet</p>
                        <button class="edit-btn edit-btn-sm" onclick="openSkillsModal()">
                            <i class="fas fa-plus"></i> Add Skills
                        </button>
                    </div>
                </div>
                
                <!-- Resume Section -->
                <div class="mb-5">
                    <div class="section-title">
                        Resume / CV
                        <button class="edit-btn edit-btn-sm" onclick="openResumeModal()">
                            <i class="fas fa-upload"></i> Update
                        </button>
                    </div>
                    <div class="resume-card">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary text-white rounded-3 p-3">
                                <i class="fas fa-file-pdf fa-2x"></i>
                            </div>
                            <div>
                                <h5 id="resumeName" class="mb-1">John_Smith_Resume_2025.pdf</h5>
                                <p id="resumeDetails" class="text-muted mb-0">Updated 2 weeks ago • 245 KB</p>
                            </div>
                        </div>
                        <button class="btn btn-primary" onclick="viewResume()">
                            <i class="fas fa-eye me-2"></i>View
                        </button>
                    </div>
                </div>
                
                <!-- Experience Section -->
                <div class="mb-5">
                    <div class="section-title">
                        Work Experience
                        <button class="edit-btn edit-btn-sm" onclick="openExperienceModal()">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                    <div class="timeline" id="experienceList">
                        <!-- Experience items will be loaded here -->
                    </div>
                    <div id="noExperienceMessage" class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <p>No work experience added yet</p>
                        <button class="edit-btn edit-btn-sm" onclick="openExperienceModal()">
                            <i class="fas fa-plus"></i> Add Experience
                        </button>
                    </div>
                </div>
                
                <!-- Education Section -->
                <div class="mb-5">
                    <div class="section-title">
                        Education
                        <button class="edit-btn edit-btn-sm" onclick="openEducationModal()">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                    <div class="timeline" id="educationList">
                        <!-- Education items will be loaded here -->
                    </div>
                    <div id="noEducationMessage" class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <p>No education added yet</p>
                        <button class="edit-btn edit-btn-sm" onclick="openEducationModal()">
                            <i class="fas fa-plus"></i> Add Education
                        </button>
                    </div>
                </div>
                
                <!-- Certifications Section -->
                <div class="mb-5">
                    <div class="section-title">
                        Certifications
                        <button class="edit-btn edit-btn-sm" onclick="openCertificationsModal()">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                    <div class="row g-3" id="certificationsList">
                        <!-- Certifications will be loaded here -->
                    </div>
                    <div id="noCertificationsMessage" class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <p>No certifications added yet</p>
                        <button class="edit-btn edit-btn-sm" onclick="openCertificationsModal()">
                            <i class="fas fa-plus"></i> Add Certification
                        </button>
                    </div>
                </div>
                
                <!-- Portfolio Section -->
                <div class="mb-4">
                    <div class="section-title">
                        Portfolio & Projects
                        <button class="edit-btn edit-btn-sm" onclick="openPortfolioModal()">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                    <div class="row g-3" id="portfolioList">
                        <!-- Portfolio items will be loaded here -->
                    </div>
                    <div id="noPortfolioMessage" class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-code-branch"></i>
                        </div>
                        <p>No projects added yet</p>
                        <button class="edit-btn edit-btn-sm" onclick="openPortfolioModal()">
                            <i class="fas fa-plus"></i> Add Project
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Floating Action Button for Quick Actions -->
        <div class="floating-action-btn" onclick="showQuickActions()">
            <i class="fas fa-bolt"></i>
        </div>
        
        <!-- Save All Changes Button -->
        <button class="save-all-btn" id="saveAllBtn" onclick="saveAllChanges()">
            <i class="fas fa-save"></i> Save All Changes
        </button>
    </div>

    <!-- All Modals -->
    <!-- Personal Info Modal -->
    <div class="modal fade" id="personalInfoModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Personal Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="modalName" value="John Smith">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="modalEmail" value="john.smith@example.com">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="modalPhone" value="+1 (555) 123-4567">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="modalJobTitle" value="Senior Software Engineer">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="modalLocation" value="San Francisco, California">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Experience</label>
                            <input type="text" class="form-control" id="modalExperience" value="8+ Years">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="savePersonalInfo()">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Skills Modal -->
    <div class="modal fade" id="skillsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Skills</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label mb-2">Add New Skill</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="newSkillInput" placeholder="Enter a skill (e.g., JavaScript)">
                            <button class="btn btn-primary" onclick="addNewSkill()">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                        <div class="form-text">Press Enter to add skill</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2">Your Skills</label>
                        <div class="d-flex flex-wrap gap-2" id="modalSkillsList">
                            <!-- Skills for editing -->
                        </div>
                        <div id="modalNoSkills" class="empty-state">
                            <p>No skills added yet</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveSkills()">
                        <i class="fas fa-check me-2"></i>Done
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Experience Modal -->
    <div class="modal fade" id="experienceModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Work Experience</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#addExperienceTab">
                                <i class="fas fa-plus me-2"></i>Add New
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#manageExperienceTab">
                                <i class="fas fa-list me-2"></i>Manage
                            </button>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="addExperienceTab">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Job Title</label>
                                    <input type="text" class="form-control" id="expTitle" placeholder="Senior Software Engineer">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" id="expCompany" placeholder="TechCorp Inc.">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Start Date</label>
                                    <input type="text" class="form-control" id="expStartDate" placeholder="2021">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">End Date</label>
                                    <input type="text" class="form-control" id="expEndDate" placeholder="Present">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" id="expLocation" placeholder="San Francisco, CA">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="expDescription" rows="3" placeholder="Describe your responsibilities and achievements"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" onclick="addExperience()">
                                        <i class="fas fa-plus me-2"></i>Add Experience
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="manageExperienceTab">
                            <div id="experienceEditList">
                                <!-- Experience items for editing -->
                            </div>
                            <div id="modalNoExperience" class="empty-state">
                                <p>No experience added yet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Education Modal -->
    <div class="modal fade" id="educationModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Education</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#addEducationTab">
                                <i class="fas fa-plus me-2"></i>Add New
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#manageEducationTab">
                                <i class="fas fa-list me-2"></i>Manage
                            </button>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="addEducationTab">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Degree/Certificate</label>
                                    <input type="text" class="form-control" id="eduDegree" placeholder="Master of Science in Computer Science">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Institution</label>
                                    <input type="text" class="form-control" id="eduInstitution" placeholder="Stanford University">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" id="eduLocation" placeholder="California, USA">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Start Year</label>
                                    <input type="text" class="form-control" id="eduStartYear" placeholder="2014">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">End Year</label>
                                    <input type="text" class="form-control" id="eduEndYear" placeholder="2018">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="eduDescription" rows="3" placeholder="Details about your education"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" onclick="addEducation()">
                                        <i class="fas fa-plus me-2"></i>Add Education
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="manageEducationTab">
                            <div id="educationEditList">
                                <!-- Education items for editing -->
                            </div>
                            <div id="modalNoEducation" class="empty-state">
                                <p>No education added yet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Certifications Modal -->
    <div class="modal fade" id="certificationsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Certifications</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label">Certificate Name</label>
                            <input type="text" class="form-control" id="certName" placeholder="AWS Certified Solutions Architect">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Issuing Organization</label>
                            <input type="text" class="form-control" id="certOrg" placeholder="Amazon Web Services">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Issue Date</label>
                            <input type="text" class="form-control" id="certIssueDate" placeholder="June 2023">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Expiration Date</label>
                            <input type="text" class="form-control" id="certExpiryDate" placeholder="June 2025">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Credential ID (Optional)</label>
                            <input type="text" class="form-control" id="certId" placeholder="ABC123XYZ">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" onclick="addCertification()">
                                <i class="fas fa-plus me-2"></i>Add Certification
                            </button>
                        </div>
                    </div>
                    
                    <div id="certificationsEditList">
                        <!-- Certifications for editing -->
                    </div>
                    <div id="modalNoCertifications" class="empty-state">
                        <p>No certifications added yet</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal -->
    <div class="modal fade" id="portfolioModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Portfolio Projects</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="projectTitle" placeholder="E-commerce Platform">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="projectDescription" rows="2" placeholder="Brief description of the project"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Project URL/Link</label>
                            <input type="text" class="form-control" id="projectUrl" placeholder="https://github.com/yourusername/project">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Technologies Used</label>
                            <input type="text" class="form-control" id="projectTech" placeholder="React, Node.js, MongoDB">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" onclick="addProject()">
                                <i class="fas fa-plus me-2"></i>Add Project
                            </button>
                        </div>
                    </div>
                    
                    <div id="portfolioEditList">
                        <!-- Portfolio items for editing -->
                    </div>
                    <div id="modalNoPortfolio" class="empty-state">
                        <p>No projects added yet</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Resume Modal -->
    <div class="modal fade" id="resumeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Resume/CV</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label mb-2">Current Resume</label>
                        <div class="resume-card">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary text-white rounded-3 p-3">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div>
                                    <h5 id="currentResumeName" class="mb-1">John_Smith_Resume_2025.pdf</h5>
                                    <p id="currentResumeDetails" class="text-muted mb-0">Updated 2 weeks ago • 245 KB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2">Upload New Resume</label>
                        <div class="file-upload-area" onclick="document.getElementById('resumeUpload').click()" id="resumeDropArea">
                            <div class="file-upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <p class="mb-2">Drag and drop your resume file here or</p>
                            <input type="file" id="resumeUpload" class="d-none" accept=".pdf,.doc,.docx,.txt" onchange="handleResumeUpload()">
                            <button class="btn btn-primary">
                                <i class="fas fa-upload me-2"></i>Browse Files
                            </button>
                            <p class="text-muted mt-3 small">Supported formats: PDF, DOC, DOCX, TXT (Max 5MB)</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateResume()">
                        <i class="fas fa-upload me-2"></i>Update Resume
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Avatar Modal -->
    <div class="modal fade" id="avatarModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Profile Picture</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <div class="profile-avatar mx-auto" style="width: 150px; height: 150px; font-size: 4rem;" id="avatarPreviewContainer">
                            <img src="" alt="Avatar Preview" id="avatarPreview" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover; display: none;">
                            <div id="avatarPreviewInitials" style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;">
                                JS
                            </div>
                        </div>
                    </div>
                    <input type="file" id="avatarUpload" class="d-none" accept="image/*" onchange="handleAvatarUpload(event)">
                    <div class="file-upload-area mb-3" onclick="document.getElementById('avatarUpload').click()">
                        <div class="file-upload-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <p class="mb-2">Choose Image</p>
                    </div>
                    <p class="text-muted small">Recommended: Square image, 400x400px or larger</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveAvatar()">
                        <i class="fas fa-save me-2"></i>Save Picture
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container"></div>

    
    
    <!-- JavaScript -->
    <script>
        // Profile Data
        let profileData = {
            name: "John Smith",
            email: "john.smith@example.com",
            phone: "+1 (555) 123-4567",
            jobTitle: "Senior Software Engineer",
            location: "San Francisco, California",
            experience: "8+ Years",
            skills: ["JavaScript", "React", "Node.js", "Python", "TypeScript", "MongoDB", "AWS", "Docker", "Git", "REST APIs"],
            resume: {
                name: "John_Smith_Resume_2025.pdf",
                updated: "2 weeks ago",
                size: "245 KB"
            },
            workExperience: [
                {
                    id: 1,
                    title: "Senior Software Engineer",
                    company: "TechCorp Inc.",
                    startDate: "2021",
                    endDate: "Present",
                    location: "San Francisco, CA",
                    description: "Leading a team of developers to build scalable web applications."
                }
            ],
            education: [
                {
                    id: 1,
                    degree: "Master of Science in Computer Science",
                    institution: "Stanford University",
                    startYear: "2014",
                    endYear: "2018",
                    location: "California, USA",
                    description: "Graduated with honors."
                }
            ],
            certifications: [
                {
                    id: 1,
                    name: "AWS Certified Solutions Architect",
                    organization: "Amazon Web Services",
                    issueDate: "June 2023",
                    expiryDate: "June 2025"
                }
            ],
            portfolio: [
                {
                    id: 1,
                    title: "E-commerce Platform",
                    description: "Full-stack e-commerce platform",
                    url: "https://github.com/johnsmith/ecommerce",
                    technologies: "React, Node.js, MongoDB"
                }
            ],
            stats: {
                applied: 24,
                saved: 12,
                profileViews: 156,
                resumeViews: 89
            },
            avatar: null // Store avatar data URL
        };

        let editingItemId = null;

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadProfileData();
            
            // Add keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.ctrlKey && e.key === 's') {
                    e.preventDefault();
                    saveAllChanges();
                }
            });
            
            // Add Enter key support for skills input
            document.getElementById('newSkillInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addNewSkill();
                }
            });
            
            // Setup file drop zones
            setupFileDropZones();
        });

        // Setup file drop zones
        function setupFileDropZones() {
            const resumeDropArea = document.getElementById('resumeDropArea');
            
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                resumeDropArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                resumeDropArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                resumeDropArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                resumeDropArea.classList.add('dragover');
            }
            
            function unhighlight() {
                resumeDropArea.classList.remove('dragover');
            }
            
            resumeDropArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                document.getElementById('resumeUpload').files = files;
                handleResumeUpload();
            }
        }

        // Load all data
        function loadProfileData() {
            // Personal Info
            document.getElementById('displayName').textContent = profileData.name;
            document.getElementById('displayTitle').textContent = profileData.jobTitle;
            document.getElementById('displayLocation').textContent = profileData.location.split(',')[0];
            
            document.getElementById('infoName').textContent = profileData.name;
            document.getElementById('infoEmail').textContent = profileData.email;
            document.getElementById('infoPhone').textContent = profileData.phone;
            document.getElementById('infoJobTitle').textContent = profileData.jobTitle;
            document.getElementById('infoLocation').textContent = profileData.location;
            document.getElementById('infoExperience').textContent = profileData.experience;
            
            // Resume
            document.getElementById('resumeName').textContent = profileData.resume.name;
            document.getElementById('resumeDetails').textContent = `Updated ${profileData.resume.updated} • ${profileData.resume.size}`;
            document.getElementById('currentResumeName').textContent = profileData.resume.name;
            document.getElementById('currentResumeDetails').textContent = `Updated ${profileData.resume.updated} • ${profileData.resume.size}`;
            
            // Stats
            document.getElementById('statApplied').textContent = profileData.stats.applied;
            document.getElementById('statSaved').textContent = profileData.stats.saved;
            document.getElementById('statProfileViews').textContent = profileData.stats.profileViews;
            document.getElementById('statResumeViews').textContent = profileData.stats.resumeViews;
            
            // Avatar
            updateAvatarDisplay();
            
            // Render sections
            renderSkills();
            renderExperience();
            renderEducation();
            renderCertifications();
            renderPortfolio();
            
            // Load edit sections
            loadExperienceForEdit();
            loadEducationForEdit();
            loadCertificationsForEdit();
            loadPortfolioForEdit();
        }

        // Update avatar display
        function updateAvatarDisplay() {
            const avatarImg = document.getElementById('avatarDisplay');
            const avatarInitials = document.getElementById('avatarInitials');
            const previewImg = document.getElementById('avatarPreview');
            const previewInitials = document.getElementById('avatarPreviewInitials');
            
            if (profileData.avatar) {
                avatarImg.src = profileData.avatar;
                avatarImg.style.display = 'block';
                avatarInitials.style.display = 'none';
                
                previewImg.src = profileData.avatar;
                previewImg.style.display = 'block';
                previewInitials.style.display = 'none';
            } else {
                avatarImg.style.display = 'none';
                avatarInitials.style.display = 'flex';
                
                previewImg.style.display = 'none';
                previewInitials.style.display = 'flex';
            }
        }

        // Render sections
        function renderSkills() {
            const skillsList = document.getElementById('skillsList');
            const noSkillsMessage = document.getElementById('noSkillsMessage');
            
            skillsList.innerHTML = '';
            
            if (profileData.skills.length === 0) {
                noSkillsMessage.classList.remove('d-none');
                return;
            }
            
            noSkillsMessage.classList.add('d-none');
            
            profileData.skills.forEach(skill => {
                const skillTag = `<div class="skill-tag">${skill}<span class="skill-remove ms-1" onclick="removeSkill('${skill}')"><i class="fas fa-times"></i></span></div>`;
                skillsList.innerHTML += skillTag;
            });
        }

        function renderExperience() {
            const experienceList = document.getElementById('experienceList');
            const noExperienceMessage = document.getElementById('noExperienceMessage');
            
            experienceList.innerHTML = '';
            
            if (profileData.workExperience.length === 0) {
                noExperienceMessage.classList.remove('d-none');
                return;
            }
            
            noExperienceMessage.classList.add('d-none');
            
            profileData.workExperience.forEach(exp => {
                const item = `
                    <div class="timeline-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1 me-3">
                                <div class="text-primary fw-semibold">${exp.startDate} - ${exp.endDate}</div>
                                <h6 class="mb-1">${exp.title}</h6>
                                <p class="text-muted mb-2">${exp.company}, ${exp.location}</p>
                                <p class="mb-0">${exp.description}</p>
                            </div>
                            <div class="action-buttons">
                                
                                <button class="action-btn delete" onclick="deleteExperience(${exp.id})" title="Delete">
                                    <i class="fas fa-trash fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                experienceList.innerHTML += item;
            });
        }

        function renderEducation() {
            const educationList = document.getElementById('educationList');
            const noEducationMessage = document.getElementById('noEducationMessage');
            
            educationList.innerHTML = '';
            
            if (profileData.education.length === 0) {
                noEducationMessage.classList.remove('d-none');
                return;
            }
            
            noEducationMessage.classList.add('d-none');
            
            profileData.education.forEach(edu => {
                const item = `
                    <div class="timeline-item">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1 me-3">
                                <div class="text-primary fw-semibold">${edu.startYear} - ${edu.endYear}</div>
                                <h6 class="mb-1">${edu.degree}</h6>
                                <p class="text-muted mb-2">${edu.institution}, ${edu.location}</p>
                                <p class="mb-0">${edu.description}</p>
                            </div>
                            <div class="action-buttons">
                               
                                <button class="action-btn delete" onclick="deleteEducation(${edu.id})" title="Delete">
                                    <i class="fas fa-trash fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                educationList.innerHTML += item;
            });
        }

        function renderCertifications() {
            const certificationsList = document.getElementById('certificationsList');
            const noCertificationsMessage = document.getElementById('noCertificationsMessage');
            
            certificationsList.innerHTML = '';
            
            if (profileData.certifications.length === 0) {
                noCertificationsMessage.classList.remove('d-none');
                return;
            }
            
            noCertificationsMessage.classList.add('d-none');
            
            profileData.certifications.forEach(cert => {
                const item = `
                    <div class="col-md-6">
                        <div class="certification-item">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <div class="bg-primary-light text-primary rounded-3 p-2">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">${cert.name}</h6>
                                    <p class="text-muted small mb-0">${cert.organization}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Issued: ${cert.issueDate}</small>
                                <div class="action-buttons">
                                    
                                    <button class="action-btn delete" onclick="deleteCertification(${cert.id})" title="Delete">
                                        <i class="fas fa-trash fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                certificationsList.innerHTML += item;
            });
        }

        function renderPortfolio() {
            const portfolioList = document.getElementById('portfolioList');
            const noPortfolioMessage = document.getElementById('noPortfolioMessage');
            
            portfolioList.innerHTML = '';
            
            if (profileData.portfolio.length === 0) {
                noPortfolioMessage.classList.remove('d-none');
                return;
            }
            
            noPortfolioMessage.classList.add('d-none');
            
            profileData.portfolio.forEach(project => {
                const item = `
                    <div class="col-md-6">
                        <div class="portfolio-item">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="mb-0">${project.title}</h6>
                                <div class="action-buttons">
                                    
                                    <button class="action-btn delete" onclick="deletePortfolio(${project.id})" title="Delete">
                                        <i class="fas fa-trash fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <p class="text-muted small mb-3">${project.description}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">${project.technologies}</small>
                                <a href="${project.url}" class="btn btn-sm btn-outline-primary" target="_blank" title="View Project">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                `;
                portfolioList.innerHTML += item;
            });
        }

        // Load for edit
        function loadExperienceForEdit() {
            const list = document.getElementById('experienceEditList');
            const modalNoExperience = document.getElementById('modalNoExperience');
            
            list.innerHTML = '';
            
            if (profileData.workExperience.length === 0) {
                modalNoExperience.classList.remove('d-none');
                return;
            }
            
            modalNoExperience.classList.add('d-none');
            
            profileData.workExperience.forEach(exp => {
                const item = `
                    <div class="border rounded p-3 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${exp.title}</h6>
                                <p class="text-muted small mb-0">${exp.company} • ${exp.startDate} - ${exp.endDate}</p>
                            </div>
                            <div class="action-buttons">
                                <button class="action-btn edit" onclick="editExperience(${exp.id})" title="Edit">
                                    <i class="fas fa-edit fa-sm"></i>
                                </button>
                                <button class="action-btn delete" onclick="deleteExperience(${exp.id})" title="Delete">
                                    <i class="fas fa-trash fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                list.innerHTML += item;
            });
        }

        function loadEducationForEdit() {
            const list = document.getElementById('educationEditList');
            const modalNoEducation = document.getElementById('modalNoEducation');
            
            list.innerHTML = '';
            
            if (profileData.education.length === 0) {
                modalNoEducation.classList.remove('d-none');
                return;
            }
            
            modalNoEducation.classList.add('d-none');
            
            profileData.education.forEach(edu => {
                const item = `
                    <div class="border rounded p-3 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${edu.degree}</h6>
                                <p class="text-muted small mb-0">${edu.institution} • ${edu.startYear} - ${edu.endYear}</p>
                            </div>
                            <div class="action-buttons">
                                <button class="action-btn edit" onclick="editEducation(${edu.id})" title="Edit">
                                    <i class="fas fa-edit fa-sm"></i>
                                </button>
                                <button class="action-btn delete" onclick="deleteEducation(${edu.id})" title="Delete">
                                    <i class="fas fa-trash fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                list.innerHTML += item;
            });
        }

        function loadCertificationsForEdit() {
            const list = document.getElementById('certificationsEditList');
            const modalNoCertifications = document.getElementById('modalNoCertifications');
            
            list.innerHTML = '';
            
            if (profileData.certifications.length === 0) {
                modalNoCertifications.classList.remove('d-none');
                return;
            }
            
            modalNoCertifications.classList.add('d-none');
            
            profileData.certifications.forEach(cert => {
                const item = `
                    <div class="border rounded p-3 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${cert.name}</h6>
                                <p class="text-muted small mb-0">${cert.organization} • ${cert.issueDate}</p>
                            </div>
                            <div class="action-buttons">
                                <button class="action-btn edit" onclick="editCertification(${cert.id})" title="Edit">
                                    <i class="fas fa-edit fa-sm"></i>
                                </button>
                                <button class="action-btn delete" onclick="deleteCertification(${cert.id})" title="Delete">
                                    <i class="fas fa-trash fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                list.innerHTML += item;
            });
        }

        function loadPortfolioForEdit() {
            const list = document.getElementById('portfolioEditList');
            const modalNoPortfolio = document.getElementById('modalNoPortfolio');
            
            list.innerHTML = '';
            
            if (profileData.portfolio.length === 0) {
                modalNoPortfolio.classList.remove('d-none');
                return;
            }
            
            modalNoPortfolio.classList.add('d-none');
            
            profileData.portfolio.forEach(project => {
                const item = `
                    <div class="border rounded p-3 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${project.title}</h6>
                                <p class="text-muted small mb-0">${project.technologies}</p>
                            </div>
                            <div class="action-buttons">
                                <button class="action-btn edit" onclick="editPortfolio(${project.id})" title="Edit">
                                    <i class="fas fa-edit fa-sm"></i>
                                </button>
                                <button class="action-btn delete" onclick="deletePortfolio(${project.id})" title="Delete">
                                    <i class="fas fa-trash fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                list.innerHTML += item;
            });
        }

        // Modal open functions
        function openPersonalInfoModal() {
            document.getElementById('modalName').value = profileData.name;
            document.getElementById('modalEmail').value = profileData.email;
            document.getElementById('modalPhone').value = profileData.phone;
            document.getElementById('modalJobTitle').value = profileData.jobTitle;
            document.getElementById('modalLocation').value = profileData.location;
            document.getElementById('modalExperience').value = profileData.experience;
            
            const modal = new bootstrap.Modal(document.getElementById('personalInfoModal'));
            modal.show();
        }

        function openSkillsModal() {
            const modalSkillsList = document.getElementById('modalSkillsList');
            const modalNoSkills = document.getElementById('modalNoSkills');
            
            modalSkillsList.innerHTML = '';
            
            if (profileData.skills.length === 0) {
                modalNoSkills.classList.remove('d-none');
            } else {
                modalNoSkills.classList.add('d-none');
                profileData.skills.forEach(skill => {
                    modalSkillsList.innerHTML += `<div class="skill-tag">${skill}<span class="skill-remove ms-1" onclick="removeSkillFromModal('${skill}')"><i class="fas fa-times"></i></span></div>`;
                });
            }
            
            document.getElementById('newSkillInput').value = '';
            document.getElementById('newSkillInput').focus();
            
            const modal = new bootstrap.Modal(document.getElementById('skillsModal'));
            modal.show();
        }

        function openExperienceModal() {
            loadExperienceForEdit();
            const modal = new bootstrap.Modal(document.getElementById('experienceModal'));
            modal.show();
        }

        function openEducationModal() {
            loadEducationForEdit();
            const modal = new bootstrap.Modal(document.getElementById('educationModal'));
            modal.show();
        }

        function openCertificationsModal() {
            loadCertificationsForEdit();
            const modal = new bootstrap.Modal(document.getElementById('certificationsModal'));
            modal.show();
        }

        function openPortfolioModal() {
            loadPortfolioForEdit();
            const modal = new bootstrap.Modal(document.getElementById('portfolioModal'));
            modal.show();
        }

        function openResumeModal() {
            const modal = new bootstrap.Modal(document.getElementById('resumeModal'));
            modal.show();
        }

        function openAvatarModal() {
            const modal = new bootstrap.Modal(document.getElementById('avatarModal'));
            modal.show();
        }

        // Save functions
        function savePersonalInfo() {
            profileData.name = document.getElementById('modalName').value;
            profileData.email = document.getElementById('modalEmail').value;
            profileData.phone = document.getElementById('modalPhone').value;
            profileData.jobTitle = document.getElementById('modalJobTitle').value;
            profileData.location = document.getElementById('modalLocation').value;
            profileData.experience = document.getElementById('modalExperience').value;
            
            loadProfileData();
            bootstrap.Modal.getInstance(document.getElementById('personalInfoModal')).hide();
            showToast('Personal information updated successfully!', 'success');
            showSaveButton();
        }

        function addNewSkill() {
            const input = document.getElementById('newSkillInput');
            const skill = input.value.trim();
            
            if (!skill) {
                showToast('Please enter a skill name', 'warning');
                return;
            }
            
            if (profileData.skills.includes(skill)) {
                showToast('This skill already exists', 'warning');
                input.focus();
                return;
            }
            
            profileData.skills.push(skill);
            input.value = '';
            openSkillsModal();
            showSaveButton();
        }

        function removeSkillFromModal(skill) {
            profileData.skills = profileData.skills.filter(s => s !== skill);
            openSkillsModal();
            showSaveButton();
        }

        function saveSkills() {
            renderSkills();
            bootstrap.Modal.getInstance(document.getElementById('skillsModal')).hide();
            showToast('Skills updated successfully!', 'success');
            showSaveButton();
        }

        function removeSkill(skill) {
            if (confirm(`Remove "${skill}" from your skills?`)) {
                profileData.skills = profileData.skills.filter(s => s !== skill);
                renderSkills();
                showToast('Skill removed successfully', 'info');
                showSaveButton();
            }
        }

        // Experience
        function addExperience() {
            const title = document.getElementById('expTitle').value.trim();
            const company = document.getElementById('expCompany').value.trim();
            
            if (!title || !company) {
                showToast('Please enter job title and company', 'warning');
                return;
            }
            
            const newExp = {
                id: Date.now(),
                title: title,
                company: company,
                startDate: document.getElementById('expStartDate').value || '2023',
                endDate: document.getElementById('expEndDate').value || 'Present',
                location: document.getElementById('expLocation').value || 'Location',
                description: document.getElementById('expDescription').value || 'Description'
            };
            
            if (editingItemId) {
                const index = profileData.workExperience.findIndex(exp => exp.id === editingItemId);
                if (index !== -1) {
                    profileData.workExperience[index] = { ...newExp, id: editingItemId };
                    editingItemId = null;
                    showToast('Experience updated successfully!', 'success');
                }
            } else {
                profileData.workExperience.unshift(newExp);
                showToast('Experience added successfully!', 'success');
            }
            
            // Clear form
            ['expTitle', 'expCompany', 'expStartDate', 'expEndDate', 'expLocation', 'expDescription'].forEach(id => {
                document.getElementById(id).value = '';
            });
            
            loadProfileData();
            showSaveButton();
        }

        function editExperience(id) {
            const exp = profileData.workExperience.find(item => item.id === id);
            if (exp) {
                editingItemId = id;
                
                document.getElementById('expTitle').value = exp.title;
                document.getElementById('expCompany').value = exp.company;
                document.getElementById('expStartDate').value = exp.startDate;
                document.getElementById('expEndDate').value = exp.endDate;
                document.getElementById('expLocation').value = exp.location;
                document.getElementById('expDescription').value = exp.description;
                
                // Switch to add tab
                const addTab = document.querySelector('[data-bs-target="#addExperienceTab"]');
                new bootstrap.Tab(addTab).show();
                addTab.focus();
                
                showToast('Edit mode enabled. Update the details and click "Add Experience"', 'info');
            }
        }

        function deleteExperience(id) {
            if (confirm('Are you sure you want to delete this experience?')) {
                profileData.workExperience = profileData.workExperience.filter(exp => exp.id !== id);
                loadProfileData();
                showToast('Experience deleted successfully', 'info');
                showSaveButton();
            }
        }

        // Education
        function addEducation() {
            const degree = document.getElementById('eduDegree').value.trim();
            const institution = document.getElementById('eduInstitution').value.trim();
            
            if (!degree || !institution) {
                showToast('Please enter degree and institution', 'warning');
                return;
            }
            
            const newEdu = {
                id: Date.now(),
                degree: degree,
                institution: institution,
                startYear: document.getElementById('eduStartYear').value || '2020',
                endYear: document.getElementById('eduEndYear').value || '2024',
                location: document.getElementById('eduLocation').value || 'Location',
                description: document.getElementById('eduDescription').value || 'Description'
            };
            
            if (editingItemId) {
                const index = profileData.education.findIndex(edu => edu.id === editingItemId);
                if (index !== -1) {
                    profileData.education[index] = { ...newEdu, id: editingItemId };
                    editingItemId = null;
                    showToast('Education updated successfully!', 'success');
                }
            } else {
                profileData.education.unshift(newEdu);
                showToast('Education added successfully!', 'success');
            }
            
            ['eduDegree', 'eduInstitution', 'eduStartYear', 'eduEndYear', 'eduLocation', 'eduDescription'].forEach(id => {
                document.getElementById(id).value = '';
            });
            
            loadProfileData();
            showSaveButton();
        }

        function editEducation(id) {
            const edu = profileData.education.find(item => item.id === id);
            if (edu) {
                editingItemId = id;
                
                document.getElementById('eduDegree').value = edu.degree;
                document.getElementById('eduInstitution').value = edu.institution;
                document.getElementById('eduStartYear').value = edu.startYear;
                document.getElementById('eduEndYear').value = edu.endYear;
                document.getElementById('eduLocation').value = edu.location;
                document.getElementById('eduDescription').value = edu.description;
                
                const addTab = document.querySelector('[data-bs-target="#addEducationTab"]');
                new bootstrap.Tab(addTab).show();
                addTab.focus();
                
                showToast('Edit mode enabled. Update the details and click "Add Education"', 'info');
            }
        }

        function deleteEducation(id) {
            if (confirm('Are you sure you want to delete this education?')) {
                profileData.education = profileData.education.filter(edu => edu.id !== id);
                loadProfileData();
                showToast('Education deleted successfully', 'info');
                showSaveButton();
            }
        }

        // Certifications
        function addCertification() {
            const name = document.getElementById('certName').value.trim();
            const organization = document.getElementById('certOrg').value.trim();
            
            if (!name || !organization) {
                showToast('Please enter certificate name and organization', 'warning');
                return;
            }
            
            const newCert = {
                id: Date.now(),
                name: name,
                organization: organization,
                issueDate: document.getElementById('certIssueDate').value || '2023',
                expiryDate: document.getElementById('certExpiryDate').value || '',
                credentialId: document.getElementById('certId').value || ''
            };
            
            if (editingItemId) {
                const index = profileData.certifications.findIndex(cert => cert.id === editingItemId);
                if (index !== -1) {
                    profileData.certifications[index] = { ...newCert, id: editingItemId };
                    editingItemId = null;
                    showToast('Certification updated successfully!', 'success');
                }
            } else {
                profileData.certifications.push(newCert);
                showToast('Certification added successfully!', 'success');
            }
            
            ['certName', 'certOrg', 'certIssueDate', 'certExpiryDate', 'certId'].forEach(id => {
                document.getElementById(id).value = '';
            });
            
            loadProfileData();
            showSaveButton();
        }

        function editCertification(id) {
            const cert = profileData.certifications.find(item => item.id === id);
            if (cert) {
                editingItemId = id;
                
                document.getElementById('certName').value = cert.name;
                document.getElementById('certOrg').value = cert.organization;
                document.getElementById('certIssueDate').value = cert.issueDate;
                document.getElementById('certExpiryDate').value = cert.expiryDate;
                document.getElementById('certId').value = cert.credentialId || '';
                
                document.getElementById('certName').focus();
                showToast('Edit mode enabled. Update the details and click "Add Certification"', 'info');
            }
        }

        function deleteCertification(id) {
            if (confirm('Are you sure you want to delete this certification?')) {
                profileData.certifications = profileData.certifications.filter(cert => cert.id !== id);
                loadProfileData();
                showToast('Certification deleted successfully', 'info');
                showSaveButton();
            }
        }

        // Portfolio
        function addProject() {
            const title = document.getElementById('projectTitle').value.trim();
            
            if (!title) {
                showToast('Please enter project title', 'warning');
                return;
            }
            
            const newProject = {
                id: Date.now(),
                title: title,
                description: document.getElementById('projectDescription').value || 'Description',
                url: document.getElementById('projectUrl').value || '#',
                technologies: document.getElementById('projectTech').value || 'Technologies'
            };
            
            if (editingItemId) {
                const index = profileData.portfolio.findIndex(project => project.id === editingItemId);
                if (index !== -1) {
                    profileData.portfolio[index] = { ...newProject, id: editingItemId };
                    editingItemId = null;
                    showToast('Project updated successfully!', 'success');
                }
            } else {
                profileData.portfolio.push(newProject);
                showToast('Project added successfully!', 'success');
            }
            
            ['projectTitle', 'projectDescription', 'projectUrl', 'projectTech'].forEach(id => {
                document.getElementById(id).value = '';
            });
            
            loadProfileData();
            showSaveButton();
        }

        function editPortfolio(id) {
            const project = profileData.portfolio.find(item => item.id === id);
            if (project) {
                editingItemId = id;
                
                document.getElementById('projectTitle').value = project.title;
                document.getElementById('projectDescription').value = project.description;
                document.getElementById('projectUrl').value = project.url;
                document.getElementById('projectTech').value = project.technologies;
                
                document.getElementById('projectTitle').focus();
                showToast('Edit mode enabled. Update the details and click "Add Project"', 'info');
            }
        }

        function deletePortfolio(id) {
            if (confirm('Are you sure you want to delete this project?')) {
                profileData.portfolio = profileData.portfolio.filter(project => project.id !== id);
                loadProfileData();
                showToast('Project deleted successfully', 'info');
                showSaveButton();
            }
        }

        // Resume
        function handleResumeUpload() {
            const fileInput = document.getElementById('resumeUpload');
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (file.size > 5 * 1024 * 1024) {
                    showToast('File size should be less than 5MB', 'error');
                    return;
                }
                showToast(`Selected: ${file.name}`, 'info');
            }
        }

        function updateResume() {
            const fileInput = document.getElementById('resumeUpload');
            if (fileInput.files.length === 0) {
                showToast('Please select a file first', 'warning');
                return;
            }
            
            const file = fileInput.files[0];
            profileData.resume.name = file.name;
            profileData.resume.size = `${(file.size / 1024).toFixed(0)} KB`;
            profileData.resume.updated = 'Just now';
            
            loadProfileData();
            bootstrap.Modal.getInstance(document.getElementById('resumeModal')).hide();
            showToast('Resume updated successfully!', 'success');
            showSaveButton();
        }

        // Avatar
        function handleAvatarUpload(event) {
            const file = event.target.files[0];
            if (!file) return;
            
            if (!file.type.match('image.*')) {
                showToast('Please select an image file', 'error');
                return;
            }
            
            if (file.size > 5 * 1024 * 1024) {
                showToast('Image size should be less than 5MB', 'error');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                profileData.avatar = e.target.result;
                updateAvatarDisplay();
                showToast('Image preview updated', 'info');
            };
            reader.readAsDataURL(file);
        }

        function saveAvatar() {
            if (!profileData.avatar) {
                showToast('Please select an image first', 'warning');
                return;
            }
            
            bootstrap.Modal.getInstance(document.getElementById('avatarModal')).hide();
            showToast('Profile picture updated successfully!', 'success');
            showSaveButton();
        }

        function viewResume() {
            showToast('Opening resume viewer...', 'info');
        }

        // Quick actions
        function showQuickActions() {
            const actions = [
                { text: 'Edit Personal Info', action: () => openPersonalInfoModal() },
                { text: 'Add Experience', action: () => { openExperienceModal(); new bootstrap.Tab(document.querySelector('[data-bs-target="#addExperienceTab"]')).show(); } },
                { text: 'Add Education', action: () => { openEducationModal(); new bootstrap.Tab(document.querySelector('[data-bs-target="#addEducationTab"]')).show(); } },
                { text: 'Update Resume', action: () => openResumeModal() },
                { text: 'Save All Changes', action: () => saveAllChanges() }
            ];
            
            let message = 'Quick Actions:\n\n';
            actions.forEach((action, index) => {
                message += `${index + 1}. ${action.text}\n`;
            });
            message += '\nClick Save All Changes to save everything.';
            
            alert(message);
        }

        // Save all changes
        function saveAllChanges() {
            // In a real app, you would send data to server here
            console.log('Saving all changes:', profileData);
            
            // Simulate API call
            setTimeout(() => {
                showToast('All changes saved successfully!', 'success');
                hideSaveButton();
            }, 500);
        }

        function showSaveButton() {
            document.getElementById('saveAllBtn').style.display = 'flex';
        }

        function hideSaveButton() {
            document.getElementById('saveAllBtn').style.display = 'none';
        }

        // Toast notification
        function showToast(message, type = 'info') {
            const toastContainer = document.querySelector('.toast-container');
            const toastId = 'toast-' + Date.now();
            
            const icon = {
                success: 'fas fa-check-circle',
                error: 'fas fa-times-circle',
                warning: 'fas fa-exclamation-triangle',
                info: 'fas fa-info-circle'
            }[type] || 'fas fa-info-circle';
            
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-bg-${type === 'error' ? 'danger' : type} border-0`;
            toast.id = toastId;
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="${icon} me-2"></i>${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            `;
            
            toastContainer.appendChild(toast);
            
            const bsToast = new bootstrap.Toast(toast, { delay: 3000 });
            bsToast.show();
            
            toast.addEventListener('hidden.bs.toast', function () {
                toast.remove();
            });
                // Calculate profile completion percentage
    function calculateProfileCompletion() {
        let score = 0;
        const totalFields = 10;
        
        // Check each required field
        if (profileData.name && profileData.name !== 'John Smith') score++;
        if (profileData.email && profileData.email !== 'john.smith@example.com') score++;
        if (profileData.phone && profileData.phone.trim()) score++;
        if (profileData.jobTitle && profileData.jobTitle.trim()) score++;
        if (profileData.location && profileData.location.trim()) score++;
        if (profileData.avatar) score++;
        if (profileData.skills.length >= 3) score++;
        if (profileData.workExperience.length > 0) score++;
        if (profileData.education.length > 0) score++;
        if (profileData.resume.file) score++;
        
        const percentage = Math.round((score / totalFields) * 100);
        
        // Update UI
        document.getElementById('completionPercentage').textContent = percentage + '%';
        document.getElementById('completionProgress').style.width = percentage + '%';
        
        // Show/Hide resume actions
        const resumeActions = document.getElementById('resumeActions');
        const resumeStatus = document.getElementById('resumeStatus');
        
        if (percentage >= 80) {
            resumeActions.style.display = 'flex';
            resumeStatus.innerHTML = '<i class="fas fa-check-circle text-success"></i> Resume ready!';
        } else {
            resumeActions.style.display = 'none';
            resumeStatus.textContent = `Complete ${80 - percentage}% more to download resume`;
        }
        
        return percentage;
    }

    // Download generated resume
    async function downloadResume() {
        try {
            const response = await fetch('/api/generate-resume', {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/pdf'
                }
            });
            
            if (response.ok) {
                const blob = await response.blob();
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `Resume_${profileData.name.replace(/\s+/g, '_')}_${new Date().getFullYear()}.pdf`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
                
                showMessage("Resume downloaded successfully!", "success");
            }
        } catch (error) {
            showMessage("Error generating resume. Please try again.", "danger");
        }
    }

    // Preview resume
    async function previewResume() {
        try {
            const response = await fetch('/api/preview-resume', {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            
            if (response.ok) {
                const blob = await response.blob();
                const url = window.URL.createObjectURL(blob);
                window.open(url, '_blank');
            }
        } catch (error) {
            showMessage("Error previewing resume.", "danger");
        }
    }
        }
    </script>
@endsection