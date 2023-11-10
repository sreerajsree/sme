@php
    $mag_footer = \App\Models\Magazine::where('published', 1)->orderBy('date','desc')->take(2)->get();
@endphp

<footer class="footer-main">
    <div class="container-main">
        <div class="footer-contact">
            <div class="row">
                <div class="col-md-2 content-middle">
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
                    <h3>Latest Magazine</h3>
                    <div class="footer-mag">
                        @foreach ($mag_footer as $item)
                        <a href="{{ url('magazine', [$item->year, $item->url]) }}">
                            <img src="{{ Storage::url('magazines/' . $item->year . '/' . $item->issue . '/' . $item->type . '/' . $item->image) }}"
                                alt="{{ $item->name }}">
                        </a>
                        @endforeach
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
    </div>
</footer>