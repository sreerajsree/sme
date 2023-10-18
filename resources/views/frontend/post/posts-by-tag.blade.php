@extends('layouts.frontend')

@section('title', $chosen_tag->title . ' - SME Business Review')

@section('meta', 'An authoritative source of aviation news and international travel affairs from the experts')

@section('content')

<div class="container-main pb-5">
    <div class="row">
        <div class="col-md-9">
            <h2 class="cat-title">{{ $chosen_tag->title }} News</h2>
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
