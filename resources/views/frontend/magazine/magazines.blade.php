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
        <div class="magazine-header">
            <h1>SME Business Review™ Magazine | Best Business Magazine</h1>
            <p class="font-g">SME Business Review™ is widely recognized as a leading business magazine, renowned for its comprehensive
                coverage of small and medium-sized enterprises.</p>
        </div>
        <div class="row">
            <h2 class="mvp-widget-home-title py-3"> <span class="mvp-widget-home-title">November Edition {{ date('Y') }}</span></h2>
            @foreach ($magazines as $item)
                <div class="col-md-3">
                    <div class="mag-card">
                        <a href="{{ url('magazine', [$item->year, $item->url]) }}">
                            <img class="lazyload"
                                src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                                data-src="{{ Storage::url('magazines/' . $item->year . '/' . $item->issue . '/' . $item->type . '/' . $item->image) }}"
                                alt="{{ $item->name }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
