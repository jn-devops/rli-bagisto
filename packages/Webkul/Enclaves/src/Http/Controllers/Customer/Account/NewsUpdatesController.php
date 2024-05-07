<?php

namespace Webkul\Enclaves\Http\Controllers\Customer\Account;

use Illuminate\Http\JsonResponse;
use Webkul\Blog\Http\Resources\BlogResource;
use Webkul\Blog\Repositories\BlogRepository;

class NewsUpdatesController extends AbstractController
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected BlogRepository $blogRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse | \Illuminate\View\View
    {
        if(request()->ajax()) {
            $limit = request('limit') ?? 4;

            $blogRepository = $this->blogRepository;
            
            $count = $blogRepository->count();

            $blogs = $blogRepository->orderBy('id', 'desc')->limit($limit);

            return new JsonResponse([
                'blogs'   => BlogResource::collection($blogs),
                'count'   => $count,
            ]);
        }

        return view('shop::customers.account.news-update.index');
    }
}
