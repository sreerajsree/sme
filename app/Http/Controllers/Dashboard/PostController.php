<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\SlugService;
use App\Services\PostPhotoUploadService;
use App\Repositories\Dashboard\PostRepository;
use App\Repositories\Dashboard\CategoryRepository;
use App\Repositories\Dashboard\TagRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('dashboard_access'), 403);
        $posts = PostRepository::getAll();
        $totalArticles = Post::count();
        $totalArticlesPublished = Post::where('published', '=', 1)->count();
        $totalArticlesUnpublished = Post::where('published', '=', 0)->count();
        $newArticles24Hours = Post::where('created_at', '>=', now()->subHours(24))->count();
        $newArticles7Days = Post::where('created_at', '>=', now()->subDays(7))->count();
        $totalComments = Comment::count();

        return view('dashboard.post.index', compact('posts', 'totalArticles', 'totalArticlesPublished', 'newArticles24Hours', 'newArticles7Days', 'totalComments', 'totalArticlesUnpublished'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Gate::allows('post_create'), 403);
        $categories = CategoryRepository::All();
        $tags = TagRepository::getAll();
        $post = new Post();

        return view('dashboard.post.create', compact('categories', 'tags', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @param  \App\Services\SlugService  $slugService
     * @param  \App\Services\PostPhotoUploadService  $postPhotoUploadService
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request, SlugService $slugService, PostPhotoUploadService $postPhotoUploadService)
    {
        $post = PostRepository::save($request);
        $slugService->generateSlug($request, $post);
        $post->saveUserWithPost($post);
        $postPhotoUploadService->store($request, $post);
        $post->syncTags($post);

        return redirect('dashboard/sme/posts')->withSuccessMessage('Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        abort_unless(Gate::allows('post_view'), 403);
        $post_item = PostRepository::show($post);

        return view('dashboard.post.show', compact('post_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        abort_unless(Gate::allows('post_edit'), 403);
        $categories = CategoryRepository::All();
        $tags = TagRepository::getAll();

        return view('dashboard.post.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @param  \App\Services\SlugService  $slugService
     * @param  \App\Services\PostPhotoUploadService  $postPhotoUploadService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post, SlugService $slugService, PostPhotoUploadService $postPhotoUploadService)
    {
        PostRepository::update($request, $post);
        $postPhotoUploadService->store($request, $post);
        $slugService->generateSlug($request, $post);
        $post->saveUserWithPost($post);
        $post->syncTags($post);

        return redirect('dashboard/sme/posts')->withSuccessMessage('Post Updated Successfully!');
    }

    /**
     * Remove the specified resource to trash.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        abort_unless(Gate::allows('post_trash'), 403);
        PostRepository::removeToTrash($post);

        return redirect('dashboard/sme/posts')->withSuccessMessage('Post Trashed Successfully!');
    }
}
