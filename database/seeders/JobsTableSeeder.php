<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use Carbon\Carbon;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Companies data
        $companies = [
            'Tech Mahindra', 'Infosys', 'TCS', 'Wipro', 'HCL Technologies',
            'Microsoft India', 'Google India', 'Amazon India', 'Flipkart', 'Paytm',
            'PhonePe', 'Swiggy', 'Zomato', 'Ola Cabs', 'Uber India',
            'Deloitte India', 'PwC India', 'KPMG India', 'EY India', 'Grant Thornton',
            'Reliance Industries', 'Tata Motors', 'Mahindra & Mahindra', 'Bajaj Auto', 'Maruti Suzuki',
            'ICICI Bank', 'HDFC Bank', 'Axis Bank', 'Kotak Mahindra', 'SBI',
            'Flipkart', 'Myntra', 'Ajio', 'Nykaa', 'BigBasket',
            'BYJU\'S', 'Unacademy', 'Vedantu', 'UpGrad', 'Coursera India',
            'Adobe India', 'Oracle India', 'IBM India', 'Dell Technologies', 'HP India',
            'Cognizant', 'Capgemini', 'Accenture', 'L&T Infotech', 'Mindtree'
        ];

        // Job titles by category
        $itTitles = [
            'Software Developer', 'Senior Software Engineer', 'Full Stack Developer',
            'Frontend Developer', 'Backend Developer', 'Laravel Developer',
            'PHP Developer', 'React Developer', 'Node.js Developer', 'Python Developer',
            'Java Developer', 'DevOps Engineer', 'Cloud Architect', 'System Administrator',
            'Database Administrator', 'Data Scientist', 'Machine Learning Engineer',
            'AI Engineer', 'Business Analyst', 'Project Manager'
        ];

        $marketingTitles = [
            'Digital Marketing Manager', 'SEO Specialist', 'Content Writer',
            'Social Media Manager', 'Brand Manager', 'Marketing Analyst',
            'Growth Hacker', 'Email Marketing Specialist', 'PR Manager',
            'Market Research Analyst'
        ];

        $salesTitles = [
            'Sales Executive', 'Business Development Manager', 'Account Manager',
            'Sales Manager', 'Inside Sales Representative', 'Field Sales Executive',
            'Corporate Sales Manager', 'Key Account Manager', 'Sales Trainee'
        ];

        $hrTitles = [
            'HR Manager', 'Recruitment Specialist', 'HR Generalist',
            'Talent Acquisition Executive', 'Training Manager', 'Payroll Specialist',
            'HR Business Partner', 'Employee Relations Manager'
        ];

        $financeTitles = [
            'Accountant', 'Financial Analyst', 'Finance Manager',
            'Chartered Accountant', 'Audit Assistant', 'Tax Consultant',
            'Investment Banker', 'Risk Analyst'
        ];

        $designTitles = [
            'UI/UX Designer', 'Graphic Designer', 'Web Designer',
            'Product Designer', 'Motion Graphics Artist', 'Video Editor',
            'Creative Director', 'Art Director'
        ];

        // Combine all titles
        $jobTitles = array_merge($itTitles, $marketingTitles, $salesTitles, $hrTitles, $financeTitles, $designTitles);

        // Locations
        $locations = [
            'Bangalore', 'Mumbai', 'Pune', 'Hyderabad', 'Chennai',
            'Delhi', 'Gurgaon', 'Noida', 'Ahmedabad', 'Kolkata',
            'Indore', 'Jaipur', 'Lucknow', 'Chandigarh', 'Bhopal',
            'Nagpur', 'Visakhapatnam', 'Thiruvananthapuram', 'Coimbatore', 'Mysore'
        ];

        // Job types
        $jobTypes = ['Full Time', 'Part Time', 'Contract', 'Internship', 'Freelance'];

        // Work modes
        $workModes = ['Remote', 'Work From Office', 'Hybrid'];

        // Experience levels
        $experienceLevels = [
            '0-1 years', '1-3 years', '2-4 years', '3-5 years',
            '5-7 years', '5-8 years', '7-10 years', '10+ years'
        ];

        // Skills sets
        $skillSets = [
            'PHP, Laravel, MySQL, JavaScript',
            'React, Node.js, MongoDB, Express',
            'Python, Django, PostgreSQL, AWS',
            'Java, Spring Boot, Hibernate, Oracle',
            'HTML, CSS, JavaScript, Bootstrap, Tailwind',
            'Vue.js, Vuex, Nuxt.js, Firebase',
            'DevOps, Docker, Kubernetes, Jenkins, AWS',
            'Data Science, Python, R, Machine Learning, TensorFlow',
            'Digital Marketing, SEO, SEM, Google Analytics, Social Media',
            'Content Writing, Blogging, Copywriting, Editing, Proofreading',
            'Sales, Negotiation, Client Relationship, B2B, B2C',
            'HR, Recruitment, Employee Relations, Performance Management',
            'Accounting, Tally, GST, Taxation, Excel',
            'UI Design, Figma, Adobe XD, Photoshop, Illustrator',
            'Project Management, Agile, Scrum, JIRA, MS Project'
        ];

        // Generate 50 jobs
        for ($i = 0; $i < 50; $i++) {
            $minSalary = rand(200000, 800000) * (rand(1, 5)); // Between 2L to 40L
            $maxSalary = $minSalary + rand(100000, 500000) * rand(1, 3);
            
            // Random dates
            $postedDate = Carbon::now()->subDays(rand(1, 30));
            $expiryDate = Carbon::now()->addDays(rand(15, 60));

            // Pick random items
            $company = $companies[array_rand($companies)];
            $title = $jobTitles[array_rand($jobTitles)];
            $location = $locations[array_rand($locations)];
            $jobType = $jobTypes[array_rand($jobTypes)];
            $workMode = $workModes[array_rand($workModes)];
            $experience = $experienceLevels[array_rand($experienceLevels)];
            $skills = $skillSets[array_rand($skillSets)];

            // Generate description based on title
            $description = $this->generateDescription($title, $company);
            
            // Generate requirements based on experience
            $requirements = $this->generateRequirements($experience, $title);

            Job::create([
                'job_title' => $title,
                'company_name' => $company,
                'location' => $location,
                'min_salary' => $minSalary,
                'max_salary' => $maxSalary,
                'salary_currency' => 'INR',
                'is_salary_negotiable' => rand(0, 3) === 0, // 25% chance of negotiable
                'salary_display' => '₹' . number_format($minSalary/100000, 1) . 'L - ₹' . number_format($maxSalary/100000, 1) . 'L PA',
                'job_type' => $jobType,
                'work_mode' => $workMode,
                'experience_required' => $experience,
                'job_description' => $description,
                'requirements' => $requirements,
                'skills_required' => $skills,
                'application_link' => 'https://example.com/apply/' . rand(100, 999),
                'posted_date' => $postedDate,
                'expiry_date' => $expiryDate,
                'source_platform' => 'Manual Entry',
                'is_active' => rand(1, 10) > 1, // 90% active
                'created_at' => $postedDate,
                'updated_at' => $postedDate,
            ]);
        }

        $this->command->info('✅ 50 jobs seeded successfully!');
    }

    /**
     * Generate job description based on title
     */
    private function generateDescription($title, $company)
    {
        $descriptions = [
            "We are looking for a talented $title to join our dynamic team at $company. You will be responsible for developing and maintaining web applications, collaborating with cross-functional teams, and delivering high-quality software solutions.",
            
            "$company is seeking an experienced $title who is passionate about technology and innovation. You will work on cutting-edge projects and help shape the future of our products.",
            
            "Join $company as a $title and be part of a fast-growing team. You will have the opportunity to work with modern technologies, solve complex problems, and make a significant impact.",
            
            "We have an exciting opportunity for a $title at $company. You will be responsible for leading technical initiatives, mentoring junior developers, and ensuring best practices are followed.",
            
            "$company is looking for a motivated $title to help build scalable and robust applications. If you love coding and want to work in a collaborative environment, this is the perfect role for you.",
            
            "Are you a skilled $title looking for your next challenge? $company wants you! You'll work on challenging projects, learn new technologies, and grow your career with us.",
            
            "Immediate opening for $title at $company. We need someone who can hit the ground running and contribute to our ongoing projects. Great work culture and growth opportunities.",
            
            "$company is hiring a $title to join our award-winning team. You'll work with the latest technologies, collaborate with smart people, and build products that users love."
        ];

        return $descriptions[array_rand($descriptions)];
    }

    /**
     * Generate requirements based on experience
     */
    private function generateRequirements($experience, $title)
    {
        $baseReqs = [
            "Bachelor's degree in Computer Science or related field",
            "Master's degree in relevant field",
            "Strong problem-solving skills",
            "Excellent communication skills",
            "Ability to work in a team environment",
            "Self-motivated and eager to learn",
            "Attention to detail",
            "Good time management skills"
        ];

        $techReqs = [
            "Experience with modern frameworks",
            "Knowledge of database design and optimization",
            "Understanding of RESTful APIs",
            "Familiarity with version control systems",
            "Experience with cloud platforms",
            "Knowledge of testing methodologies",
            "Understanding of Agile methodologies"
        ];

        // Select random requirements based on experience level
        $numReqs = rand(3, 6);
        $selectedReqs = [];

        // Add experience-specific requirement
        if (strpos($experience, '0-') !== false) {
            $selectedReqs[] = "Freshers are welcome to apply";
            $selectedReqs[] = "Internship experience is a plus";
        } elseif (strpos($experience, '10+') !== false) {
            $selectedReqs[] = "Should have led teams in previous roles";
            $selectedReqs[] = "Experience in architectural decisions";
        } else {
            $selectedReqs[] = "$experience of relevant experience required";
        }

        // Add random base requirements
        for ($i = 0; $i < $numReqs; $i++) {
            if (rand(0, 1)) {
                $selectedReqs[] = $baseReqs[array_rand($baseReqs)];
            } else {
                $selectedReqs[] = $techReqs[array_rand($techReqs)];
            }
        }

        // Remove duplicates and implode
        $selectedReqs = array_unique($selectedReqs);
        return "• " . implode("\n• ", array_slice($selectedReqs, 0, 5));
    }
}