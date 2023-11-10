<?php

namespace App\Http\Controllers\Frontend;

use App\Services\ViewCountService;
use App\Http\Controllers\Controller;
use App\Contracts\Frontend\PostRepositoryContract;
use App\Models\Magazine;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
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
        $opinion = $this->postRepository->opinion();
        $sponsored = $this->postRepository->sponsored();
        $featuredlogos = $this->postRepository->getFeaturedLogos();
        $breaking = $this->postRepository->breaking();
        $latestmagazine = Magazine::where('published', 1)->orderBy('date', 'desc')->get()->first();

        $random_posts = $this->postRepository->getRandom();

        return view('index', compact('featured', 'posts', 'random_posts', 'cxos', 'trending', 'industry', 'technology', 'platform', 'opinion', 'sponsored', 'featuredlogos', 'breaking', 'latestmagazine'));
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

    public function postByMain(Request $request, $category)
    {
        if ($category != 'industry' && $category != 'technology' && $category != 'platform') {
            abort(404);
        } else {
            $chosen_main = $category;

            $posts_by_main = Post::with(['photo', 'category', 'user'])
                ->where('published', 1)
                ->whereRelation('category', 'parent', $category)
                ->orderBy('publish_time', 'desc')
                ->paginate(15);
            if ($request->ajax()) {
                $view = view('frontend.post.includes.main-loadmore', compact('posts_by_main'))->render();
                return response()->json(['html' => $view]);
            }
            $trending = $this->postRepository->trending();
            return view('frontend.post.posts-by-main', compact('posts_by_main', 'chosen_main', 'trending'));
        }
    }

    /**
     * Display posts associated with specified category.
     *
     * @param \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function postByCategory(Request $request, $category)
    {
        $cat_id = Category::where('url', $category)
            ->get()
            ->first();
        if ($cat_id == null) {
            abort(404);
        } else {
            $chosen_category = $this->postRepository->getCategory($category);
            $trending = $this->postRepository->trending();

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
    }

    /**
     * Display posts associated with specified tag.
     *
     * @param \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function postByTag(Request $request, $tag)
    {
        $tag_id = Tag::where('url', $tag)
            ->get()
            ->first();
        if ($tag_id == null) {
            abort(404);
        } else {
            $chosen_tag = $this->postRepository->getTag($tag);
            $trending = $this->postRepository->trending();

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
    }

    /**
     * Display posts associated with specified user.
     *
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function postByUser(Request $request, $user)
    {
        $user_id = User::where('url', $user)
            ->get()
            ->first();
        if ($user_id == null) {
            abort(404);
        } else {
            $chosen_user = $this->postRepository->getUser($user);
            $trending = $this->postRepository->trending();

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
    }

    public function magazines()
    {
        $magazines = Magazine::where('published', 1)->get();
        return view('frontend.magazine.magazines', compact('magazines'));
    }

    public function magazineCover($year, $url)
    {
        $recommended = $this->postRepository->recommended();
        $cover = Magazine::join('profiles', 'profiles.mag_id', 'magazines.id')->select('profiles.*', 'magazines.url as mag_url', 'magazines.issue as mag_issue', 'magazines.year as mag_year', 'magazines.type as mag_type', 'magazines.name as mag_name')->where('profiles.type', 'cover')->where('magazines.year', $year)->where('magazines.url', $url)->where('magazines.published',1)->get()->first();
        $listing = Magazine::join('profiles', 'profiles.mag_id', 'magazines.id')->select('profiles.*', 'magazines.url as mag_url', 'magazines.issue as mag_issue', 'magazines.year as mag_year', 'magazines.type as mag_type')->where('profiles.type', 'listing')->where('magazines.year', $year)->where('magazines.url', $url)->where('magazines.published',1)->get()->first();
        $profiles = Magazine::join('profiles', 'profiles.mag_id', 'magazines.id')->select('profiles.*', 'magazines.url as mag_url', 'magazines.issue as mag_issue', 'magazines.year as mag_year', 'magazines.type as mag_type')->where('profiles.type', 'profile')->where('magazines.year', $year)->where('magazines.url', $url)->where('magazines.published',1)->get();
        return view('frontend.magazine.cover', compact('cover', 'listing', 'profiles','recommended'));
    }

    public function magazineProfile($type, $url){
        $recommended = $this->postRepository->recommended();
        $profile = Profile::join('magazines','magazines.id', 'profiles.mag_id')->select('profiles.*', 'magazines.name as mag_name', 'magazines.url as mag_url', 'magazines.year as mag_year', 'magazines.issue as mag_issue', 'magazines.type as mag_type')->where('profiles.type', $type)->where('profiles.url', $url)->get()->first();

        return view('frontend.magazine.profile', compact('profile','recommended'));

    }

    public function postByNews()
    {

        $industry = $this->postRepository->industryNews();
        $platform = $this->postRepository->platformNews();
        $technology = $this->postRepository->technologyNews();

        return view('frontend.post.posts-by-news', compact('industry', 'platform', 'technology'));
    }
}
