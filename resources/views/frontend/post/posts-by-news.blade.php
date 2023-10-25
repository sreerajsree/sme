@extends('layouts.frontend')

@section('title', 'News - SME Business Review')

@section('meta')
    <meta name="title" content="News - SME Business Review">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="news_keywords" content="">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description" content="">
    <meta property="og:image"
        content="{{ Storage::url('news/' . $industry[0]->photo->year . '/' . $industry[0]->photo->month . '/' . $industry[0]->photo->path) }}">
    <meta property="og:title" content="News - SME Business Review">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="News - SME Business Review">
    <meta property="twitter:description" content="">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image"
        content="{{ Storage::url('news/' . $industry[0]->photo->year . '/' . $industry[0]->photo->month . '/' . $industry[0]->photo->path) }}">
    <meta property="twitter:creator" content="@smebizreview">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",  
            "mainEntityOfPage": {
                "@context": "https://schema.org",
                "@type": "CollectionPage",
                "description": "",
                "url": "{{ url()->current() }}",
                "name": "News - SME Business Review",
                "publisher": {
                    "@id": "http://smebusinessreview.com/"
                },
                "copyrightHolder": {
                    "@id": "http://smebusinessreview.com/"
                },
                "sourceOrganization": {
                    "@type": "Organization",
                    "@id": "http://smebusinessreview.com/"
                },
                "copyrightYear": "{{ date('Y') }}"
            }
        }
    </script>
@endsection

@section('content')

    <div class="content-section">
        <div class="container-main pb-5">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="mvp-widget-home-title py-2"> <span class="mvp-widget-home-title">Industry</span></h2>
                    @foreach ($industry as $item)
                        <div class="sidepost-news">
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($item->category->url) }}">{{ $item->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$item->category->url, $item->slug]) }}">{{ $item->title }}</a>
                                </h3>
                                <p class="date">{{ $item->date }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h2 class="mvp-widget-home-title py-2"> <span class="mvp-widget-home-title">Technology</span></h2>
                    @foreach ($technology as $item)
                        <div class="sidepost-news">
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($item->category->url) }}">{{ $item->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$item->category->url, $item->slug]) }}">{{ $item->title }}</a>
                                </h3>
                                <p class="date">{{ $item->date }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h2 class="mvp-widget-home-title py-2"> <span class="mvp-widget-home-title">Platform</span></h2>
                    @foreach ($platform as $item)
                        <div class="sidepost-news">
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($item->category->url) }}">{{ $item->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$item->category->url, $item->slug]) }}">{{ $item->title }}</a>
                                </h3>
                                <p class="date">{{ $item->date }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
