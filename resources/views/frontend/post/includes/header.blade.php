<div class="content-overlay"></div>
<header class="sidenav" id="sidenav">
    <div class="sidenav__close">
        <button id="sidenav__close-button" aria-label="close sidenav">
            <div class="sidenav__close-icon close-button-main">
                <i class="fa-solid fa-close"></i>
            </div>
        </button>
    </div>

    <nav class="sidenav__menu-container">
        <ul class="sidenav__menu" role="menubar">
            <li>
                <a href="{{ url('category/industy') }}" class="sidenav__menu-url head">Industry</a>
                <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
                        class="fa-solid fa-angle-down"></i></button>
                <ul class="sidenav__menu-dropdown">
                    <li><a href="{{ url('automobile') }}" class="sidenav__menu-url">Automobile</a></li>
                    <li><a href="{{ url('architecture-and-interior-design') }}" class="sidenav__menu-url">Architecture &
                            Interior Design</a>
                    </li>
                    <li><a href="{{ url('aviation') }}" class="sidenav__menu-url">Aviation</a></li>
                    <li><a href="{{ url('aerospace') }}" class="sidenav__menu-url">Aerospace</a></li>
                    <li><a href="{{ url('banking-and-insurance') }}" class="sidenav__menu-url">Banking & Insurance</a>
                    </li>
                    <li><a href="{{ url('bio-tech') }}" class="sidenav__menu-url">Bio Tech</a></li>
                    <li><a href="{{ url('cryptocurrency') }}" class="sidenav__menu-url">Cryptocurrency</a></li>
                    <li><a href="{{ url('clean-energy') }}" class="sidenav__menu-url">Clean Energy</a></li>
                    <li><a href="{{ url('compliance-and-governance') }}" class="sidenav__menu-url">Compliance &
                            Governance</a></li>
                    <li><a href="{{ url('shipping-and-logistics') }}" class="sidenav__menu-url">Shipping &
                            Logistics</a>
                    </li>
                    <li><a href="{{ url('chemicals-and-fertilizers') }}" class="sidenav__menu-url">Chemicals &
                            Fertilizers</a></li>
                    <li><a href="{{ url('digital-marketing') }}" class="sidenav__menu-url">Digital Marketing</a></li>
                    <li><a href="{{ url('ecommerce') }}" class="sidenav__menu-url">E-Commerce</a></li>
                    <li><a href="{{ url('environmental-sustainability') }}" class="sidenav__menu-url">Environmental
                            Sustainability</a></li>
                    <li><a href="{{ url('ed-tech') }}" class="sidenav__menu-url">Ed Tech</a></li>
                    <li><a href="{{ url('erp') }}" class="sidenav__menu-url">ERP</a></li>
                    <li><a href="{{ url('electric-and-concept-cars') }}" class="sidenav__menu-url">Electric & Concept
                            Cars</a></li>
                    <li><a href="{{ url('food-and-beverages') }}" class="sidenav__menu-url">Food & Beverages</a></li>
                    <li><a href="{{ url('fintech') }}" class="sidenav__menu-url">FinTech</a></li>
                    <li><a href="{{ url('gaming-and-vfx') }}" class="sidenav__menu-url">Gaming & VFX</a></li>
                    <li><a href="{{ url('healthcare') }}" class="sidenav__menu-url">Healthcare</a></li>
                    <li><a href="{{ url('legal') }}" class="sidenav__menu-url">Legal</a></li>
                    <li><a href="{{ url('lifestyle-and-fashion') }}" class="sidenav__menu-url">Lifestyle & Fashion</a>
                    </li>
                    <li><a href="{{ url('media-and-entertainment') }}" class="sidenav__menu-url">Media &
                            Entertainment</a>
                    </li>
                    <li><a href="{{ url('marketing-and-advertising') }}" class="sidenav__menu-url">Marketing &
                            Advertising</a></li>
                    <li><a href="{{ url('metals-and-mining') }}" class="sidenav__menu-url">Metals & Mining</a></li>
                    <li><a href="{{ url('management-consulting') }}" class="sidenav__menu-url">Management
                            Consulting</a>
                    </li>
                    <li><a href="{{ url('oil-and-gas') }}" class="sidenav__menu-url">Oil & Gas</a></li>
                    <li><a href="{{ url('retail') }}" class="sidenav__menu-url">Retail</a></li>
                    <li><a href="{{ url('real-estate') }}" class="sidenav__menu-url">Real Estate</a></li>
                    <li><a href="{{ url('robotics') }}" class="sidenav__menu-url">Robotics</a></li>
                    <li><a href="{{ url('semiconductor-and-electronics') }}" class="sidenav__menu-url">Semiconductor &
                            Electronics</a></li>
                    <li><a href="{{ url('space-and-defence') }}" class="sidenav__menu-url">Space & Defense</a></li>
                    <li><a href="{{ url('startups') }}" class="sidenav__menu-url">Startups</a></li>
                    <li><a href="{{ url('stock-and-commodity-market') }}" class="sidenav__menu-url">Stock & Commodity
                            Market</a></li>
                    <li><a href="{{ url('supply-chain-management') }}" class="sidenav__menu-url">Supply Chain
                            Management</a></li>
                    <li><a href="{{ url('telecom') }}" class="sidenav__menu-url">Telecom</a></li>
                    <li><a href="{{ url('travel-and-hospitality') }}" class="sidenav__menu-url">Travel &
                            Hospitality</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('category/platform') }}" class="sidenav__menu-url head">Platform</a>
                <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
                        class="fa-solid fa-angle-down"></i></button>
                <ul class="sidenav__menu-dropdown">
                    <li><a href="{{ url('byod') }}" class="sidenav__menu-url">BYOD</a></li>
                    <li><a href="{{ url('cisco') }}" class="sidenav__menu-url">Cisco</a></li>
                    <li><a href="{{ url('citrix') }}" class="sidenav__menu-url">Citrix</a></li>
                    <li><a href="{{ url('saas') }}" class="sidenav__menu-url">SaaS</a></li>
                    <li><a href="{{ url('google') }}" class="sidenav__menu-url">Google</a></li>
                    <li><a href="{{ url('ibm') }}" class="sidenav__menu-url">IBM</a></li>
                    <li><a href="{{ url('juniper') }}" class="sidenav__menu-url">Juniper</a></li>
                    <li><a href="{{ url('wireless') }}" class="sidenav__menu-url">Wireless</a></li>
                    <li><a href="{{ url('m2m') }}" class="sidenav__menu-url">M2M</a></li>
                    <li><a href="{{ url('oracle') }}" class="sidenav__menu-url">Oracle</a></li>
                    <li><a href="{{ url('salesforce') }}" class="sidenav__menu-url">Salesforce</a></li>
                    <li><a href="{{ url('database-management') }}" class="sidenav__menu-url">Database Management</a>
                    </li>
                    <li><a href="{{ url('microsoft') }}" class="sidenav__menu-url">Microsoft</a></li>
                    <li><a href="{{ url('red-hat') }}" class="sidenav__menu-url">Red Hat</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('category/technology') }}" class="sidenav__menu-url head">Technology</a>
                <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i
                        class="fa-solid fa-angle-down"></i></button>
                <ul class="sidenav__menu-dropdown">
                    <li><a href="{{ url('artificial-intelligence') }}" class="sidenav__menu-url">Artificial
                            Intelligence</a></li>
                    <li><a href="{{ url('cloud') }}" class="sidenav__menu-url">Cloud</a></li>
                    <li><a href="{{ url('appliances-and-electronic-equipment') }}"
                            class="sidenav__menu-url">Appliances
                            and Electronic Equipment</a></li>
                    <li><a href="{{ url('mobile') }}" class="sidenav__menu-url">Mobile</a></li>
                    <li><a href="{{ url('big-data') }}" class="sidenav__menu-url">Big Data</a></li>
                    <li><a href="{{ url('cybersecurity') }}" class="sidenav__menu-url">Cybersecurity</a></li>
                    <li><a href="{{ url('it-services') }}" class="sidenav__menu-url">IT Services</a></li>
                    <li><a href="{{ url('networking') }}" class="sidenav__menu-url">Networking</a></li>
                    <li><a href="{{ url('blockchain') }}" class="sidenav__menu-url">Blockchain</a></li>
                    <li><a href="{{ url('data-analytics') }}" class="sidenav__menu-url">Data Analytics</a></li>
                    <li><a href="{{ url('iot') }}" class="sidenav__menu-url">IOT</a></li>
                    <li><a href="{{ url('video-conferencing') }}" class="sidenav__menu-url">Video Conferencing</a>
                    </li>
                    <li><a href="{{ url('quality-assurance') }}" class="sidenav__menu-url">Quality Assurance</a></li>
                    <li><a href="{{ url('sap') }}" class="sidenav__menu-url">SAP</a></li>
                    <li><a href="{{ url('software') }}" class="sidenav__menu-url">Software</a></li>
                </ul>
            </li>
            <li><a href="{{ url('magazines') }}" class="sidenav__menu-url head">Magazines</a></li>
            <li><a href="{{ url('news') }}" class="sidenav__menu-url head">News</a></li>
            <li><a href="{{ url('opinion') }}" class="sidenav__menu-url head">Opinion</a></li>
            <li><a href="{{ url('tag/slush') }}" class="sidenav__menu-url head">Slush<span
                        class="badge rounded-pill bg-danger ms-1">
                        New!
                    </span></a></li>
            <li><a href="{{ url('newsletter') }}" class="sidenav__menu-url head">Newsletter</a></li>
        </ul>
        {{-- <div class="social-icon">
            <ul class="contact-icons-side">
                <li class="link-item">
                    <a href="https://www.facebook.com/thefashionenthusiast.uk/" target="_blank" title="Facebook">
                        <i class="social-icon-size-side fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a href="https://www.instagram.com/thefashionenthusiast.uk/" target="_blank" title="Instagram">
                        <i class="social-icon-size-side fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a href="https://twitter.com/TFE_Worldwide" target="_blank" title="X">
                        <i class="social-icon-size-side fa-brands fa-x-twitter"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a href="https://www.linkedin.com/company/thefashionenthusiast/" target="_blank"
                        title="Linkedin">
                        <i class="social-icon-size-side fa-brands fa-linkedin-in"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a href="https://www.threads.net/@thefashionenthusiast.uk" target="_blank"
                        title="Threads">
                        <i class="social-icon-size fa-brands fa-threads"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a href="https://www.pinterest.com/TFE_Official/" target="_blank" title="Pinterest">
                        <i class="social-icon-size-side fa-brands fa-pinterest"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a href="https://www.youtube.com/@thefashionenthusiastofficial" target="_blank" title="Youtube">
                        <i class="social-icon-size-side fa-brands fa-youtube"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a href="https://news.google.com/publications/CAAqBwgKMN7MyQswnujgAw" target="_blank"
                        title="Google News">
                        <i class="social-icon-size-side fa-brands fa-google"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a href="https://flipboard.com/@tfe_official" target="_blank" title="Flipboard">
                        <i class="social-icon-size-side fa-brands fa-flipboard"></i>
                    </a>
                </li>
            </ul>
        </div> --}}
        {{-- <ul class="sidenav__menu" role="menubar">
            <li>
                <a href="{{ route('about') }}" class="sidenav__menu-url">About</a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="sidenav__menu-url">Contact</a>
            </li>
            <li>
                <a href="{{ route('advertise') }}" class="sidenav__menu-url">Advertise</a>
            </li>
            <li>
                <a href="{{ route('cookie-policy') }}" class="sidenav__menu-url">Cookie Policy</a>
            </li>
            <li>
                <a href="{{ route('privacy-policy') }}" class="sidenav__menu-url">Privacy</a>
            </li>
            <li>
                <a href="{{ route('terms-and-conditions') }}" class="sidenav__menu-url">Terms & Conditions</a>
            </li>
            <li>
                <a href="" class="sidenav__menu-url">Sitemap</a>
            </li>
        </ul> --}}
        {{-- <div class="smemain">
            <p>© {{ date('Y') }} Nine Days' Wonder Media Group <span>All Rights Reserved.</span></p>
        </div> --}}
    </nav>
</header>

<nav class="navbar">
    <div class="top-header">
        <a href="{{ url('/') }}"><img class="logo" src="{{ asset('logo/logo.png') }}"
                alt="SME Business Review Logo"></a>
    </div>
    <div class="container-main">
        <div class="logo-section">
            <div class="menu-open nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
                <div class="menu">
                    <i class="bi bi-list" style="font-size: 2rem;"></i>
                </div>
            </div>
        </div>
        <div class="res-logo">
            <a href="{{ url('/') }}"><img class="logo" src="{{ asset('logo/logo.png') }}"
                    alt="SME Business Review Logo"></a>
        </div>

        <div class="site-menu">
            <ul>
                <li><a href="{{ url('category/industry') }}">Industry</a></li>
                <li><a href="{{ url('category/platform') }}">Platform</a></li>
                <li><a href="{{ url('category/technology') }}">Technology</a></li>
                <li><a href="{{ url('magazines') }}">Magazines</a></li>
                <li><a href="{{ url('news') }}">News</a></li>
                <li><a href="{{ url('opinion') }}">Opinion</a></li>
                <li><a href="{{ url('tag/slush') }}">Slush<span class="badge rounded-pill bg-danger ms-1">
                            New!
                        </span></a></li>
                <li><a href="{{ url('slush/gallery') }}">Gallery<span class="badge rounded-pill bg-danger ms-1">
                            New!
                        </span></a></li>
                <li><a href="{{ url('newsletter') }}">Newsletter</a></li>
            </ul>
        </div>

        <div class="site-menu-right m-0">
            <div class="search-button" id="search">
                <svg fill="#fff" width="28px" height="28px" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.9994165,16.2923098 L20.8535534,20.1464466 C21.0488155,20.3417088 21.0488155,20.6582912 20.8535534,20.8535534 C20.6582912,21.0488155 20.3417088,21.0488155 20.1464466,20.8535534 L16.2923098,16.9994165 C14.8819612,18.2444908 13.0292099,19 11,19 C6.581722,19 3,15.418278 3,11 C3,6.581722 6.581722,3 11,3 C15.418278,3 19,6.581722 19,11 C19,13.0292099 18.2444908,14.8819612 16.9994165,16.2923098 Z M11,18 C14.8659932,18 18,14.8659932 18,11 C18,7.13400675 14.8659932,4 11,4 C7.13400675,4 4,7.13400675 4,11 C4,14.8659932 7.13400675,18 11,18 Z" />
                </svg>
            </div>
        </div>
    </div>
</nav>

<div class="search-overlay">
    <span class="close-search">&times;</span>
    <form action="{{ route('search.index') }}" method="GET" class="search-input" autocomplete="off">
        @include('layouts.includes.fullscreen-search')
    </form>
</div>
