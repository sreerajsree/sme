@extends('layouts.dashboard')

@section('title', 'All Featured Companies')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Featured Companies</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            @can('create', \App\Models\Post::class)
                <a href="/dashboard/sme/featured/create" class="button">Add Featured Company</a>
            @endcan
            <div class="well">
                <div class="well-title">
                    <h5>Featured Companies List</h5>
                </div>
                <div class="well-content">
                    <!-- Table -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>Website URL</th>
                            <th></th>
                        </tr>
                        @forelse ($featured as $feature)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ Storage::url('featured/'.$feature->image) }}"
                                            alt="{{ $feature->name }}" height="50" width="100">
                                </td>
                                <td><b>{{ $feature->name }}</b></td>
                                <td>{{ $feature->url }}</td>
                                <td>
                                    <a id="edit" href="/dashboard/sme/featured/edit/{{ $feature->id }}"
                                        class="action-button-green">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('featured.destroy', $feature->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button id="delete" type="submit" class="action-button-red">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
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
        <div class="news-pagination-wrapper">{{ $featured->links('vendor.pagination.default') }}</div>
    </section>
    <!-- /.Pagination -->

@endsection
@push('scripts')
    <script>
        tippy('#edit', {
            content: "Edit Featured Company",
            animation: 'fade'
        });
        tippy('#delete', {
            content: "Delete Featured Company",
            animation: 'fade'
        });
    </script>
@endpush
