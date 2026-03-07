<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobFinder - Find Your Dream Job</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
            --warning-color: #f8961e;
            --dark-bg: #0b0f1c;
            --card-bg: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border-color: #e2e8f0;
            --hover-bg: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: var(--text-dark);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
            letter-spacing: -0.5px;
        }

        .navbar-brand span {
            color: var(--text-dark);
            font-weight: 300;
        }

        .search-section {
            padding: 3rem 0 2rem 0;
        }

        .search-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .search-title {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
            font-size: 1.5rem;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 1.2rem;
        }

        .search-box input {
            padding-left: 45px;
            height: 55px;
            border-radius: 12px;
            border: 2px solid var(--border-color);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
            outline: none;
        }

        .filter-badge {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 30px;
            padding: 0.5rem 1.2rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-badge:hover,
        .filter-badge.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .filter-badge i {
            font-size: 1rem;
        }

        .stats-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1.5rem 0;
        }

        .job-count {
            background: white;
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-weight: 500;
            color: var(--text-dark);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .job-count i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        .sort-select {
            border: 1px solid var(--border-color);
            border-radius: 30px;
            padding: 0.5rem 1.5rem 0.5rem 1rem;
            font-weight: 500;
            color: var(--text-dark);
            background: white;
            cursor: pointer;
        }

        .job-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .job-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .job-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: var(--primary-color);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .job-card:hover::before {
            transform: scaleY(1);
        }

        .company-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .company-name {
            color: var(--text-light);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .company-name i {
            color: var(--primary-color);
            font-size: 0.9rem;
        }

        .job-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin: 1rem 0;
        }

        .job-tag {
            background: #f0f4ff;
            color: var(--primary-color);
            padding: 0.4rem 1rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .job-tag i {
            font-size: 0.9rem;
        }

        .salary-badge {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
            padding: 0.4rem 1.2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .meta-item i {
            color: var(--primary-color);
            font-size: 1rem;
        }

        .featured-badge {
            background: var(--warning-color);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 1rem;
        }

        .urgent-badge {
            background: var(--danger-color);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .pagination-container {
            margin-top: 3rem;
            margin-bottom: 2rem;
        }

        .pagination .page-link {
            border: none;
            padding: 0.7rem 1.2rem;
            margin: 0 0.3rem;
            border-radius: 10px;
            color: var(--text-dark);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .pagination .active .page-link {
            background: var(--primary-color);
            color: white;
        }

        .footer {
            background: white;
            padding: 2rem 0;
            margin-top: 3rem;
            border-top: 1px solid var(--border-color);
        }

        @media (max-width: 768px) {
            .company-logo {
                width: 50px;
                height: 50px;
                font-size: 1.4rem;
            }

            .job-title {
                font-size: 1.1rem;
            }

            .job-meta {
                gap: 1rem;
            }

            .filter-badge {
                padding: 0.4rem 1rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Job<span>Finder</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px;">
        
        <div class="search-section">
            <div class="search-card">
                <h2 class="search-title">Find Your Dream Job</h2>
                <div class="row g-3">
                    <div class="col-md-8">
                        <div class="search-box">
                            <i class="bi bi-search"></i>
                            <input type="text" class="form-control" placeholder="Job title, keywords, or company">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search-box">
                            <i class="bi bi-geo-alt"></i>
                            <input type="text" class="form-control" placeholder="City or location">
                        </div>
                    </div>
                </div>
                 <div class="mt-4 d-flex flex-wrap gap-2">
                    <span class="filter-badge active">
                        <i class="bi bi-briefcase"></i> All Jobs
                    </span>
                    <span class="filter-badge">
                        <i class="bi bi-clock"></i> Full Time
                    </span>
                    <span class="filter-badge">
                        <i class="bi bi-briefcase"></i> Part Time
                    </span>
                    <span class="filter-badge">
                        <i class="bi bi-laptop"></i> Remote
                    </span>
                    <span class="filter-badge">
                        <i class="bi bi-building"></i> Office
                    </span>
                    <span class="filter-badge">
                        <i class="bi bi-calendar"></i> Internship
                    </span>
                </div>
            </div>
        </div>

        <div class="stats-row">
            <div class="job-count">
                <i class="bi bi-briefcase"></i> 24 Jobs Available
            </div>
            <select class="sort-select">
                <option>Most Recent</option>
                <option>Highest Salary</option>
                <option>Most Relevant</option>
            </select>
        </div>

        <div class="jobs-list">
            
            <div class="job-card" onclick="window.location.href='/jobs/1'">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="company-logo">TC</div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center flex-wrap">
                            <h3 class="job-title">Senior Full Stack Developer</h3>
                            <span class="featured-badge">Featured</span>
                        </div>
                        <div class="company-name">
                            <i class="bi bi-building"></i> TechCorp Solutions
                            <span class="urgent-badge ms-2">Urgent</span>
                        </div>
                        
                        <div class="job-tags">
                            <span class="job-tag"><i class="bi bi-code-slash"></i> Laravel</span>
                            <span class="job-tag"><i class="bi bi-code-slash"></i> Vue.js</span>
                            <span class="job-tag"><i class="bi bi-database"></i> MySQL</span>
                            <span class="job-tag"><i class="bi bi-cloud"></i> AWS</span>
                        </div>

                        <div class="job-meta">
                            <span class="meta-item">
                                <i class="bi bi-geo-alt"></i> Bangalore, India
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-clock"></i> Full Time
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-briefcase"></i> 3-5 years
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-calendar"></i> Posted 2 days ago
                            </span>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <span class="salary-badge">
                            <i class="bi bi-currency-rupee"></i> 15L - 25L PA
                        </span>
                    </div>
                </div>
            </div>

            <div class="job-card" onclick="window.location.href='/jobs/2'">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="company-logo">IS</div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center flex-wrap">
                            <h3 class="job-title">Laravel Developer</h3>
                        </div>
                        <div class="company-name">
                            <i class="bi bi-building"></i> InnovateTech Solutions
                        </div>
                        
                        <div class="job-tags">
                            <span class="job-tag"><i class="bi bi-code-slash"></i> PHP</span>
                            <span class="job-tag"><i class="bi bi-code-slash"></i> Laravel</span>
                            <span class="job-tag"><i class="bi bi-database"></i> MySQL</span>
                            <span class="job-tag"><i class="bi bi-git"></i> Git</span>
                        </div>

                        <div class="job-meta">
                            <span class="meta-item">
                                <i class="bi bi-geo-alt"></i> Pune, India
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-clock"></i> Full Time
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-briefcase"></i> 2-4 years
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-calendar"></i> Posted 5 days ago
                            </span>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <span class="salary-badge">
                            <i class="bi bi-currency-rupee"></i> 8L - 12L PA
                        </span>
                    </div>
                </div>
            </div>

            <div class="job-card" onclick="window.location.href='/jobs/3'">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="company-logo">DW</div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center flex-wrap">
                            <h3 class="job-title">Frontend Developer</h3>
                        </div>
                        <div class="company-name">
                            <i class="bi bi-building"></i> Digital Wave
                        </div>
                        
                        <div class="job-tags">
                            <span class="job-tag"><i class="bi bi-code-slash"></i> React</span>
                            <span class="job-tag"><i class="bi bi-code-slash"></i> TypeScript</span>
                            <span class="job-tag"><i class="bi bi-palette"></i> Tailwind</span>
                        </div>

                        <div class="job-meta">
                            <span class="meta-item">
                                <i class="bi bi-geo-alt"></i> Mumbai, India
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-clock"></i> Full Time
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-laptop"></i> Remote
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-calendar"></i> Posted 1 week ago
                            </span>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <span class="salary-badge">
                            <i class="bi bi-currency-rupee"></i> 10L - 15L PA
                        </span>
                    </div>
                </div>
            </div>

            <div class="job-card" onclick="window.location.href='/jobs/4'">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="company-logo">DM</div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center flex-wrap">
                            <h3 class="job-title">Digital Marketing Specialist</h3>
                        </div>
                        <div class="company-name">
                            <i class="bi bi-building"></i> MarketMasters
                        </div>
                        
                        <div class="job-tags">
                            <span class="job-tag"><i class="bi bi-graph-up"></i> SEO</span>
                            <span class="job-tag"><i class="bi bi-megaphone"></i> Social Media</span>
                            <span class="job-tag"><i class="bi bi-envelope"></i> Email Marketing</span>
                        </div>

                        <div class="job-meta">
                            <span class="meta-item">
                                <i class="bi bi-geo-alt"></i> Delhi, India
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-clock"></i> Full Time
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-briefcase"></i> 1-3 years
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-calendar"></i> Posted 3 days ago
                            </span>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <span class="salary-badge">
                            <i class="bi bi-currency-rupee"></i> 5L - 8L PA
                        </span>
                    </div>
                </div>
            </div>

            <div class="job-card" onclick="window.location.href='/jobs/5'">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="company-logo">DA</div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center flex-wrap">
                            <h3 class="job-title">Data Analyst</h3>
                        </div>
                        <div class="company-name">
                            <i class="bi bi-building"></i> DataAnalytics Pro
                        </div>
                        
                        <div class="job-tags">
                            <span class="job-tag"><i class="bi bi-bar-chart"></i> Python</span>
                            <span class="job-tag"><i class="bi bi-bar-chart"></i> SQL</span>
                            <span class="job-tag"><i class="bi bi-bar-chart"></i> Tableau</span>
                            <span class="job-tag"><i class="bi bi-bar-chart"></i> Excel</span>
                        </div>

                        <div class="job-meta">
                            <span class="meta-item">
                                <i class="bi bi-geo-alt"></i> Hyderabad, India
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-clock"></i> Full Time
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-briefcase"></i> 0-2 years
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-calendar"></i> Posted 1 day ago
                            </span>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <span class="salary-badge">
                            <i class="bi bi-currency-rupee"></i> 4L - 7L PA
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination-container">
            <nav aria-label="Job listings navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="bi bi-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>JobFinder</h5>
                    <p class="text-muted">Find your dream job today with thousands of listings from top companies.</p>
                </div>
                <div class="col-md-2">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-muted">About Us</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Contact</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6>For Job Seekers</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-muted">Browse Jobs</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Job Alerts</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Career Advice</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Follow Us</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-muted"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-linkedin fs-5"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-instagram fs-5"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <div class="text-center text-muted">
                <small>&copy; 2024 JobFinder. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>