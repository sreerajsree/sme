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
        <div class="content-section">
            <h2 class="mvp-widget-home-title py-3"> <span class="mvp-widget-home-title">{{ $profile->mag_name }}</span></h2>
            <div class="profile-image">
                <img class="lazyload"
                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                    data-src="{{ Storage::url('magazines/' . $profile->mag_year . '/' . $profile->mag_issue . '/' . $profile->mag_type . '/profiles/' . $profile->image) }}"
                    alt="{{ $profile->title }}">
            </div>
            <h1 class="pr-title">{{ $profile->title }}</h1>
            <p class="fs-italic pb-2">{{ $profile->subtitle }}</p>
            <div class="pr-content">
                {!! $profile->body !!}
            </div>
        </div>
    </div>
    @include('frontend.post.includes.recommended')
@endsection