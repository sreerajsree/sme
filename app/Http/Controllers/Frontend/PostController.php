<?php

namespace App\Http\Controllers\Frontend;

use App\Services\ViewCountService;
use App\Http\Controllers\Controller;
use App\Contracts\Frontend\PostRepositoryContract;
use App\Models\Magazine;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * PostRepository instance.
     *
     * @var type object
     */
    private $postRepository;

    /**
     * Create a new instance.
     *
     * @param  \App\Contracts\Frontend\PostRepositoryContract  $postRepository
     * @return void
     */
    public function __construct(PostRepositoryContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display post listing and featured post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured = $this->postRepository->getFeatured();
        $posts = $this->postRepository->Latest7();
        $cxos = $this->postRepository->cxos();
        $trending = $this->postRepository->trending();
        $industry = $this->postRepository->industry();
        $technology = $this->postRepository->technology();
        $platform = $this->postRepository->platform();

        $random_posts = $this->postRepository->getRandom();

        return view('index', compact('featured', 'posts', 'random_posts', 'cxos', 'trending', 'industry', 'technology', 'platform'));
    }

    /*
     * Display the specified post.
     *
     * @param \App\Services\ViewCountService $viewCountService
     * @param \App\Post $slug
     * @return \Illuminate\Http\Response
     */
    public function show(ViewCountService $viewCountService, $category, $slug)
    {
        $post = $this->postRepository->getOne($slug);
        $related = $this->postRepository->getRelated($post);
        $tags = $this->postRepository->getTags();
        $viewCountService->postViewCount($post);
        $recommended = $this->postRepository->recommended();

        return view('frontend.post.show', compact('post', 'tags', 'related', 'recommended'));
    }

    /**
     * Display posts associated with specified category.
     *
     * @param \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function postByCategory(Request $request, $category)
    {
        
        $chosen_category = $this->postRepository->getCategory($category);
        $trending = $this->postRepository->trending();
        $cat_id = Category::where('url', $category)
            ->get()
            ->first();

        $posts_by_category = Post::with(['photo', 'category', 'user'])
            ->where('category_id', $cat_id->id)
            ->orderBy('publish_time', 'desc')
            ->where('published', 1)
            ->paginate(8);

        if ($request->ajax()) {
            $view = view('frontend.post.includes.cat-loadmore', compact('posts_by_category'))->render();
            return response()->json(['html' => $view]);
        }

        return view('frontend.post.posts-by-category', compact('posts_by_category', 'chosen_category', 'trending'));
    }

    /**
     * Display posts associated with specified tag.
     *
     * @param \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function postByTag(Request $request,$tag)
    {
        $chosen_tag = $this->postRepository->getTag($tag);
        $trending = $this->postRepository->trending();

        $tag_id = Tag::where('url', $tag)
            ->get()
            ->first();
        $posts_by_tag = Tag::find($tag_id->id)
            ->posts()
            ->with(['photo', 'category', 'user'])
            ->where('published', 1)
            ->orderBy('publish_time', 'desc')
            ->paginate(8);

        if ($request->ajax()) {
            $view = view('frontend.post.includes.tag-loadmore', compact('posts_by_tag'))->render();
            return response()->json(['html' => $view]);
        }

        return view('frontend.post.posts-by-tag', compact('posts_by_tag', 'chosen_tag', 'trending'));
    }

    /**
     * Display posts associated with specified user.
     *
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function postByUser(Request $request,$user)
    {
        $chosen_user = $this->postRepository->getUser($user);
        $trending = $this->postRepository->trending();
        $user_id = User::where('url', $user)
            ->get()
            ->first();
        $posts_by_user = Post::with(['photo', 'user', 'category'])
            ->where('user_id', $user_id->id)
            ->where('published', 1)
            ->orderBy('publish_time', 'desc')
            ->paginate(8);

        if ($request->ajax()) {
            $view = view('frontend.post.includes.user-loadmore', compact('posts_by_user'))->render();
            return response()->json(['html' => $view]);
        }

        return view('frontend.post.posts-by-user', compact('posts_by_user', 'chosen_user', 'trending'));
    }

    public function magazines() {
        $magazines = Magazine::all();
        return view('frontend.magazine.magazines', compact('magazines'));
    }
}
