<footer class="footer-main">
    <div class="container">
        <div class="footer-top">
            <ul>
                <li><a href="">Terms of Use</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Cookies Policy</a></li>
                <li><a href="">Site Map</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="{{ url('about') }}">About</a></li>
                <li><a href="">Advertise</a></li>
            </ul>
        </div>
        <livewire:subscription />
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