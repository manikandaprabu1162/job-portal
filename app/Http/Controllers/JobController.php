<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of jobs.
     */
    public function index(Request $request)
    {
        $query = Job::query()->where('is_active', true);

        // Search filter
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('job_title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('company_name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('skills_required', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('job_description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Location filter
        if ($request->has('location') && !empty($request->location)) {
            $query->where('location', 'LIKE', "%{$request->location}%");
        }

        // Job type filter
        if ($request->has('job_type') && !empty($request->job_type)) {
            $query->where('job_type', $request->job_type);
        }

        // Work mode filter
        if ($request->has('work_mode') && !empty($request->work_mode)) {
            $query->where('work_mode', $request->work_mode);
        }

        // Sorting
        switch ($request->get('sort', 'latest')) {
            case 'salary_high':
                $query->orderBy('max_salary', 'desc');
                break;
            case 'salary_low':
                $query->orderBy('min_salary', 'asc');
                break;
            case 'title_asc':
                $query->orderBy('job_title', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        // Get jobs with pagination
        $jobs = $query->paginate(10)->withQueryString();
        
        // Get unique locations for filter dropdown
        $locations = Job::where('is_active', true)
                        ->whereNotNull('location')
                        ->distinct()
                        ->pluck('location')
                        ->filter()
                        ->values();

        // Get job types for filter
        $jobTypes = Job::where('is_active', true)
                       ->whereNotNull('job_type')
                       ->distinct()
                       ->pluck('job_type')
                       ->filter()
                       ->values();

        return view('pages.home', compact('jobs', 'locations', 'jobTypes'));
    }

    /**
     * Display the specified job.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        
        // Get related jobs (same location or similar skills)
        $relatedJobs = Job::where('is_active', true)
                          ->where('id', '!=', $job->id)
                          ->where(function($query) use ($job) {
                              $query->where('location', $job->location)
                                    ->orWhere('job_type', $job->job_type);
                          })
                          ->limit(3)
                          ->get();

        return view('pages.show', compact('job', 'relatedJobs'));
    }
}