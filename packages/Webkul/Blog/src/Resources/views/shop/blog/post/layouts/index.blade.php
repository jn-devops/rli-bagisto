<!-- Show only into home page -->

@if (request()->is('/*')) 
    <!-- Blogs Carousel -->
    <x-blog::blogs.carousel
        :title="$data['title'] ?? ''"
        :src="route('shop.blogs.front-end')"
        :navigation-link="route('shop.home.index')"
    >
    </x-blog::blogs.carousel>
@endif