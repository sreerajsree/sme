@extends('layouts.frontend')

@section('title', 'SME Business Review')

@section('meta', 'SME Business Review')

@section('content')

    <div class="container-main mt-5">
        <div class="row">
            <div class="col-md-9">
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
                        <p class="author">By <a href="{{ $featured->user->slug }}">{{ $featured->user->name }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mag-heading">Latest Magazine</h2>
                        <div class="mag-container">
                            <img src="/mag.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-section">
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
                                <h3 class="title"><a
                                        href="{{ route('post.show', [$posts[$i]->category->url, $posts[$i]->slug]) }}">{{ $posts[$i]->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endfor
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
        <div class="content-section">
            <div class="row">
                <div class="col-md-9">
                    <div class="bg-yellow">
                        <h2 class="header pb-30px">Sponsored Pieces</h2>
                        <div class="row">
                            @foreach($sponsored as $item)
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

    <div class="container-main">
        <h2 class="header">Featured Companies</h2>
        <div class="content-section">
            <section class="customer-logos slider">
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
                <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
                <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
                <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
                <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
                <div class="slide"><img
                        src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
            </section>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script>
        $(document).ready(function() {
            $('.customer-logos').slick({
                rows: 2,
                slidesToShow: 6,
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
