@extends('layouts.frontend')

@section('title', $post->title)

@section('meta', $post->description)

@section('content')

<div class="container-main news">
    <div class="content-section">
        <div class="row">
            <div class="col-md-9">
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
                <a href="{{ url($post->category->url) }}" class="post-category">
                    {{ $post->category->title }}
                </a>
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
                <div class="content">
                    {!! clean($post->body) !!}
                </div>
                <div class="post-tags">
                    <div class="tags">
                        <p>Tags: </p>
                        @foreach ($post->tags as $tag)
                            <a href="{{ $tag->slug }}"># {{ $tag->title }}</a>
                        @endforeach
                    </div>
                    <div class="date-updated">
                        <p>Last updated: </p>
                        {{ $post->updated_at }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="trending header pt-100px">Related News</h2>
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
</div>
@include('frontend.post.includes.recommended')
@endsection
