@extends('layouts.dashboard')

@section('title', 'All Clients')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Clients</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            @can('create', \App\Models\Post::class)
                <a href="/dashboard/sme/clients/create" class="button">Add Client</a>
            @endcan
            <div class="well">
                <div class="well-title">
                    <h5>Clients List</h5>
                </div>
                <div class="well-content">
                    <!-- Table -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Message</th>
                            <th></th>
                        </tr>
                        @forelse ($clients as $client)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ Storage::url('clients/'.$client->image) }}"
                                            alt="{{ $client->name }}" height="50" width="100">
                                </td>
                                <td><b>{{ $client->name }}</b></td>
                                <td>{{ $client->company }}</td>
                                <td>{{ $client->position }}</td>
                                <td>{{ $client->message }}</td>
                                <td>
                                    <a id="edit" href="/dashboard/sme/clients/edit/{{ $client->id }}"
                                        class="action-button-green">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
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
        <div class="news-pagination-wrapper">{{ $clients->links('vendor.pagination.default') }}</div>
    </section>
    <!-- /.Pagination -->

@endsection
@push('scripts')
    <script>
        tippy('#edit', {
            content: "Edit Client",
            animation: 'fade'
        });
        tippy('#delete', {
            content: "Delete Client",
            animation: 'fade'
        });
    </script>
@endpush
