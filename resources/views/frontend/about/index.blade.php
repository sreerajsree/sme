@extends('layouts.frontend')

@section('title', 'About Us - SME Business Review™')

@section('meta')
    <meta name="description" content="About Us - SME Business Review™">
    <meta name="keywords" content="web">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="content-type" content="bundle">
    <meta property="og:description" content="About Us - SME Business Review™">
    <meta property="og:image" content="{{ asset('logo/image.webp') }}">
    <meta property="og:title" content="About Us - SME Business Review™">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:content_tier" content="free">
    <meta http-equiv="content-language" content="en-US">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://smebusinessreview.com/">
    <meta property="twitter:title" content="About Us - SME Business Review™">
    <meta property="twitter:description" content="About Us - SME Business Review™">
    <meta property="twitter:site" content="@smebizreview">
    <meta property="twitter:image" content="{{ asset('logo/image.webp') }}?mbid=social_retweet">
    <meta property="twitter:creator" content="@smebizreview">
@endsection

@section('content')

    <div class="content-section">
        <div class="container-main about">
            <div class="row">
                <div class="content">
                    <h1 class="header-title">About Us</h1>
                    <div class="font-main">
                        <p>SME Business Review, or SMEBR, is a top-rated global business and technology magazine, catering to the SME sector. It promotes brands and executives alike.</p>
                    <p>SMEBR strives toward the development and innovation of the SME sector by offering required knowledge to ensure that entrepreneurs remain competitive.</p>
                    <p>At SMEBR, we recognize the vital role that small and medium enterprises play in driving economic development and nurturing a culture of entrepreneurship. Our platform showcases success stories, shares expert advice, and provides in-depth analyses of industry trends, serving as a catalyst for the growth and sustainability of SMEs worldwide.</p>
                    <p>Our team, comprising seasoned professionals, industry experts, and awesome writers, is committed to covering a wide range of topics, including marketing, technology, automobile, architecture, defense, healthcare, retail, telecom, real estate, gaming, cryptocurrency, legal, and more. Integrating our expertise with a profound understanding of the challenges and opportunities faced by SMEs, our goal is to provide readers with actionable strategies and practical insights to drive their business success.</p>
                    <p>Join us on this exciting journey as we continue to be the go-to resource for SMEs, providing a platform where knowledge meets innovation, and where businesses find the support they need to thrive.</p>
                    <p>Thank you for being a part of the SME Business Review community.</p>
                    </div>
                    <div class="inner">
                        <p class="header-title-sub">Our Mission</p>
                        <div class="font-main">
                            <p>Our mission is to serve as the primary driving force for growth and innovation in the
                                global
                                small and medium-sized enterprise sector. We’re committed to empowering
                                entrepreneurs and
                                business leaders with valuable insight, nurturing an entrepreneurial environment,
                                and enabling
                                SMEs to thrive in today's competitive market.</p>
                        </div>
                    </div>
                    <div class="inner">
                        <p class="header-title-sub">Our Vision</p>
                        <div class="font-main">
                            <p>Our vision is to be the premier global platform that inspires and drives the success
                                of small and
                                medium-sized enterprises, nurturing a culture of innovation, and serving as a beacon
                                of
                                knowledge and expertise for the SME community worldwide. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
