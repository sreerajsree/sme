<div class="container-main">
    <div class="content-section-recommended">
        <h2 class="mvp-widget-home-title line-none wid-p py20px"> <span class="mvp-widget-home-title">Recommended</span></h2>
        <div class="row">
            @foreach ($recommended as $item)
                <div class="col-md-3">
                    <div class="recommended">
                        <a href="{{ route('post.show', [$item->category->url, $item->slug]) }}" class="img">
                            <img src="{{ Storage::url('news/' . $item->photo->year . '/' . $item->photo->month . '/' . $item->photo->path) }}"
                                alt="{{ $item->alt }}">
                        </a>
                        <div class="content">
                            <div class="category"><a
                                    href="{{ url($item->category->url) }}">{{ $item->category->title }}</a></div>
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