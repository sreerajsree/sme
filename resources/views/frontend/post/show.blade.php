@extends('layouts.frontend')

@section('title', $post->meta_title)

@section('meta')
    <meta name="description" content="{!! $post->meta_description !!}">
    <meta name="keywords" content="{{ $post->meta_keywords }}">
    <meta name="news_keywords" content="{{ $post->meta_keywords }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="Article">
    <meta property="og:description" content="{!! $post->meta_description !!}">
    <meta property="og:image"
        content="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}">
    <meta property="og:image:alt" content="{{ $post->meta_title }}">
    <meta property="og:image:width" content="1920">
    <meta property="og:image:height" content="1280">
    <meta property="og:title" content="{{ $post->meta_title }}">
    <meta property="og:type" content="Article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta property="article:opinion" content="false">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:section" content="{{ $post->category->title }}">
    <meta property="article:published_time" content="{{ $post->created_at }}">
    <meta property="article:modified_time" content="{{ $post->updated_at }}">
    <meta property="article:author" content="{{ $post->user->name }}">
    @foreach ($post->tags as $tag)
        <meta property="article:tag" content="{{ $tag->title }}">
    @endforeach
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="{{ $post->meta_title }}">
    <meta property="twitter:description" content="{!! $post->meta_description !!}">
    <meta property="twitter:site" content="@smebizeview">
    <meta property="twitter:image"
        content="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizeview">
    <link rel="preload" as="image"
        href="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}"
        imagesrcset="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 120w, {{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 240w, {{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 320w, {{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 640w, {{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 960w, {{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 1280w, {{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 1600w, {{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 1920w, {{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }} 2240w"
        imagesizes="100vw" fetchpriority="high">
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "NewsArticle",
            "articleBody": "{!! $post->description !!}",
            "articleSection": "{{ $post->category->title }}",
            "author": [{
                "@type": "Person",
                "name": "{{ $post->user->name }}",
                "sameAs": "{{ $post->user->slug }}"
            }],
            "dateModified": "{{ $post->updated_at }}",
            "datePublished": "{{ $post->created_at }}",
            "headline": "{{ $post->meta_title }}",
            "image": ["{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}"],
            "keywords": ["sme business review", "sme"],
            "thumbnailUrl": "{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}",
            "url": "{{ url()->current() }}",
            "isPartOf": {
                "@type": "CreativeWork",
                "name": "SME Business Review"
            },
            "isAccessibleForFree": true,
            "alternativeHeadline": "{!! $post->description !!}",
            "description": "{!! $post->description !!}",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{ url()->current() }}"
            },
            "publisher": {
                "@context": "https://schema.org",
                "@type": "Organization",
                "name": "SME Business Review",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('logo/logo.png') }}",
                    "width": "500px",
                    "height": "152px"
                },
                "url": "http://smebusinessreview.com/"
            }
        }
    </script>
    <script type="application/ld+json">{"@context":"https://schema.org/","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"{{ $post->category->title }}","item":"{{ $post->category->slug }}"},{"@type":"ListItem","position":2,"name":"{{ $post->meta_title }}"}]}</script>
@endsection


@section('content')

    <div class="container-main news">
        <div class="row">
            <div class="col-md-9">
                <div class="content-section">
                    <div class="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ url($post->category->url) }}">{{ $post->category->title }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                            </ol>
                        </nav>
                    </div>
                    <h2 class="mvp-widget-home-title line-none py-3"> <span class="mvp-widget-home-title">$post->category->title</span></h2>
                    {{-- <a href="{{ url($post->category->url) }}" class="post-category">
                        {{ $post->category->title }}
                    </a> --}}
                    <div class="title">
                        <h1>{{ $post->title }}</h1>
                    </div>
                    <div class="subtitle">
                        <p>{{ $post->description }}</p>
                    </div>
                    <div class="author">
                        <span class="name"><a href="{{ $post->user->slug }}">{{ $post->user->name }}</a></span><span
                            class="date">{{ $post->publish_date_time }}</span>
                    </div>
                    <div class="image">
                        <img class="lazyload"
                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                            data-src="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}"
                            alt="{{ $post->alt }}">
                    </div>
                    @if ($post->photo_source)
                        <p class="source">Source: {{ $post->photo_source }}</p>
                    @endif
                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style mb-3" data-a2a-icon-color="black">
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_email"></a>
                        <a class="a2a_button_linkedin"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_pinterest"></a>
                        <a class="a2a_button_x"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                    <div class="news-content" oncopy="return false" oncut="return false" onpaste="return false">
                        {!! clean($post->body) !!}
                    </div>
                    <div class="post-tags">
                        {{-- @if ($post->tags)
                            <div class="tags">
                                <p>Tags: </p>
                                @foreach ($post->tags as $tag)
                                    <a href="{{ $tag->slug }}"># {{ $tag->title }}</a>
                                @endforeach
                            </div>
                        @endif --}}
                        <div class="date-updated">
                            <p>Last updated: </p>
                            {{ $post->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cat-title">
                    <h2 class="mvp-widget-home-title"> <span class="mvp-widget-home-title">Related Topics</span></h2>
                </div>
                @foreach ($related as $rel)
                    <div class="sidepost-tr">
                        <div class="content">
                            <div class="category"><a
                                    href="{{ url($rel->category->url) }}">{{ $rel->category->title }}</a>
                            </div>
                            <h3 class="title"><a
                                    href="{{ route('post.show', [$rel->category->url, $rel->slug]) }}">{{ $rel->title }}</a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('frontend.post.includes.recommended')
@endsection
