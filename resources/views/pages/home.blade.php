@extends('layouts.app')

@section('title','Home')

@section('content')
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
                            <input type="text" name="search" class="form-control"
                                placeholder="Job title, keywords, or company" value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search-box">
                            <i class="bi bi-geo-alt"></i>
                            <select name="location" class="form-select">
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
                <option
                    value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'salary_high'])) }}"
                    {{ request('sort') == 'salary_high' ? 'selected' : '' }}>
                    Highest Salary
                </option>
                <option
                    value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'salary_low'])) }}"
                    {{ request('sort') == 'salary_low' ? 'selected' : '' }}>
                    Lowest Salary
                </option>
                <option
                    value="{{ route('jobs.index', array_merge(request()->except('sort'), ['sort' => 'title_asc'])) }}"
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
                            {{ number_format($job->min_salary/100000, 1) }}L -
                            {{ number_format($job->max_salary/100000, 1) }}L
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
@endsection