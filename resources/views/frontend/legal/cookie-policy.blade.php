@extends('layouts.frontend')

@section('title', 'Cookie Policy - SME Business Review')

@section('meta')
    <meta name="description"
        content="Cookie Policy - SME Business Review">
    <meta name="keywords" content="web">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description"
        content="Cookie Policy - SME Business Review">
    <meta property="og:image" content="{{ asset('logo/image.webp') }}">
    <meta property="og:title" content="Cookie Policy - SME Business Review">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://smebusinessreview.com/">
    <meta property="twitter:title" content="Cookie Policy - SME Business Review">
    <meta property="twitter:description"
        content="Cookie Policy - SME Business Review">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image"
        content="{{ asset('logo/image.webp') }}?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizreview">
@endsection

@section('content')

    <div class="content-section">
        <div class="container-main about">
            <div class="row">
                <div class="content">
                    <h1 class="header-title">Cookie Policy</h1>
                    <h2>What is a cookie?</h2>
                    <p>
                        Cookies are small pieces of data, stored in text files, that are stored on your computer or other
                        device when
                        websites are loaded in a browser. They are used to "remember" you and your preferences, either for a
                        single
                        visit or for multiple repeat visits. Websites and emails may also contain other tracking
                        technologies such as
                        "web beacons" or "pixels." These are typically small transparent images that provide us with
                        statistics, for
                        similar purposes as cookies. They are often used in conjunction with cookies, though they are not
                        stored on
                        your computer in the same way as cookies. As a result, if you disable cookies, web beacons may still
                        load, but
                        their functionality will be restricted.
                    </p>
                    <h2>How do we use cookies?</h2>
                    <p>
                        We use cookies for several different purposes. Some cookies are necessary for technical reasons,
                        some enable
                        a personalized experience for both registered and unregistered users. And some allow the display of
                        advertising
                        from selected third party networks. Some of these cookies may be set when a page is loaded, or when
                        a user
                        takes a particular action on on the website. Many of the cookies we use are only set if you are a
                        registered
                        user, while others are set whenever you visit our website (irrespective of whether you have an
                        account).
                    </p>
                    <h2>What types of cookies do we use?</h2>
                    <ul>
                        <li>
                            <span class="fw-bold">Necessary</span> - cookies that are essential to provide you with services
                            you have
                            requested. These include the cookies that make it possible for you to stay logged into your
                            account and
                            make comments. If you set your browser to block these cookies, then these functions and services
                            will not
                            work for you.
                        </li>
                        <li>
                            <span class="fw-bold">Functionality</span> - these cookies are used to store preferences set by
                            users such
                            as account name, language and location.
                        </li>
                        <li>
                            <span class="fw-bold">Performance</span> - cookies that collect information on how users interact
                            with our
                            website, including what pages are visited most, as well as other analytical data. We use these
                            details to
                            improve how our service function and to understand how users interact with our website.
                        </li>
                        <li>
                            <span class="fw-bold">Advertising</span> - these cookies are used to display relevant advertising
                            to users
                            who use our service, as well as to understand and report on the efficacy of ads served on our
                            website.
                            They track details such as the number of unique visitors, the number of times particular ads
                            have been
                            displayed, and the number of clicks the ads have received.
                        </li>
                        <li>
                            <span class="fw-bold">Third party</span> - services hosted by us make use of different third party
                            applications and services to enhance the experience of website visitors. These include social
                            media
                            platforms such as Facebook and Twitter (through the use of sharing buttons). As a result,
                            cookies may be
                            set by these third parties, and used by them to track your online activity. We have no direct
                            control over
                            the information that is collected by these cookies.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
