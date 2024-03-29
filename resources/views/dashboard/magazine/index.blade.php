@extends('layouts.dashboard')

@section('title', 'All Magazines - SME Business Review™')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Magazines</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            @can('create', \App\Models\Post::class)
                <a href="/dashboard/sme/magazine/create" class="button">Add Magazine</a>
            @endcan
            <div class="well">
                <div class="well-title">
                    <h5>Magazine List</h5>
                </div>
                <div class="well-content">
                    <!-- Table -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Cover</th>
                            <th>Name</th>
                            <th>Issue</th>
                            <th>Type</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Index View</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @forelse ($magazine as $mag)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    @if ($mag->image)
                                        <img src="{{ Storage::url('magazines/' . $mag->year . '/' . $mag->issue . '/' . $mag->type . '/' . $mag->image) }}"
                                            height="200" width="150" alt="{{ $mag->title }}">
                                    @endif
                                </td>
                                <td>{{ $mag->name }}</td>
                                <td>{{ $mag->issue }}</td>
                                <td>{{ $mag->type }}</td>
                                <td>{{ $mag->month }}</td>
                                <td>{{ $mag->year }}</td>
                                @if ($mag->index_view == 1)
                                    <td>Yes</td>
                                @elseif($mag->index_view == 0)
                                    <td>No</td>
                                @endif
                                <td>
                                    @if ($mag->published == 1)
                                        <button class="action-button-green">Active</button>
                                    @else
                                        <button class="action-button-red">Not Active</button>
                                    @endif
                                </td>
                                <td style="display: flex">
                                    <a id="show" href="/dashboard/sme/magazine/{{ $mag->id }}/profile"
                                        class="action-button-black">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a id="edit" href="/dashboard/sme/magazine/edit/{{ $mag->id }}"
                                        class="action-button-green">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a id="cover" href="/dashboard/sme/magazine/edit/{{ $mag->id }}"
                                        class="action-button-black">
                                        <i class="fa-solid fa-address-card"></i>
                                    </a>
                                    <a id="listing" href="/dashboard/sme/magazine/edit/{{ $mag->id }}"
                                        class="action-button-black">
                                        <i class="fa-solid fa-list"></i>
                                    </a>
                                    <form action="{{ route('magazine.destroy', $mag->id) }}" method="POST">
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
        <div class="news-pagination-wrapper">{{ $magazine->links('vendor.pagination.default') }}</div>
    </section>
    <!-- /.Pagination -->

@endsection
@push('scripts')
    <script>
        tippy('#show', {
            content: "Show Magazine",
            animation: 'fade'
        });
        tippy('#edit', {
            content: "Edit Magazine",
            animation: 'fade'
        });
        tippy('#cover', {
            content: "Cover Story",
            animation: 'fade'
        });
        tippy('#listing', {
            content: "Listing",
            animation: 'fade'
        });
        tippy('#delete', {
            content: "Delete Magazine",
            animation: 'fade'
        });
    </script>
@endpush
