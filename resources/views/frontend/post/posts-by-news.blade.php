@extends('layouts.frontend')

@section('title', 'News - SME Business Review')

@section('meta', '')

@section('content')

    <div class="content-section">
        <div class="container-main pb-5">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="header-news">Industry</h2>
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
                    <h2 class="header-news">Technology</h2>
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
                    <h2 class="header-news">Platform</h2>
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
