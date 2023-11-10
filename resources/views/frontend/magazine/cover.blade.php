@extends('layouts.frontend')

@section('title', 'SME Business Review™ Magazine | Best Business Magazine')

@section('meta')
    <meta name="description"
        content="SME Business Review™ is widely recognized as a leading business magazine, renowned for its comprehensive coverage of small and medium-sized enterprises">
    <meta name="keywords" content="SME Business Review™, SME Business Review™ Magazine, Best Business Magazine">
    <meta name="news_keywords" content="SME Business Review™, SME Business Review™ Magazine, Best Business Magazine">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description"
        content="SME Business Review™ is widely recognized as a leading business magazine, renowned for its comprehensive coverage of small and medium-sized enterprises">
    <meta property="og:image" content="{{ asset('logo/magazine.png') }}">
    <meta property="og:title" content="SME Business Review™ Magazine | Best Business Magazine">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="article:author" content="SME Business Review™">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="http://smebusinessreview.com/">
    <meta property="twitter:title" content="SME Business Review™ Magazine | Best Business Magazine">
    <meta property="twitter:description"
        content="SME Business Review™ is widely recognized as a leading business magazine, renowned for its comprehensive coverage of small and medium-sized enterprises">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image" content="{{ asset('logo/magazine.png') }}">
    <meta property="twitter:creator" content="@smebizreview">
    <script type="application/ld+json">
    {
            "@context": "https://schema.org",  
            "mainEntityOfPage": {
                "@context": "https://schema.org",
                "@type": "CollectionPage",
                "description": "SME Business Review™ is widely recognized as a leading business magazine, renowned for its comprehensive coverage of small and medium-sized enterprises",
                "url": "{{ url()->current() }}",
                "name": "SME Business Review™ Magazine | Best Business Magazine",
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
        <h2 class="mvp-widget-home-title py-3"> <span class="mvp-widget-home-title">{{ $cover->mag_name }}</span></h2>
        <div class="content-section">
            <h2 class="mvp-widget-home-title py-3"> <span class="mvp-widget-home-title bg-black">Cover</span></h2>
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
                        <div class="cover-content">
                            <h1><a href="{{ url('profiles', [$cover->type, $cover->url]) }}">{{ $cover->title }}</a></h1>
                            <p class="pt-3">{{ $cover->subtitle }} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="listing py-4">
                <h2 class="mvp-widget-home-title py-3"> <span class="mvp-widget-home-title bg-black">Listing</span></h2>
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
                <h2 class="mvp-widget-home-title py-3"> <span class="mvp-widget-home-title bg-black">Profiles</span></h2>
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($profiles as $item)
                        <div class="col-md-4">
                            <div class="profile-card">
                                <a href="{{ url('profiles', [$item->type, $item->url]) }}">
                                    <img class="lazyload"
                                        src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                        data-src="{{ Storage::url('magazines/' . $item->mag_year . '/' . $item->mag_issue . '/' . $item->mag_type . '/profiles/' . $item->image) }}"
                                        alt="{{ $item->title }}">
                                </a>
                                <div class="profile-content">
                                    <h3><a href="{{ url('profiles', [$item->type, $item->url]) }}">{{ $item->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.post.includes.recommended')
@endsection
