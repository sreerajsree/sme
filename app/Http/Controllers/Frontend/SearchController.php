<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Contracts\Frontend\SearchRepositoryContract;
use App\Models\Post;

class SearchController extends Controller
{
    /**
     * SearchRepository instance.
     *
     * @var type object
     */
    private $searchRepository;

    /**
     * Create a new instance.
     *
     * @param  \App\Contracts\Frontend\SearchRepositoryContract  $searchRepository
     * @return void
     */
    public function __construct(SearchRepositoryContract $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    /**
     * Display a listing of Post resource by search criteria.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $posts = $this->searchRepository->search(request('keyword'));
        $trending = Post::with(['photo', 'category', 'user'])
            ->where('published', 1)
            ->orderBy('viewed', 'desc')
            ->take(10)
            ->get();

        return view('frontend.search.index', compact('posts', 'trending'));
    }
}
