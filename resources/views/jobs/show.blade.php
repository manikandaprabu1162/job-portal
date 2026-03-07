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
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: #4361ee !important;
        }

        .navbar-brand span {
            color: #1e293b;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1.5rem;
            transition: color 0.3s ease;
        }

        .back-btn:hover {
            color: #4361ee;
        }

        .job-header {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .company-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4361ee, #3f37c9);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 600;
        }

        .job-title {
            font-weight: 700;
            font-size: 2rem;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .company-name {
            font-size: 1.2rem;
            color: #4361ee;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .salary-badge {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.2rem;
            display: inline-block;
        }

        .apply-btn {
            background: #4361ee;
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
            border: none;
            width: 100%;
        }

        .apply-btn:hover {
            background: #3f37c9;
            color: white;
            transform: translateY(-2px);
        }

        .info-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .info-title {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-title i {
            color: #4361ee;
            font-size: 1.2rem;
        }

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .meta-icon {
            width: 40px;
            height: 40px;
            background: #f0f4ff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4361ee;
        }

        .meta-label {
            font-size: 0.85rem;
            color: #64748b;
        }

        .meta-value {
            font-weight: 600;
            color: #1e293b;
        }

        .skill-tag {
            background: #f0f4ff;
            color: #4361ee;
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-block;
            margin: 0.25rem;
        }

        .related-job-card {
            background: white;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .related-job-card:hover {
            transform: translateX(5px);
            border-color: #4361ee;
        }

        .footer {
            background: white;
            padding: 2rem 0;
            margin-top: 3rem;
            border-top: 1px solid #e2e8f0;
        }

        @media (max-width: 768px) {
            .job-title {
                font-size: 1.5rem;
            }
            
            .job-header .row {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .job-header .col-auto.text-end {
                text-align: left !important;
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

    <div class="container py-4">
        {{-- Back Button --}}
        <a href="{{ route('jobs.index') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i> Back to Jobs
        </a>

        {{-- Job Header --}}
        <div class="job-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="company-logo">
                        {{ strtoupper(substr($job->company_name, 0, 2)) }}
                    </div>
                </div>
                <div class="col">
                    <h1 class="job-title">{{ $job->job_title }}</h1>
                    <div class="company-name">{{ $job->company_name }}</div>
                    
                    <div class="d-flex flex-wrap gap-3 mt-2">
                        <span class="text-muted">
                            <i class="bi bi-geo-alt"></i> {{ $job->location ?? 'Location not specified' }}
                        </span>
                        <span class="text-muted">
                            <i class="bi bi-clock"></i> {{ $job->job_type ?? 'Not specified' }}
                        </span>
                    </div>
                </div>
                <div class="col-auto text-end">
                    <div class="mb-3">
                        <span class="salary-badge">
                            <i class="bi bi-currency-rupee"></i> 
                            @if($job->min_salary && $job->max_salary)
                                {{ number_format($job->min_salary/100000, 1) }}L - {{ number_format($job->max_salary/100000, 1) }}L
                            @else
                                Not disclosed
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            {{-- Main Content --}}
            <div class="col-lg-8">
                {{-- Job Description --}}
                <div class="info-card">
                    <h5 class="info-title">
                        <i class="bi bi-file-text"></i>
                        Job Description
                    </h5>
                    <div class="text-muted" style="line-height: 1.8;">
                        {{ $job->job_description ?? 'No description provided.' }}
                    </div>
                </div>

                {{-- Requirements --}}
                @if($job->requirements)
                <div class="info-card">
                    <h5 class="info-title">
                        <i class="bi bi-list-check"></i>
                        Requirements
                    </h5>
                    <div class="text-muted" style="line-height: 1.8;">
                        {{ $job->requirements }}
                    </div>
                </div>
                @endif

                {{-- Skills --}}
                @if($job->skills_required)
                <div class="info-card">
                    <h5 class="info-title">
                        <i class="bi bi-code-square"></i>
                        Required Skills
                    </h5>
                    <div>
                        @foreach(explode(',', $job->skills_required) as $skill)
                            @if(trim($skill))
                                <span class="skill-tag">{{ trim($skill) }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                {{-- Apply Card --}}
                <div class="info-card">
                    <h5 class="info-title">
                        <i class="bi bi-send"></i>
                        Apply Now
                    </h5>
                    
                    @if($job->application_link)
                        <a href="{{ $job->application_link }}" target="_blank" class="apply-btn">
                            <i class="bi bi-box-arrow-up-right me-2"></i>
                            Apply on Company Website
                        </a>
                    @else
                        <button class="apply-btn" disabled>
                            <i class="bi bi-x-circle me-2"></i>
                            Application link not available
                        </button>
                    @endif
                </div>

                {{-- Job Overview --}}
                <div class="info-card">
                    <h5 class="info-title">
                        <i class="bi bi-info-circle"></i>
                        Job Overview
                    </h5>
                    
                    <div class="meta-grid">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="bi bi-calendar"></i>
                            </div>
                            <div>
                                <div class="meta-label">Posted Date</div>
                                <div class="meta-value">
                                    @if($job->posted_date)
                                        {{ $job->posted_date->format('d M, Y') }}
                                    @else
                                        Not specified
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="bi bi-calendar-x"></i>
                            </div>
                            <div>
                                <div class="meta-label">Expiry Date</div>
                                <div class="meta-value">
                                    @if($job->expiry_date)
                                        {{ $job->expiry_date->format('d M, Y') }}
                                    @else
                                        Not specified
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <div>
                                <div class="meta-label">Experience</div>
                                <div class="meta-value">{{ $job->experience_required ?? 'Fresher' }}</div>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="bi bi-building"></i>
                            </div>
                            <div>
                                <div class="meta-label">Work Mode</div>
                                <div class="meta-value">{{ $job->work_mode ?? 'Not specified' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Related Jobs --}}
                @if($relatedJobs->count() > 0)
                <div class="info-card">
                    <h5 class="info-title">
                        <i class="bi bi-briefcase"></i>
                        Similar Jobs
                    </h5>
                    
                    @foreach($relatedJobs as $related)
                        <div class="related-job-card" onclick="window.location.href='{{ route('jobs.show', $related->id) }}'">
                            <h6 class="fw-bold mb-1">{{ $related->job_title }}</h6>
                            <div class="text-muted small mb-2">{{ $related->company_name }}</div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted small">
                                    <i class="bi bi-geo-alt"></i> {{ $related->location ?? 'N/A' }}
                                </span>
                                <span class="text-primary small fw-bold">
                                    <i class="bi bi-currency-rupee"></i>
                                    @if($related->min_salary)
                                        {{ number_format($related->min_salary/100000, 1) }}L
                                    @endif
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
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