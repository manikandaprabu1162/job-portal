<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobFinder - Find Your Dream Job</title>
    
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

        /* Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
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

        .nav-link {
            font-weight: 500;
            color: #1e293b !important;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #4361ee !important;
        }

        /* Main Content */
        .main-content {
            padding: 2rem 0;
        }

        /* Search Section */
        .search-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .search-title {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #1e293b;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            z-index: 10;
        }

        .search-box input,
        .search-box select {
            padding-left: 45px;
            height: 55px;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-box input:focus,
        .search-box select:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
            outline: none;
        }

        .search-btn {
            background: #4361ee;
            color: white;
            border: none;
            height: 55px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: #3f37c9;
            transform: translateY(-2px);
        }

        /* Filter Chips */
        .filter-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-top: 1.5rem;
        }

        .filter-chip {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 30px;
            padding: 0.6rem 1.2rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #64748b;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-chip:hover,
        .filter-chip.active {
            background: #4361ee;
            color: white;
            border-color: #4361ee;
        }

        .filter-chip i {
            font-size: 1rem;
        }

        /* Results Header */
        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .job-count {
            background: white;
            padding: 0.7rem 1.5rem;
            border-radius: 30px;
            font-weight: 500;
            color: #1e293b;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .job-count i {
            color: #4361ee;
            margin-right: 0.5rem;
        }

        .sort-select {
            padding: 0.7rem 2rem 0.7rem 1.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 30px;
            font-weight: 500;
            color: #1e293b;
            background: white;
            cursor: pointer;
            font-size: 0.95rem;
        }

        /* Job Cards */
        .job-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .job-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 30px rgba(0,0,0,0.1);
            border-color: #4361ee;
        }

        .job-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: #4361ee;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .job-card:hover::before {
            transform: scaleY(1);
        }

        .company-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4361ee, #3f37c9);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .job-title {
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 0.3rem;
            color: #1e293b;
        }

        .company-name {
            color: #64748b;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.8rem;
        }

        .job-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin: 1rem 0;
        }

        .job-tag {
            background: #f0f4ff;
            color: #4361ee;
            padding: 0.4rem 1rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .salary-badge {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-block;
            white-space: nowrap;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #64748b;
            font-size: 0.9rem;
        }

        .meta-item i {
            color: #4361ee;
        }

        /* No Results */
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
        }

        .no-results i {
            font-size: 4rem;
            color: #cbd5e1;
        }

        .no-results h3 {
            margin: 1rem 0;
            color: #1e293b;
        }

        .no-results p {
            color: #64748b;
            margin-bottom: 2rem;
        }

        .clear-btn {
            background: #4361ee;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .clear-btn:hover {
            background: #3f37c9;
            color: white;
        }
/
        .custom-pagination {
            gap: 5px;
        }

        .custom-pagination .page-item .page-link {
            border: none;
            padding: 0.5rem 1rem;
            margin: 0;
            border-radius: 8px;
            color: #64748b;
            font-weight: 500;
            font-size: 0.9rem;
            min-width: 40px;
            text-align: center;
            background: white;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .custom-pagination .page-item .page-link:hover {
            background: #4361ee;
            color: white;
            border-color: #4361ee;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.2);
        }

        .custom-pagination .page-item.active .page-link {
            background: #4361ee;
            color: white;
            border-color: #4361ee;
            font-weight: 600;
        }

        .custom-pagination .page-item.disabled .page-link {
            background: #f1f5f9;
            color: #94a3b8;
            border-color: #e2e8f0;
            pointer-events: none;
        }

        /* Responsive pagination */
        @media (max-width: 768px) {
            .custom-pagination .page-item .page-link {
                padding: 0.4rem 0.8rem;
                min-width: 35px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .custom-pagination {
                gap: 3px;
            }
            
            .custom-pagination .page-item .page-link {
                padding: 0.3rem 0.6rem;
                min-width: 32px;
                font-size: 0.8rem;
            }
        }

        .page-item.active .page-link {
            background: #4361ee;
            color: white;
        }

        .page-item.disabled .page-link {
            background: #f1f5f9;
            color: #94a3b8;
        }

        /* Footer */
        .footer {
            background: white;
            padding: 2rem 0;
            margin-top: 3rem;
            border-top: 1px solid #e2e8f0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .company-logo {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .job-title {
                font-size: 1.1rem;
            }

            .job-meta {
                gap: 1rem;
            }

            .salary-badge {
                font-size: 0.9rem;
                padding: 0.4rem 1rem;
            }

            .results-header {
                flex-direction: column;
                align-items: stretch;
            }

            .job-card .row {
                flex-direction: column;
                gap: 1rem;
            }

            .job-card .col-auto.text-end {
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
            <div class="d-flex">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link {{ request()->routeIs('jobs.index') ? 'active' : '' }}" href="{{ route('jobs.index') }}">Jobs</a>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="main-content">
        <div class="container">
            {{-- Search Section --}}
            <div class="search-section">
                <h2 class="search-title">Find Your Dream Job</h2>
                
                <form action="{{ route('jobs.index') }}" method="GET" id="searchForm">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <div class="search-box">
                                <i class="bi bi-search"></i>
                                <input type="text" 
                                       name="search" 
                                       class="form-control" 
                                       placeholder="Job title, keywords, or company"
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="search-box">
                                <i class="bi bi-geo-alt"></i>
                                <select name="location" class="form-select">
                                    <option value="">All Locations</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                                            {{ $location }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="search-btn w-100">
                                <i class="bi bi-search me-2"></i>Search
                            </button>
                        </div>
                    </div>

                    {{-- Filter Chips --}}
                    <div class="filter-chips">
                        <a href="{{ route('jobs.index', array_merge(request()->except(['job_type', 'page']), ['job_type' => ''])) }}" 
                           class="filter-chip {{ !request('job_type') ? 'active' : '' }}">
                            <i class="bi bi-briefcase"></i> All Jobs
                        </a>
                        
                        @foreach($jobTypes as $type)
                            <a href="{{ route('jobs.index', array_merge(request()->except(['job_type', 'page']), ['job_type' => $type])) }}" 
                               class="filter-chip {{ request('job_type') == $type ? 'active' : '' }}">
                                <i class="bi bi-clock"></i> {{ $type }}
                            </a>
                        @endforeach
                    </div>
                </form>
            </div>

            {{-- Results Header --}}
            <div class="results-header">
                <div class="job-count">
                    <i class="bi bi-briefcase"></i>
                    <strong>{{ $jobs->total() }}</strong> Jobs Found
                    @if(request('search'))
                        for "{{ request('search') }}"
                    @endif
                </div>
                
                <select class="sort-select" onchange="window.location.href=this.value">
                    <option value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'latest'])) }}"
                            {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>
                        Most Recent
                    </option>
                    <option value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'salary_high'])) }}"
                            {{ request('sort') == 'salary_high' ? 'selected' : '' }}>
                        Highest Salary
                    </option>
                    <option value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'salary_low'])) }}"
                            {{ request('sort') == 'salary_low' ? 'selected' : '' }}>
                        Lowest Salary
                    </option>
                    <option value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'title_asc'])) }}"
                            {{ request('sort') == 'title_asc' ? 'selected' : '' }}>
                        Job Title (A-Z)
                    </option>
                </select>
            </div>

            {{-- Jobs List --}}
            <div class="jobs-list">
                @forelse($jobs as $job)
                    <div class="job-card" onclick="window.location.href='{{ route('jobs.show', $job->id) }}'">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="company-logo">
                                    {{ strtoupper(substr($job->company_name, 0, 2)) }}
                                </div>
                            </div>
                            <div class="col">
                                <h3 class="job-title">{{ $job->job_title }}</h3>
                                <div class="company-name">
                                    <i class="bi bi-building"></i> {{ $job->company_name }}
                                </div>
                                
                                @if($job->skills_required)
                                    <div class="job-tags">
                                        @foreach(explode(',', $job->skills_required) as $skill)
                                            @if(trim($skill))
                                                <span class="job-tag">
                                                    <i class="bi bi-code-slash"></i> {{ trim($skill) }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                                <div class="job-meta">
                                    <span class="meta-item">
                                        <i class="bi bi-geo-alt"></i> {{ $job->location ?? 'Location not specified' }}
                                    </span>
                                    <span class="meta-item">
                                        <i class="bi bi-clock"></i> {{ $job->job_type ?? 'Not specified' }}
                                    </span>
                                    <span class="meta-item">
                                        <i class="bi bi-briefcase"></i> {{ $job->experience_required ?? 'Fresher' }}
                                    </span>
                                    <span class="meta-item">
                                        <i class="bi bi-calendar"></i> 
                                        @if($job->posted_date)
                                            {{ $job->posted_date->diffForHumans() }}
                                        @else
                                            Recently posted
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <span class="salary-badge">
                                    <i class="bi bi-currency-rupee"></i> 
                                    @if($job->min_salary && $job->max_salary)
                                        {{ number_format($job->min_salary/100000, 1) }}L - {{ number_format($job->max_salary/100000, 1) }}L
                                    @elseif($job->min_salary)
                                        From {{ number_format($job->min_salary/100000, 1) }}L
                                    @elseif($job->max_salary)
                                        Up to {{ number_format($job->max_salary/100000, 1) }}L
                                    @else
                                        Not disclosed
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="no-results">
                        <i class="bi bi-search"></i>
                        <h3>No jobs found</h3>
                        <p>Try adjusting your search or filter to find what you're looking for.</p>
                        <a href="{{ route('jobs.index') }}" class="clear-btn">
                            <i class="bi bi-arrow-repeat me-2"></i>Clear Filters
                        </a>
                    </div>
                @endforelse
            </div>

{{-- Pagination --}}
@if($jobs->hasPages())
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Job listings navigation">
            <ul class="pagination custom-pagination">
                {{-- Previous Page Link --}}
                @if ($jobs->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $jobs->previousPageUrl() }}" rel="prev">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                    @if ($page == $jobs->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($jobs->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $jobs->nextPageUrl() }}" rel="next">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
        </div>
    </div>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>JobFinder</h5>
                    <p class="text-muted">Find your dream job today with thousands of listings from top companies.</p>
                </div>
                <div class="col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                        <li><a href="{{ route('jobs.index') }}" class="text-decoration-none text-muted">Jobs</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Follow Us</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-muted"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-linkedin fs-5"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <div class="text-center text-muted">
                <small>&copy; {{ date('Y') }} JobFinder. All rights reserved.</small>
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>