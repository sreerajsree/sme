<div class="container-main">
    <h2 class="header text-start">Recommended News</h2>
    <div class="content-section">
        <div class="row">
            @foreach ($recommended as $item)
                <div class="col-md-3">
                    <div class="recommended">
                        <a href="{{ route('post.show', [$item->category->url, $item->slug]) }}" class="img">
                            <img src="{{ Storage::url('news/' . $item->photo->year . '/' . $item->photo->month . '/' . $item->photo->path) }}"
                                alt="{{ $post->alt }}">
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