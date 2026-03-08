{{-- Footer --}}
<footer class="bg-dark text-white-50 pt-6 pb-4 mt-auto"
    style="background: linear-gradient(135deg, #1a1c2c 0%, #2a3f5e 100%);">
    {{-- Wave Effect --}}
    <div class="position-absolute top-0 start-0 w-100 overflow-hidden" style="transform: translateY(-99%);">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-100"
            style="height: 60px;">
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" fill="#ffffff"></path>
            <path
                d="M0,0V15.81C13,21.25,27.93,25.66,44.5,28.45c69.31,11.15,139.79,9.34,208.23.77C343.11,22.07,415.16,7.56,487.74,20.88c55.85,10.29,110.09,24.29,164.94,35.28,57.92,11.6,117.45,15.35,176.84,8.6,36.2-4.11,70.86-12.45,104.37-23.2,32.3-10.35,62.92-22.81,94.56-33.59,15.57-5.3,31.44-9.82,47.52-12.87V0Z"
                opacity=".5" fill="#ffffff"></path>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="#ffffff"></path>
        </svg>
    </div>

    <div class="container position-relative">
        {{-- Main Footer Content --}}
        <div class="row g-4 pb-5">
            {{-- Company Info --}}
            <div class="col-lg-4 col-md-6">
                <div class="pe-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div class="bg-primary rounded-3 p-2 d-inline-flex">
                            <i class="bi bi-briefcase-fill text-white fs-4"></i>
                        </div>
                        <span class="fw-bold text-white h3 mb-0">JobFinder</span>
                    </div>
                    <p class="text-white-50 mb-4 lh-lg">Find your dream job today with thousands of listings from top
                        companies. Your next career move starts here.</p>

                    {{-- Contact Info --}}
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-envelope-fill text-primary"></i>
                            <span class="text-white-50">support@jobfinder.com</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-telephone-fill text-primary"></i>
                            <span class="text-white-50">+1 (555) 123-4567</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-geo-alt-fill text-primary"></i>
                            <span class="text-white-50">San Francisco, CA 94105</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2 col-md-6">
                <h6
                    class="text-white fw-semibold mb-4 position-relative d-inline-block pb-2 border-bottom border-primary border-3">
                    Quick Links</h6>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-chevron-right text-primary me-2 small"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jobs.index') }}"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-chevron-right text-primary me-2 small"></i>Browse Jobs
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-chevron-right text-primary me-2 small"></i>Companies
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-chevron-right text-primary me-2 small"></i>Career Advice
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-chevron-right text-primary me-2 small"></i>Salary Guide
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Resources --}}
            <div class="col-lg-2 col-md-6">
                <h6
                    class="text-white fw-semibold mb-4 position-relative d-inline-block pb-2 border-bottom border-primary border-3">
                    Resources</h6>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li>
                        <a href="#"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-file-text text-primary me-2 small"></i>Blog
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-question-circle text-primary me-2 small"></i>FAQs
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-shield-check text-primary me-2 small"></i>Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-file-earmark-text text-primary me-2 small"></i>Terms of Service
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-white-50 text-decoration-none d-inline-flex align-items-center hover-translate">
                            <i class="bi bi-headset text-primary me-2 small"></i>Support
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Newsletter & Social --}}
            <div class="col-lg-4 col-md-6">
                <h6
                    class="text-white fw-semibold mb-4 position-relative d-inline-block pb-2 border-bottom border-primary border-3">
                    Stay Updated</h6>
                <p class="text-white-50 small mb-3">Subscribe to get the latest job opportunities directly in your
                    inbox.</p>

                {{-- Newsletter Form --}}
                <form class="mb-4">
                    <div class="input-group">
                        <input type="email"
                            class="form-control bg-white bg-opacity-10 border-0 text-white rounded-3 py-3"
                            placeholder="Your email address" style="backdrop-filter: blur(10px);">
                        <button class="btn btn-primary rounded-3 px-4" type="submit">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                </form>

                {{-- Social Links --}}
                <h6 class="text-white fw-semibold mb-3">Follow Us</h6>
                <div class="d-flex gap-2">
                    <a href="#"
                        class="social-icon bg-primary bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center text-white text-decoration-none"
                        style="width: 45px; height: 45px; transition: all 0.3s ease;">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>
                    <a href="#"
                        class="social-icon bg-primary bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center text-white text-decoration-none"
                        style="width: 45px; height: 45px; transition: all 0.3s ease;">
                        <i class="bi bi-twitter-x fs-5"></i>
                    </a>
                    <a href="#"
                        class="social-icon bg-primary bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center text-white text-decoration-none"
                        style="width: 45px; height: 45px; transition: all 0.3s ease;">
                        <i class="bi bi-linkedin fs-5"></i>
                    </a>
                    <a href="#"
                        class="social-icon bg-primary bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center text-white text-decoration-none"
                        style="width: 45px; height: 45px; transition: all 0.3s ease;">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                    <a href="#"
                        class="social-icon bg-primary bg-opacity-10 rounded-3 d-inline-flex align-items-center justify-content-center text-white text-decoration-none"
                        style="width: 45px; height: 45px; transition: all 0.3s ease;">
                        <i class="bi bi-github fs-5"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Divider with Stats --}}
        <hr class="border-white border-opacity-10 my-4">

        {{-- Footer Bottom --}}
        <div class="row g-3 align-items-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-4">
                    <small class="text-white-50">&copy; {{ date('Y') }} JobFinder. All rights reserved.</small>
                    <a href="#" class="text-white-50 text-decoration-none small hover-opacity">Privacy</a>
                    <a href="#" class="text-white-50 text-decoration-none small hover-opacity">Terms</a>
                    <a href="#" class="text-white-50 text-decoration-none small hover-opacity">Cookies</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-md-end align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-people-fill text-primary"></i>
                        <span class="text-white-50 small">10K+ Companies</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-briefcase-fill text-primary"></i>
                        <span class="text-white-50 small">50K+ Jobs</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <span class="text-white-50 small">Trusted by 1M+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Custom Styles --}}
<style>
.pt-6 {
    padding-top: 5rem !important;
}

.hover-translate {
    transition: transform 0.3s ease;
}

.hover-translate:hover {
    transform: translateX(5px);
    color: white !important;
}

.hover-opacity {
    transition: opacity 0.3s ease;
}

.hover-opacity:hover {
    opacity: 0.8;
    color: white !important;
}

.social-icon {
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
}

.social-icon:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 10px 20px -5px rgba(102, 126, 234, 0.5);
}

.form-control:focus {
    box-shadow: none;
    border-color: #667eea;
    background: rgba(255, 255, 255, 0.15) !important;
}

.border-primary.border-3 {
    border-width: 3px !important;
    width: 50px;
    transition: width 0.3s ease;
}

h6:hover .border-primary.border-3 {
    width: 70px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .pt-6 {
        padding-top: 3rem !important;
    }

    footer .row>div {
        margin-bottom: 2rem;
    }
}
</style>