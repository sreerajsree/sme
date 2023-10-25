@extends('layouts.frontend')

@section('title', $chosen_category->title . ' - SME Business Review')

@section('meta')
    <meta name="title" content="{{ $chosen_category->title }} - SME Business Review">
    <meta name="description" content="{{ $chosen_category->meta_description }}">
    <meta name="keywords" content="{{ $chosen_category->meta_keywords }}">
    <meta name="news_keywords" content="{{ $chosen_category->meta_keywords }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description" content="{{ $chosen_category->meta_description }}">
    <meta property="og:image"
        content="{{ Storage::url('news/' . $posts_by_category[0]->photo->year . '/' . $posts_by_category[0]->photo->month . '/' . $posts_by_category[0]->photo->path) }}">
    <meta property="og:title" content="{{ $chosen_category->meta_title }} - SME Business Review">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="{{ $chosen_category->meta_title }} - SME Business Review">
    <meta property="twitter:description" content="{{ $chosen_category->meta_description }}">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image"
        content="{{ Storage::url('news/' . $posts_by_category[0]->photo->year . '/' . $posts_by_category[0]->photo->month . '/' . $posts_by_category[0]->photo->path) }}">
    <meta property="twitter:creator" content="@smebizreview">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",  
            "mainEntityOfPage": {
                "@context": "https://schema.org",
                "@type": "CollectionPage",
                "description": "{{ $chosen_category->meta_description }}",
                "url": "{{ url()->current() }}",
                "name": "{{ $chosen_category->title }}",
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

<div class="container-main pb-5 cat-post">
    <h2 class="cat-title">{{ $chosen_category->title }} News</h2>
    <div class="row">
        <div class="col-md-9">
            <div id="cat-data">
                @for ($i = 0; $i < count($posts_by_category); $i++)
                    <div class="row cat-post">
                        @if ($posts_by_category[$i]->photo)
                            <div class="col-md-6">
                                <a
                                    href="{{ route('post.show', [$posts_by_category[$i]->category->url, $posts_by_category[$i]->slug]) }}">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('news/' . $posts_by_category[$i]->photo->year . '/' . $posts_by_category[$i]->photo->month . '/' . $posts_by_category[$i]->photo->path) }}"
                                        alt="{{ $posts_by_category[$i]->title }}">
                                    <div class="image-overlay"></div>
                                </a>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="content">
                                <div class="category"><a
                                        href="{{ url($posts_by_category[$i]->category->url) }}">{{ $posts_by_category[$i]->category->title }}</a>
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$posts_by_category[$i]->category->url, $posts_by_category[$i]->slug]) }}">{{ $posts_by_category[$i]->title }}</a>
                                </h3>
                                <div class="subtitle">
                                    {{ $posts_by_category[$i]->description }}
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
                <button class="loadmore btn" onclick="catLoadMore();">Load More News</button>
            </div>
            <div class="py-4" id="cat-nomore"></div>
        </div>
        <div class="col-md-3">
            <h2 class="trending header pt-100px">Trending</h2>
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

    function catLoadMore() {
        page++;
        loadMoreData(page);
    }

    function loadMoreData(page) {
        $.ajax({
                url: '?page=' + page,
                type: "get",
                beforeSend: function() {
                    $('.ajax-load-cat').show();
                }
            })
            .done(function(data) {
                if (data.html == "") {
                    $('.ajax-load-cat').html(null);
                    $('#cat-nomore').html("&#128524; No more records found");
                    return;
                }
                $('.ajax-load-cat').hide();
                $("#cat-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }
</script>
@endpush