<!-- Show only into home page -->

@if (request()->is('/*'))
    <!-- Partners Carousel -->
    <x-enclaves-shop::partners.carousel
        :title="$data['title'] ?? ''"
        :src="route('shop.blogs.front-end')"
        :navigation-link="route('shop.home.index')"
    >
    </x-enclaves-shop::partners.carousel>
@endif
