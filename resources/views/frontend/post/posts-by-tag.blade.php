@extends('layouts.frontend')

@section('title', $chosen_tag->title . ' - SME Business Review')

@section('meta')
    <meta name="title" content="{{ $chosen_tag->title }}: Latest News - SME Business Review">
    <meta name="description"
        content="Discover the latest buzz and captivating news about {{ $chosen_tag->title }} on SME Business Review">
    <meta name="keywords" content="{{ $chosen_tag->meta_keywords }}">
    <meta name="news_keywords" content="{{ $chosen_tag->meta_keywords }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description"
        content="Discover the latest buzz and captivating stories about {{ $chosen_tag->title }} on SME Business Review">
    <meta property="og:image" content="{{ Storage::url($posts_by_tag[0]->photo->path) }}">
    <meta property="og:title"
        content="{{ $chosen_tag->title }}: Latest News - SME Business Review">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title"
        content="{{ $chosen_tag->title }}: Latest News - SME Business Review">
    <meta property="twitter:description"
        content="Discover the latest buzz and captivating stories about {{ $chosen_tag->title }} on SME Business Review">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image" content="{{ Storage::url($posts_by_tag[0]->photo->path) }}">
    <meta property="twitter:creator" content="@smebizreview">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "mainEntityOfPage": {
                "@context": "https://schema.org",
                "@type": "CollectionPage",
                "description": "{{ $chosen_tag->title }}: Latest News - SME Business Review",
                "url": "{{ url()->current() }}",
                "name": "{{ $chosen_tag->title }}",
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
        <div class="col-md-9">
            <div class="cat-title">
                <h2 class="cat-title mvp-widget-home-title"> <span class="mvp-widget-home-title">{{ $chosen_tag->title }} News</span></h2>
            </div>
            <div id="tag-data">
                @for ($i = 0; $i < count($posts_by_tag); $i++)
                    <div class="row cat-post">
                        @if ($posts_by_tag[$i]->photo)
                            <div class="col-md-6">
                                <a
                                    href="{{ route('post.show', [$posts_by_tag[$i]->category->url, $posts_by_tag[$i]->slug]) }}">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('news/' . $posts_by_tag[$i]->photo->year . '/' . $posts_by_tag[$i]->photo->month . '/' . $posts_by_tag[$i]->photo->path) }}"
                                        alt="{{ $posts_by_tag[$i]->title }}">
                                    <div class="image-overlay"></div>
                                </a>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($posts_by_tag[$i]->category->url) }}">{{ $posts_by_tag[$i]->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$posts_by_tag[$i]->category->url, $posts_by_tag[$i]->slug]) }}">{{ $posts_by_tag[$i]->title }}</a>
                                </h3>
                                <div class="subtitle">
                                    {{ $posts_by_tag[$i]->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="d-flex align-items-center">
                <div class="ajax-load-user text-center" style="display:none;">
                    <div class="loadingio-spinner-dual-ring-cjdrxbl8zl"><div class="ldio-42n97szec8n">
                        <div></div><div><div></div></div>
                        </div></div>
                </div>
                <button class="loadmore btn" onclick="tagLoadMore();">Load More News</button>
            </div>
            <div class="py-4" id="tag-nomore"></div>
        </div>
        <div class="col-md-3">
            <div class="cat-title">
                <h2 class="mvp-widget-home-title"> <span class="mvp-widget-home-title">Trending News</span></h2>
            </div>
            @foreach ($trending as $trend)
                <div class="sidepost-tr">
                    <div class="content">
                        <div class="category"><a href="{{ url($trend->category->url) }}">{{ $trend->category->title }}</a>
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

@endsection
@push('scripts')
<script type="text/javascript">
    var page = 1;

    function tagLoadMore() {
        page++;
        loadMoreData(page);
    }

    function loadMoreData(page) {
        $.ajax({
                url: '?page=' + page,
                type: "get",
                beforeSend: function() {
                    $('.ajax-load-tag').show();
                }
            })
            .done(function(data) {
                if (data.html == "") {
                    $('.ajax-load-tag').html(null);
                    $('#tag-nomore').html("&#128524; No more records found");
                    return;
                }
                $('.ajax-load-tag').hide();
                $("#tag-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }
</script>
@endpush
