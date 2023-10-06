@extends('layouts.dashboard')

@section('title', $mag->name)

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>{{ $mag->name }}</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            @can('create', \App\Models\Post::class)
                <a href="/dashboard/sme/magazine/{{ $mag->id }}/profile/create" class="button">Add Profile</a>
            @endcan
            <div class="well">
                <div class="well-title">
                    <h5>Profle List</h5>
                </div>
                <div class="well-content">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        @forelse ($profiles as $profile)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    @if ($profile->image)
                                        <img src="{{ Storage::url('magazines/' . $mag->year . '/' . $mag->issue . '/' . $mag->type . '/profiles/' . $profile->image) }}"
                                            height="50" width="100" alt="{{ $profile->title }}">
                                    @endif
                                </td>
                                <td>{{ $profile->name }}</td>
                                @if ($profile->type == 'listing')
                                    <td>Listing</td>
                                @elseif($profile->type == 'cover')
                                    <td>Cover Story</td>
                                @elseif($profile->type == 'profile')
                                    <td>Profile</td>
                                @endif
                                <td>{{ $profile->date }}</td>
                                <td>
                                    <a id="edit" href="/dashboard/sme/magazine/profile/edit/{{ $profile->id }}" class="action-button-green">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('magazine.destroyProfile', $profile->id) }}" method="POST">
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
                </div>
            </div>
        </div>
    </section>
    <!-- /.Dashboard -->

    <!-- Pagination -->
    {{-- <section class="news-pagination">
        <div class="news-pagination-wrapper">{{ $magazine->links('vendor.pagination.default') }}</div>
    </section> --}}
    <!-- /.Pagination -->

@endsection
