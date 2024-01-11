@extends('layouts.frontend')

@section('title', $cover->mag_name. ' | SME Business Review')

@section('meta')
    <meta name="description"
        content="{{ $cover->mag_name }}">
    <meta name="keywords" content="SME Business Review™, SME Business Review™ Magazine, Best Business Magazine">
    <meta name="news_keywords" content="SME Business Review™, SME Business Review™ Magazine, Best Business Magazine">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description"
        content="{{ $cover->mag_name }}">
    <meta property="og:image" content="{{ Storage::url('magazines/' . $cover->mag_year . '/' . $cover->mag_issue . '/' . $cover->mag_type . '/profiles/' . $cover->image) }}">
    <meta property="og:title" content="{{ $cover->mag_name }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review™">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="{{ $cover->mag_name }}">
    <meta property="twitter:description"
        content="{{ $cover->mag_name }}">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image" content="{{ Storage::url('magazines/' . $cover->mag_year . '/' . $cover->mag_issue . '/' . $cover->mag_type . '/profiles/' . $cover->image) }}">
    <meta property="twitter:creator" content="@smebizreview">
    <script type="application/ld+json">
    {
            "@context": "https://schema.org",  
            "mainEntityOfPage": {
                "@context": "https://schema.org",
                "@type": "CollectionPage",
                "description": "{{ $cover->mag_name }}",
                "url": "{{ url()->current() }}",
                "name": "{{ $cover->mag_name }}",
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
        <h2 class="mvp-widget-home-title line-none py-3"> <span class="mvp-widget-home-title">{{ $cover->mag_name }}</span></h2>
        <div class="content-section">
            <h2 class="mvp-widget-home-title line-none py-3"> <span class="mvp-widget-home-title">Cover</span></h2>
            <div class="mag-cover bg-black">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ url('profiles', [$cover->type, $cover->url]) }}">
                            <img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="{{ Storage::url('magazines/' . $cover->mag_year . '/' . $cover->mag_issue . '/' . $cover->mag_type . '/profiles/' . $cover->image) }}"
                                alt="{{ $cover->title }}">
                        </a>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="cover-content p-3">
                            <h1><a href="{{ url('profiles', [$cover->type, $cover->url]) }}">{{ $cover->title }}</a></h1>
                            <p class="pt-3 fst-italic">{{ $cover->subtitle }} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="listing py-4">
                <h2 class="mvp-widget-home-title line-none py-3"> <span class="mvp-widget-home-title">Listing</span></h2>
                <div class="listing-img">
                    <a href="{{ url('profiles', [$listing->type, $listing->url]) }}">
                        <img class="lazyload"
                            src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                            data-src="{{ Storage::url('magazines/' . $listing->mag_year . '/' . $listing->mag_issue . '/' . $listing->mag_type . '/profiles/' . $listing->image) }}"
                            alt="{{ $listing->title }}">
                    </a>
                </div>
            </div>

            <div class="profiles py-4">
                <h2 class="mvp-widget-home-title wid-p line-none py-3"> <span class="mvp-widget-home-title">Profiles</span></h2>
                <div class="col-md-12">
                    @foreach ($profiles as $item)
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-5">
                            <div class="profile-card">
                                <a href="{{ url('profiles', [$item->type, $item->url]) }}">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('magazines/' . $item->mag_year . '/' . $item->mag_issue . '/' . $item->mag_type . '/profiles/' . $item->image) }}"
                                        alt="{{ $item->title }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="profile-content">
                                <h3><a href="{{ url('profiles', [$item->type, $item->url]) }}">{{ $item->name }}</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('frontend.post.includes.recommended')
@endsection
