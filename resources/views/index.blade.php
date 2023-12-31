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
                <div class="row">
                    {{-- <div class="ticker">
                        <div class="ticker-news-title">
                            <p>Breaking</p>
                        </div>
                        <div class="ticker-news-content">
                            <marquee behavior="scroll" direction="left" onmouseover="this.stop();"
                                onmouseout="this.start();">
                                <h3><a
                                        href="{{ route('post.show', [$breaking->category->url, $breaking->slug]) }}">{{ $breaking->title }}</a>
                                </h3>
                            </marquee>
                        </div>
                    </div> --}}
                    <div class="main-post">
                        <a href="{{ route('post.show', [$featured->category->url, $featured->slug]) }}" class="img">
                            <img class="lazyload"
                                src="{{ Storage::url('news/' . $featured->photo->year . '/' . $featured->photo->month . '/' . $featured->photo->path) }}"
                                alt="{{ $featured->alt }}" fetchpriority="high">
                        </a>
                        <div class="content">
                            <div class="category"><a
                                    href="{{ url($featured->category->url) }}">{{ $featured->category->title }}</a>
                            </div>
                            <h3 class="title"><a
                                    href="{{ route('post.show', [$featured->category->url, $featured->slug]) }}">{{ $featured->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="mag-heading text-uppercase">Latest Issue</h2>
                <div class="mag-container">
                    <a href="{{ url('magazine', [$latestmagazine->year, $latestmagazine->url]) }}">
                        <img src="{{ Storage::url('magazines/' . $latestmagazine->year . '/' . $latestmagazine->issue . '/' . $latestmagazine->type . '/' . $latestmagazine->image) }}"
                            alt="{{ $latestmagazine->name }}">
                    </a>
                </div>
                <div class="stockmarket-header">
                    <p>AI IS HOT</p>
                </div>
                <div class="slider-ai">
                    @foreach ($ai as $item)
                        <div>
                            <div class="t1-post">
                                <a href="{{ route('post.show', [$item->category->url, $item->slug]) }}" class="img">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('news/' . $item->photo->year . '/' . $item->photo->month . '/' . $item->photo->path) }}"
                                        alt="{{ $item->alt }}">
                                </a>
                                <div class="content">
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

        <div class="content-section">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="mvp-widget-home-title py20px"> <span class="mvp-widget-home-title">Spotlight</span>
                    </h2>
                    <div class="spotlight slider">
                        @foreach ($spotlight as $item)
                            <div class="cx-section">
                                <a href="{{ route('post.show', [$item->category->url, $item->slug]) }}" class="img">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('news/' . $item->photo->year . '/' . $item->photo->month . '/' . $item->photo->path) }}"
                                        alt="{{ $item->alt }}">
                                </a>
                                <div class="content">
                                    <h3 class="spotlight-title title"><a
                                            href="{{ route('post.show', [$item->category->url, $item->slug]) }}">{{ $item->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="mvp-widget-home-title py20px"> <span class="mvp-widget-home-title">FEATURED COMPANIES</span>
                    </h2>
                    <div class="side-height slider-vertical-profiles">
                        @foreach ($cx as $item)
                            <div>
                                <div class="sidepost-main-cx">
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
            <h2 class="mvp-widget-home-title py20px wid-p"> <span class="mvp-widget-home-title">Latest</span>
            </h2>
            <div class="row">
                @for ($i = 1; $i < 7; $i++)
                    <div class="col-md-4">
                        <div class="sidepost-main">
                            <a href="{{ route('post.show', [$posts[$i]->category->url, $posts[$i]->slug]) }}"
                                class="img">
                                <img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                    data-src="{{ Storage::url('news/' . $posts[$i]->photo->year . '/' . $posts[$i]->photo->month . '/' . $posts[$i]->photo->path) }}"
                                    alt="{{ $posts[$i]->alt }}">
                            </a>
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($posts[$i]->category->url) }}">{{ $posts[$i]->category->title }}</a>
                                </div>
                                <h3 class="title font-anton"><a
                                        href="{{ route('post.show', [$posts[$i]->category->url, $posts[$i]->slug]) }}">{{ $posts[$i]->title }}</a>
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
                    <h2 class="mvp-widget-home-title py-4"> <span class="mvp-widget-home-title">Trending</span></h2>
                    <div class="slider-vertical">
                        @foreach ($trending as $trend)
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
            <h2 class="mvp-widget-home-title wid-p py20px"> <span class="mvp-widget-home-title">Leadership</span></h2>
            <div style="background-color: #EEF9FA;">
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

    <div class="container-main">
        <div class="content-section">
            <h2 class="mvp-widget-home-title wid-p py20px"> <span class="mvp-widget-home-title">News</span></h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="cat-border">
                        <h2 class="mvp-widget-home-title-sub"> <span class="mvp-widget-home-title-sub">Industry</span>
                        </h2>
                        @foreach ($industry as $post)
                            <div class="sidepost-cat">
                                <a href="{{ route('post.show', [$post->category->url, $post->slug]) }}" class="img">
                                    <img src="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}"
                                        alt="{{ $post->alt }}">
                                </a>
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($post->category->url) }}">{{ $post->category->title }}</a></div>
                                    <h3 class="title"><a
                                            href="{{ route('post.show', [$post->category->url, $post->slug]) }}">{{ $post->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cat-border">
                        <h2 class="mvp-widget-home-title-sub"> <span class="mvp-widget-home-title-sub">Platform</span>
                        </h2>
                        @foreach ($platform as $post)
                            <div class="sidepost-cat">
                                <a href="{{ route('post.show', [$post->category->url, $post->slug]) }}" class="img">
                                    <img src="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}"
                                        alt="{{ $post->alt }}">
                                </a>
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($post->category->url) }}">{{ $post->category->title }}</a></div>
                                    <h3 class="title"><a
                                            href="{{ route('post.show', [$post->category->url, $post->slug]) }}">{{ $post->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cat-border">
                        <h2 class="mvp-widget-home-title-sub"> <span class="mvp-widget-home-title-sub">Technology</span>
                        </h2>
                        @foreach ($technology as $post)
                            <div class="sidepost-cat">
                                <a href="{{ route('post.show', [$post->category->url, $post->slug]) }}" class="img">
                                    <img src="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}"
                                        alt="{{ $post->alt }}">
                                </a>
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($post->category->url) }}">{{ $post->category->title }}</a></div>
                                    <h3 class="title"><a
                                            href="{{ route('post.show', [$post->category->url, $post->slug]) }}">{{ $post->title }}</a>
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
            <h2 class="mvp-widget-home-title wid-p py20px"> <span class="mvp-widget-home-title">LIST OF CLIENTS</span></h2>
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
            $('.slider-ai').slick({
                rows: 1,
                slidesToShow: 1,
                slidesToScroll: -1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                fade: true,
                infinite: true,
                cssEase: 'linear',
                responsive: [{
                    breakpoint: 639,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: -1,
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
                slidesToShow: 6.1,
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
                        slidesToShow: 5,
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
@endpush
