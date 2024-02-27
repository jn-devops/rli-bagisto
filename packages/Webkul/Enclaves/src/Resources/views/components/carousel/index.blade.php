@props(['options'])

@push('scripts')
    <script>
		document.addEventListener('DOMContentLoaded', () => {

			let sliderImg = document.querySelectorAll('.et-slider img')
			let active = 0;
			let prev = sliderImg.length - 1;
			let next = 1;
			let dotContaier, dots = [];
			let dummyheading = document.querySelector('.hero-heading')
			let dummyButton = document.querySelector('.hero-btn');
			let typing;


			let heroContent = {
				0: ['Family moments for a lifetime', 'link1'],
				1: ['Galak na umaasenso', 'link2'],
				2: ['Tagumpay na nagniningning', 'link3'],
				3: ['Tagumpay na nagniningning', 'link4'],
				4: ['Tagumpay na test', 'link5'],

			}

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
				dummyButton.setAttribute('src', heroContent[active][1])
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
			changeContent()


			let changeimage = () => {
				dots = document.querySelectorAll('.dot-container .dot')
				sliderImg.forEach((ele, i) => {
					if (i === prev) {
						ele.className = 'prev'
					}
					else if (i === active) {
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
						console.log(sliderImg.length + '    ' + i);
						console.log(active + '   ' + prev + "   " + next);
						changeimage()
						changeContent()
						clearInterval(sliderinterval)
						// sliderinterval = setInterval(() => {
						//     setsliderinterval()
						// }, 5000);
					})
				})
			}
			dotevents();
		})
	</script>
@endpush

<v-carousel>
    <div class="shimmer w-full aspect-[2.743/1]">
    </div>
</v-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-carousel-template">
        <div
            class="grid grid-cols-2 bg-[url('../images/hero-bg.png')] bg-no-repeat [background-size:51%] overflow-hidden max-1180:px-[34px] max-1100:bg-none max-1100:grid-cols-1">
            
            <div class="m-auto w-full max-w-[532px] mt-[70px] h-[700px] max-1180:max-w-[472px] max-1100:h-auto max-1100:mx-0 max-sm:mt-8">
                <p class="text-2xl font-bold text-[#CC035C]">Raemulan Lands Inc.</p>
                <h1 class="hero-heading text-[60px] font-bold leading-[74px] mt-[18px] min-h-[148px] max-1180:text-[46px] max-sm:text-[40px] max-sm:leading-[55px] max-sm:min-h-[110px]">Family moments
                    for a lifetime</h1>
                <a href=""
                    class=" hero-btn block max-w-max mt-[94px] text-white px-[60px] py-[38px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px] max-sm:mt-[40px] max-sm:px-[40px]
                    max-sm:py-[20px]">Elanvital</a>
                <div class="dot-container hidden"></div>
            </div>

            <div class="et-slider-section mt-[72px]">
                <div class="et-slider ">
                    <img src="../images/hero-1.png" alt="" class="next">
                    <img src="../images/hero-2.png" alt="" class="d-none">
                    <img src="../images/hero-3.png" alt="" class="d-none">
                    <img src="../images/hero-1.png" alt="" class="prev">
                    <img src="../images/hero-2.png" alt="" class="active">
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
                };
            },

            mounted() {
                this.navigate(this.currentIndex);

                this.play();
            },

            methods: {
                navigate(index) {
                    if (index > this.images.length) {
                        this.currentIndex = 1;
                    }

                    if (index < 1) {
                        this.currentIndex = this.images.length;
                    }

                    let slides = this.$refs.slides;

                    for (let i = 0; i < slides.length; i++) {
                        if (i == this.currentIndex - 1) {
                            continue;
                        }
                        
                        slides[i].style.display = 'none';
                    }

                    slides[this.currentIndex - 1].style.display = 'block';
                },

                play() {
                    let self = this;

                    setInterval(() => {
                        this.navigate(this.currentIndex += 1);
                    }, 5000);
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