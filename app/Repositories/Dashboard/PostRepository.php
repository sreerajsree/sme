<?php

namespace App\Repositories\Dashboard;

use App\Models\Post;
use App\Models\Photo;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

/**
 * Post entity database query class.
 *
 * @author Volodymyr Zhonchuk
 */
class PostRepository
{

    /**
     * Fetch all posts from the database.
     *
     * @return \App\Models\Post[]
     */
    public static function getAll()
    {
        return Post::with(['photo', 'category'])
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    /**
     * Save post instance to the database.
     *
     * @param StorePostRequest  $request
     * @return \App\Models\Post
     */
    public static function save(StorePostRequest $request)
    {
        return Post::create($request->all());
    }

    /**
     * Get the specified resource from the database.
     *
     * @param Post  $post
     * @return \App\Models\Post
     */
    public static function show(Post $post)
    {
        return Post::where('id', $post->id)
            ->firstOrFail();
    }

    /**
     * Update post instance in the database.
     *
     * @param UpdatePostRequest  $request
     * @param Post  $post
     */
    public static function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
    }

    /**
     * Remove post instance to trash.
     *
     * @param Post  $post
     */
    public static function removeToTrash(Post $post)
    {
        $post->delete();
    }

    /**
     * Fetch all trashed posts from the database.
     *
     * @return \App\Models\Post[]
     */
    public static function getAllTrashed()
    {
        return Post::with(['photo', 'category'])
            ->onlyTrashed()
            ->get();
    }

    /**
     * Delete post instance from the database.
     *
     * @param  Post  $id
     * @param  Photo  $photo
     */
    public static function expunge($id, Photo $photo)
    {
        $post = Post::withTrashed()
            ->where('id', $id)
            ->first();
        if ($post->photo) {
            $photo->deletePhoto($post->photo->id);
        }
        $post->forceDelete();
    }

    /**
     * Return post from trash.
     *
     * @param  Post  $id
     * @return \App\Models\Post
     */
    public static function returnFromTrash($id)
    {
        return Post::withTrashed()
            ->where('id', $id)
            ->first();
    }

    /**
     * Fetch posts from the database by the given query.
     *
     * @param  $keyword
     * @return \Illuminate\Http\Response
     */
    public static function search($keyword)
    {
        return Post::query()
            ->with(['photo', 'category'])
            ->where('title', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%$keyword%")
            ->orWhere('body', 'like', "%$keyword%")
            ->paginate(10);
    }

    /**
     * Fetch posts for the last 7 days to send newsletter.
     *
     * @return \App\Models\Post[]
     */
    public static function getForNewsletters()
    {
        return Post::with(['photo', 'category', 'user'])
            ->whereDate('publish_time', '>', Carbon::now()->sub(7, 'days'))
            ->where('published', 1)
            ->get();
    }
}
