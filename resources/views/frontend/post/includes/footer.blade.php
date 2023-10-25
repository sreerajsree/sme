<footer class="footer-main">
    <div class="container-main">
        <div class="footer-contact">
            <div class="content-left">
                <h3>Contact Us</h3>
                <p class="text-16">#17 S Presbyterian Ave,<br> Atlantic City,<br> NJ 08401</p>
            </div>
            <div class="content-right">
                <div class="mail">
                    <h3>Get In Touch With Us</h3>
                    <p><a href="mailto:contact@smebusinessreview.com">contact@smebusinessreview.com</a></p>
                    <p><a href="mailto:sales@smebusinessreview.com">sales@smebusinessreview.com</a></p>
                </div>
                <div class="social">
                    <ul>
                        <li><a href=""><i class="bi bi-facebook"></i></a></li>
                        <li><a href=""><i class="bi bi-instagram"></i></a></li>
                        <li><a href=""><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href=""><i class="bi bi-linkedin"></i></a></li>
                        <li><a href=""><i class="bi bi-youtube"></i></a></li>
                        <li><a href=""><i class="bi bi-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <ul>
                <li><a href="{{ route('terms-and-conditions') }}">Terms of Use</a></li>
                <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('cookie-policy') }}">Cookies Policy</a></li>
                <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
                <li><a href="">Site Map</a></li>
                <li><a href="{{ url('about') }}">About Us</a></li>
                <li><a href="">Advertise</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="copy">
                Copyright © {{ date('Y') }} SME Business Review All rights reserved.
            </div>
        </div>
    </div>
</footer>