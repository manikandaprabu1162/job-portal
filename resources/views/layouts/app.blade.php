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

    .nav-link {
        font-weight: 600;
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
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
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
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
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
        box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
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

    / .custom-pagination {
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

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>