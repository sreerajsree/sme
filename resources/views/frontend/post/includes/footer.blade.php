<footer class="footer-main">
    <div class="container-main">
        <div class="footer-contact">
            <div class="row">
                <div class="col-md-4 content-left">
                    <h3>Contact Us</h3>
                    <div class="text-12"><i class="bi bi-geo-alt-fill"></i> <p class="ps-2">#17 S Presbyterian Ave, <br> Atlantic City, <br>NJ 08401.</p></div>
                </div>
                <div class="col-md-4 content-middle">
                    <h3>Spotlight</h3>
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
                            <li><a href="" target="_blank" rel="nofollow"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="" target="_blank" rel="nofollow"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="https://twitter.com/smebizreview" target="_blank" rel="nofollow"><i class="bi bi-twitter-x"></i></a></li>
                            <li><a href="" target="_blank" rel="nofollow"><i class="bi bi-linkedin"></i></a></li>
                            <li><a href="" target="_blank" rel="nofollow"><i class="bi bi-youtube"></i></a></li>
                            <li><a href="" target="_blank" rel="nofollow"><i class="bi bi-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copy">
                Copyright © {{ date('Y') }} SME Business Review. All rights reserved.
            </div>
            <div class="footer-top">
                <ul>
                    <li><a href="{{ route('terms-and-conditions') }}">Terms of Use</a></li>
                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('cookie-policy') }}">Cookies Policy</a></li>
                    <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
                    <li><a target="_blank" rel="nofollow" href="{{ asset('sitemap.xml') }}">Site Map</a></li>
                    <li><a href="{{ url('about') }}">About Us</a></li>
                    <li><a href="{{ route('advertise') }}">Advertise</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>