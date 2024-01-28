<footer class="footer-main">
    <div class="container-main">
        <div class="footer-contact">
            <div class="row">
                <div class="col-md-2 content-middle">
                    <h3>Focus Areas</h3>
                    <ul>
                        <li><a href="{{ url('category/industry') }}">Industry</a></li>
                        <li><a href="{{ url('category/platform') }}">Platform</a></li>
                        <li><a href="{{ url('category/technology') }}">Technology</a></li>
                        <li><a href="{{ url('magazines') }}">Magazines</a></li>
                        <li><a href="{{ url('news') }}">News</a></li>
                        <li><a href="{{ url('opinion') }}">Opinion</a></li>
                        <li><a href="{{ url('newsletter') }}">Newsletter</a></li>
                    </ul>
                </div>
                <div class="col-md-4 content-right">
                    <div class="mail">
                        <h3>Get In Touch With Us</h3>
                        <p><a href="mailto:contact@smebusinessreview.com"><i class="bi bi-envelope-fill"></i><span class="ps-2">contact@smebusinessreview.com</span></a></p>
                        <p><a href="mailto:sales@smebusinessreview.com"><i class="bi bi-envelope-fill"></i><span class="ps-2">sales@smebusinessreview.com</span></a></p>
                    </div>
                    <div class="social" id="soc">
                        <ul>
                            <li><a href="https://www.facebook.com/smebusinessreview" target="_blank" rel="nofollow"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/smebusinessreview" target="_blank" rel="nofollow"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="https://twitter.com/smebizreview" target="_blank" rel="nofollow"><i class="bi bi-twitter-x"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/sme-business-review" target="_blank" rel="nofollow"><i class="bi bi-linkedin"></i></a></li>
                            <li><a href="https://www.youtube.com/@smebusinessreviewofficial" target="_blank" rel="nofollow"><i class="bi bi-youtube"></i></a></li>
                            <li><a href="https://www.pinterest.com/smebusinessreview" target="_blank" rel="nofollow"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <img src="{{ asset('logo/pci-dss.svg') }}" class="pcidss" alt="PCI DSS Validated">
                </div>
                <div class="col-md-2 content-middle">
                    <h3>More</h3>
                    <ul>
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="{{ route('terms-and-conditions') }}">Terms of Use</a></li>
                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('cookie-policy') }}">Cookies Policy</a></li>
                        <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
                        <li><a target="_blank" rel="nofollow" href="{{ asset('sitemap.xml') }}">Site Map</a></li>
                        <li><a href="{{ route('advertise') }}">Advertise</a></li>
                    </ul>
                </div>
                <div class="col-md-4 content-middle">
                    <h3>SME Business Review</h3>
                    {{-- <h3><a href="{{ url('/') }}"><img class="logo-footer" src="{{ asset('logo/logo-white.png') }}"
                        alt="SME Business Review Logo"></a></h3> --}}
                    <div class="footer-mag">
                        <p>SME Business Review, or SMEBR, is a top-rated global business and technology magazine, catering to the SME sector. It promotes brands and executives alike.</p>
                    </div>
                    <div class="footer-mag">
                        <p>SMEBR strives toward the development and innovation of the SME sector by offering required knowledge to ensure that entrepreneurs remain competitive.</p>
                    </div>
                </div>
            </div>
            <div class="text-12"><i class="bi bi-geo-alt-fill"></i> <p class="ps-2 m-0">#17 S Presbyterian Ave, Atlantic City, NJ 08401.</p></div>
        </div>
        <div class="footer-bottom">
            <div class="copy">
                Copyright © {{ date('Y') }} SME Business Review. All rights reserved.
            </div>
        </div>
        @auth
            <p class="text-center m-0 py-2"><a href="/dashboard/sme/posts" class="text-white">Dashboard</a></p>
        @endauth
    </div>
</footer>