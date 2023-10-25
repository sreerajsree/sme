@extends('layouts.frontend')

@section('title', 'SME Business Review: Top Business Magazine & News Platform')

@section('meta')
    <meta name="title" content="SME Business Review: Top Business Magazine & News Platform">
    <meta name="description"
        content="SME Business Review is a top-rated global business and technology magazine, catering to the SME sector. It promotes brands and executives alike">
    <meta name="keywords" content="">
    <meta name="news_keywords" content="">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="homepage">
    <meta property="og:description"
        content="SME Business Review is a top-rated global business and technology magazine, catering to the SME sector. It promotes brands and executives alike">
    <meta property="og:image" content="https://assets.thefashionenthusiast.uk/frontend/img/social/social.png">
    <meta property="og:title" content="SME Business Review: Top Business Magazine & News Platform">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="SME Business Review: Top Business Magazine & News Platform">
    <meta property="twitter:description"
        content="SME Business Review is a top-rated global business and technology magazine, catering to the SME sector. It promotes brands and executives alike">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image"
        content="https://assets.thefashionenthusiast.uk/frontend/img/social/social.png?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizreview">
    <meta name="dcterms.rightsHolder" content="SME Business Review. All rights reserved.">
    <meta name="dcterms.dateCopyrighted" content="{{ now()->year }}">
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"Organization","name":"SME Business Review: Top Business Magazine & News Platform","logo":{"@type":"ImageObject","url":"{{ asset('logo/logo.png') }}","width":"500px","height":"152px"},"url":"http://smebusinessreview.com/"}</script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "http://smebusinessreview.com/",
        "name": "SME Business Review",
        "headline": "SME Business Review: Top Business Magazine & News Platform",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "http://smebusinessreview.com/search?keyword={search_term}",
            "query-input": "required name=search_term"
        }
    }
    </script>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endpush

@section('content')
    <div class="container-main mt-5">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="top-ticker">
                        <div class="acme-news-ticker">
                            <div class="acme-news-ticker-label">Latest News</div>
                            <div class="acme-news-ticker-box">
                                <ul class="my-news-ticker">
                                    @foreach ($latestnews as $item)
                                        <li><a
                                                href="{{ route('post.show', [$item->category->url, $item->slug]) }}">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="acme-news-ticker-controls acme-news-ticker-vertical-controls">
                                <button class="acme-news-ticker-arrow acme-news-ticker-prev"></button>
                                <button class="acme-news-ticker-pause"></button>
                                <button class="acme-news-ticker-arrow acme-news-ticker-next"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-post">
                            <a href="{{ route('post.show', [$featured->category->url, $featured->slug]) }}" class="img">
                                <img class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                    data-src="{{ Storage::url('news/' . $featured->photo->year . '/' . $featured->photo->month . '/' . $featured->photo->path) }}"
                                    alt="{{ $featured->alt }}">
                            </a>
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($featured->category->url) }}">{{ $featured->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$featured->category->url, $featured->slug]) }}">{{ $featured->title }}</a>
                                </h3>
                                <div class="subtitle">
                                    {{ $featured->description }}
                                </div>
                                <p class="author">By <a href="{{ $featured->user->slug }}">{{ $featured->user->name }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @foreach ($cxos as $item)
                            <div class="sidepost-main">
                                <a href="{{ route('post.show', [$item->category->url, $item->slug]) }}" class="img">
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
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="latest-issue">Latest Issue</h2>
                        <div class="mag-container">
                            <a href="{{ url('magazine', [$latestmagazine->year, $latestmagazine->url]) }}">
                                <img src="{{ Storage::url('magazines/' . $latestmagazine->year . '/' . $latestmagazine->issue . '/' . $latestmagazine->type . '/' . $latestmagazine->image) }}"
                                    alt="{{ $latestmagazine->name }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-section">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @for ($i = 1; $i < 7; $i++)
                            <div class="col-md-6">
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
                                        <h3 class="title"><a
                                                href="{{ route('post.show', [$posts[$i]->category->url, $posts[$i]->slug]) }}">{{ $posts[$i]->title }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-md-3">
                    <a class="twitter-timeline" href="https://twitter.com/smebizreview?ref_src=twsrc%5Etfw">Tweets by
                        smebizreview</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>

    <div class="container-main">
        <div class="content-section">
            <div class="row">
                <div class="col-md-9">
                    <div class="bg-yellow">
                        <h2 class="header-sub text-32 pt-2">Sponsored Pieces</h2>
                        <div class="row">
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
                    <h2 class="trending header p-0">Trending</h2>
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

    <div class="container-main">
        <h2 class="header">News</h2>
        <div class="content-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="cat-border">
                        <h2 class="header-sub">Industry</h2>
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
                        <h2 class="header-sub">Platform</h2>
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
                        <h2 class="header-sub">Technology</h2>
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

    <div class="container">
        <h2 class="header">Opinion</h2>
        <div class="content-section">
            <div class="row">
                <div class="col-md-12">
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
                                <div class="subtitle">
                                    {{ $opinion[0]->description }}
                                </div>
                                <p class="author">By <a
                                        href="{{ $opinion[0]->user->slug }}">{{ $opinion[0]->user->name }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @for ($i = 1; $i < count($opinion); $i++)
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
        <h2 class="header">Featured Companies</h2>
        <div class="content-section">
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
    <script src="{{ asset('js/acmeticker.min.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.my-news-ticker').AcmeTicker({
                type: 'vertical',
                /*vertical/horizontal/Marquee/type*/
                direction: 'right',
                /*up/down/left/right*/
                speed: 600,
                /*true/false/number*/
                /*For vertical/horizontal 600*/ /*For marquee 0.05*/ /*For typewriter 50*/
                controls: {
                    prev: $('.acme-news-ticker-prev'),
                    /*Can be used for vertical/horizontal/typewriter*/
                    /*not work for marquee*/
                    next: $('.acme-news-ticker-next'),
                    /*Can be used for vertical/horizontal/typewriter*/
                    /*not work for marquee*/
                    toggle: $(
                            '.acme-news-ticker-pause'
                            ) /*Can be used for vertical/horizontal/marquee/typewriter*/
                }
            });
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
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
        });
    </script>
@endpush
