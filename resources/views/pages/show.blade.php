@extends('layouts.app')

@section('title', 'Show Job Details')

@section('content')
<div class="bg-light" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">
    {{-- Hero Section with Company Header --}}
    <div class="bg-white border-bottom">
        <div class="container py-5">
            <a href="{{ route('jobs.index') }}"
                class="btn btn-link text-decoration-none text-secondary px-0 mb-4 d-inline-flex align-items-center">
                <i class="bi bi-arrow-left-circle-fill me-2 text-primary"></i>
                <span class="fw-medium">Back to Jobs</span>
            </a>

            <div class="row g-4 align-items-center">
                <div class="col-auto">
                    <div class="bg-gradient-primary rounded-4 d-flex align-items-center justify-content-center shadow-lg"
                        style="width: 100px; height: 100px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <span class="fw-bold text-white display-5">
                            {{ strtoupper(substr($job->company_name, 0, 2)) }}
                        </span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-2">
                        <h1 class="display-5 fw-bold mb-0">{{ $job->job_title }}</h1>
                        @if($job->is_featured ?? false)
                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-semibold">
                            <i class="bi bi-star-fill me-1"></i>FEATURED
                        </span>
                        @endif
                    </div>
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <span class="fw-semibold fs-5 text-primary">
                            <i class="bi bi-building me-2"></i>{{ $job->company_name }}
                        </span>
                        <span class="text-secondary">|</span>
                        <span class="text-secondary">
                            <i class="bi bi-clock-history me-2 text-primary"></i>Posted
                            {{ $job->posted_date ? $job->posted_date->diffForHumans() : 'Recently' }}
                        </span>
                    </div>
                </div>
                <div class="col-lg-auto ms-lg-auto">
                    <div class="bg-light rounded-4 p-4 text-center shadow-sm">
                        <small class="text-uppercase small fw-semibold tracking-wide text-secondary">Annual
                            Salary</small>
                        <div class="display-6 fw-bold text-success">
                            @if($job->min_salary && $job->max_salary)
                            {{ number_format($job->min_salary/100000, 1) }}L -
                            {{ number_format($job->max_salary/100000, 1) }}L
                            @else
                            Negotiable
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="container py-5">
        <div class="row g-5">
            {{-- Left Column - Main Content (8 cols) --}}
            <div class="col-lg-8">
                {{-- Quick Stats Cards --}}
                <div class="row g-3 mb-5">
                    <div class="col-md-3 col-6">
                        <div class="card border-0 bg-white shadow-sm rounded-4 p-3 text-center h-100">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 d-inline-flex mx-auto mb-2"
                                style="width: 45px; height: 45px;">
                                <i class="bi bi-briefcase-fill text-primary fs-5 mx-auto"></i>
                            </div>
                            <small class="text-secondary small">Experience</small>
                            <span class="fw-bold">{{ $job->experience_required ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card border-0 bg-white shadow-sm rounded-4 p-3 text-center h-100">
                            <div class="bg-success bg-opacity-10 rounded-circle p-2 d-inline-flex mx-auto mb-2"
                                style="width: 45px; height: 45px;">
                                <i class="bi bi-geo-alt-fill text-success fs-5 mx-auto"></i>
                            </div>
                            <small class="text-secondary small">Location</small>
                            <span class="fw-bold">{{ $job->location ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card border-0 bg-white shadow-sm rounded-4 p-3 text-center h-100">
                            <div class="bg-info bg-opacity-10 rounded-circle p-2 d-inline-flex mx-auto mb-2"
                                style="width: 45px; height: 45px;">
                                <i class="bi bi-clock-fill text-info fs-5 mx-auto"></i>
                            </div>
                            <small class="text-secondary small">Job Type</small>
                            <span class="fw-bold">{{ $job->job_type ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card border-0 bg-white shadow-sm rounded-4 p-3 text-center h-100">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 d-inline-flex mx-auto mb-2"
                                style="width: 45px; height: 45px;">
                                <i class="bi bi-people-fill text-warning fs-5 mx-auto"></i>
                            </div>
                            <small class="text-secondary small">Vacancies</small>
                            <span class="fw-bold">{{ $job->vacancies ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Job Description Card --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4 p-lg-5">
                        <h4 class="fw-bold mb-4 d-flex align-items-center">
                            <span class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">
                                <i class="bi bi-file-text-fill text-primary"></i>
                            </span>
                            Job Description
                        </h4>
                        <div class="text-secondary lh-lg" style="font-size: 1.1rem;">
                            {!! $job->job_description ?? '<em>No description provided.</em>' !!}
                        </div>
                    </div>
                </div>

                {{-- Requirements Card --}}
                @if($job->requirements)
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4 p-lg-5">
                        <h4 class="fw-bold mb-4 d-flex align-items-center">
                            <span class="bg-success bg-opacity-10 rounded-3 p-2 me-3">
                                <i class="bi bi-list-check text-success"></i>
                            </span>
                            Requirements & Qualifications
                        </h4>
                        <div class="text-secondary lh-lg" style="font-size: 1.1rem;">
                            {{ $job->requirements }}
                        </div>
                    </div>
                </div>
                @endif

                {{-- Skills Card --}}
                @if($job->skills_required)
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4 p-lg-5">
                        <h4 class="fw-bold mb-4 d-flex align-items-center">
                            <span class="bg-info bg-opacity-10 rounded-3 p-2 me-3">
                                <i class="bi bi-code-square text-info"></i>
                            </span>
                            Required Skills
                        </h4>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(explode(',', $job->skills_required) as $skill)
                            @if(trim($skill))
                            <span class="badge bg-light text-dark border rounded-4 px-4 py-3 fw-normal fs-6">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>{{ trim($skill) }}
                            </span>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Right Column - Sidebar (4 cols) --}}
            <div class="col-lg-4">
                {{-- Sticky Sidebar --}}
                <div class="sticky-lg-top" style="top: 100px;">
                    {{-- Apply Card --}}
                    <div class="card border-0 shadow-lg rounded-4 mb-4 overflow-hidden">
                        <div class="card-body p-4 text-center"
                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <h5 class="text-white mb-3 fw-semibold">
                                <i class="bi bi-lightning-charge-fill me-2"></i>Ready to Apply?
                            </h5>
                            @if($job->application_link)
                            <a href="{{ $job->application_link }}" target="_blank"
                                class="btn btn-light w-100 py-3 rounded-3 fw-bold mb-3">
                                <i class="bi bi-box-arrow-up-right me-2"></i>Apply Now
                            </a>
                            @else
                            <button class="btn btn-light w-100 py-3 rounded-3 fw-bold mb-3" disabled>
                                <i class="bi bi-x-circle me-2"></i>Apply Unavailable
                            </button>
                            @endif
                            <p class="text-white-50 small mb-0">
                                <i class="bi bi-clock me-1"></i>Applications close soon
                            </p>
                        </div>
                    </div>

                    {{-- Job Overview Card --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="bg-primary bg-opacity-10 rounded-2 p-2 me-2">
                                    <i class="bi bi-info-circle-fill text-primary"></i>
                                </span>
                                Job Overview
                            </h5>

                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light rounded-3 p-2" style="width: 40px; height: 40px;">
                                        <i class="bi bi-calendar-check text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block">Posted Date</small>
                                        <span
                                            class="fw-semibold">{{ $job->posted_date ? $job->posted_date->format('d M, Y') : 'Not specified' }}</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light rounded-3 p-2" style="width: 40px; height: 40px;">
                                        <i class="bi bi-calendar-x text-danger"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block">Expiry Date</small>
                                        <span
                                            class="fw-semibold">{{ $job->expiry_date ? $job->expiry_date->format('d M, Y') : 'Not specified' }}</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light rounded-3 p-2" style="width: 40px; height: 40px;">
                                        <i class="bi bi-briefcase text-success"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block">Experience Level</small>
                                        <span
                                            class="fw-semibold">{{ $job->experience_required ?? ' Not specified' }}</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light rounded-3 p-2" style="width: 40px; height: 40px;">
                                        <i class="bi bi-building text-info"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block">Work Mode</small>
                                        <span class="fw-semibold">{{ $job->work_mode ?? 'Not specified' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Company Info Card --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="bg-success bg-opacity-10 rounded-2 p-2 me-2">
                                    <i class="bi bi-building-fill text-success"></i>
                                </span>
                                About Company
                            </h5>

                            <div class="text-center mb-4">
                                <div class="bg-gradient-primary rounded-4 d-flex align-items-center justify-content-center mx-auto mb-3"
                                    style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    <span class="fw-bold text-white fs-2">
                                        {{ strtoupper(substr($job->company_name, 0, 2)) }}
                                    </span>
                                </div>
                                <h6 class="fw-bold">{{ $job->company_name }}</h6>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                                    <i class="bi bi-patch-check-fill me-1"></i>Verified Employer
                                </span>
                            </div>

                            <p class="text-secondary small text-center mb-3">
                                <i class="bi bi-geo-alt me-1"></i>{{ $job->location ?? 'Location not specified' }}
                            </p>
                        </div>
                    </div>

                    {{-- Related Jobs --}}
                    @if($relatedJobs->count() > 0)
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4 d-flex align-items-center">
                                <span class="bg-warning bg-opacity-10 rounded-2 p-2 me-2">
                                    <i class="bi bi-briefcase-fill text-warning"></i>
                                </span>
                                Similar Jobs
                            </h5>

                            @foreach($relatedJobs as $related)
                            <div class="border-bottom pb-3 mb-3 last:border-0 last:pb-0"
                                onclick="window.location.href='{{ route('jobs.show', $related->id) }}'"
                                style="cursor: pointer;">
                                <div class="d-flex gap-3">
                                    <div class="bg-light rounded-2 p-2" style="width: 45px; height: 45px;">
                                        <span
                                            class="fw-bold text-primary">{{ strtoupper(substr($related->company_name, 0, 1)) }}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-1">{{ $related->job_title }}</h6>
                                        <small class="text-secondary d-block mb-2">{{ $related->company_name }}</small>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-secondary">
                                                <i class="bi bi-geo-alt"></i> {{ $related->location ?? 'Remote' }}
                                            </small>
                                            <small class="text-success fw-bold">
                                                <i class="bi bi-currency-rupee"></i>
                                                @if($related->min_salary)
                                                {{ number_format($related->min_salary/100000, 1) }}L
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <a href="{{ route('jobs.index') }}"
                                class="btn btn-link text-decoration-none text-primary w-100 mt-3">
                                View All Jobs <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Premium Custom Styles --}}
<style>
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-primary {
    background: var(--primary-gradient);
}

.tracking-wide {
    letter-spacing: 0.1em;
}

.sticky-lg-top {
    position: -webkit-sticky;
    position: sticky;
    top: 100px;
    z-index: 1020;
}

.last\:border-0:last-child {
    border-bottom: none !important;
    margin-bottom: 0 !important;
    padding-bottom: 0 !important;
}

.hover-lift {
    transition: transform 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
}

/* Card hover effects */
.card {
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 20px 40px -15px rgba(102, 126, 234, 0.2) !important;
}

/* Custom badge styling */
.badge {
    font-weight: 500;
    letter-spacing: 0.3px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .display-5 {
        font-size: 2rem;
    }

    .sticky-lg-top {
        position: static;
    }
}

/* Animation for icons */
.bg-opacity-10 {
    transition: all 0.3s ease;
}

.card:hover .bg-opacity-10 {
    transform: scale(1.1);
    background-opacity: 0.2;
}

/* Gradient text */
.text-gradient {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
</style>

{{-- Add Bootstrap Icons if not already included --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection