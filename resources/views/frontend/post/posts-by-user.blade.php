@extends('layouts.frontend')

@section('title', 'Author - ' . $chosen_user->name)

@section('meta')
    <meta name="description"
        content="Read {{ $chosen_user->name }}'s latest news and articles">
    <meta name="keywords" content="{{ $chosen_user->name }}">
    <meta name="news_keywords" content="{{ $chosen_user->name }}">
    <meta name="robots" content="noindex">
    <meta name="content-type" content="contributor">
    <meta property="og:description"
        content="Read {{ $chosen_user->name }}'s latest news and articles">
    <meta property="og:image" content="{{ Storage::url('news/' . $posts_by_user[0]->photo->year . '/' . $posts_by_user[0]->photo->month . '/' . $posts_by_user[0]->photo->path) }}">
    <meta property="og:title" content="Author - {{ $chosen_user->name }}">
    <meta property="og:type" content="profile">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="The Fashion Enthusiast">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://thefashionenthusiast.uk">
    <meta property="twitter:title" content="Author - {{ $chosen_user->name }}">
    <meta property="twitter:description"
        content="Read {{ $chosen_user->name }}'s latest news and articles">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image" content="{{ Storage::url('news/' . $posts_by_user[0]->photo->year . '/' . $posts_by_user[0]->photo->month . '/' . $posts_by_user[0]->photo->path) }}?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizreview">
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"Person","description":"","name":"{{ $chosen_user->name }}","sameAs":["{{ url()->current() }}"]}</script>
@endsection
@section('content')

    <div class="container-main pb-5">
        <div class="row">
            <div class="col-md-9">
                <div class="cat-title">
                    <h2 class="cat-title mvp-widget-home-title"> <span class="mvp-widget-home-title">Latest News from {{ $chosen_user->name }}</span></h2>
                </div>
                <div id="user-data">
                    @for ($i = 0; $i < count($posts_by_user); $i++)
                        <div class="row cat-post">
                            @if ($posts_by_user[$i]->photo)
                                <div class="col-md-6">
                                    <a
                                        href="{{ route('post.show', [$posts_by_user[$i]->category->url, $posts_by_user[$i]->slug]) }}">
                                        <img class="lazyload"
                                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                            data-src="{{ Storage::url('news/' . $posts_by_user[$i]->photo->year . '/' . $posts_by_user[$i]->photo->month . '/' . $posts_by_user[$i]->photo->path) }}"
                                            alt="{{ $posts_by_user[$i]->title }}">
                                    </a>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="content">
                                    <div class="category"><a
                                            href="{{ url($posts_by_user[$i]->category->url) }}">{{ $posts_by_user[$i]->category->title }}</a>
                                    </div>
                                    <h3 class="title"><a
                                            href="{{ route('post.show', [$posts_by_user[$i]->category->url, $posts_by_user[$i]->slug]) }}">{{ $posts_by_user[$i]->title }}</a>
                                    </h3>
                                    <div class="subtitle">
                                        {{ $posts_by_user[$i]->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="d-flex align-items-center mt-4">
                    <div class="ajax-load-user text-center" style="display:none;">
                        <div class="loadingio-spinner-dual-ring-cjdrxbl8zl"><div class="ldio-42n97szec8n">
                            <div></div><div><div></div></div>
                            </div></div>
                    </div>
                    <button class="loadmore btn" onclick="userLoadMore();">Load More</button>
                </div>
                <div class="py-4" id="user-nomore"></div>
            </div>
            <div class="col-md-3">
                <div class="cat-title">
                    <h2 class="mvp-widget-home-title"> <span class="mvp-widget-home-title">Trending</span></h2>
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

        function userLoadMore() {
            page++;
            loadMoreData(page);
        }

        function loadMoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function() {
                        $('.ajax-load-user').show();
                    }
                })
                .done(function(data) {
                    if (data.html == "") {
                        $('.ajax-load-user').html(null);
                        $('#user-nomore').html("&#128524; No more records found");
                        return;
                    }
                    $('.ajax-load-user').hide();
                    $("#user-data").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
        }
    </script>
@endpush
