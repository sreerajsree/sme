@extends('layouts.dashboard')

@section('title', 'Categories - SME Business Review™')

@section('content')

    <!-- Title jumbotron -->
    <section class="title-jumbotron">
        <div class="parallax-text">
            <h1>Categories</h1>
        </div>
    </section>
    <!-- /.Title jumbotron -->

    <!-- Dashboard -->
    <section class="dashboard">
        <div class="dashboard-wrapper">
            @can('create', \App\Models\Category::class)
                <a href="/dashboard/sme/categories/create" class="button">Add Category</a>
            @endcan
            <div class="well">
                <div class="well-title">
                    <h5>Category List</h5>
                </div>
                <div class="well-content">
                    <!-- Table -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Parent Category</th>
                            <th>URL</th>
                            <th>Title</th>
                            <th>Meta description</th>
                            <th>Meta Keywords</th>
                            <th></th>
                        </tr>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                @if ($category->parent == 'technology')
                                    <td><b>Technology</b></td>
                                @elseif($category->parent == 'industry')
                                    <td><b>Industry</b></td>
                                @elseif($category->parent == 'platform')
                                    <td><b>Platform</b></td>
                                @endif
                                <td>{{ $category->url }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->meta_description }}</td>
                                <td>{{ $category->meta_keywords }}</td>
                                <td>
                                    @can('update', \App\Models\Category::class)
                                        <a href="/dashboard/sme/categories/{{ $category->id }}/edit" class="action-button-green">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    @endcan
                                    @can('delete', \App\Models\Category::class)
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            onsubmit="return confirm('Delete category?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="action-button-red">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No categories found</td>
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
        <div class="news-pagination-wrapper">{{ $categories->links('vendor.pagination.default') }}</div>
    </section>
    <!-- /.Pagination -->
@endsection
