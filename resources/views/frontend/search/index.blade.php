@extends('layouts.frontend')

@section('title', 'Search - SME Business Review™')

@section('meta')
    <meta name="description" content="Search - SME Business Review™">
    <meta name="keywords" content="web">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description" content="Search - SME Business Review™">
    <meta property="og:image" content="{{ asset('logo/image.webp') }}">
    <meta property="og:title" content="Search - SME Business Review™">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://smebusinessreview.com/">
    <meta property="twitter:title" content="Search - SME Business Review™">
    <meta property="twitter:description" content="Search - SME Business Review™">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image" content="{{ asset('logo/image.webp') }}?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizreview">
@endsection

@section('content')

    <div class="container-main pb-5">
        <div class="row">
            <div class="col-md-9 cat-post">
                <div class="cat-title">
                   <h2>Search Results for : "{{ request('keyword') }}"</h2>           
                </div>
                <div>
                    @forelse ($posts as $post_item)
                        <div class="row cat-post">
                            @if ($post_item->photo)
                                <div class="col-md-6">
                                    <a
                                        href="{{ route('post.show', [$post_item->category->url, $post_item->slug]) }}">
                                        <img class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                            data-src="{{ Storage::url('news/' . $post_item->photo->year . '/' . $post_item->photo->month . '/' . $post_item->photo->path) }}"
                                            alt="{{ $post_item->title }}">
                                        <div class="image-overlay"></div>
                                    </a>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($post_item->category->url) }}">{{ $post_item->category->title }}</a>
                                    </div>
                                    <h3 class="title"><a
                                            href="{{ route('post.show', [$post_item->category->url, $post_item->slug]) }}">{{ $post_item->title }}</a>
                                    </h3>
                                    <div class="subtitle">
                                        {{ $post_item->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h3>No results match your search criteria</h3>
                        @endforelse
                </div>
            </div>
            <div class="col-md-3">
                <div class="cat-title">
                    <h2 class="mvp-widget-home-title"> <span class="mvp-widget-home-title">Trending News</span></h2>
                </div>
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

@endsection
