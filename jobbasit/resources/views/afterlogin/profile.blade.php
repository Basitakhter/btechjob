@extends('layouts.header')
@section('title','My Profile')
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
        
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
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
            padding: 30px;
            text-align: center;
            position: relative;
        }
        
        .avatar-container {
            position: relative;
            display: inline-block;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: 600;
            margin: 0 auto 15px;
            overflow: hidden;
        }
        
        .avatar-edit {
            position: absolute;
            bottom: 10px;
            right: 0;
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
        }
        
        .profile-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .profile-title {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }
        
        .profile-location {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.95rem;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            padding: 20px;
            background: white;
            border-bottom: 1px solid var(--gray-200);
        }
        
        .stat-item {
            text-align: center;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .stat-item:hover {
            background: var(--gray-100);
            transform: translateY(-3px);
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
        
        .profile-content {
            padding: 30px;
        }
        
        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        }
        
        .edit-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(29, 78, 216, 0.2);
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .info-item {
            margin-bottom: 15px;
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
            padding: 8px 0;
            border-bottom: 1px solid var(--gray-200);
        }
        
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        
        .skill-tag {
            background: var(--primary-light);
            color: var(--primary);
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .skill-remove {
            cursor: pointer;
            font-size: 0.8rem;
            opacity: 0.7;
        }
        
        .skill-remove:hover {
            opacity: 1;
        }
        
        .timeline {
            position: relative;
            padding-left: 30px;
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
        
        .timeline-item {
            position: relative;
            margin-bottom: 25px;
            padding: 15px;
            background: white;
            border-radius: 8px;
            border: 1px solid var(--gray-200);
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
        
        .timeline-date {
            font-size: 0.85rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .timeline-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 5px;
        }
        
        .timeline-subtitle {
            font-size: 0.95rem;
            color: var(--gray-700);
            margin-bottom: 10px;
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
        }
        
        .resume-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .resume-icon {
            width: 50px;
            height: 50px;
            background: white;
            color: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .resume-details h5 {
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .resume-details p {
            color: var(--gray-700);
            font-size: 0.9rem;
            margin: 0;
        }
        
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }
        
        .portfolio-item {
            background: white;
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--gray-200);
            transition: all 0.3s;
        }
        
        .portfolio-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .portfolio-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        
        .portfolio-title {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .portfolio-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .portfolio-link:hover {
            text-decoration: underline;
        }
        
        .certification-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .certification-item {
            background: white;
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .certification-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            flex-shrink: 0;
        }
        
        .certification-info h6 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .certification-info p {
            color: var(--gray-700);
            font-size: 0.9rem;
            margin: 0;
        }
        
        /* Modal Styles */
        .modal-custom {
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
            max-width: 600px;
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
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--gray-700);
        }
        
        .form-control {
            width: 100%;
            padding: 10px 15px;
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
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .modal-footer {
            padding: 20px;
            border-top: 1px solid var(--gray-200);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: #1d4ed8;
        }
        
        .btn-secondary {
            background: var(--gray-300);
            color: var(--gray-900);
        }
        
        .btn-secondary:hover {
            background: var(--gray-400);
        }
        
        /* Tabs in Modal */
        .modal-tabs {
            display: flex;
            border-bottom: 1px solid var(--gray-200);
            margin-bottom: 20px;
        }
        
        .tab-btn {
            padding: 12px 20px;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-weight: 500;
            color: var(--gray-700);
            transition: all 0.2s;
        }
        
        .tab-btn.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
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
        }
        
        @media (max-width: 768px) {
            .profile-container {
                padding: 10px;
            }
            
            .profile-header {
                padding: 20px;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .profile-content {
                padding: 20px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .portfolio-grid, .certification-grid {
                grid-template-columns: 1fr;
            }
            
            .save-all-btn {
                bottom: 20px;
                right: 20px;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-card">
            <div class="profile-header">
                <div class="avatar-container">
                    <div class="profile-avatar" id="avatarDisplay">
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
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-value" id="statApplied">24</div>
                    <div class="stat-label">Jobs Applied</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="statSaved">12</div>
                    <div class="stat-label">Jobs Saved</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="statProfileViews">156</div>
                    <div class="stat-label">Profile Views</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="statResumeViews">89</div>
                    <div class="stat-label">Resume Views</div>
                </div>
            </div>
            
            <!-- Profile Content -->
            <div class="profile-content">
                <!-- Personal Information -->
                <div class="section mb-4">
                    <div class="section-title">
                        Personal Information
                        <button class="edit-btn" onclick="openPersonalInfoModal()">
                            <i class="fas fa-edit"></i> Edit Information
                        </button>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Full Name</div>
                            <div class="info-value" id="infoName">John Smith</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email Address</div>
                            <div class="info-value" id="infoEmail">john.smith@example.com</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value" id="infoPhone">+1 (555) 123-4567</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Job Title</div>
                            <div class="info-value" id="infoJobTitle"></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Location</div>
                            <div class="info-value" id="infoLocation"></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Experience</div>
                            <div class="info-value" id="infoExperience">8+ Years</div>
                        </div>
                    </div>
                </div>
                
                <!-- Skills Section -->
                <div class="section mb-4">
                    <div class="section-title">
                        Skills & Expertise
                        <button class="edit-btn" onclick="openSkillsModal()">
                            <i class="fas fa-plus"></i> Add/Edit Skills
                        </button>
                    </div>
                    <div class="skills-container" id="skillsList">
                        <!-- Skills will be loaded here -->
                    </div>
                </div>
                
                <!-- Resume Section -->
                <div class="section mb-4">
                    <div class="section-title">
                        Resume / CV
                        <button class="edit-btn" onclick="openResumeModal()">
                            <i class="fas fa-upload"></i> Update Resume
                        </button>
                    </div>
                    <div class="resume-card">
                        <div class="resume-info">
                            <div class="resume-icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div class="resume-details">
                                <h5 id="resumeName">John_Smith_Resume_2025.pdf</h5>
                                <p id="resumeDetails">Updated 2 weeks ago • 245 KB</p>
                            </div>
                        </div>
                        <button class="btn btn-primary" onclick="viewResume()">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </div>
                </div>
                
                <!-- Experience Section -->
                <div class="section mb-4">
                    <div class="section-title">
                        Work Experience
                        <button class="edit-btn" onclick="openExperienceModal()">
                            <i class="fas fa-plus"></i> Add Experience
                        </button>
                    </div>
                    <div class="timeline" id="experienceList">
                        <!-- Experience items will be loaded here -->
                    </div>
                </div>
                
                <!-- Education Section -->
                <div class="section mb-4">
                    <div class="section-title">
                        Education
                        <button class="edit-btn" onclick="openEducationModal()">
                            <i class="fas fa-plus"></i> Add Education
                        </button>
                    </div>
                    <div class="timeline" id="educationList">
                        <!-- Education items will be loaded here -->
                    </div>
                </div>
                
                <!-- Certifications Section -->
                <div class="section mb-4">
                    <div class="section-title">
                        Certifications
                        <button class="edit-btn" onclick="openCertificationsModal()">
                            <i class="fas fa-plus"></i> Add Certification
                        </button>
                    </div>
                    <div class="certification-grid" id="certificationsList">
                        <!-- Certifications will be loaded here -->
                    </div>
                </div>
                
                <!-- Portfolio Section -->
                <div class="section">
                    <div class="section-title">
                        Portfolio & Projects
                        <button class="edit-btn" onclick="openPortfolioModal()">
                            <i class="fas fa-plus"></i> Add Project
                        </button>
                    </div>
                    <div class="portfolio-grid" id="portfolioList">
                        <!-- Portfolio items will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Save All Changes Button -->
        <button class="save-all-btn" id="saveAllBtn" onclick="saveAllChanges()">
            <i class="fas fa-save"></i> Save All Changes
        </button>
        
        <!-- Personal Information Modal -->
        <div class="modal-custom" id="personalInfoModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Edit Personal Information</h3>
                    <button class="modal-close" onclick="closeModal('personalInfoModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="modalName" value="John Smith">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="modalEmail" value="john.smith@example.com">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="modalPhone" value="+1 (555) 123-4567">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="modalJobTitle" value="Senior Software Engineer">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="modalLocation" value="San Francisco, California">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Experience</label>
                            <input type="text" class="form-control" id="modalExperience" value="8+ Years">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('personalInfoModal')">Cancel</button>
                    <button class="btn btn-primary" onclick="savePersonalInfo()">Save Changes</button>
                </div>
            </div>
        </div>
        
        <!-- Skills Modal -->
        <div class="modal-custom" id="skillsModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Manage Skills</h3>
                    <button class="modal-close" onclick="closeModal('skillsModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Add New Skill</label>
                        <div class="form-row">
                            <input type="text" class="form-control" id="newSkillInput" placeholder="Enter a skill">
                            <button class="btn btn-primary" onclick="addNewSkill()">Add</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Your Skills</label>
                        <div class="skills-container" id="modalSkillsList">
                            <!-- Skills for editing -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('skillsModal')">Cancel</button>
                    <button class="btn btn-primary" onclick="saveSkills()">Save Skills</button>
                </div>
            </div>
        </div>
        
        <!-- Experience Modal -->
        <div class="modal-custom" id="experienceModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Work Experience</h3>
                    <button class="modal-close" onclick="closeModal('experienceModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="modal-tabs">
                        <button class="tab-btn active" onclick="switchTab('addExperienceTab')">Add New</button>
                        <button class="tab-btn" onclick="switchTab('manageExperienceTab')">Manage</button>
                    </div>
                    
                    <div id="addExperienceTab" class="tab-content active">
                        <div class="form-group">
                            <label class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="expTitle" placeholder="Senior Software Engineer">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" id="expCompany" placeholder="TechCorp Inc.">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Start Date</label>
                                <input type="text" class="form-control" id="expStartDate" placeholder="2021">
                            </div>
                            <div class="form-group">
                                <label class="form-label">End Date</label>
                                <input type="text" class="form-control" id="expEndDate" placeholder="Present">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="expLocation" placeholder="San Francisco, CA">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="expDescription" rows="4" placeholder="Describe your responsibilities and achievements"></textarea>
                        </div>
                        <button class="btn btn-primary w-100" onclick="addExperience()">Add Experience</button>
                    </div>
                    
                    <div id="manageExperienceTab" class="tab-content">
                        <div id="experienceEditList">
                            <!-- Experience items for editing -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('experienceModal')">Done</button>
                </div>
            </div>
        </div>
        
        <!-- Education Modal -->
        <div class="modal-custom" id="educationModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Education</h3>
                    <button class="modal-close" onclick="closeModal('educationModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="modal-tabs">
                        <button class="tab-btn active" onclick="switchTab('addEducationTab')">Add New</button>
                        <button class="tab-btn" onclick="switchTab('manageEducationTab')">Manage</button>
                    </div>
                    
                    <div id="addEducationTab" class="tab-content active">
                        <div class="form-group">
                            <label class="form-label">Degree/Certificate</label>
                            <input type="text" class="form-control" id="eduDegree" placeholder="Master of Science in Computer Science">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Institution</label>
                            <input type="text" class="form-control" id="eduInstitution" placeholder="Stanford University">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Start Year</label>
                                <input type="text" class="form-control" id="eduStartYear" placeholder="2014">
                            </div>
                            <div class="form-group">
                                <label class="form-label">End Year</label>
                                <input type="text" class="form-control" id="eduEndYear" placeholder="2018">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="eduLocation" placeholder="California, USA">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="eduDescription" rows="4" placeholder="Details about your education"></textarea>
                        </div>
                        <button class="btn btn-primary w-100" onclick="addEducation()">Add Education</button>
                    </div>
                    
                    <div id="manageEducationTab" class="tab-content">
                        <div id="educationEditList">
                            <!-- Education items for editing -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('educationModal')">Done</button>
                </div>
            </div>
        </div>
        
        <!-- Certifications Modal -->
        <div class="modal-custom" id="certificationsModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Certifications</h3>
                    <button class="modal-close" onclick="closeModal('certificationsModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Certificate Name</label>
                        <input type="text" class="form-control" id="certName" placeholder="AWS Certified Solutions Architect">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Issuing Organization</label>
                        <input type="text" class="form-control" id="certOrg" placeholder="Amazon Web Services">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Issue Date</label>
                            <input type="text" class="form-control" id="certIssueDate" placeholder="June 2023">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Expiration Date</label>
                            <input type="text" class="form-control" id="certExpiryDate" placeholder="June 2025">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Credential ID (Optional)</label>
                        <input type="text" class="form-control" id="certId" placeholder="ABC123XYZ">
                    </div>
                    <button class="btn btn-primary w-100" onclick="addCertification()">Add Certification</button>
                    
                    <div class="mt-4" id="certificationsEditList">
                        <!-- Certifications for editing -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('certificationsModal')">Done</button>
                </div>
            </div>
        </div>
        
        <!-- Portfolio Modal -->
        <div class="modal-custom" id="portfolioModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Portfolio Projects</h3>
                    <button class="modal-close" onclick="closeModal('portfolioModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Project Title</label>
                        <input type="text" class="form-control" id="projectTitle" placeholder="E-commerce Platform">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="projectDescription" rows="3" placeholder="Brief description of the project"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Project URL/Link</label>
                        <input type="text" class="form-control" id="projectUrl" placeholder="https://github.com/yourusername/project">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Technologies Used</label>
                        <input type="text" class="form-control" id="projectTech" placeholder="React, Node.js, MongoDB">
                    </div>
                    <button class="btn btn-primary w-100" onclick="addProject()">Add Project</button>
                    
                    <div class="mt-4" id="portfolioEditList">
                        <!-- Portfolio items for editing -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('portfolioModal')">Done</button>
                </div>
            </div>
        </div>
        
        <!-- Resume Modal -->
        <div class="modal-custom" id="resumeModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Resume/CV</h3>
                    <button class="modal-close" onclick="closeModal('resumeModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Current Resume</label>
                        <div class="resume-card">
                            <div class="resume-info">
                                <div class="resume-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="resume-details">
                                    <h5 id="currentResumeName">John_Smith_Resume_2025.pdf</h5>
                                    <p id="currentResumeDetails">Updated 2 weeks ago • 245 KB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Upload New Resume</label>
                        <div style="border: 2px dashed var(--gray-300); border-radius: 8px; padding: 30px; text-align: center;">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 3rem; color: var(--primary); margin-bottom: 15px;"></i>
                            <p>Drag and drop your resume file here or</p>
                            <input type="file" id="resumeUpload" class="d-none" accept=".pdf,.doc,.docx,.txt">
                            <button class="btn btn-primary" onclick="document.getElementById('resumeUpload').click()">
                                <i class="fas fa-upload"></i> Browse Files
                            </button>
                            <p class="text-muted mt-2">Supported formats: PDF, DOC, DOCX, TXT (Max 5MB)</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('resumeModal')">Cancel</button>
                    <button class="btn btn-primary" onclick="updateResume()">Update Resume</button>
                </div>
            </div>
        </div>
        
        <!-- Avatar Modal -->
        <div class="modal-custom" id="avatarModal">
            <div class="modal-content" style="max-width: 400px;">
                <div class="modal-header">
                    <h3>Update Profile Picture</h3>
                    <button class="modal-close" onclick="closeModal('avatarModal')">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <div class="profile-avatar mx-auto mb-3" style="width: 150px; height: 150px; font-size: 4rem;" id="avatarPreview">
                        JS
                    </div>
                    <input type="file" id="avatarUpload" class="d-none" accept="image/*" onchange="previewAvatar(event)">
                    <button class="btn btn-primary mb-3" onclick="document.getElementById('avatarUpload').click()">
                        <i class="fas fa-upload"></i> Choose Image
                    </button>
                    <p class="text-muted">Recommended: Square image, 400x400px or larger</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="closeModal('avatarModal')">Cancel</button>
                    <button class="btn btn-primary" onclick="saveAvatar()">Save Picture</button>
                </div>
            </div>
        </div>
    </div>

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
                    description: "Leading a team of developers to build scalable web applications. Implemented microservices architecture that improved performance by 40%."
                },
                {
                    id: 2,
                    title: "Full Stack Developer",
                    company: "Digital Solutions",
                    startDate: "2018",
                    endDate: "2021",
                    location: "New York, NY",
                    description: "Developed and maintained multiple client projects using React, Node.js, and MongoDB. Improved application loading time by 60%."
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
                    description: "Graduated with honors. Specialized in Artificial Intelligence and Web Technologies."
                },
                {
                    id: 2,
                    degree: "Bachelor of Computer Engineering",
                    institution: "MIT",
                    startYear: "2010",
                    endYear: "2014",
                    location: "Massachusetts, USA",
                    description: "Graduated magna cum laude. President of Computer Science Club."
                }
            ],
            certifications: [
                {
                    id: 1,
                    name: "AWS Certified Solutions Architect",
                    organization: "Amazon Web Services",
                    issueDate: "June 2023",
                    expiryDate: "June 2025",
                    credentialId: "AWS12345"
                },
                {
                    id: 2,
                    name: "Google Cloud Professional",
                    organization: "Google Cloud",
                    issueDate: "March 2023",
                    expiryDate: "March 2025",
                    credentialId: "GCP78901"
                }
            ],
            portfolio: [
                {
                    id: 1,
                    title: "E-commerce Platform",
                    description: "Full-stack e-commerce platform with React frontend and Node.js backend",
                    url: "https://github.com/johnsmith/ecommerce",
                    technologies: "React, Node.js, MongoDB, Stripe API"
                },
                {
                    id: 2,
                    title: "Task Management App",
                    description: "Collaborative task management application with real-time updates",
                    url: "https://github.com/johnsmith/taskmanager",
                    technologies: "Vue.js, Firebase, Express.js"
                }
            ],
            stats: {
                applied: 24,
                saved: 12,
                profileViews: 156,
                resumeViews: 89
            }
        };

        let changesMade = false;

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            loadProfileData();
            showSaveButton();
        });

        // Load all profile data
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
            
            // Stats
            document.getElementById('statApplied').textContent = profileData.stats.applied;
            document.getElementById('statSaved').textContent = profileData.stats.saved;
            document.getElementById('statProfileViews').textContent = profileData.stats.profileViews;
            document.getElementById('statResumeViews').textContent = profileData.stats.resumeViews;
            
            // Load dynamic sections
            renderSkills();
            renderExperience();
            renderEducation();
            renderCertifications();
            renderPortfolio();
        }

        // Render skills
        function renderSkills() {
            const skillsList = document.getElementById('skillsList');
            skillsList.innerHTML = '';
            
            profileData.skills.forEach(skill => {
                const skillTag = document.createElement('div');
                skillTag.className = 'skill-tag';
                skillTag.innerHTML = `
                    ${skill}
                    <span class="skill-remove" onclick="removeSkill('${skill}')">
                        <i class="fas fa-times"></i>
                    </span>
                `;
                skillsList.appendChild(skillTag);
            });
        }

        // Render experience
        function renderExperience() {
            const experienceList = document.getElementById('experienceList');
            experienceList.innerHTML = '';
            
            profileData.workExperience.forEach(exp => {
                const item = document.createElement('div');
                item.className = 'timeline-item';
                item.innerHTML = `
                    <div class="timeline-date">${exp.startDate} - ${exp.endDate}</div>
                    <div class="timeline-title">${exp.title}</div>
                    <div class="timeline-subtitle">${exp.company}, ${exp.location}</div>
                    <p>${exp.description}</p>
                `;
                experienceList.appendChild(item);
            });
        }

        // Render education
        function renderEducation() {
            const educationList = document.getElementById('educationList');
            educationList.innerHTML = '';
            
            profileData.education.forEach(edu => {
                const item = document.createElement('div');
                item.className = 'timeline-item';
                item.innerHTML = `
                    <div class="timeline-date">${edu.startYear} - ${edu.endYear}</div>
                    <div class="timeline-title">${edu.degree}</div>
                    <div class="timeline-subtitle">${edu.institution}, ${edu.location}</div>
                    <p>${edu.description}</p>
                `;
                educationList.appendChild(item);
            });
        }

        // Render certifications
        function renderCertifications() {
            const certificationsList = document.getElementById('certificationsList');
            certificationsList.innerHTML = '';
            
            profileData.certifications.forEach(cert => {
                const item = document.createElement('div');
                item.className = 'certification-item';
                item.innerHTML = `
                    <div class="certification-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="certification-info">
                        <h6>${cert.name}</h6>
                        <p>${cert.organization} • Issued ${cert.issueDate} ${cert.expiryDate ? `• Expires ${cert.expiryDate}` : ''}</p>
                        ${cert.credentialId ? `<small class="text-muted">ID: ${cert.credentialId}</small>` : ''}
                    </div>
                `;
                certificationsList.appendChild(item);
            });
        }

        // Render portfolio
        function renderPortfolio() {
            const portfolioList = document.getElementById('portfolioList');
            portfolioList.innerHTML = '';
            
            profileData.portfolio.forEach(project => {
                const item = document.createElement('div');
                item.className = 'portfolio-item';
                item.innerHTML = `
                    <div class="portfolio-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="portfolio-title">${project.title}</div>
                    <p class="text-muted mb-2">${project.description}</p>
                    <div class="mb-2">
                        <small class="text-muted">Tech: ${project.technologies}</small>
                    </div>
                    <a href="${project.url}" class="portfolio-link" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Project
                    </a>
                `;
                portfolioList.appendChild(item);
            });
        }

        // Modal Functions
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function openPersonalInfoModal() {
            // Load current data into modal
            document.getElementById('modalName').value = profileData.name;
            document.getElementById('modalEmail').value = profileData.email;
            document.getElementById('modalPhone').value = profileData.phone;
            document.getElementById('modalJobTitle').value = profileData.jobTitle;
            document.getElementById('modalLocation').value = profileData.location;
            document.getElementById('modalExperience').value = profileData.experience;
            
            openModal('personalInfoModal');
        }

        function savePersonalInfo() {
            // Update profile data
            profileData.name = document.getElementById('modalName').value;
            profileData.email = document.getElementById('modalEmail').value;
            profileData.phone = document.getElementById('modalPhone').value;
            profileData.jobTitle = document.getElementById('modalJobTitle').value;
            profileData.location = document.getElementById('modalLocation').value;
            profileData.experience = document.getElementById('modalExperience').value;
            
            // Update display
            loadProfileData();
            closeModal('personalInfoModal');
            showMessage("Personal information updated successfully!", "success");
            showSaveButton();
        }

        function openSkillsModal() {
            const modalSkillsList = document.getElementById('modalSkillsList');
            modalSkillsList.innerHTML = '';
            
            profileData.skills.forEach(skill => {
                const skillTag = document.createElement('div');
                skillTag.className = 'skill-tag';
                skillTag.innerHTML = `
                    ${skill}
                    <span class="skill-remove" onclick="removeSkillFromModal('${skill}')">
                        <i class="fas fa-times"></i>
                    </span>
                `;
                modalSkillsList.appendChild(skillTag);
            });
            
            openModal('skillsModal');
        }

        function addNewSkill() {
            const newSkillInput = document.getElementById('newSkillInput');
            const newSkill = newSkillInput.value.trim();
            
            if (newSkill && !profileData.skills.includes(newSkill)) {
                profileData.skills.push(newSkill);
                openSkillsModal(); // Reload modal
                newSkillInput.value = '';
                showMessage(`"${newSkill}" added to skills!`, "success");
            } else if (profileData.skills.includes(newSkill)) {
                showMessage("This skill already exists!", "warning");
            }
        }

        function removeSkillFromModal(skillToRemove) {
            profileData.skills = profileData.skills.filter(skill => skill !== skillToRemove);
            openSkillsModal(); // Reload modal
            showMessage(`Skill "${skillToRemove}" removed!`, "info");
        }

        function saveSkills() {
            renderSkills();
            closeModal('skillsModal');
            showMessage("Skills updated successfully!", "success");
            showSaveButton();
        }

        function removeSkill(skillToRemove) {
            if (confirm(`Remove "${skillToRemove}" from your skills?`)) {
                profileData.skills = profileData.skills.filter(skill => skill !== skillToRemove);
                renderSkills();
                showMessage(`Skill "${skillToRemove}" removed!`, "info");
                showSaveButton();
            }
        }

        function openExperienceModal() {
            // Render experience for editing
            const experienceEditList = document.getElementById('experienceEditList');
            experienceEditList.innerHTML = '';
            
            profileData.workExperience.forEach((exp, index) => {
                const item = document.createElement('div');
                item.className = 'timeline-item mb-3';
                item.innerHTML = `
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="timeline-date">${exp.startDate} - ${exp.endDate}</div>
                            <div class="timeline-title">${exp.title}</div>
                            <div class="timeline-subtitle">${exp.company}, ${exp.location}</div>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteExperience(${exp.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
                experienceEditList.appendChild(item);
            });
            
            openModal('experienceModal');
        }

        function switchTab(tabId) {
            // Remove active class from all tabs
            document.querySelectorAll('.tab-btn').forEach(tab => {
                tab.classList.remove('active');
            });
            
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Add active class to clicked tab
            event.target.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }

        function addExperience() {
            const newExp = {
                id: profileData.workExperience.length + 1,
                title: document.getElementById('expTitle').value || "New Position",
                company: document.getElementById('expCompany').value || "Company Name",
                startDate: document.getElementById('expStartDate').value || "2023",
                endDate: document.getElementById('expEndDate').value || "Present",
                location: document.getElementById('expLocation').value || "Location",
                description: document.getElementById('expDescription').value || "Description"
            };
            
            profileData.workExperience.unshift(newExp);
            
            // Clear form
            document.getElementById('expTitle').value = '';
            document.getElementById('expCompany').value = '';
            document.getElementById('expStartDate').value = '';
            document.getElementById('expEndDate').value = '';
            document.getElementById('expLocation').value = '';
            document.getElementById('expDescription').value = '';
            
            // Switch to manage tab
            switchTab('manageExperienceTab');
            openExperienceModal(); // Reload modal
            showMessage("Experience added successfully!", "success");
        }

        function deleteExperience(id) {
            if (confirm("Are you sure you want to delete this experience?")) {
                profileData.workExperience = profileData.workExperience.filter(exp => exp.id !== id);
                openExperienceModal(); // Reload modal
                showMessage("Experience deleted!", "info");
                showSaveButton();
            }
        }

        function openEducationModal() {
            openModal('educationModal');
        }

        function addEducation() {
            const newEdu = {
                id: profileData.education.length + 1,
                degree: document.getElementById('eduDegree').value || "New Degree",
                institution: document.getElementById('eduInstitution').value || "Institution Name",
                startYear: document.getElementById('eduStartYear').value || "2020",
                endYear: document.getElementById('eduEndYear').value || "2024",
                location: document.getElementById('eduLocation').value || "Location",
                description: document.getElementById('eduDescription').value || "Description"
            };
            
            profileData.education.unshift(newEdu);
            
            // Clear form
            document.getElementById('eduDegree').value = '';
            document.getElementById('eduInstitution').value = '';
            document.getElementById('eduStartYear').value = '';
            document.getElementById('eduEndYear').value = '';
            document.getElementById('eduLocation').value = '';
            document.getElementById('eduDescription').value = '';
            
            showMessage("Education added successfully!", "success");
            showSaveButton();
        }

        function openCertificationsModal() {
            openModal('certificationsModal');
        }

        function addCertification() {
            const newCert = {
                id: profileData.certifications.length + 1,
                name: document.getElementById('certName').value || "New Certification",
                organization: document.getElementById('certOrg').value || "Issuing Organization",
                issueDate: document.getElementById('certIssueDate').value || "2023",
                expiryDate: document.getElementById('certExpiryDate').value || "",
                credentialId: document.getElementById('certId').value || ""
            };
            
            profileData.certifications.push(newCert);
            
            // Clear form
            document.getElementById('certName').value = '';
            document.getElementById('certOrg').value = '';
            document.getElementById('certIssueDate').value = '';
            document.getElementById('certExpiryDate').value = '';
            document.getElementById('certId').value = '';
            
            showMessage("Certification added successfully!", "success");
            showSaveButton();
        }

        function openPortfolioModal() {
            openModal('portfolioModal');
        }

        function addProject() {
            const newProject = {
                id: profileData.portfolio.length + 1,
                title: document.getElementById('projectTitle').value || "New Project",
                description: document.getElementById('projectDescription').value || "Project description",
                url: document.getElementById('projectUrl').value || "#",
                technologies: document.getElementById('projectTech').value || "Technologies used"
            };
            
            profileData.portfolio.push(newProject);
            
            // Clear form
            document.getElementById('projectTitle').value = '';
            document.getElementById('projectDescription').value = '';
            document.getElementById('projectUrl').value = '';
            document.getElementById('projectTech').value = '';
            
            showMessage("Project added to portfolio!", "success");
            showSaveButton();
        }

        function openResumeModal() {
            openModal('resumeModal');
        }

        function updateResume() {
            const fileInput = document.getElementById('resumeUpload');
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                profileData.resume.name = file.name;
                profileData.resume.size = `${(file.size / 1024).toFixed(0)} KB`;
                profileData.resume.updated = "Just now";
                
                loadProfileData();
                closeModal('resumeModal');
                showMessage("Resume updated successfully!", "success");
                showSaveButton();
            } else {
                showMessage("Please select a file first.", "warning");
            }
        }

        function openAvatarModal() {
            openModal('avatarModal');
        }

        function previewAvatar(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatarPreview = document.getElementById('avatarPreview');
                    avatarPreview.innerHTML = `<img src="${e.target.result}" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">`;
                };
                reader.readAsDataURL(file);
            }
        }

        function saveAvatar() {
            showMessage("Profile picture updated!", "success");
            closeModal('avatarModal');
            showSaveButton();
        }

        function viewResume() {
            showMessage("Opening resume viewer...", "info");
        }

        // Save all changes
        function saveAllChanges() {
            // In a real application, send data to server here
            console.log("Saving profile data:", profileData);
            
            // Show success message
            showMessage("All changes saved successfully!", "success");
            
            // Hide save button
            hideSaveButton();
        }

        function showSaveButton() {
            changesMade = true;
            document.getElementById('saveAllBtn').style.display = 'flex';
        }

        function hideSaveButton() {
            changesMade = false;
            document.getElementById('saveAllBtn').style.display = 'none';
        }

        // Show message function
        function showMessage(text, type) {
            // Create message element
            const message = document.createElement('div');
            message.className = `alert alert-${type} position-fixed`;
            message.style.cssText = `
                top: 20px;
                right: 20px;
                z-index: 9999;
                min-width: 300px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                animation: slideIn 0.3s ease;
            `;
            message.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
                    <span>${text}</span>
                </div>
            `;
            
            document.body.appendChild(message);
            
            // Remove message after 3 seconds
            setTimeout(() => {
                message.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(message);
                }, 300);
            }, 3000);
        }

        // Add CSS for animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    </script>

@endsection