@extends('layouts.dashboard')

@section('title', 'News - SME Business Review')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>News</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            @can('create', \App\Models\Post::class)
                <a href="/dashboard/sme/posts/create" class="button">Add News</a>
            @endcan
            <div class="well">
                <div class="well-title">
                    <h5>News List</h5>
                </div>
                <div class="well-content">
                    <!-- Table -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Published</th>
                            <th>Viewed</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    @if ($post->photo)
                                        <img src="{{ Storage::url('news/' . $post->photo->year . '/' . $post->photo->month . '/' . $post->photo->path) }}"
                                            height="50" width="100" alt="{{ $post->title }}">
                                    @endif
                                </td>
                                <td>
                                    @can('view', \App\Models\Post::class)
                                        <a href="/dashboard/sme/posts/{{ $post->id }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    @endcan
                                    @cannot('view', \App\Models\Post::class)
                                        <p>{{ $post->title }}</p>
                                    @endcannot
                                </td>
                                <td>{{ $post->if_published }}</td>
                                <td>{{ $post->viewed }}</td>
                                <td>
                                    @if ($post->category)
                                        {{ $post->category->title }}
                                    @endif
                                </td>
                                <td>
                                    @can('update', $post)
                                        <a id="edit" href="/dashboard/sme/posts/{{ $post->id }}/edit" class="action-button-green">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $post)
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button id="delete" type="submit" class="action-button-red">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No posts found</td>
                            </tr>
                        @endforelse
                    </table>
                    <!-- /.Table -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Dashboard -->

    <!-- Pagination -->
    <section class="news-pagination">
        <div class="news-pagination-wrapper">{{ $posts->links('vendor.pagination.default') }}</div>
    </section>
    <!-- /.Pagination -->

@endsection
@push('scripts')
    <script>
        tippy('#edit', {
            content: "Edit Article",
            animation: 'fade'
        });
        tippy('#delete', {
            content: "Delete Article",
            animation: 'fade'
        });
    </script>
@endpush
