@props(['options'])

<v-carousel>
    <div class="shimmer aspect-[2.743/1] w-full">
    </div>
</v-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-carousel-template">
        <template v-if="isLoading">
			<x-shop::shimmer.products.slider></x-shop::shimmer.products.slider>
		</template>


	<!-- slider -->
	 <section class="bg-[url(./../images/hero-bg.png)] bg-cover bg-no-repeat pt-8 max-sm:pt-0">
		<div class="relative overflow-hidden">
			<span
				v-if="productSlides.prev.id"
				class="icon-arrow-left absolute left-[23%] top-1/2 z-10 flex h-12 w-12 -translate-y-full cursor-pointer items-center justify-center border-2 border-[#E9E9E9] max-[1400px]:left-[20%] max-[1260px]:left-[18%] max-xl:left-20 max-lg:left-10 max-md:hidden"
				@click="changeProductSlide('prev')"
				>
				</span>
			<span
				v-if="productSlides.next.id"
				class="icon-arrow-right absolute right-[23%] top-1/2 z-10 flex h-12 w-12 -translate-y-full cursor-pointer items-center justify-center border-2 border-[#E9E9E9] max-[1400px]:right-[20%] max-[1260px]:right-[18%] max-xl:right-20 max-lg:right-10 max-md:hidden"
				@click="changeProductSlide('next')"
				>
			</span>

			<div
				v-for="(product, index) in activeData.products"
				class="group"
				:class="getSlideClass(product.id)"
				>
				<div class="homeful-slide prev mx-auto w-[630px] max-w-full group-[.next]:w-max group-[.prev]:w-max group-[.next]:opacity-60 group-[.prev]:opacity-60">
					<div class="relative max-w-[574px] overflow-hidden rounded-[20px]">
						<div class="h-[574px] w-[574px] overflow-hidden">
							<img :src="product.base_image.medium_image_url"  alt="Agapeya Towns" class="h-full w-full rounded-[20px] object-cover">
						</div>
						<div class="absolute bottom-0 left-0 right-0 flex items-start justify-between gap-4 bg-[linear-gradient(180deg,_#00000000_0%,_#000000_100%)] px-9 pb-9 pt-20 group-[.next]:hidden group-[.prev]:hidden max-sm:flex-wrap max-sm:px-4">
							<div class="">
								<h2 class="text-3xl font-bold text-white">@{{product.name}}</h2>
								<p class="mt-1 text-xl font-normal text-[#CDCDCD]">@{{ product.attributes.find(attr => attr.code === 'location')?.value }}</p>
							</div>
							<span
								class="flex items-center gap-2 rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-4 py-[14px] text-center text-[15px] font-medium text-white cursor-pointer"
								@click="redirectToProduct(product)"
								>
								@lang('enclaves::app.shop.components.layouts.carousel.categories.view-project')
								<span class="icon-arrow-right-stylish text-[24px]px] inline-block"></span>
							</span>
						</div>
					</div>
					<div class="mt-7 flex justify-between gap-5 group-[.next]:hidden group-[.prev]:hidden max-md:flex-wrap max-md:px-4">
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">
								@lang('enclaves::app.shop.components.layouts.carousel.categories.start-at')
							</p>
							<p class="homefull-text-gradient mt-1 text-xl font-bold leading-7">@{{product.min_price}}</p>
						</div>
						<div class="w-[127px]">
							<p class="text-sm font-normal text-[#8B8B8B]">
								@lang('enclaves::app.shop.components.layouts.carousel.categories.total-units-sold')
							</p>
							<p class="mt-1 text-xl font-normal leading-7 text-black">200+</p>
						</div>
						<div class="">
							<p class="text-sm font-normal text-[#8B8B8B]">
								@lang('enclaves::app.shop.components.layouts.carousel.categories.product-type')
							</p>
							<p class="mt-1 max-w-[440px] text-xl font-normal leading-7 text-black">
								@{{ setPropertyType('property_type', product)}}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="scrollbar-hide mt-7 overflow-auto pb-9">
				<div class="homeful-slider-thumbs mx-auto flex w-[max-content] gap-3">
					<div
						v-for="data in sliderData"
						class="thumb group w-[75px] cursor-pointer"
						:class="data.category.id == activeData.category.id ? 'active' : ''"
						@click="changeActiveData(data)"
						>
						<div class="h-[50px] w-[75px] overflow-hidden">
							<img :src="data.category.images.logo_url" alt="Agapeya" class="h-full w-full rounded-[8px] border border-transparent object-cover transition hover:border-primary group-[.active]:border-primary">
						</div>
						<p class="mt-[5px] text-[12px] font-normal leading-none text-[#8B8B8B] transition">@{{data.category.name}}</p>
					</div>
				</div>
			</div>
		</div>
	 </section>
	<!-- slider end -->
    </script>

    <script type="module">
        app.component("v-carousel", {
            template: '#v-carousel-template',

            data() {
                return {
                    images: @json($options['images'] ?? []),

					activeButtonText: '',

					isLoading: true,

					categories: [],

					products:[],

					activeData: {
						category: null,
						products: [],
					},

					sliderData:[],

					productSlides:{
						active: {
							id: null,
							index:null,
						},
						next: {
							id: null,
							index:null,
						},
						prev: {
							id: null,
							index:null,
						},
					},
                };
            },

            mounted() {
				this.getCategories();
            },

			computed: {
				getSlideClass() {
					return (productId) => {
						if (this.productSlides.active.id && productId === this.productSlides.active.id) {
							return 'active';
						} else if (this.productSlides.prev.id &&  productId === this.productSlides.prev.id) {
							return 'prev z-1 group absolute left-0 top-10 origin-top -translate-x-1/2 scale-75 bg-white max-xl:hidden';
						} else if (this.productSlides.next.id &&  productId === this.productSlides.next.id) {
							return 'next z-1 group absolute right-0 top-10 origin-top translate-x-1/2 scale-75 bg-white max-xl:hidden';
						} else {
							return 'hidden';
						}
					};
				},
			},

            methods: {
				async getCategories() {
					const response = await this.$axios.get("{{ route('enclaves.api.categories.index', []) }}");

					if(response){
						this.categories = response.data.data;

						for (const category of this.categories) {
							const categoryProducts = await this.getCategoryProduct(category.id);

							if (categoryProducts.length) {
								this.sliderData.push({
									'category': category,
									'products': categoryProducts,
								});

								if(this.sliderData.length === 1){
									this.activeData = this.sliderData[0];
									this.setProductSlides(this.activeData.products);
									this.isLoading = false;
								}
							}

						}

						this.isLoading = false;
					}
                },

				changeActiveData(data){
					if(this.activeData.category.id != data.category.id){
						this.activeData = data;

						this.setProductSlides(this.activeData.products)
					}
				},

				async getCategoryProduct(category_id){
					let params = {
						category_id:category_id,
						limit:10,
						sort: 'id-desc',
						featured: 1,
					}

					try {
						const response = await this.$axios.get(`{{ route('enclaves.api.product.index') }}`, { params: params })

						return response.data.data;
					} catch (error) {
						console.error(error);
						return [];
					}
				},

				setProductSlides(products){
					if(products.length){
						this.productSlides = {
							active: {
								id: products[0].id,
								index: 0,
							},
							next:{
								id: products.length >= 2 ? products[1].id : null,
								index: products.length >= 2 ? 1 : null,
							},
							prev:{
								id: products.length > 2 ? products[products.length - 1].id : null,
								index: products.length > 2 ? (products.length - 1) : null,
							}
						}
					}
				},

				changeProductSlide(action){
					const currentproductSlides = this.productSlides;

					let newPositions = {
						active: { id: null, index:null },
						next: { id: null, index:null },
						prev: { id: null, index:null },
					};

					let prods = this.activeData.products;

					if(action == 'next'){
						newPositions.active = currentproductSlides.next;

						if((currentproductSlides.next.index + 1) < prods.length && prods.length > 2){
							newPositions.next.index = currentproductSlides.next.index + 1;
							newPositions.next.id = prods[currentproductSlides.next.index + 1].id;
						} else {
							if(prods.length > 2){
								newPositions.next.index = 0;
								newPositions.next.id = prods[0].id;
							}
						}

						newPositions.prev = currentproductSlides.active
					}

					if(action == 'prev'){
						newPositions.active = currentproductSlides.prev;
						newPositions.next = currentproductSlides.active;

						if((currentproductSlides.prev.index - 1) >= 0 && prods.length > 2){
							newPositions.prev.index = currentproductSlides.prev.index - 1;
							newPositions.prev.id = prods[currentproductSlides.prev.index - 1].id;
						} else {
							if(prods.length > 2){
								newPositions.prev.index = (prods.length - 1);
								newPositions.prev.id = prods[prods.length - 1].id;
							}
						}
					}

					this.productSlides = newPositions;
				},

				redirectToProduct(product) {
					window.location.href = `{{ route('shop.product_or_category.index', '') }}/` + product.url_key;
				},

				setPropertyType(attributeCode, product){
					let attribute = product.attributes.find( data => data.code == attributeCode );

					if(attribute){
						return attribute.value;
					}
				}
            }
        });
    </script>
@endpushOnce
