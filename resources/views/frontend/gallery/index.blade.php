@extends('layouts.frontend')

@section('title', 'Slush Gallery - SME Business Review™')

@section('meta')
    <meta name="description"
        content="Slush Gallery - SME Business Review™">
    <meta name="keywords" content="web">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description"
        content="Slush Gallery - SME Business Review™">
    <meta property="og:image" content="{{ asset('logo/image.webp') }}">
    <meta property="og:title" content="Slush Gallery - SME Business Review™">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://smebusinessreview.com/">
    <meta property="twitter:title" content="Slush Gallery - SME Business Review™">
    <meta property="twitter:description"
        content="Slush Gallery - SME Business Review™">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image"
        content="{{ asset('logo/image.webp') }}?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizreview">
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
@endpush

@section('content')

    <div class="content-section">
        <div class="container-main about">
            <div class="text-center">
                <h3 class="gallery-head">Slush 2023: For Startups Ready to Scale</h3>
            <p class="py-2">Slush is also known for the Slush conference, which is one of the leading events for startups and tech enthusiasts. It originally started in Helsinki, Finland, and has since expanded globally. The conference brings together entrepreneurs, investors, and tech professionals to network, share ideas, and showcase innovative startups.</p>
            <p>The following pictures were sourced from a Slush 2023 attendee. </p>
            </div>
            <main class="main">
                <div class="container">
                  <div class="card">
                    <div class="card-image">
                      <a href="/gallery/slush-1.jpeg" data-fancybox="gallery" data-caption="Every year, Slush attracts global founders, investors and tech enthusiasts to Helsinki, but for Finland, it signifies more than just a startup conference.">
                        <img src="/gallery/slush-1.jpeg" alt="Image Gallery">
                      </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-image">
                        <a href="/gallery/slush-2.jpeg" data-fancybox="gallery" data-caption="Rachel Murphy, founder and CEO of The Grafter, attends Slush 2023. The Grafter is a UK-based leading business consultancy.">
                            <img src="/gallery/slush-2.jpeg" alt="Image Gallery">
                          </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-image">
                        <a href="/gallery/slush-3.jpeg" data-fancybox="gallery" data-caption="Slush 2023 achieves significant success, drawing attention from prominent individuals across diverse industries.">
                            <img src="/gallery/slush-3.jpeg" alt="Image Gallery">
                          </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-image">
                        <a href="/gallery/slush-4.jpeg" data-fancybox="gallery" data-caption="Slush 2023 has a unique atmosphere that resonates well and makes perfect sense.">
                            <img src="/gallery/slush-4.jpeg" alt="Image Gallery">
                          </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-image">
                        <a href="/gallery/slush-5.jpeg" data-fancybox="gallery" data-caption="
                        Dr. Nadine Hachach-Haram, founder and CEO of Proximie, interacts at Slush 2023. Proximie is a UK-based health technology platform.">
                            <img src="/gallery/slush-5.jpeg" alt="Image Gallery">
                          </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-image">
                        <a href="/gallery/slush-6.jpeg" data-fancybox="gallery" data-caption="Rachel Murphy and Rina Onur Sirinoglu, CEO and co-founder of Spyke Games, pose at the Slush 2023 venue, Messukeskus Helsinki. Spyke Games is an Istanbul-based mobile gaming company.">
                            <img src="/gallery/slush-6.jpeg" alt="Image Gallery">
                          </a>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-image">
                        <a href="/gallery/slush-7.jpeg" data-fancybox="gallery" data-caption="Slush 2023 has a unique atmosphere that resonates well and makes perfect sense.">
                            <img src="/gallery/slush-7.jpeg" alt="Image Gallery">
                          </a>
                    </div>
                  </div>
                </div>
              </main>

        </div>
    </div>

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    // Fancybox Configuration
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});

</script>
@endpush