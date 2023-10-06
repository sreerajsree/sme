@extends('layouts.dashboard')

@section('title', 'Contacts')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Contacts</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            <div class="well">
                <div class="well-title">
                    <h5>Post List</h5>
                </div>
                <div class="well-content">
                    <!-- Table -->
                    <table>
                        <tr>
                            <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Delete</th>
                        </tr>
                        @forelse ($contacts as $co)
                            <tr>
                                <td>{{ $co->id }}</td>
                                <td><b>{{ $co->name }}</b></td>
                                <td>{{ $co->email }}</td>
                                <td>{{ $co->message }}</td>
                                <td>
                                    <form action="{{ route('contacts.destroy', $co->id) }}" method="POST">
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
        <div class="news-pagination-wrapper">{{ $contacts->links('vendor.pagination.default') }}</div>
    </section>
    <!-- /.Pagination -->

@endsection
@push('scripts')
    <script>
        tippy('#delete', {
            content: "Delete Contact",
            animation: 'fade'
        });
    </script>
@endpush
