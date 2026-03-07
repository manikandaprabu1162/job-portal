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