@extends('layouts.frontend')

@section('title', 'SME Business Review™: Top Business Magazine & News Platform')

@section('meta')
    <meta name="description"
        content="SME Business Review is a top-rated global business and technology magazine, catering to the SME sector. It promotes brands and executives alike">
    <meta name="keywords" content="">
    <meta name="news_keywords" content="">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="homepage">
    <meta property="og:description"
        content="SME Business Review is a top-rated global business and technology magazine, catering to the SME sector. It promotes brands and executives alike">
    <meta property="og:image"
        content="{{ Storage::url('news/' . $featured->photo->year . '/' . $featured->photo->month . '/' . $featured->photo->path) }}">
    <meta property="og:title" content="SME Business Review™: Top Business Magazine & News Platform">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="SME Business Review™: Top Business Magazine & News Platform">
    <meta property="twitter:description"
        content="SME Business Review is a top-rated global business and technology magazine, catering to the SME sector. It promotes brands and executives alike">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image"
        content="{{ Storage::url('news/' . $featured->photo->year . '/' . $featured->photo->month . '/' . $featured->photo->path) }}?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizreview">
    <meta name="dcterms.rightsHolder" content="SME Business Review. All rights reserved.">
    <meta name="dcterms.dateCopyrighted" content="{{ now()->year }}">
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"Organization","name":"SME Business Review™: Top Business Magazine & News Platform","logo":{"@type":"ImageObject","url":"{{ asset('logo/logo.png') }}","width":"500px","height":"152px"},"url":"http://smebusinessreview.com/"}</script>
    <script type="application/ld+json">
        {
        "@context": "https://schema.org/
        ",
        "@type": "WebSite",
        "name": "SME Business Review",
        "url": "https://smebusinessreview.com/
        ",
        "potentialAction": {
        "@type": "SearchAction",
        "target": "https://smebusinessreview.com/search?keyword
        ={search_term_string}",
        "query-input": "required name=search_term_string"
        }
        }
        </script>
@endsection

@section('content')
    <div class="container-main mt-2">
        <div class="row">
            <div class="col-md-9">
                <h2 class="heading-null"><span>&nbsp;</span></h2>
                <div class="row">
                    <div class="bottom-profile">
                        <div class="row align-items-center" style="background-color: #C2CAD0;">
                            <div class="col-md-6 p-0">
                                <a href="{{ route('post.show', [$mag[0]->category->url, $mag[0]->slug]) }}" class="img">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('news/' . $mag[0]->photo->year . '/' . $mag[0]->photo->month . '/' . $mag[0]->photo->path) }}"
                                        alt="{{ $mag[0]->alt }}">
                                </a>
                            </div>
                            <div class="col-md-6 p-0">
                                <div class="content-mag">
                                    <div class="category"><a
                                            href="{{ url($mag[0]->category->url) }}">{{ $mag[0]->category->title }}</a>
                                    </div>
                                    <h3 class="title"><a
                                            href="{{ route('post.show', [$mag[0]->category->url, $mag[0]->slug]) }}">{{ $mag[0]->title }}</a>
                                    </h3>
                                    <p class="subtitle">{{ $mag[0]->description }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    @for ($i = 1; $i < 4; $i++)
                        <div class="col-md-4 border-dotted-bottom">
                            <div class="t-post-leadership">
                                <a href="{{ route('post.show', [$mag[$i]->category->url, $mag[$i]->slug]) }}"
                                    class="img">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('news/' . $mag[$i]->photo->year . '/' . $mag[$i]->photo->month . '/' . $mag[$i]->photo->path) }}"
                                        alt="{{ $mag[$i]->alt }}">
                                </a>
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($mag[$i]->category->url) }}">{{ $mag[$i]->category->title }}</a>
                                    </div>
                                    <h3 class="title"><a
                                            href="{{ route('post.show', [$mag[$i]->category->url, $mag[$i]->slug]) }}">{{ $mag[$i]->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="mag-heading text-uppercase"><span>spotlight</span></h2>
                <div class="mag-container">
                    <a href="{{ url('magazine', [$latestmagazine->year, $latestmagazine->url]) }}">
                        <img src="{{ Storage::url('magazines/' . $latestmagazine->year . '/' . $latestmagazine->issue . '/' . $latestmagazine->type . '/' . $latestmagazine->image) }}"
                            alt="{{ $latestmagazine->name }}">
                    </a>
                </div>
                <div class="w-100 mt-4">
                    <a href="https://finlittoday.com/" target="_blank"><img src="{{ asset('logo/finlittoday.png') }}"
                            alt="Finlit Advertisement"></a>
                </div>
            </div>
        </div>
        <div class="content-section">
            <div class="row">
                <div class="col-md-9">
                    <div class="row bg-fc">
                        <div class="col-md-12">
                            <h2 class="mvp-widget-home-title py20px"> <span class="mvp-widget-home-title">Monthly</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row bg-fc">
                        <div class="col-md-8">
                            <div class="main-post">
                                <a href="{{ url('profiles', [$profiles_monthly[0]->type, $profiles_monthly[0]->url]) }}">
                                    <img class="lazyload"
                                        src="{{ Storage::url('magazines/' . $profiles_monthly[0]->mag_year . '/' . $profiles_monthly[0]->mag_issue . '/' . $profiles_monthly[0]->mag_type . '/profiles/' . $profiles_monthly[0]->image) }}"
                                        alt="{{ $profiles_monthly[0]->title }}" fetchpriority="high">
                                </a>
                                <div class="content py-3">
                                    <div class="category"><a>Monthly</a>
                                    </div>
                                    <h3 class="title"><a
                                            href="{{ url('profiles', [$profiles_monthly[0]->type, $profiles_monthly[0]->url]) }}">{{ $profiles_monthly[0]->name }}</a>
                                    </h3>
                                    <p class="mt-2 subtitle">
                                        {!! $profiles_monthly[0]->subtitle !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @for ($i = 1; $i < 4; $i++)
                                <div class="sidepost-tr">
                                    <div class="content">
                                        <div class="category"><a>Monthly</a>
                                        </div>
                                        <h3 class="title mb-2"><a
                                                href="{{ url('profiles', [$profiles_monthly[$i]->type, $profiles_monthly[$i]->url]) }}">{{ $profiles_monthly[$i]->name }}</a>
                                        </h3>
                                        <p class="m-0 text-2lines subtitle">
                                            {!! $profiles_monthly[$i]->subtitle !!}
                                        </p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="bottom-profile py-2">
                        <hr>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mvp-widget-home-title py20px"> <span class="mvp-widget-home-title">Latest Edition</span>
                    </h2>
                    <div class="side-height slider-vertical-profiles">
                        @foreach ($edition as $item)
                            <div>
                                <div class="sidepost-tr">
                                    <div class="content">
                                        <div class="category"><a href="{{ url('magazines') }}">Magazine</a>
                                        </div>
                                        <h3 class="title text-2lines-o"><a
                                                href="{{ url('profiles', [$item->type, $item->url]) }}">{{ $item->name }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-main">
        <div class="content-section">
            <div class="row">
                <div class="col-md-9">
                    <div class="bg-yellow">
                        <div class="row">
                            <div class="col-md-12 promotional">
                                <h2 class="mvp-widget-home-title spons py20px border-bottom border-light"> <span
                                        class="text-light mvp-widget-home-title">Sponsored Features</span>
                                </h2>
                            </div>
                            <div class="col-md-8">
                                <div class="t-post">
                                    <a href="{{ route('post.show', [$sponsored[0]->category->url, $sponsored[0]->slug]) }}"
                                        class="img">
                                        <img class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                            data-src="{{ Storage::url('news/' . $sponsored[0]->photo->year . '/' . $sponsored[0]->photo->month . '/' . $sponsored[0]->photo->path) }}"
                                            alt="{{ $sponsored[0]->alt }}">
                                    </a>
                                    <div class="content">
                                        <div class="category"><a
                                                href="{{ url($sponsored[0]->category->url) }}">{{ $sponsored[0]->category->title }}</a>
                                        </div>
                                        <h3 class="title fs-24"><a
                                                href="{{ route('post.show', [$sponsored[0]->category->url, $sponsored[0]->slug]) }}">{{ $sponsored[0]->title }}</a>
                                        </h3>
                                        <p class="subtitle">
                                            {!! $sponsored[0]->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @for ($i = 1; $i < 3; $i++)
                                    <div class="t-post">
                                        <a href="{{ route('post.show', [$sponsored[$i]->category->url, $sponsored[$i]->slug]) }}"
                                            class="img">
                                            <img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                                data-src="{{ Storage::url('news/' . $sponsored[$i]->photo->year . '/' . $sponsored[$i]->photo->month . '/' . $sponsored[$i]->photo->path) }}"
                                                alt="{{ $sponsored[$i]->alt }}">
                                        </a>
                                        <div class="content">
                                            <div class="category"><a
                                                    href="{{ url($sponsored[$i]->category->url) }}">{{ $sponsored[$i]->category->title }}</a>
                                            </div>
                                            <h3 class="title"><a
                                                    href="{{ route('post.show', [$sponsored[$i]->category->url, $sponsored[$i]->slug]) }}">{{ $sponsored[$i]->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="row bottom-profile my-2">
                        <hr>
                    </div>
                    <div class="row bg-fc">
                        <div class="col-md-12">
                            <h2 class="mvp-widget-home-title py20px"> <span class="mvp-widget-home-title">Yearly</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row mb-5 bg-fc">
                        <div class="col-md-8">
                            <div class="main-post">
                                <a href="{{ url('profiles', [$profiles_yearly[0]->type, $profiles_yearly[0]->url]) }}">
                                    <img class="lazyload"
                                        src="{{ Storage::url('magazines/' . $profiles_yearly[0]->mag_year . '/' . $profiles_yearly[0]->mag_issue . '/' . $profiles_yearly[0]->mag_type . '/profiles/' . $profiles_yearly[0]->image) }}"
                                        alt="{{ $profiles_yearly[0]->title }}" fetchpriority="high">
                                </a>
                                <div class="content py-3">
                                    <div class="category"><a>Yearly</a>
                                    </div>
                                    <h3 class="title"><a
                                            href="{{ url('profiles', [$profiles_yearly[0]->type, $profiles_yearly[0]->url]) }}">{{ $profiles_yearly[0]->name }}</a>
                                    </h3>
                                    <p class="mt-2 subtitle">
                                        {!! $profiles_yearly[0]->subtitle !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            @for ($i = 1; $i < 4; $i++)
                                <div class="sidepost-tr">
                                    <div class="content">
                                        <div class="category"><a>Yearly</a>
                                        </div>
                                        <h3 class="title mb-2"><a
                                                href="{{ url('profiles', [$profiles_yearly[$i]->type, $profiles_yearly[$i]->url]) }}">{{ $profiles_yearly[$i]->name }}</a>
                                        </h3>
                                        <p class="m-0 text-2lines subtitle">
                                            {!! $profiles_yearly[$i]->subtitle !!}
                                        </p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mvp-widget-home-title py20px"> <span class="mvp-widget-home-title">Newsroom</span>
                    </h2>
                    <div class="slider-vertical-latest latest-overflow">
                        @foreach ($latest as $trend)
                            <div class="sidepost-tr">
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($trend->category->url) }}">{{ $trend->category->title }}</a>
                                    </div>
                                    <h3 class="title text-2lines-o"><a
                                            href="{{ route('post.show', [$trend->category->url, $trend->slug]) }}">{{ $trend->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-main">
        <div class="content-section">
            <div class="row">
                <div class="bottom-profile">
                    <hr>
                    <h2 class="magazines-heading text-uppercase"><span>ceo of the month</span></h2>
                    <hr>
                    <div class="row align-items-center" style="background-color: #C2CAD0;">
                        <div class="col-md-6 p-0">
                            <a href="{{ url('profiles', [$profile_bottom->type, $profile_bottom->url]) }}"
                                class="img">
                                <img class="lazyload"
                                    src="{{ Storage::url('magazines/' . $profile_bottom->mag_year . '/' . $profile_bottom->mag_issue . '/' . $profile_bottom->mag_type . '/profiles/' . $profile_bottom->image) }}"
                                    alt="{{ $profile_bottom->title }}" fetchpriority="high">
                            </a>
                        </div>
                        <div class="col-md-6 p-0">
                            <div class="content-leadership">
                                <div class="category"><a href="{{ url('magazines') }}">Magazine</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ url('profiles', [$profile_bottom->type, $profile_bottom->url]) }}">{{ $profile_bottom->title }}</a>
                                </h3>
                                <p class="subtitle">{{ $profile_bottom->subtitle }}</p>
                                <p class="author">By <b>SMEBR</b></p>
                                <p class="date">{{ date('F j, Y', strtotime($profile_bottom->date)) }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="container-main">
        <div class="py-2">
            <a href="https://h2o.ai/" target="_blank">
                <img class="lazyload ad-image"
                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                    data-src="{{ asset('ads/h20aiwebad.jpg') }}" alt="H20.ai Ad" fetchpriority="high">
            </a>
        </div>
    </div>
    <div class="container-main">
        <div class="content-section">
            <h2 class="mvp-widget-home-title wid-p py20px"> <span class="mvp-widget-home-title">Leadership</span></h2>
            <div class="row">
                <div class="bottom-profile">
                    <div class="row align-items-center" style="background-color: #C2CAD0;">
                        <div class="col-md-6 p-0">
                            <a href="{{ route('post.show', [$leadership[0]->category->url, $leadership[0]->slug]) }}"
                                class="img">
                                <img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                    data-src="{{ Storage::url('news/' . $leadership[0]->photo->year . '/' . $leadership[0]->photo->month . '/' . $leadership[0]->photo->path) }}"
                                    alt="{{ $leadership[0]->alt }}">
                            </a>
                        </div>
                        <div class="col-md-6 p-0">
                            <div class="content-leadership">
                                <div class="category"><a
                                        href="{{ url($leadership[0]->category->url) }}">{{ $leadership[0]->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$leadership[0]->category->url, $leadership[0]->slug]) }}">{{ $leadership[0]->title }}</a>
                                </h3>
                                <p class="subtitle">{{ $leadership[0]->description }}</p>
                                <p class="author">By <b>SMEBR</b></p>
                                <p class="date">{{ date('F j, Y', strtotime($leadership[0]->publish_time)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                @for ($i = 1; $i < 5; $i++)
                    <div class="col-md-3">
                        <div class="t-post-leadership">
                            <a href="{{ route('post.show', [$leadership[$i]->category->url, $leadership[$i]->slug]) }}"
                                class="img">
                                <img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                    data-src="{{ Storage::url('news/' . $leadership[$i]->photo->year . '/' . $leadership[$i]->photo->month . '/' . $leadership[$i]->photo->path) }}"
                                    alt="{{ $leadership[$i]->alt }}">
                            </a>
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($leadership[$i]->category->url) }}">{{ $leadership[$i]->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$leadership[$i]->category->url, $leadership[$i]->slug]) }}">{{ $leadership[$i]->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="content-section bottom-profile">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="wrapper">
                        <div class="center-slider">
                            <div class="slide-bottom"><a
                                    href="https://smebusinessreview.com/profiles/cover/supratim-bose-is-the-ceo-of-cmr-surgical-revolutionizing-minimal-access-surgery-worldwide-with-versius-robotic-system"><img
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/supratim-bose.jpg"
                                        alt="">
                                    <h3>Empowering Surgeons and Revolutionizing Minimal Access Surgery Worldwide with
                                        Versius® Robotic System: CMR Surgical</h3>
                                </a>

                            </div>
                            <div class="slide-bottom"><a
                                    href="https://smebusinessreview.com/profiles/profile/mohit-malhotra-is-the-ceo-of-farcast-biosciences-groundbreaking-precision-oncology-solutions"><img
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/Mohit%20Malhotra%2C%20CEO%20Farcast%20Biosciences.jpg"
                                        alt="">
                                    <h3>Leading the Charge in Revolutionizing Cancer Treatment with Groundbreaking Precision
                                        Oncology Solutions: Farcast Biosciences</h3>
                                </a></div>
                            <div class="slide-bottom"><a
                                    href="https://smebusinessreview.com/profiles/profile/juan-daniel-velez-co-founder-is-the-ceo-of-terapify-empowering-mental-wellness-across-borders-with-personalized-and-accessible-online-therapy-solutions"><img
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/juan-daniel.jpg"
                                        alt="">
                                    <h3>Empowering Mental Wellness across Borders with Personalized and Accessible Online
                                        Therapy Solutions: Terapify</h3>
                                </a></div>
                            <div class="slide-bottom"><a
                                    href="https://smebusinessreview.com/profiles/profile/james-osmond-is-the-ceo-of-triptease-empowering-hotels-to-recapture-guest-relationships-and-increase-direct-booking"><img
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/james-osmond.jpg"
                                        alt="">
                                    <h3>Triptease is a Leading Travel SaaS Startup, Empowering Hotels to Recapture Guest
                                        Relationships and Increase Direct Bookings</h3>
                                </a></div>
                            <div class="slide-bottom"><a
                                    href="https://smebusinessreview.com/profiles/profile/sajith-wickramasekara-co-founder-is-the-ceo-of-benchling-the-only-biology-first-platform-for-scientific-data"><img
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/sajith-wickramasekara.jpg"
                                        alt="">
                                    <h3>Benchling: The Only Biology-First Platform for Scientific Data, Collaboration, and
                                        Insights</h3>
                                </a></div>
                            <div class="slide-bottom"><a
                                    href="https://smebusinessreview.com/profiles/profile/ian-golding-founder-and-ceo-customer-experience-consultancy-redefining-the-customer-experience-space-with-dedication-and-commitment"><img
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/Ian%20Golding.jpg"
                                        alt="">
                                    <h3>A Stalwart Leader Redefining the Customer Experience Space with Dedication and
                                        Commitment: Ian Golding</h3>
                                </a></div>
                            <div class="slide-bottom"><a
                                    href="https://smebusinessreview.com/profiles/profile/jill-raff-founder-and-ceo-revolutionizing-customer-expereince-with-indomitable-vision-and-expertise"><img
                                        class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/Jill%20Raff.jpg"
                                        alt="">
                                    <h3>Leading the Charge in Revolutionizing Customer Experience with Indomitable Vision
                                        and Expertise: Jill Raff</h3>
                                </a></div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="container-main">
        <div class="content-section">
            <h2 class="mvp-widget-home-title wid-p py20px"> <span class="mvp-widget-home-title">Opinion</span></h2>
            @foreach ($opinion as $item)
                <div class="row opinion bg-fc">
                    <div class="col-md-4">
                        <div class="content">
                            <div class="category m-0"><a
                                    href="{{ url($item->category->url) }}">{{ $item->category->title }}</a>
                            </div>
                            <h3 class="title pt-2"><a
                                    href="{{ route('post.show', [$item->category->url, $item->slug]) }}">{{ $item->title }}</a>
                            </h3>
                            <p class="subtitle pt-2">
                                {!! $item->description !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="content">
                            <p class="subtitle pt-2">
                                "{!! $item->subtitle !!}"
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('post.show', [$item->category->url, $item->slug]) }}" class="img">
                            <img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="{{ Storage::url('news/' . $item->photo->year . '/' . $item->photo->month . '/' . $item->photo->path) }}"
                                alt="{{ $item->alt }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="py-3">
        <a href="https://www.freshworks.com/" target="_blank">
            <img class="lazyload ad-image"
                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                data-src="{{ asset('ads/freshworks.jpg') }}" alt="H20.ai Ad" fetchpriority="high">
        </a>
    </div>

    {{-- <div class="container-main">
        <div class="content-section logo-section-clients">
            <h2 class="mvp-widget-home-title wid-p py20px"> <span class="mvp-widget-home-title">List of Clients</span>
            </h2>
            <div class="client-logos slider">
                @foreach ($featuredlogos as $item)
                    <div class="slide featured-logo">
                        <a href="{{ $item->url }}" target="_blank" rel="nofollow">
                            <img src="{{ Storage::url('featured/' . $item->image) }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="container-main">
        <div class="content-section">
            <div class="bottom-profile">
                <hr>
                <div class="row">
                    @foreach ($magazines as $item)
                        <div class="col-md-2 col-6">
                            <div class="mag-container p-2">
                                <a href="{{ url('magazine', [$item->year, $item->url]) }}">
                                    <img src="{{ Storage::url('magazines/' . $item->year . '/' . $item->issue . '/' . $item->type . '/' . $item->image) }}"
                                        alt="{{ $item->name }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.center-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                arrows: false,
                dots: false,
                speed: 300,
                centerPadding: '0px',
                infinite: true,
                autoplaySpeed: 4000,
                autoplay: true,
                responsive: [{
                    breakpoint: 639,
                    settings: {
                        slidesToShow: 1,
                    }
                }]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.slider-vertical-profiles').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                slidesToShow: 8,
                slidesToScroll: 1,
                vertical: true,
                verticalSwiping: true,
                dots: false,
                centerPadding: '50px',
                arrows: false,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 6.1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                }, {
                    breakpoint: 639,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        vertical: false,
                        verticalSwiping: false
                    }
                }]
            });
        });
        var slickCarouselProfiles = $('.slider-vertical-profiles');
        //mouse wheel
        slickCarouselProfiles.mousewheel(function(e) {
            e.preventDefault();
            if (e.deltaY < 0) {
                $(this).slick('slickNext');
            } else {
                $(this).slick('slickPrev');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.slider-vertical-latest').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                slidesToShow: 16,
                slidesToScroll: 1,
                vertical: true,
                verticalSwiping: true,
                dots: false,
                centerPadding: '50px',
                arrows: false,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true
                    }
                }, {
                    breakpoint: 639,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        vertical: false,
                        verticalSwiping: false
                    }
                }]
            });
        });
        var slickCarouselLatest = $('.slider-vertical-latest');
        //mouse wheel
        slickCarouselLatest.mousewheel(function(e) {
            e.preventDefault();
            if (e.deltaY < 0) {
                $(this).slick('slickNext');
            } else {
                $(this).slick('slickPrev');
            }
        });
    </script>
@endpush
