@php
    $channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta 
        name="title" 
        content="{{ $tag->meta_title ?? ( $blogSeoMetaTitle ?? ( $channel->home_seo['meta_title'] ?? '' ) ) }}" 
    />

    <meta 
        name="description" 
        content="{{ $tag->meta_description ?? ( $blogSeoMetaKeywords ?? ( $channel->home_seo['meta_description'] ?? '' ) ) }}" 
    />

    <meta 
        name="keywords" 
        content="{{ $tag->meta_keywords ?? ( $blogSeoMetaDescription ?? ( $channel->home_seo['meta_keywords'] ?? '' ) ) }}" 
    />
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ __('Blog Tag Page') }}
    </x-slot>

    @push ('styles')
        @include ('blog::custom-css.custom-css')
    @endpush

    <div class="main">

        <div>
            <div class="row col-12 remove-padding-margin">

                <div 
                    id="home-right-bar-container" 
                    class="col-12 no-padding content"
                >
                    <div class="container-right row no-margin col-12 no-padding">

                        <div 
                            id="blog" 
                            class="container mt-5"
                        >

                            <div class="full-content-wrapper">
                                <section class="blog-hero-wrapper">
                                    <div class="blog-hero-image">

                                        <h1 class="hero-main-title">{{ $tag->name }}</h1>

                                        <img
                                            src="{{ '/storage/placeholder-banner.jpg' }}"
                                            alt=""
                                            class="card-img img-fluid img-thumbnail bg-fill"
                                        >
                                    </div>
                                </section>

                                <div class="grid-wrap flex flex-wrap">
                                    <div class="column-12">
                                        <div class="blog-post-content text-justify">
                                            {!! $tag->description !!}
                                        </div>
                                    </div>
                                    
                                    <div class="column-9">
                                        @if( !empty($blogs) &&  count($blogs) > 0 )
                                            <div class="blog-grid-list flex flex-wrap">
                                                @foreach($blogs as $blog)
                                                    <div class="blog-post-item">
                                                        <div class="blog-post-box">
                                                            <div class="card mb-5">
                                                                <div class="blog-grid-img">
                                                                    <img
                                                                        src="{{ '/storage/' . ( ( isset($blog->src) && !empty($blog->src) && !is_null($blog->src) ) ? $blog->src : 'placeholder-thumb.jpg' ) }}"
                                                                        alt="{{ $blog->name }}"
                                                                        class="card-img-top"
                                                                    >
                                                                </div>

                                                                <div class="card-body">
                                                                    <h2 class="card-title">
                                                                        <a href="{{route('shop.article.view',[$blog->category->slug . '/' . $blog->slug])}}"> 
                                                                            {{ $blog->name }}
                                                                        </a>
                                                                    </h2>

                                                                    <div class="post-meta">
                                                                        <p>
                                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('M j, Y') }} by
                                                                            
                                                                            @if($showAuthorPage)
                                                                                <a href="{{ route('shop.blog.author.index',[$blog->author_id]) }}">
                                                                                    {{ $blog->author }}
                                                                                </a>
                                                                            @else
                                                                                <a href="#">
                                                                                    {{ $blog->author }}
                                                                                </a>
                                                                            @endif
                                                                        </p>
                                                                    </div>

                                                                    @if(! empty($blog->assign_categorys) && count($blog->assign_categorys) > 0 )
                                                                        <div class="post-categories">
                                                                            <p>
                                                                                @foreach($blog->assign_categorys as $assign_category)
                                                                                    <a 
                                                                                        href="{{ route('shop.blog.category.index',[$assign_category->slug])}}" 
                                                                                        class="cat-link"
                                                                                    >
                                                                                        {{ $assign_category->name }}
                                                                                    </a>
                                                                                @endforeach
                                                                            </p>
                                                                        </div>
                                                                    @endif

                                                                    <div class="card-text text-justify">
                                                                        {!! $blog->short_description !!}
                                                                    </div>
                                                                </div>

                                                                <div class="card-footer">
                                                                    <a 
                                                                        href="{{ route('shop.article.view',[$blog->category->slug . '/' . $blog->slug]) }}" 
                                                                        class="text-uppercase btn-text-link"
                                                                    >
                                                                        Read more >
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="col-lg-12 mb-5 mt-5 w-full">
                                                    {!! $blogs->links() !!}
                                                </div>
                                            </div>
                                        @else
                                            <div class="post-not-available">No post published yet!!</div>
                                        @endif
                                    </div>

                                    <div class="column-3 blog-sidebar">
                                        <div class="row">
                                            <div class="col-lg-12 categories mb-4"><h3>Categories</h3>
                                                <ul class="list-group">
                                                    @foreach($categories as $category)
                                                        <li>
                                                            <a  href="{{ route('shop.blog.category.index',[$category->slug] )}}" 
                                                                class="list-group-item list-group-item-action"
                                                            >
                                                                <span>{{ $category->name }}</span> 

                                                                @if($showCategoriesCount)
                                                                    <span class="badge badge-pill badge-primary">
                                                                        {{ $category->assign_blogs }}
                                                                    </span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-shop::layouts>
