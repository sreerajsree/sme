<footer class="footer-main">
    <div class="container-main">
        <div class="footer-contact">
            <div class="content">
                <h3>Contact Us</h3>
                <p class="text-16">#17 S Presbyterian Ave, Atlantic City, NJ 08401</p>
            </div>
            <div class="content">
                <h3>Get In Touch With Us</h3>
                <p><a href="mailto:contact@smebusinessreview.com"><i class="bi bi-envelope"></i> contact@smebusinessreview.com</a></p>
                <p><a href="mailto:sales@smebusinessreview.com"><i class="bi bi-envelope"></i> sales@smebusinessreview.com</a></p>
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
                Copyright © {{ date('Y') }} SME Business Review All rights reserved. SME Business Review® and its related marks are registered trademarks of SME Business Review
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
</footer>