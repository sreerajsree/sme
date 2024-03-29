<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Head -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#000">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#000">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    @stack('styles')
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<!-- /.Head -->

<!-- Body -->

<body>

    <!-- App -->
    <div id="app"></div>

    <!-- Header -->
    <header>
        <div class="menu-wrapper">
            <div class="logo">
                <a href="/dashboard/sme/posts">Dashboard<span class="logo-span"></span>
                </a>
            </div>
            <!-- Navigation -->
            <nav>
                <ul>
                    <li class="sub-menu">
                        <a href="javascript:void(0)">User Board</a>
                        <ul>
                            @can('viewAny', \App\Models\User::class)
                                <li>
                                    <a href="/dashboard/sme/users" class="sub-item">
                                        <span>Users</span>
                                    </a>
                                </li>
                            @endcan
                            @can('viewAny', \App\Models\Role::class)
                                <li>
                                    <a href="/dashboard/sme/roles" class="sub-item">
                                        <span>Roles</span>
                                    </a>
                                </li>
                            @endcan
                            @can('viewAny', \App\Models\Permission::class)
                                <li>
                                    <a href="/dashboard/sme/permissions" class="sub-item">
                                        <span>Permissions</span>
                                    </a>
                                </li>
                            @endcan
                            @can('viewAny', \App\Models\Subscription::class)
                                <li>
                                    <a href="/dashboard/sme/subscriptions" class="sub-item">
                                        <span>Subscriptions</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0)">Post Board</a>
                        <ul>
                            @can('viewAny', \App\Models\Post::class)
                                <li>
                                    <a href="/dashboard/sme/posts" class="sub-item">
                                        <span>Posts</span>
                                    </a>
                                </li>
                            @endcan
                            @can('viewAny', \App\Models\Category::class)
                                <li>
                                    <a href="/dashboard/sme/categories" class="sub-item">
                                        <span>Categories</span>
                                    </a>
                                </li>
                            @endcan
                            @can('viewAny', \App\Models\Tag::class)
                                <li>
                                    <a href="/dashboard/sme/tags" class="sub-item">
                                        <span>Tags</span>
                                    </a>
                                </li>
                            @endcan
                            @can('viewAny', \App\Models\Comment::class)
                                <li>
                                    <a href="/dashboard/sme/comments" class="sub-item">
                                        <span>Comments</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0)">Magazine Board</a>
                        <ul>
                            @can('viewAny', \App\Models\Post::class)
                                <li>
                                    <a href="/dashboard/sme/magazine" class="sub-item">
                                        <span>All Magazines</span>
                                    </a>
                                </li>
                            @endcan
                            @can('viewAny', \App\Models\Post::class)
                                <li>
                                    <a href="/dashboard/sme/magazine/create" class="sub-item">
                                        <span>Create Magazine</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @can('viewTrashList', \App\Models\Post::class)
                        <li>
                            <a href="/dashboard/sme/trash">Post Trash</a>
                        </li>
                    @endcan
                    <li>
                        <a href="/dashboard/sme/clients">Clients</a>
                    </li>
                    <li>
                        <a href="/dashboard/sme/featured">Featured</a>
                    </li>
                    <li>
                        <a href="/dashboard/sme/contacts">Contacts</a>
                    </li>
                    @auth
                        <li class="sub-menu">
                            <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}" class="sub-item"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    <li>
                        <a href="javascript:void(0)" id="search">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.Navigation -->
            <div class="menu-toggle">
                <div class="hamburger-menu">
                </div>
            </div>
        </div>
        <!-- Search overlay -->
        <div class="search-overlay">
            <span class="close-search">&times;</span>
            <form action="{{ route('search') }}" method="GET" class="search-input" autocomplete="off">
                @include('layouts.includes.fullscreen-search')
            </form>
        </div>
        <!-- /.Search overlay -->
    </header>
    <!-- /.Header -->

    <!-- Main -->
    <main>
        @yield('content')
    </main>
    <!-- /.Main -->

    <!-- Footer -->
    <footer id="dashboard-footer">
        <svg class="hidden">
            <symbol id="icon-heart" viewBox="0 0 24 21">
                <path
                    d="M20.497.957A6.765 6.765 0 0 0 17.22.114a6.76
                        6.76 0 0 0-5.218 2.455A6.778 6.778 0 0 0 3.506.957
                        6.783 6.783 0 0 0 0 6.897c0 .732.12 1.434.335 2.09
                        1.163 5.23 11.668 11.827 11.668 11.827s10.498-6.596
                        11.663-11.826a6.69 6.69 0 0 0 .336-2.091 6.786 6.786
                        0 0 0-3.505-5.94z" />
            </symbol>
        </svg>
        <div class="dashboard-footer-wrapper">
            <p>
                <a href="{{ url('/') }}">SME Business Review</a>
                Made with
                <button class="iconbutton">
                    <svg class="icon icon--heart">
                        <use xlink:href="#icon-heart"></use>
                    </svg>
                </button>
                for a better web.
            </p>
        </div>
    </footer>
    <!-- /.Footer-->

    <!--Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('sweetalert::alert')
    <!-- /.Scripts -->

</body>
<!-- /.Body -->

</html>
