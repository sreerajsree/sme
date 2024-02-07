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
    <div class="container-main mt-5">
        <div class="row">
            <div class="col-md-9">
                <h2 class="heading-null"><span>&nbsp;</span></h2>
                <div class="main-post">
                    <a href="{{ url('profiles', [$profiles[0]->type, $profiles[0]->url]) }}">
                        <img class="lazyload"
                            src="{{ Storage::url('magazines/' . $profiles[0]->mag_year . '/' . $profiles[0]->mag_issue . '/' . $profiles[0]->mag_type . '/profiles/' . $profiles[0]->image) }}"
                            alt="{{ $profiles[0]->title }}" fetchpriority="high">
                    </a>
                    <div class="content">
                        <h3 class="title fs-28"><a
                                href="{{ url('profiles', [$profiles[0]->type, $profiles[0]->url]) }}">{{ $profiles[0]->title }}</a>
                        </h3>
                    </div>
                </div>
                {{-- <div class="spotlight slider">
                    @foreach ($cx as $item)
                        <div class="cx-section">
                            <a href="{{ url('profiles', [$item->type, $item->url]) }}" class="img">
                                <img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                    data-src="{{ Storage::url('magazines/' . $item->mag_year . '/' . $item->mag_issue . '/' . $item->mag_type . '/profiles/' . $item->image) }}"
                                    alt="{{ $item->name }}">
                            </a>
                            <div class="content">
                                <h3 class="title"><a
                                        href="{{ url('profiles', [$item->type, $item->url]) }}">{{ $item->name }}</a>
                                </h3>
                            </div>
                            
                        </div>
                    @endforeach
                </div> --}}
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
                {{-- <div class="stockmarket-header">
                    <p>AI IS HOT</p>
                </div>
                <div class="t1-post">
                    <a href="{{ route('post.show', [$spotlight->category->url, $spotlight->slug]) }}" class="img">
                        <img class="lazyload"
                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                            data-src="{{ Storage::url('news/' . $spotlight->photo->year . '/' . $spotlight->photo->month . '/' . $spotlight->photo->path) }}"
                            alt="{{ $spotlight->alt }}">
                    </a>
                    <div class="content">
                        <h3 class="title"><a
                                href="{{ route('post.show', [$spotlight->category->url, $spotlight->slug]) }}">{{ $spotlight->title }}</a>
                        </h3>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="content-section">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="mvp-widget-home-title py20px"> <span class="mvp-widget-home-title">FEATURED COMPANIES</span>
                    </h2>
                    <div class="row">
                        @for ($i = 1; $i < count($profiles); $i++)
                            <div class="col-md-6 p-0">
                                <div class="main-post pb-3 pe-3">
                                    <a href="{{ url('profiles', [$profiles[$i]->type, $profiles[$i]->url]) }}">
                                        <img class="lazyload"
                                            src="{{ Storage::url('magazines/' . $profiles[$i]->mag_year . '/' . $profiles[$i]->mag_issue . '/' . $profiles[$i]->mag_type . '/profiles/' . $profiles[$i]->image) }}"
                                            alt="{{ $profiles[$i]->title }}" fetchpriority="high">
                                    </a>
                                    {{-- <div class="content">
                                    <h3 class="title"><a href="{{ url('profiles', [$profiles[$i]->type, $profiles[$i]->url]) }}">{{ $profiles[$i]->title }}</a>
                                    </h3>
                                </div> --}}
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mvp-widget-home-title py20px"> <span class="mvp-widget-home-title">Latest Edition</span>
                    </h2>
                    <div class="side-height slider-vertical-profiles">
                        @foreach ($edition as $item)
                            <div>
                                <div class="sidepost-main-cx">
                                    <a href="{{ url('profiles', [$item->type, $item->url]) }}" class="img">
                                        <img class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                            data-src="{{ Storage::url('magazines/' . $item->mag_year . '/' . $item->mag_issue . '/' . $item->mag_type . '/profiles/' . $item->image) }}"
                                            alt="{{ $item->name }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="side-height slider-vertical-startups">
                        @foreach ($cxos as $trend)
                            <div class="sidepost-tr">
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($trend->category->url) }}">{{ $trend->category->title }}</a>
                                    </div>
                                    <h3 class="title"><a
                                            href="{{ route('post.show', [$trend->category->url, $trend->slug]) }}">{{ $trend->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
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
                            <div class="col-md-12">
                                <h2 class="mvp-widget-home-title spons py-4"> <span
                                        class="mvp-widget-home-title">PROMOTIONAL FEATURES</span></h2>
                            </div>
                            @foreach ($sponsored as $item)
                                <div class="col-md-4">
                                    <div class="t-post">
                                        <a href="{{ route('post.show', [$item->category->url, $item->slug]) }}"
                                            class="img">
                                            <img class="lazyload"
                                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                                data-src="{{ Storage::url('news/' . $item->photo->year . '/' . $item->photo->month . '/' . $item->photo->path) }}"
                                                alt="{{ $item->alt }}">
                                        </a>
                                        <div class="content">
                                            <div class="category"><a
                                                    href="{{ url($item->category->url) }}">{{ $item->category->title }}</a>
                                            </div>
                                            <h3 class="title"><a
                                                    href="{{ route('post.show', [$item->category->url, $item->slug]) }}">{{ $item->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mvp-widget-home-title py-4"> <span class="mvp-widget-home-title">Latest News</span></h2>
                    <div class="slider-vertical-latest latest-overflow">
                        @foreach ($latest as $trend)
                            <div class="sidepost-tr">
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($trend->category->url) }}">{{ $trend->category->title }}</a>
                                    </div>
                                    <h3 class="title"><a
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
                    <a href="{{ url('profiles', [$profile_bottom->type, $profile_bottom->url]) }}">
                        <img class="lazyload"
                            src="{{ Storage::url('magazines/' . $profile_bottom->mag_year . '/' . $profile_bottom->mag_issue . '/' . $profile_bottom->mag_type . '/profiles/' . $profile_bottom->image) }}"
                            alt="{{ $profile_bottom->title }}" fetchpriority="high">
                    </a>
                    <div class="content">
                        <h3 class="title"><a
                                href="{{ url('profiles', [$profile_bottom->type, $profile_bottom->url]) }}">{{ $profile_bottom->title }}</a>
                        </h3>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="container-main">
        <div class="content-section">
            <h2 class="mvp-widget-home-title wid-p py20px"> <span class="mvp-widget-home-title">Leadership</span></h2>
            <div style="background-color: #C2CAD0;">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <a href="{{ route('post.show', [$leadership[0]->category->url, $leadership[0]->slug]) }}"
                            class="img">
                            <img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="{{ Storage::url('news/' . $leadership[0]->photo->year . '/' . $leadership[0]->photo->month . '/' . $leadership[0]->photo->path) }}"
                                alt="{{ $leadership[0]->alt }}">
                        </a>
                    </div>
                    <div class="col-md-6">
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
                            <div><a href="https://smebusinessreview.com/profiles/cover/daniel-hostettler-of-boca-raton"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/The%20Boca%20Raton-3.jpg" alt=""></a></div>
                            <div><a href="https://smebusinessreview.com/profiles/profile/tim-montgomery-president-at-timit-solutions"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/TIMIT%20solutions.jpg" alt=""></a></div>
                            <div><a href="https://smebusinessreview.com/profiles/profile/emma-donnelly-customer-director"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/Wimpey%20pIc.jpg" alt=""></a></div>
                            <div><a href="https://smebusinessreview.com/profiles/profile/brian-solis-head-global-innovation-servicenow"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/ServiceNow%20%281%29.jpg" alt=""></a></div>
                            <div><a href="https://smebusinessreview.com/profiles/profile/brenda-lynn-dichoso-cx-innovation-at-smartfen"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/pt%20smartfren%20telecom%20tbk.jpg" alt=""></a></div>
                            <div><a href="https://smebusinessreview.com/profiles/profile/holly-richardson-cx-leader-director-marketing"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/Holly%20Richardson.jpg" alt=""></a></div>
                            <div><a href="https://smebusinessreview.com/profiles/profile/benjamin-lander-founder-of-asamby-consulting"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/Asamby%20Consulting.jpg" alt=""></a></div>
                            <div><a href="https://smebusinessreview.com/profiles/profile/olga-bortnikova-co-founder-serves-as-the-ceo-of-tripsider"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/tripsider-.jpg" alt=""></a></div>
                            <div><a href="https://smebusinessreview.com/profiles/profile/brendan-tremble-cx-leader-cx-loop"><img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="https://smebr.s3.amazonaws.com/magazines/2024/usa/monthly/profiles/cxloop-1.jpg" alt=""></a></div>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="op-main">
                        <div class="opinion">
                            <a href="{{ route('post.show', [$opinion[0]->category->url, $opinion[0]->slug]) }}"
                                class="img">
                                <img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                    data-src="{{ Storage::url('news/' . $opinion[0]->photo->year . '/' . $opinion[0]->photo->month . '/' . $opinion[0]->photo->path) }}"
                                    alt="{{ $opinion[0]->alt }}">
                            </a>
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($opinion[0]->category->url) }}">{{ $opinion[0]->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$opinion[0]->category->url, $opinion[0]->slug]) }}">{{ $opinion[0]->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="op-main">
                        <div class="opinion">
                            <a href="{{ route('post.show', [$opinion[1]->category->url, $opinion[1]->slug]) }}"
                                class="img">
                                <img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                    data-src="{{ Storage::url('news/' . $opinion[1]->photo->year . '/' . $opinion[1]->photo->month . '/' . $opinion[1]->photo->path) }}"
                                    alt="{{ $opinion[1]->alt }}">
                            </a>
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($opinion[1]->category->url) }}">{{ $opinion[1]->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$opinion[1]->category->url, $opinion[1]->slug]) }}">{{ $opinion[1]->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @for ($i = 2; $i < count($opinion); $i++)
                    <div class="col-md-3 br">
                        <div class="op-bottom">
                            <a href="{{ route('post.show', [$opinion[$i]->category->url, $opinion[$i]->slug]) }}"
                                class="img">
                                <img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                    data-src="{{ Storage::url('news/' . $opinion[$i]->photo->year . '/' . $opinion[$i]->photo->month . '/' . $opinion[$i]->photo->path) }}"
                                    alt="{{ $opinion[$i]->alt }}">
                            </a>
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($opinion[$i]->category->url) }}">{{ $opinion[$i]->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$opinion[$i]->category->url, $opinion[$i]->slug]) }}">{{ $opinion[$i]->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="container-main">
        <div class="content-section">
            <h2 class="mvp-widget-home-title wid-p py20px"> <span class="mvp-widget-home-title">LIST OF CLIENTS</span>
            </h2>
            <section class="client-logos slider">
                @foreach ($featuredlogos as $item)
                    <div class="slide featured-logo">
                        <a href="{{ $item->url }}" target="_blank" rel="nofollow">
                            <img src="{{ Storage::url('featured/' . $item->image) }}" alt="">
                        </a>
                    </div>
                @endforeach
            </section>
        </div>
    </div>

    <div class="container-main">
        <div class="content-section">
            <div class="bottom-profile">
                <hr>
                <div class="row">
                    {{-- <h2 class="heading-null"><span>ceo of the month</span></h2> --}}
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
            $('.client-logos').slick({
                rows: 2,
                slidesToShow: 8,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
            $('.spotlight').slick({
                rows: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: false,
                fade: true,
                infinite: true,
                cssEase: 'linear',
                pauseOnHover: false,
            });
            $('.center-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                arrows: true,
                dots: false,
                speed: 300,
                centerPadding: '20px',
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
            // $('.slider-ai').slick({
            //     rows: 1,
            //     slidesToShow: 1,
            //     slidesToScroll: -1,
            //     autoplay: true,
            //     autoplaySpeed: 2000,
            //     arrows: false,
            //     dots: false,
            //     pauseOnHover: false,
            //     fade: true,
            //     infinite: true,
            //     cssEase: 'linear',
            //     responsive: [{
            //         breakpoint: 639,
            //         settings: {
            //             slidesToShow: 1,
            //             slidesToScroll: -1,
            //         }
            //     }]
            // });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.slider-vertical-profiles').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                slidesToShow: 4.4,
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
                        vertical: true,
                        verticalSwiping: true,
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
                slidesToShow: 5,
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
                        infinite: true,
                    }
                }, {
                    breakpoint: 639,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        vertical: false,
                        verticalSwiping: false,
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
