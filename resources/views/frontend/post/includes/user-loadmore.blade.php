@foreach ($posts_by_user as $post_item)
    <div class="row cat-post">
        <div class="col-md-6">
            <a href="{{ route('post.show', [$post_item->category->url, $post_item->slug]) }}">
                <img class="lazyload"
                    src="data:image/gif;base64,R0lGODlhAgABAIAAAP///wAAACH5BAEAAAEALAAAAAACAAEAAAICTAoAOw=="
                    data-src="{{ Storage::url('news/' . $post_item->photo->year . '/' . $post_item->photo->month . '/' . $post_item->photo->path) }}"
                    alt="{{ $post_item->title }}">
                <div class="image-overlay"></div>
            </a>
        </div>
        <div class="col-md-6">
            <div class="content">
                <div class="category"><a href="{{ url($post_item->category->url) }}">{{ $post_item->category->title }}</a>
                </div>
                <h3 class="title"><a
                        href="{{ route('post.show', [$post_item->category->url, $post_item->slug]) }}">{{ $post_item->title }}</a>
                </h3>
                <div class="subtitle">
                    {{ $post_item->description }}
                </div>
            </div>
        </div>
    </div>
@endforeach
