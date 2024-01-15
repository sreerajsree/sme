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

    <div style="background-color: #474853;">
        <div class="container-main pb-5 text-white">
            <div class="magazine-header">
                <h1>SME Business Review™ Magazine | Best Business Magazine</h1>
                <p class="font-g">SME Business Review™ is widely recognized as a leading business magazine, renowned for its
                    comprehensive
                    coverage of small and medium-sized enterprises.</p>
            </div>
    
            @if (count($magazinesMonth) > 0)
                @for ($i = 0; $i < count($magazinesMonth); $i++)
                    <div class="row">
                        <h2 class="mvp-widget-home-title wid-p py-3 line-none"> <span
                                class="bg-gray text-white">{{ $monthArray[$magazinesMonth[$i]->month] }} Edition
                                {{ $year }}</span></h2>
                        @foreach ($magazineArray[$i] as $item)
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
                @endfor
            @endif
            <div class="row">
                <h2 class="mvp-widget-home-title wid-p py-3 line-none"> <span class="bg-gray text-white">November Edition
                        {{ date('Y') - 1 }}</span></h2>
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
    </div>

@endsection
