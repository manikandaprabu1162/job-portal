@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-gradient-to-bottom bg-light"
    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh;">
    {{-- Hero Section with Search --}}
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center text-white mb-5">
                <h1 class="display-4 fw-bold mb-3">Find Your Dream Job Today</h1>
                <p class="lead opacity-75 mb-0">Discover thousands of job opportunities with top companies</p>
            </div>
        </div>

        {{-- Advanced Search Section --}}
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-lg-5">
                        <form action="{{ route('jobs.index') }}" method="GET" id="searchForm">
                            <div class="row g-4">
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold text-secondary mb-2">
                                        <i class="bi bi-briefcase me-2 text-primary"></i>Job Title or Company
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="bi bi-search text-primary"></i>
                                        </span>
                                        <input type="text" name="search"
                                            class="form-control form-control-lg border-start-0 ps-0"
                                            placeholder="e.g. Software Engineer at Google"
                                            value="{{ request('search') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary mb-2">
                                        <i class="bi bi-geo-alt me-2 text-primary"></i>Location
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="bi bi-map-pin text-primary"></i>
                                        </span>
                                        <select name="location" class="form-select form-select-lg border-start-0 ps-0">
                                            <option value="">All Locations</option>
                                            @foreach($locations as $location)
                                            <option value="{{ $location }}"
                                                {{ request('location') == $location ? 'selected' : '' }}>
                                                {{ $location }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label
                                        class="form-label fw-semibold text-secondary mb-2 opacity-0 d-none d-md-block">Search</label>
                                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3">
                                        <i class="bi bi-search me-2"></i>Search Jobs
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Filter Chips --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    <a href="{{ route('jobs.index', array_merge(request()->except(['job_type', 'page']), ['job_type' => ''])) }}"
                        class="btn {{ !request('job_type') ? 'btn-light' : 'btn-outline-light' }} rounded-pill px-4 py-2 fw-semibold">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i>All Jobs
                    </a>

                    @foreach($jobTypes as $type)
                    <a href="{{ route('jobs.index', array_merge(request()->except(['job_type', 'page']), ['job_type' => $type])) }}"
                        class="btn {{ request('job_type') == $type ? 'btn-light' : 'btn-outline-light' }} rounded-pill px-4 py-2 fw-semibold">
                        <i class="bi bi-clock-history me-2"></i>{{ $type }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content Area --}}
    <div class="bg-white rounded-top-5 shadow-lg mt-5">
        <div class="container py-5">
            {{-- Stats and Filter Bar --}}
            <div class="row g-4 mb-5">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center flex-wrap gap-4">
                        <div class="bg-primary bg-opacity-10 rounded-4 p-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary rounded-3 p-3">
                                    <i class="bi bi-briefcase fs-3 text-white"></i>
                                </div>
                                <div>
                                    <span class="display-6 fw-bold text-primary">{{ $jobs->total() }}</span>
                                    <span class="text-secondary d-block">Active Jobs</span>
                                </div>
                            </div>
                        </div>

                        @if(request('search'))
                        <div class="bg-light rounded-4 p-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-search text-primary"></i>
                                <span class="fw-medium">Search: </span>
                                <span class="badge bg-primary rounded-pill px-3 py-2">"{{ request('search') }}"</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded-4 p-2">
                        <div class="d-flex align-items-center justify-content-end">
                            <i class="bi bi-funnel text-primary me-2"></i>
                            <select class="form-select border-0 bg-transparent fw-semibold" style="width: auto;"
                                onchange="window.location.href=this.value">
                                <option
                                    value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'latest'])) }}"
                                    {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>
                                    📅 Most Recent
                                </option>
                                <option
                                    value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'salary_high'])) }}"
                                    {{ request('sort') == 'salary_high' ? 'selected' : '' }}>
                                    💰 Highest Salary
                                </option>
                                <option
                                    value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'salary_low'])) }}"
                                    {{ request('sort') == 'salary_low' ? 'selected' : '' }}>
                                    💵 Lowest Salary
                                </option>
                                <option
                                    value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'title_asc'])) }}"
                                    {{ request('sort') == 'title_asc' ? 'selected' : '' }}>
                                    🔤 Job Title (A-Z)
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Jobs Grid --}}
            <div class="row g-4">
                @forelse($jobs as $job)
                <div class="col-xl-6">
                    <div class="card border-0 shadow-sm rounded-4 hover-lift transition"
                        onclick="window.location.href='{{ route('jobs.show', $job->id) }}'" style="cursor: pointer;">
                        <div class="card-body p-4">
                            {{-- Company Header --}}
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-gradient-primary rounded-3 p-3"
                                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    <span class="fw-bold text-white fs-5">
                                        {{ strtoupper(substr($job->company_name, 0, 2)) }}
                                    </span>
                                </div>
                                <div>
                                    <h3 class="h5 fw-bold mb-1">{{ $job->job_title }}</h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-building text-primary small"></i>
                                        <span class="text-secondary">{{ $job->company_name }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Job Details Grid --}}
                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-light rounded-2 p-2">
                                            <i class="bi bi-geo-alt text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block">Location</small>
                                            <span class="fw-medium">{{ $job->location ?? 'Not specified' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-light rounded-2 p-2">
                                            <i class="bi bi-clock text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block">Job Type</small>
                                            <span class="fw-medium">{{ $job->job_type ?? 'Not specified' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-light rounded-2 p-2">
                                            <i class="bi bi-briefcase text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block">Experience</small>
                                            <span class="fw-medium">{{ $job->experience_required ?? 'Fresher' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-light rounded-2 p-2">
                                            <i class="bi bi-calendar text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block">Posted</small>
                                            <span class="fw-medium">
                                                @if($job->posted_date)
                                                {{ $job->posted_date->diffForHumans() }}
                                                @else
                                                Recently
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Skills --}}
                            @if($job->skills_required)
                            <div class="mb-4">
                                <small class="text-secondary d-block mb-2">Required Skills</small>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach(explode(',', $job->skills_required) as $skill)
                                    @if(trim($skill))
                                    <span class="badge bg-light text-dark rounded-3 px-3 py-2">
                                        <i class="bi bi-code-slash me-1 text-primary"></i>
                                        {{ trim($skill) }}
                                    </span>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            {{-- Footer with Salary and Action --}}
                            <div
                                class="d-flex flex-wrap align-items-center justify-content-between gap-3 pt-3 border-top">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-currency-rupee text-success fs-5"></i>
                                    <span class="fw-bold text-success fs-5">
                                        @if($job->min_salary && $job->max_salary)
                                        {{ number_format($job->min_salary/100000, 1) }}L -
                                        {{ number_format($job->max_salary/100000, 1) }}L
                                        @elseif($job->min_salary)
                                        From {{ number_format($job->min_salary/100000, 1) }}L
                                        @elseif($job->max_salary)
                                        Up to {{ number_format($job->max_salary/100000, 1) }}L
                                        @else
                                        Negotiable
                                        @endif
                                    </span>
                                </div>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                                    <i class="bi bi-arrow-right-short me-1"></i>View Details
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="bg-light rounded-circle d-inline-flex p-5 mb-4">
                            <i class="bi bi-inbox fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 fw-bold mb-2">No Jobs Found</h3>
                        <p class="text-secondary mb-4 col-lg-6 mx-auto">We couldn't find any jobs matching your
                            criteria. Try adjusting your search filters.</p>
                        <a href="{{ route('jobs.index') }}" class="btn btn-primary rounded-pill px-5 py-3">
                            <i class="bi bi-arrow-repeat me-2"></i>Clear All Filters
                        </a>
                    </div>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($jobs->hasPages())
            <div class="d-flex justify-content-center mt-5 pt-4">
                <nav aria-label="Job listings navigation">
                    <ul class="pagination pagination-lg">
                        {{-- Previous Page Link --}}
                        @if ($jobs->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link border-0 bg-light text-secondary rounded-start-4 px-4">
                                <i class="bi bi-arrow-left"></i>
                            </span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link border-0 bg-light text-primary rounded-start-4 px-4"
                                href="{{ $jobs->previousPageUrl() }}">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                        </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                        @if ($page == $jobs->currentPage())
                        <li class="page-item active">
                            <span class="page-link border-0 bg-primary text-white px-4">{{ $page }}</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link border-0 bg-light text-primary px-4" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($jobs->hasMorePages())
                        <li class="page-item">
                            <a class="page-link border-0 bg-light text-primary rounded-end-4 px-4"
                                href="{{ $jobs->nextPageUrl() }}">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link border-0 bg-light text-secondary rounded-end-4 px-4">
                                <i class="bi bi-arrow-right"></i>
                            </span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Minimal Custom Styles for Smooth Transitions --}}
<style>
.bg-gradient-to-bottom {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.hover-lift {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -15px rgba(102, 126, 234, 0.3) !important;
}

.transition {
    transition: all 0.3s ease;
}

.rounded-top-5 {
    border-top-left-radius: 3rem !important;
    border-top-right-radius: 3rem !important;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.pagination .page-link {
    box-shadow: none;
    font-weight: 500;
}

.pagination .page-link:hover {
    background: #667eea !important;
    color: white !important;
}

.card {
    backdrop-filter: blur(10px);
}

@media (max-width: 768px) {
    .rounded-top-5 {
        border-top-left-radius: 2rem !important;
        border-top-right-radius: 2rem !important;
    }
}
</style>
@endsection