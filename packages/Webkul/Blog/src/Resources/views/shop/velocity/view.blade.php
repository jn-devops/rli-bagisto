@php
    $channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta name="title" content="{{ $blog->meta_title ?? ( $blogSeoMetaTitle ?? ( $channel->home_seo['meta_title'] ?? '' ) ) }}" />

    <meta name="description" content="{{ $blog->meta_description ?? ( $blogSeoMetaKeywords ?? ( $channel->home_seo['meta_description'] ?? '' ) ) }}" />

    <meta name="keywords" content="{{ $blog->meta_keywords ?? ( $blogSeoMetaDescription ?? ( $channel->home_seo['meta_keywords'] ?? '' ) ) }}" />
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ __('Single Blog Page') }}
    </x-slot>

    @push ('styles')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @include ('blog::custom-css.custom-css')

    @endpush

    <div class="main">
        <div>
            <div class="row col-12 remove-padding-margin">
                <div id="home-right-bar-container" class="col-12 no-padding content">
                    <div class="container-right row no-margin col-12 no-padding">
                        <section class="blog-hero-wrapper">
                            <div class="blog-hero-image">

                                <h1 class="hero-main-title">{{ $blog->name }}</h1>

                                <img
                                    src="{{ '/storage/' . ( ( isset($blog->src) && !empty($blog->src) && !is_null($blog->src) ) ? $blog->src : 'placeholder-banner.jpg' ) }}"
                                    alt="$blog->src"
                                    class="card-img img-fluid img-thumbnail bg-fill"
                                />
                            </div>
                        </section>

                        <div id="blog" class="container mt-5">
                            <div class="full-content-wrapper">
                                <div class="flex flex-wrap grid-wrap">
                                    <div class="column-9">
                                        <section class="blog-content">
                                            <div class="text-justify mb-3 blog-post-content">
                                                <h3 class="page-title">
                                                    {{ $blog->name }}
                                                </h3>

                                                <div class="post-tags mb-3">
                                                    <strong>Tags:</strong>

                                                    <div class="post-tag-lists">
                                                        @if(! empty($blogTags))
                                                            @foreach($blogTags as $blogTag )
                                                                <a href="{{route('shop.blog.tag.index',[ $blogTag->slug ])}}" class="cat-link">{{ $blogTag->name }}</a>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>

                                                {!! $blog->description !!}
                                            </div>
                                        </section>
                                    </div>

                                    <sidebar class="column-3 blog-sidebar">
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 categories">
                                                <h3>Categories</h3>

                                                <ul class="list-group">
                                                    @foreach($categories as $category)
                                                        <li>
                                                            <a 
                                                                href="{{route('shop.blog.category.index',[ $category->slug ])}}" 
                                                                class="list-group-item list-group-item-action"
                                                            >
                                                                <span>{{ $category->name }}</span>

                                                                @if($showCategoriesCount)
                                                                    <span class="badge badge-pill badge-primary">{{ $category->assign_blogs }}</span>
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <div class="tags-part">
                                                    <h3>Tags</h3> 

                                                    <div class="tag-list">
                                                        @foreach($tags as $tag)
                                                            <a 
                                                                href="{{route('shop.blog.tag.index',[$tag->slug])}}" 
                                                                role="button" 
                                                                class="btn btn-primary btn-lg"
                                                            >
                                                                {{ $tag->name }} 

                                                                @if($showTagsCount)
                                                                    <span class="badge badge-light">{{ $tag->count }}</span>
                                                                @endif
                                                            </a> 
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </sidebar>
                                </div>
                            </div>

                            <div id="comment-list" class="column-12 comment-part related-bolg-part">
                                <div class="col-lg-12"><h1 class="mb-3 page-title">Related Blog</h1></div>
                                <div class="flex flex-wrap blog-grid-list">

                                    @foreach($relatedBlogs as $relatedBlog)
                                        <div class="related-blog-post-item">
                                            <div class="blog-post-box">
                                                <div class="card mb-5">
                                                    <div class="blog-grid-img"><img
                                                        src="{{ '/storage/' . ! empty($relatedBlog->src) ? $relatedBlog->src : 'placeholder-thumb.jpg' ) }}"
                                                        alt="{{ $relatedBlog->name }}"
                                                        class="card-img-top">
                                                    </div>
                                                    <div class="card-body">
                                                        <h2 class="card-title"><a href="{{route('shop.article.view',[$relatedBlog->category->slug . '/' . $relatedBlog->slug])}}">{{ $relatedBlog->name }}</a></h2>
                                                        <div class="post-meta">
                                                            <p>
                                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $relatedBlog->created_at)->format('M j, Y') }} by
                                                                @if($showAuthorPage)
                                                                    <a href="{{route('shop.blog.author.index',[$relatedBlog->author_id])}}">{{ $relatedBlog->author }}</a>
                                                                @else
                                                                    <a>{{ $blog->author }}</a>
                                                                @endif
                                                            </p>
                                                        </div>

                                                        @if( !empty($relatedBlog->assign_categorys) && count($relatedBlog->assign_categorys) > 0 )
                                                            <div class="post-categories">
                                                                <p>
                                                                    @foreach($relatedBlog->assign_categorys as $assign_category)
                                                                        <a href="{{route('shop.blog.category.index',[$assign_category->slug])}}" class="cat-link">{{$assign_category->name}}</a>
                                                                    @endforeach
                                                                </p>
                                                            </div>
                                                        @endif

                                                        <div class="card-text text-justify">
                                                            {!! $relatedBlog->short_description !!}
                                                        </div>
                                                    </div>

                                                    <div class="card-footer">
                                                        <a href="{{route('shop.article.view',[$relatedBlog->category->slug . '/' . $relatedBlog->slug])}}" class="text-uppercase btn-text-link">Read more ></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                
                            </div>

                            @if($enable_comment)
                                <div id="comment-list" class="column-12 comment-part">
                                    <div class="row flex flex-wrap grid-wrap">
                                        <div class="column-12">
                                            @if($blog->allow_comments)

                                                <h2>Comments ({{ $totalCommentsCnt }})</h2>

                                                <div class="row flex flex-wrap grid-wrap">
                                                    @php
                                                        $guestCommentFlag = false;

                                                        if ($loggedInUser) {
                                                            $guestCommentFlag = true;
                                                        } else {
                                                            if ($allowQuestComment) {
                                                                $guestCommentFlag = true;
                                                            }
                                                        }

                                                    @endphp

                                                    @if($guestCommentFlag)

                                                        <div class="column-12">
                                                            <div class="row justify-content-center mt-3 comment-form-holder flex flex-wrap grid-wrap">
                                                                <div class="column-12">
                                                                    <h3>Leave a comment</h3> 
                                                                    <form 
                                                                        method="POST" 
                                                                        action="{{route('shop.blog.comment.store')}}"
                                                                        class="frmComment comment-form"
                                                                    >
                                                                        @csrf

                                                                        <input 
                                                                            type="hidden" 
                                                                            name="parent_id" 
                                                                            value="0"
                                                                        >

                                                                        <input 
                                                                            type="hidden"
                                                                            name="post"
                                                                            value="{{ $blog->id }}"
                                                                        >

                                                                        <div class="form-row">
                                                                            <div class="form-group column-6">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="fa fa-user"></i>
                                                                                        </span>
                                                                                    </div> 

                                                                                    <input 
                                                                                        type="text" 
                                                                                        name="name" 
                                                                                        placeholder="Your Name" 
                                                                                        required="required" 
                                                                                        class="form-control" 
                                                                                        value="{{ ! empty($loggedIn_user_name) ? $loggedIn_user_name : ''; }}"
                                                                                    >
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group column-6">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="fa fa-envelope"></i>
                                                                                        </span>
                                                                                    </div>

                                                                                    <input 
                                                                                        type="email" 
                                                                                        name="email" 
                                                                                        placeholder="Your Email" 
                                                                                        required="required" 
                                                                                        class="form-control" 
                                                                                        value="{{ (! empty($loggedIn_user_email)) ? $loggedIn_user_email : ''; }}"
                                                                                    >
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <textarea 
                                                                                name="comment" 
                                                                                placeholder="Your Comment" 
                                                                                required="required" 
                                                                                rows="5" 
                                                                                class="form-control">
                                                                            </textarea>
                                                                        </div>

                                                                        <div class="form-group text-right">
                                                                            <button 
                                                                                type="submit" 
                                                                                class="btn btn-primary btn-lg"
                                                                                >
                                                                                Comment
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="column-12">
                                                            <div class="comment-not-allow-guest">
                                                                You must be logged in to comment. Click 
                                                                <a href="{{ URL::to('/') }}/customer/login" target="_blank"> here</a> to login.
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if(! empty($comments))

                                                        @php 
                                                            $nestedCommentIndex = 0; 
                                                        @endphp

                                                        <div class="column-12">
                                                            @include ('blog::shop.comment.list', ['comment_data' => $comments])
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="comment-not-allow">Comments are turned off.</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push ('scripts')
    
         <!-- TODO: Removing in future. -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script type="text/javascript">
            // TODO: Removing in future.
            jQuery(document).on('click', '.btn-reply', function(event) {
                var element = jQuery(this);
                element.parent().find('.comment-form-holder:eq(0)').show();
                element.hide();
                element.next().show();
            });

            jQuery(document).on('click', '.btn-cancel-reply', function(event) {
                var element = jQuery(this);
                element.parent().find('.comment-form-holder:eq(0)').hide();
                element.hide();
                element.prev().show();
            });
        </script>
    @endpush
</x-shop::layouts>
