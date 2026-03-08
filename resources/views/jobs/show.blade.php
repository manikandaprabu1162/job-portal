<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->job_title }} at {{ $job->company_name }} - JobFinder</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f2f5;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: #4361ee !important;
        }

        .navbar-brand span {
            color: #1e293b;
        }

        .job-header {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .job-header-top {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .company-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4361ee, #3f37c9);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .job-title-section h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .company-info {
            color: #64748b;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.8rem;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e2e8f0;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .meta-label {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .meta-value {
            color: #1e293b;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .salary-badge {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            display: inline-block;
        }

        .job-content {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .job-description-section {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-title i {
            color: #4361ee;
            font-size: 1.5rem;
        }

        .description-content {
            color: #475569;
            line-height: 1.8;
            font-size: 1rem;
        }

        .description-content h2,
        .description-content h3 {
            color: #1e293b;
            margin-top: 1.5rem;
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .description-content p {
            margin-bottom: 1rem;
        }

        .description-content ul,
        .description-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .description-content li {
            margin-bottom: 0.5rem;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .apply-section {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 100px;
        }

        .apply-btn {
            background: #4361ee;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .apply-btn:hover {
            background: #3f37c9;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.2);
        }

        .quick-info {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        }

        .quick-info-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .quick-info-item:last-child {
            border-bottom: none;
        }

        .quick-info-icon {
            color: #4361ee;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .quick-info-text {
            flex: 1;
        }

        .quick-info-label {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .quick-info-value {
            color: #1e293b;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .footer {
            background: white;
            padding: 2rem 0;
            margin-top: 3rem;
            border-top: 1px solid #e2e8f0;
        }

        @media (max-width: 768px) {
            .job-content {
                grid-template-columns: 1fr;
            }

            .apply-section {
                position: static;
            }

            .job-header-top {
                flex-direction: column;
            }

            .job-meta {
                flex-direction: column;
                gap: 1rem;
            }

            .job-title-section h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Job<span>Finder</span></a>
        </div>
    </nav>

    <div class="container" style="padding: 2rem 0;">
        {{-- Job Header --}}
        <div class="job-header">
            <div class="job-header-top">
                <div class="company-logo">{{ substr($job->company_name, 0, 1) }}</div>
                <div class="job-title-section">
                    <h1>{{ $job->job_title }}</h1>
                    <div class="company-info">
                        <i class="bi bi-building"></i>
                        {{ $job->company_name }}
                    </div>
                </div>
            </div>

            <div class="job-meta">
                @if($job->min_salary || $job->max_salary)
                    <div class="meta-item">
                        <span class="salary-badge">{{ $job->formatted_salary }}</span>
                    </div>
                @endif

                @if($job->location)
                    <div class="meta-item">
                        <i class="bi bi-geo-alt" style="color: #4361ee; font-size: 1.3rem;"></i>
                        <div>
                            <div class="meta-label">Location</div>
                            <div class="meta-value">{{ $job->location }}</div>
                        </div>
                    </div>
                @endif

                @if($job->job_type)
                    <div class="meta-item">
                        <i class="bi bi-briefcase" style="color: #4361ee; font-size: 1.3rem;"></i>
                        <div>
                            <div class="meta-label">Job Type</div>
                            <div class="meta-value">{{ $job->job_type }}</div>
                        </div>
                    </div>
                @endif

                @if($job->work_mode)
                    <div class="meta-item">
                        <i class="bi bi-laptop" style="color: #4361ee; font-size: 1.3rem;"></i>
                        <div>
                            <div class="meta-label">Work Mode</div>
                            <div class="meta-value">{{ $job->work_mode }}</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Main Content --}}
        <div class="job-content">
            <div>
                {{-- Job Description --}}
                @if($job->job_description)
                    <div class="job-description-section">
                        <div class="section-title">
                            <i class="bi bi-file-text"></i>
                            Job Description
                        </div>
                        <div class="description-content">
                            {!! $job->job_description !!}
                        </div>
                    </div>
                @endif

                {{-- Requirements --}}
                @if($job->requirements)
                    <div class="job-description-section" style="margin-top: 2rem;">
                        <div class="section-title">
                            <i class="bi bi-checklist"></i>
                            Requirements
                        </div>
                        <div class="description-content">
                            {!! nl2br(e($job->requirements)) !!}
                        </div>
                    </div>
                @endif

                {{-- Skills Required --}}
                @if($job->skills_required)
                    <div class="job-description-section" style="margin-top: 2rem;">
                        <div class="section-title">
                            <i class="bi bi-star"></i>
                            Skills Required
                        </div>
                        <div class="description-content">
                            @php
                                $skills = array_filter(array_map('trim', explode(',', $job->skills_required)));
                            @endphp
                            @if(!empty($skills))
                                <div style="display: flex; flex-wrap: wrap; gap: 0.8rem;">
                                    @foreach($skills as $skill)
                                        <span style="background: #f0f4ff; color: #4361ee; padding: 0.5rem 1rem; border-radius: 30px; font-weight: 600; font-size: 0.9rem;">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="sidebar">
                <div class="apply-section">
                    @if($job->application_link)
                        <a href="{{ $job->application_link }}" target="_blank" class="apply-btn">
                            <i class="bi bi-box-arrow-up-right"></i> Apply Now
                        </a>
                    @else
                        <button class="apply-btn" disabled style="opacity: 0.5; cursor: not-allowed;">
                            Application Link Coming Soon
                        </button>
                    @endif
                </div>

                <div class="quick-info">
                    @if($job->experience_required)
                        <div class="quick-info-item">
                            <div class="quick-info-icon"><i class="bi bi-graph-up"></i></div>
                            <div class="quick-info-text">
                                <div class="quick-info-label">Experience</div>
                                <div class="quick-info-value">{{ $job->experience_required }}</div>
                            </div>
                        </div>
                    @endif

                    @if($job->posted_date)
                        <div class="quick-info-item">
                            <div class="quick-info-icon"><i class="bi bi-calendar3"></i></div>
                            <div class="quick-info-text">
                                <div class="quick-info-label">Posted</div>
                                <div class="quick-info-value">{{ $job->posted_date->format('d M Y') }}</div>
                            </div>
                        </div>
                    @endif

                    @if($job->expiry_date)
                        <div class="quick-info-item">
                            <div class="quick-info-icon"><i class="bi bi-clock"></i></div>
                            <div class="quick-info-text">
                                <div class="quick-info-label">Expires</div>
                                <div class="quick-info-value">{{ $job->expiry_date->format('d M Y') }}</div>
                            </div>
                        </div>
                    @endif

                    @if($job->vacancies)
                        <div class="quick-info-item">
                            <div class="quick-info-icon"><i class="bi bi-people"></i></div>
                            <div class="quick-info-text">
                                <div class="quick-info-label">Vacancies</div>
                                <div class="quick-info-value">{{ $job->vacancies }}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div style="text-align: center; margin: 2rem 0;">
            <a href="{{ route('home') }}" class="apply-btn" style="display: inline-block; width: auto; padding: 0.8rem 2rem;">
                <i class="bi bi-arrow-left"></i> Back to Jobs
            </a>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container text-center text-muted">
            <small>&copy; {{ date('Y') }} JobFinder. All rights reserved.</small>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>