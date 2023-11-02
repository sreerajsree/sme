@extends('layouts.frontend')

@section('title', ucfirst($chosen_main) . ' - SME Business Review™')

@section('meta')
    <meta name="description" content="{{ ucfirst($chosen_main) }}">
    <meta name="keywords" content="{{ ucfirst($chosen_main) }}">
    <meta name="news_keywords" content="{{ ucfirst($chosen_main) }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description" content="{{ ucfirst($chosen_main) }}">
    <meta property="og:image"
        content="{{ Storage::url('news/' . $posts_by_main[0]->photo->year . '/' . $posts_by_main[0]->photo->month . '/' . $posts_by_main[0]->photo->path) }}">
    <meta property="og:title" content="{{ ucfirst($chosen_main) }} - SME Business Review™">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review™">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="{{ ucfirst($chosen_main) }} - SME Business Review™">
    <meta property="twitter:description" content="{{ ucfirst($chosen_main) }}">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image"
        content="{{ Storage::url('news/' . $posts_by_main[0]->photo->year . '/' . $posts_by_main[0]->photo->month . '/' . $posts_by_main[0]->photo->path) }}">
    <meta property="twitter:creator" content="@smebizreview">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",  
            "mainEntityOfPage": {
                "@context": "https://schema.org",
                "@type": "CollectionPage",
                "description": "{{ ucfirst($chosen_main) }}",
                "url": "{{ url()->current() }}",
                "name": "{{ ucfirst($chosen_main) }}",
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

<div class="container-main pb-5">
    <div class="row">
        <div class="col-md-9 cat-post">
            <div class="cat-title">
                <h2 class="cat-title mvp-widget-home-title"> <span class="mvp-widget-home-title">{{ ucfirst($chosen_main) }} News</span></h2>
            </div>
            <div id="main-data">
                @for ($i = 0; $i < count($posts_by_main); $i++)
                    <div class="row cat-post">
                        @if ($posts_by_main[$i]->photo)
                            <div class="col-md-6">
                                <a
                                    href="{{ route('post.show', [$posts_by_main[$i]->category->url, $posts_by_main[$i]->slug]) }}">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('news/' . $posts_by_main[$i]->photo->year . '/' . $posts_by_main[$i]->photo->month . '/' . $posts_by_main[$i]->photo->path) }}"
                                        alt="{{ $posts_by_main[$i]->title }}">
                                    <div class="image-overlay"></div>
                                </a>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($posts_by_main[$i]->category->url) }}">{{ $posts_by_main[$i]->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$posts_by_main[$i]->category->url, $posts_by_main[$i]->slug]) }}">{{ $posts_by_main[$i]->title }}</a>
                                </h3>
                                <div class="subtitle">
                                    {{ $posts_by_main[$i]->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="d-flex align-items-center mt-4">
                <div class="ajax-load-main text-center" style="display:none;">
                    <div class="loadingio-spinner-dual-ring-cjdrxbl8zl"><div class="ldio-42n97szec8n">
                        <div></div><div><div></div></div>
                        </div></div>
                </div>
                <button class="loadmore btn" onclick="mainLoadMore();">Load More News</button>
            </div>
            <div class="py-4" id="main-nomore"></div>
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
@push('scripts')
<script type="text/javascript">
    var page = 1;

    function mainLoadMore() {
        page++;
        loadMoreData(page);
    }

    function loadMoreData(page) {
        $.ajax({
                url: '?page=' + page,
                type: "get",
                beforeSend: function() {
                    $('.ajax-load-main').show();
                }
            })
            .done(function(data) {
                if (data.html == "") {
                    $('.ajax-load-main').html(null);
                    $('#main-nomore').html("&#128524; No more records found");
                    return;
                }
                $('.ajax-load-main').hide();
                $("#main-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }
</script>
@endpush