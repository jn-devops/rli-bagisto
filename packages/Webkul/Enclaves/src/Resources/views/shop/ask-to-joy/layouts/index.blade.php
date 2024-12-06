<!-- Show only into home page -->

@if (request()->is('/*'))
    <!-- Partners Carousel -->
    <x-enclaves-shop::ask-to-joy.home
        :title="$data['title'] ?? ''"
        :src="route('shop.blogs.front-end')"
        :navigation-link="route('shop.home.index')"
    >
    </x-enclaves-shop::ask-to-joy.home>
@endif
