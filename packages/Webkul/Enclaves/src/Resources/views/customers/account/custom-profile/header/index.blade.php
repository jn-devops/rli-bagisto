<section class="inset-1 grid gap-7 lg:gap-11 p-6 rounded-[1.25rem] border border-[rgba(237,_239,_245)] lg:px-[3.185rem] lg:py-[3.75rem] lg:grid-cols-2">
    <figure class="flex justify-start w-full gap-x-8">
        <div class="size-24 xl:size-[7.565rem] relative rounded-full">
            <img 
                src="{{ $customer->image_url ??  bagisto_asset('images/user-placeholder.png') }}" 
                alt="profile image"
                class="size-24 xl:size-[7.565rem] rounded-full object-cover" 
            />

            <label 
                for="profile-upload" 
                class="absolute top-14 right-3 xl:top-20 xl:right-4"
            >
                <input 
                    type="file"
                    name="profile-upload"
                    class="absolute hidden"
                    id="profile-upload" 
                />

                <img
                    src="{{ bagisto_asset('images/camera-icon.png') }}"
                    alt="profile image"
                    class="rounded-full size-9" 
                />
            </label>
        </div>

        <figcaption class="flex flex-col gap-y-1.5 pt-2 lg:gap-y-2.5">
            <h3 class="text-lg font-semibold text-black xl:text-[1.565rem] xl:leading-7">
                {{ $customer->first_name }}
            </h3>

            <h4 class="text-base font-bold text-black xl:text-[1.313rem] xl:leading-6"> 
                Email: <span class="font-normal">{{ $customer->email }}</span>
            </h4>

            <h4 class="text-base font-bold text-black xl:text-[1.313rem] xl:leading-6"> 
                Age: <span class="font-normal">{{ $customer->date_of_birth }}</span>
            </h4>
        </figcaption>
    </figure>
    
    <article
        class="lg:max-w-64 flex w-full max-w-full flex-col gap-y-6 rounded-[1.25rem] bg-[rgba(161,_184,_214)] py-5 px-6">
        <h3 class="text-xl font-semibold text-white xl:text-[1.565rem] xl:leading-7">
            @lang('Steps to get your dream house')
        </h3>

        <button class="text-balance font-regular ml-auto max-w-fit rounded-full bg-white py-3.5 px-6 text-base leading-4 text-black">
            @lang('Read now')
        </button>
    </article>
</section>