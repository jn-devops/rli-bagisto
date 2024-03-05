@props(['options'])

<v-carousel>
    <div class="shimmer w-full aspect-[2.743/1]">
    </div>
</v-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-carousel-template">
        <div class="grid grid-cols-2 bg-[url('../images/hero-bg.png')] bg-no-repeat [background-size:51%] overflow-hidden max-1180:px-[34px] max-1100:bg-none max-1100:grid-cols-1">
            
            <div class="m-auto w-full max-w-[532px] mt-[70px] h-[550px] max-1180:max-w-[472px] max-1100:h-auto max-1100:mx-0 max-sm:mt-8">
                
				<p class="text-2xl font-bold text-[#CC035C]">@lang('enclaves::app.homepage.slider.title')</p>

                <h1 class="hero-heading text-[60px] font-bold leading-[74px] mt-[18px] min-h-[148px] max-1180:text-[46px] max-sm:text-[40px] max-sm:leading-[55px] max-sm:min-h-[110px]"></h1>
                
				<a 
                    href="javascript:void(0)"
                    class="hero-btn block max-w-max mt-[94px] text-white px-[60px] py-[38px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px] max-sm:mt-[40px] max-sm:px-[40px]
                    max-sm:py-[20px]"
                >
					@lang('enclaves::app.homepage.slider.button-text')
                </a>

                <div class="dot-container hidden"></div>
            </div>

            <div class="et-slider-section mt-[72px]">
                <div class="et-slider">
                        <a
                            v-for="(image, index) in images"
                            class="fade"
                            :href="image.link || '#'"
                            ref="slides"
                            :key="index"
                            aria-label="Image Slide "
                        >
                        <x-shop::media.images.lazy
                            ::class="image.className"
                            class="w-full aspect-[2.743/1]"
                            ::src="image.image"
                            ::srcset="image.image + ' 1920w, ' + image.image.replace('storage', 'cache/large') + ' 1280w,' + image.image.replace('storage', 'cache/medium') + ' 1024w, ' + image.image.replace('storage', 'cache/small') + ' 525w'"
                            alt=""
                        ></x-shop::media.images.lazy>
                    </a>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component("v-carousel", {
            template: '#v-carousel-template',

            data() {
                return {
                    currentIndex: 1,

                    images: @json($options['images'] ?? []),

                    imagesPattern: ['next', 'd-none', 'prev', 'active'],

                    imageX: [],

					refreshCompoment: 1,
                };
            },

            mounted() {
                this.play();

				let sliderImg = document.querySelectorAll('.et-slider img')
				let active = 0;
				let prev = sliderImg.length - 1;
				let next = 1;
				let dotContaier, dots = [];
				let dummyheading = document.querySelector('.hero-heading')
				let dummyButton = document.querySelector('.hero-btn');
				let typing;

				let heroContent = [
					['Family moments for a lifetime', 'link1'],
				    ['Galak na umaasenso', 'link2'],
					['Tagumpay na nagniningning', 'link3'],
					['Tagumpay na nagniningning', 'link4'],
					['Tagumpay na test', 'link5'],
				];

				let sliderdots = () => {
					dotContaier = document.querySelector('.dot-container');

					for (let i = 0; i < sliderImg.length; i++) {

						let span = document.createElement('span')

						if (i == 0) span.classList.add('active')

						span.classList.add('dot')

						dotContaier.appendChild(span);
					}
				}

				sliderdots()

				let changeContent = () => {
					clearInterval(typing)

					dummyButton.setAttribute('href', heroContent[active][1])
					let title = heroContent[active][0]

					title = title.split('')

					let titlecounts = ''

					let pos = 0;

					typing = setInterval(() => {
						titlecounts += title[pos]

						dummyheading.innerHTML = titlecounts

						pos++;

						if (pos == title.length) {
							clearInterval(typing)
						}
					}, 30);
				}

				changeContent();

				let changeimage = () => {
					dots = document.querySelectorAll('.dot-container .dot');

					sliderImg.forEach((ele, i) => {

						if (i === prev) {
							ele.className = 'prev'
						} else if (i === active) {
							ele.className = 'active'
						} else if (i === next) {
							ele.className = 'next'
						} else {
							ele.className = 'd-none'
						}

						dots[i].classList.remove('active');
					})

					dots[active].classList.add('active');
				}

				changeimage();

				function setsliderinterval() {
					prev = active;

					active = next;

					if (active + 1 == sliderImg.length) {
						next = 0;
					} else {
						next = active + 1;
					}

					changeimage()

					changeContent()
				}

				let sliderinterval = setInterval(() => {
					setsliderinterval()
				}, 5000);

				let dotevents = () => {
					dots.forEach((ele, i) => {
						ele.addEventListener('click', () => {
							active = i;

							if (i == sliderImg.length - 1) {
								next = 0;
								prev = active - 1
							} else if (i == 0) {
								prev = sliderImg.length - 1;
								next = active + 1;
							} else {
								next = i + 1;
								prev = active - 1;
							}
							
							changeimage()
							changeContent()
							clearInterval(sliderinterval)
						})
					})
				}

				dotevents();

            },

            methods: {
                play() {
                    this.images.forEach((value, index) => {
                        if(index == 0) {
                            this.images[index]['className'] = 'next';
                        } else if((this.images.length - 2) == index) {
                            this.images[index]['className'] = 'prev';
                        } else if((this.images.length - 1) == index) {
                            this.images[index]['className'] = 'active';
                        } else {
                            this.images[index]['className'] = 'd-none';
                        }
                    })
                }
            }
        });
    </script>

    <style>
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }
    </style>
@endpushOnce