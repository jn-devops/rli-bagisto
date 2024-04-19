<!-- Image-Carousel Component -->
<v-image-carousel></v-image-carousel>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-image-carousel-template"
    >
        <div>
            <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
                <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                    <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                        <div class="flex items-center justify-between gap-x-2.5">
                            <div class="flex flex-col gap-1">
                                <p class="text-base font-semibold text-gray-800 dark:text-white">
                                    @lang('admin::app.settings.themes.edit.slider')
                                </p>
                                
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                    @lang('admin::app.settings.themes.edit.slider-description')
                                </p>
                            </div>
            
                            <!-- Add Slider Button -->
                            <div class="flex gap-2.5">
                                <div
                                    class="secondary-button"
                                    @click="$refs.addSliderModal.toggle()"
                                >
                                    @lang('admin::app.settings.themes.edit.slider-add-btn')
                                </div>
                            </div>
                        </div>

                        <template v-for="(deletedSlider, index) in deletedSliders">
                            <input
                                type="hidden"
                                :name="'{{ $currentLocale->code }}[deleted_sliders]['+ index +'][image]'"
                                :value="deletedSlider.image"
                            />
                        </template>

                        <div
                            class="grid pt-4"
                            v-if="sliders.images.length"
                            v-for="(image, index) in sliders.images"
                        >
                            <!-- Hidden Input -->
                                <input 
                                    type="file"
                                    class="hidden"
                                    :name="'{{ $currentLocale->code }}[options]['+ index +'][image]'"
                                    :ref="'imageInput_' + index" 
                                />

                                <input 
                                    type="hidden" 
                                    :name="'{{ $currentLocale->code }}[options]['+ index +'][link]'" 
                                    :value="image.link" 
                                />

                                <input 
                                    type="hidden" 
                                    :name="'{{ $currentLocale->code }}[options]['+ index +'][image]'" 
                                    :value="image.image" 
                                />

                                <input 
                                    type="hidden" 
                                    :name="'{{ $currentLocale->code }}[options]['+ index +'][button_text]'" 
                                    :value="image.button_text" 
                                />

                                <input 
                                    type="hidden" 
                                    :name="'{{ $currentLocale->code }}[options]['+ index +'][slider_syntax]'" 
                                    :value="image.slider_syntax" 
                                />

                                <input 
                                    type="hidden" 
                                    :name="'{{ $currentLocale->code }}[options]['+ index +'][image_cdn_link]'" 
                                    :value="image.image_cdn_link" 
                                />

                                <input 
                                    type="hidden" 
                                    :name="'{{ $currentLocale->code }}[options]['+ index +'][isUsingCDN]'" 
                                    :value="image.isUsingCDN" 
                                />
                            
                    
                            <!-- Details -->
                            <div 
                                class="flex cursor-pointer justify-between gap-2.5 py-5"
                                :class="{
                                    'border-b border-slate-300 dark:border-gray-800': index < sliders.images.length - 1
                                }"
                            >
                                <div class="flex gap-[10px]">
                                    <div class="grid place-content-start gap-[6px]">
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <div> 
                                                @lang('admin::app.settings.themes.edit.link'): 

                                                <span class="text-gray-600 transition-all dark:text-gray-300">
                                                    @{{ image.link }}
                                                </span>
                                            </div>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <div> 
                                                @lang('enclaves::app.admin.settings.themes.edit.button_text'): 

                                                <span class="text-gray-600 transition-all dark:text-gray-300">
                                                    @{{ image.button_text }}
                                                </span>
                                            </div>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <div> 
                                                @lang('enclaves::app.admin.settings.themes.edit.slider_syntax'): 

                                                <span class="text-gray-600 transition-all dark:text-gray-300">
                                                    @{{ image.slider_syntax }}
                                                </span>
                                            </div>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300" v-if="image.image_cdn_link">
                                            <div> 
                                                @lang('enclaves::app.admin.settings.themes.edit.image_cdn_link'): 

                                                <span class="text-gray-600 transition-all dark:text-gray-300">
                                                    @{{ image.image_cdn_link }}
                                                </span>
                                            </div>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <div class="flex justify-between"> 
                                                @lang('admin::app.settings.themes.edit.image'): 

                                                <span class="text-gray-600 transition-all dark:text-gray-300">
                                                    <a 
                                                        :href="'{{ config('app.url') }}' + image.image"
                                                        :ref="'image_' + index"
                                                        target="_blank"
                                                        class="text-blue-600 transition-all hover:underline ltr:ml-2 rtl:mr-2"
                                                    >
                                                        <span 
                                                            :ref="'imageName_' + index"
                                                            v-text="image.image"
                                                        ></span>
                                                    </a>
                                                </span>
                                            </div>
                                        </p>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="grid place-content-start gap-1 text-right">
                                    <div class="flex items-center gap-x-5">
                                        <p 
                                            class="cursor-pointer text-blue-600 transition-all hover:underline"
                                            @click="editSliderRow(index)"
                                        > 
                                            @lang('admin::app.settings.themes.edit.edit')
                                        </p>
                                        
                                        <p 
                                            class="cursor-pointer text-red-600 transition-all hover:underline"
                                            @click="remove(image)"
                                        > 
                                            @lang('admin::app.settings.themes.edit.delete')
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Empty Page -->
                        <div    
                            class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10"
                            v-else
                        >
                            <img
                                class="h-[120px] w-[120px] p-2 dark:mix-blend-exclusion dark:invert"
                                src="{{ bagisto_asset('images/empty-placeholders/default.svg') }}"
                                alt="@lang('admin::app.settings.themes.edit.slider')"
                            >
            
                            <div class="flex flex-col items-center gap-1.5">
                                <p class="text-base font-semibold text-gray-400">
                                    @lang('admin::app.settings.themes.edit.slider-add-btn')
                                </p>
                                
                                <p class="text-gray-400">
                                    @lang('admin::app.settings.themes.edit.slider-description')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- General -->
                <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
                    <x-admin::accordion>
                        <x-slot:header>
                            <p class="p-2.5 text-base font-semibold text-gray-800 dark:text-white">
                                @lang('admin::app.settings.themes.edit.general')
                            </p>
                        </x-slot>
                    
                        <x-slot:content>
                            <input
                                type="hidden"
                                name="type"
                                value="image_carousel"
                            />

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.settings.themes.edit.name')
                                </x-admin::form.control-group.label>

                                <v-field
                                    type="text"
                                    name="name"
                                    value="{{ $theme->name }}"
                                    rules="required"
                                    class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                    :class="[errors['name'] ? 'border border-red-600 hover:border-red-600' : '']"
                                    label="@lang('admin::app.settings.themes.edit.name')"
                                    placeholder="@lang('admin::app.settings.themes.edit.name')"
                                ></v-field>

                                <x-admin::form.control-group.error control-name="name" />
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.settings.themes.edit.sort-order')
                                </x-admin::form.control-group.label>

                                <v-field
                                    type="text"
                                    name="sort_order"
                                    rules="required|min_value:1"
                                    value="{{ $theme->sort_order }}"
                                    class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                    :class="[errors['sort_order'] ? 'border border-red-600 hover:border-red-600' : '']"
                                    label="@lang('admin::app.settings.themes.edit.sort-order')"
                                    placeholder="@lang('admin::app.settings.themes.edit.sort-order')"
                                >
                                </v-field>

                                <x-admin::form.control-group.error control-name="sort_order" />
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.settings.themes.edit.channels')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="channel_id"
                                    rules="required"
                                    :value="$theme->channel_id"
                                >
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                    @endforeach 
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="channel_id" />
                            </x-admin::form.control-group>

                            <x-admin::form.control-group class="!mb-0">
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.settings.themes.edit.status')
                                </x-admin::form.control-group.label>

                                <label class="relative inline-flex cursor-pointer items-center">
                                    <v-field
                                        type="checkbox"
                                        name="status"
                                        class="hidden"
                                        v-slot="{ field }"
                                        :value="{{ $theme->status }}"
                                    >
                                        <input
                                            type="checkbox"
                                            name="status"
                                            id="status"
                                            class="peer sr-only"
                                            v-bind="field"
                                            :checked="{{ $theme->status }}"
                                        />
                                    </v-field>
                        
                                    <label
                                        class="peer h-5 w-9 cursor-pointer rounded-full bg-gray-200 after:absolute after:top-0.5 after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:bg-navyBlue peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-blue-300 after:ltr:left-0.5 peer-checked:after:ltr:translate-x-full after:rtl:right-0.5 peer-checked:after:rtl:-translate-x-full dark:peer-focus:ring-blue-800"
                                        for="status"
                                    ></label>
                                </label>

                                <x-admin::form.control-group.error control-name="status" />
                            </x-admin::form.control-group>

                        </x-slot>
                    </x-admin::accordion>
                </div>
            </div>

            <!-- Create Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                >
                <form 
                    @submit="handleSubmit($event, saveSliderImage)"
                    enctype="multipart/form-data"
                    ref="createSliderForm"
                >
                    <x-admin::modal ref="addSliderModal">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                @lang('admin::app.settings.themes.edit.update-slider')
                            </p>
                        </x-slot>

                        <!-- Modal Content -->
                        <x-slot:content>
                            <div class="border-b-1 px-4 py-2.5 dark:border-gray-800">
                                <x-admin::form.control-group class="mb-2.5">
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.settings.themes.edit.link')
                                    </x-admin::form.control-group.label>
                                
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="{{ $currentLocale->code }}[link]"
                                        :placeholder="trans('admin::app.settings.themes.edit.link')"
                                    >
                                    </x-admin::form.control-group.control>
                                </x-admin::form.control-group>

                                <template v-if="! isUsingCDN">  
                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label>
                                            @lang('enclaves::app.admin.settings.themes.edit.cdn_status')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="switch"
                                            name="isUsingCDN"
                                            ::value="false"
                                            ::checked="false"
                                            :label="trans('enclaves::app.admin.settings.themes.edit.cdn_status')"
                                            v-model="isUsingCDN"
                                            @change="toggleCdnField(true)"
                                        >
                                        </x-admin::form.control-group.control>
                                    </x-admin::form.control-group>

                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.themes.edit.slider-image')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="image"
                                            name="slider_image"
                                            rules="required"
                                            :is-multiple="false"
                                        >
                                        </x-admin::form.control-group.control>
        
                                        <x-admin::form.control-group.error
                                            control-name="slider_image"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <p class="text-[12px] text-gray-600 dark:text-gray-300">
                                        @lang('admin::app.settings.themes.edit.image-size')
                                    </p>
                                </template>

                                <!-- This is customization code --> 
                                <template v-else>
                                    <div class="mt-2.5 w-full gap-2.5">    
                                        <x-admin::form.control-group>
                                            <x-admin::form.control-group.label>
                                                @lang('enclaves::app.admin.settings.themes.edit.cdn_status')
                                            </x-admin::form.control-group.label>

                                            <x-admin::form.control-group.control
                                                type="switch"
                                                name="isUsingCDN"
                                                ::value="true"
                                                ::checked="true"
                                                :label="trans('enclaves::app.admin.settings.themes.edit.cdn_status')"
                                                v-model="isUsingCDN"
                                                @change="toggleCdnField(false)"
                                            >
                                            </x-admin::form.control-group.control>
                                        </x-admin::form.control-group>
                                    </div>

                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('enclaves::app.admin.settings.themes.edit.image_cdn_link')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="{{ $currentLocale->code }}[image_cdn_link]"
                                            :placeholder="trans('enclaves::app.admin.settings.themes.edit.image_cdn_link')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="image_cdn_link"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </template>

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('enclaves::app.admin.settings.themes.edit.button_text')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="{{ core()->getCurrentLocale()->code }}[button_text]"
                                        :placeholder="trans('enclaves::app.admin.settings.themes.edit.button_text')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="button_text"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('enclaves::app.admin.settings.themes.edit.slider_syntax')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="{{ core()->getCurrentLocale()->code }}[slider_syntax]"
                                        :placeholder="trans('enclaves::app.admin.settings.themes.edit.slider_syntax')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="slider_syntax"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <!-- This is customization code -->
                            </div>
                        </x-slot>

                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <div class="flex items-center gap-x-2.5">
                                <button 
                                    type="submit"
                                    class="cursor-pointer rounded-md border border-blue-700 bg-blue-600 px-3 py-1.5 font-semibold text-gray-50"
                                >
                                    @lang('admin::app.settings.themes.edit.save-btn')
                                </button>
                            </div>
                        </x-slot>
                    </x-admin::modal>
                </form>
            </x-admin::form>

            <!-- Edit Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                >
                <form 
                    @submit="handleSubmit($event, editSliderImage)"
                    enctype="multipart/form-data"
                    ref="editSliderForm"
                >
                <x-admin::modal ref="editSliderModal">
                    <x-slot:header>
                        <p class="text-4.5 font-bold text-gray-800 dark:text-white">
                            @lang('enclaves::app.admin.settings.themes.edit.edit-slider')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                    <div class="border-b-1 px-4 py-2.5 dark:border-gray-800">
                                <input 
                                    type="hidden" 
                                    name="editRowIndex" 
                                    :value="editRowIndex"
                                />

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.settings.themes.edit.link')
                                    </x-admin::form.control-group.label>
                                
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="{{ $currentLocale->code }}[link]"
                                        ::value="editSlider.link"
                                        :placeholder="trans('admin::app.settings.themes.edit.link')"
                                    >
                                    </x-admin::form.control-group.control>
                                </x-admin::form.control-group>

                                <!-- This is customization code -->
                                <template v-if="! isUsingCDN">
                                    <div class="mt-2.5 w-full gap-2.5">    
                                        <x-admin::form.control-group>
                                            <x-admin::form.control-group.label>
                                                @lang('enclaves::app.admin.settings.themes.edit.cdn_status')
                                            </x-admin::form.control-group.label>

                                            <x-admin::form.control-group.control
                                                type="switch"
                                                name="isUsingCDN"
                                                ::value="false"
                                                ::checked="false"
                                                :label="trans('enclaves::app.admin.settings.themes.edit.cdn_status')"
                                                v-model="isUsingCDN"
                                                @change="toggleCdnField(true)"
                                            >
                                            </x-admin::form.control-group.control>
                                        </x-admin::form.control-group>
                                    </div>

                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.themes.edit.slider-image')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="image"
                                            name="slider_image"
                                            rules="required"
                                            :is-multiple="false"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="slider_image"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <p class="text-3 text-gray-600 dark:text-gray-300">
                                        @lang('admin::app.settings.themes.edit.image-size')
                                    </p>
                                </template>

                                <template v-else>
                                    <div class="mt-2.5 w-full gap-2.5">    
                                        <x-admin::form.control-group>
                                            <x-admin::form.control-group.label>
                                                @lang('enclaves::app.admin.settings.themes.edit.cdn_status')
                                            </x-admin::form.control-group.label>

                                            <x-admin::form.control-group.control
                                                type="switch"
                                                name="isUsingCDN"
                                                ::value="true"
                                                ::checked="true"
                                                :label="trans('enclaves::app.admin.settings.themes.edit.cdn_status')"
                                                v-model="isUsingCDN"
                                                @change="toggleCdnField(false)"
                                            >
                                            </x-admin::form.control-group.control>
                                        </x-admin::form.control-group>
                                    </div>

                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('enclaves::app.admin.settings.themes.edit.image_cdn_link')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="{{ $currentLocale->code }}[image_cdn_link]"
                                            ::value="editSlider.image_cdn_link"
                                            :placeholder="trans('enclaves::app.admin.settings.themes.edit.image_cdn_link')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="image_cdn_link"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </template>

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('enclaves::app.admin.settings.themes.edit.button_text')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="{{ core()->getCurrentLocale()->code }}[button_text]"
                                        ::value="editSlider.button_text"
                                        :placeholder="trans('enclaves::app.admin.settings.themes.edit.button_text')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="button_text"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('enclaves::app.admin.settings.themes.edit.slider_syntax')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="{{ core()->getCurrentLocale()->code }}[slider_syntax]"
                                        ::value="editSlider.slider_syntax"
                                        :placeholder="trans('enclaves::app.admin.settings.themes.edit.slider_syntax')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="slider_syntax"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                                <!-- This is customization code -->
                            </div>
                        </x-slot:content>

                        <x-slot:footer>
                            <div class="flex items-center gap-x-[10px]">
                                <!-- Save Button -->
                                <button 
                                    type="submit"
                                    class="rounded-1.5 cursor-pointer border border-blue-700 bg-blue-600 px-3 py-1.5 font-semibold text-gray-50"
                                >
                                    @lang('admin::app.settings.themes.edit.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </div>
    </script>

    <script type="module">
        app.component('v-image-carousel', {
            template: '#v-image-carousel-template',

            props: ['errors'],

            data() {
                return {
                    sliders: @json($theme->translate($currentLocale->code)['options'] ?? null),

                    deletedSliders: [],

                    editSlider: null,

                    editRowIndex: null,

                    isUsingCDN: true,
                };
            },
            
            created() {
                if (
                    this.sliders == null 
                    || this.sliders.length == 0
                ) {
                    this.sliders = { images: [] };
                }   
            },

            methods: {
                toggleCdnField(val) {
                    this.isUsingCDN = val;
                },
                
                saveSliderImage(params, { resetForm ,setErrors }) {
                    let formData = new FormData(this.$refs.createSliderForm);

                    try {
                        if (! formData.get("{{ $currentLocale->code }}[button_text]")) {
                            throw new Error("{{ trans('enclaves::app.admin.settings.themes.edit.required') }}");
                        }
                    } catch (error) {
                        setErrors({'button_text': [error.message]});
                    }

                    try {
                        if (formData.get("{{ $currentLocale->code }}[button_text]").length > 20) {
                            throw new Error("{{ trans('enclaves::app.admin.settings.themes.edit.limit_button_text') }}");
                        }
                    } catch (error) {
                        setErrors({'button_text': [error.message]});
                    }

                    try {
                        if (formData.get("{{ $currentLocale->code }}[slider_syntax]").length > 30) {
                            throw new Error("{{ trans('enclaves::app.admin.settings.themes.edit.limit_slider_text') }}");
                        }
                    } catch (error) {
                        setErrors({'slider_syntax': [error.message]});
                    }

                    try {
                        if (! formData.get("{{ $currentLocale->code }}[slider_syntax]")) {
                            throw new Error("{{ trans('enclaves::app.admin.settings.themes.edit.required') }}");
                        }
                    } catch (error) {
                        setErrors({'slider_syntax': [error.message]});
                    }

                    if(this.isUsingCDN) {
                        try {
                            if (! formData.get('{{ $currentLocale->code }}[image_cdn_link]')) {
                                throw new Error("{{ trans('admin::app.settings.themes.edit.slider-required') }}");
                            }
                            
                            this.sliders.images.push({
                                isUsingCDN: this.isUsingCDN,
                                button_text:formData.get("{{ $currentLocale->code }}[button_text]"),
                                slider_syntax:formData.get("{{ $currentLocale->code }}[slider_syntax]"),
                                link: formData.get("{{ $currentLocale->code }}[link]"),
                                image_cdn_link:formData.get('{{ $currentLocale->code }}[image_cdn_link]'),
                            });

                            this.$refs.addSliderModal.toggle();

                            resetForm();

                        } catch (error) {
                            setErrors({'image_cdn_link': [error.message]});
                        }
                    } else {
                        try {
                            if (! formData.get("slider_image[]")) {
                                throw new Error("{{ trans('admin::app.settings.themes.edit.slider-required') }}");
                            }

                            const sliderImage = formData.get("slider_image[]");

                            this.sliders.images.push({
                                slider_image: sliderImage,
                                isUsingCDN: this.isUsingCDN,
                                button_text:formData.get("{{ $currentLocale->code }}[button_text]"),
                                slider_syntax:formData.get("{{ $currentLocale->code }}[slider_syntax]"),
                                link: formData.get("{{ $currentLocale->code }}[link]"),
                                image_cdn_link:[],
                            });

                            if (sliderImage instanceof File) {
                                this.setFile(sliderImage, this.sliders.images.length - 1);
                            }

                            this.$refs.addSliderModal.toggle();

                            resetForm();
                        } catch (error) {
                            setErrors({'slider_image': [error.message]});
                        }
                    }
                },

                setFile(file, index) {
                    let dataTransfer = new DataTransfer();

                    dataTransfer.items.add(file);

                    setTimeout(() => {
                        this.$refs['image_' + index][0].href =  URL.createObjectURL(file);

                        this.$refs['imageName_' + index][0].innerHTML = file.name;

                        this.$refs['imageInput_' + index][0].files = dataTransfer.files;
                    }, 0);
                },

                remove(image) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.deletedSliders.push(image);
                    
                            this.sliders.images = this.sliders.images.filter(item => {
                                return (
                                    item.title !== image.title || 
                                    item.link !== image.link || 
                                    item.image !== image.image
                                );
                            });
                        }
                    });
                },

                editSliderRow(index) {
                    this.$refs.editSliderModal.toggle();
                    
                    this.editSlider = this.sliders.images[index];

                    this.isUsingCDN = this.sliders.images[index].isUsingCDN;

                    this.editRowIndex = index;
                },

                editSliderImage(params, { resetForm ,setErrors }) {
                    let formData = new FormData(this.$refs.editSliderForm);

                    let index = formData.get("editRowIndex");

                    try {
                        if (! formData.get("{{ $currentLocale->code }}[button_text]")) {
                            throw new Error("{{ trans('enclaves::app.admin.settings.themes.edit.required') }}");
                        }
                    } catch (error) {
                        setErrors({'button_text': [error.message]});
                    }

                    try {
                        if (formData.get("{{ $currentLocale->code }}[button_text]").length > 20) {
                            throw new Error("{{ trans('enclaves::app.admin.settings.themes.edit.limit_button_text') }}");
                        }
                    } catch (error) {
                        setErrors({'button_text': [error.message]});
                    }

                    try {
                        if (formData.get("{{ $currentLocale->code }}[slider_syntax]").length > 30) {
                            throw new Error("{{ trans('enclaves::app.admin.settings.themes.edit.limit_slider_text') }}");
                        }
                    } catch (error) {
                        setErrors({'slider_syntax': [error.message]});
                    }

                    try {
                        if (! formData.get("{{ $currentLocale->code }}[slider_syntax]")) {
                            throw new Error("{{ trans('enclaves::app.admin.settings.themes.edit.required') }}");
                        }
                    } catch (error) {
                        setErrors({'slider_syntax': [error.message]});
                    }

                    if(this.isUsingCDN) {
                        try {
                            if (! formData.get('{{ $currentLocale->code }}[image_cdn_link]')) {
                                throw new Error("{{ trans('admin::app.settings.themes.edit.slider-required') }}");
                            }

                            delete this.sliders.images[index];

                            this.sliders.images = this.sliders.images.filter( (slider) => {
                                return slider;
                            });

                            this.sliders.images.push({
                                isUsingCDN: this.isUsingCDN,
                                button_text:formData.get("{{ $currentLocale->code }}[button_text]"),
                                slider_syntax:formData.get("{{ $currentLocale->code }}[slider_syntax]"),
                                link: formData.get("{{ $currentLocale->code }}[link]"),
                                image_cdn_link:formData.get('{{ $currentLocale->code }}[image_cdn_link]'),
                            });

                            this.$refs.editSliderModal.toggle();

                            resetForm();

                        } catch (error) {
                            setErrors({'image_cdn_link': [error.message]});
                        }
                    } else {
                        try {
                            if (! formData.get("slider_image[]")) {
                                throw new Error("{{ trans('admin::app.settings.themes.edit.slider-required') }}");
                            }

                            const sliderImage = formData.get("slider_image[]");

                            delete this.sliders.images[index];

                            this.sliders.images = this.sliders.images.filter( (slider) => {
                                return slider;
                            });

                            this.sliders.images.push({
                                slider_image: sliderImage,
                                isUsingCDN: this.isUsingCDN,
                                button_text:formData.get("{{ $currentLocale->code }}[button_text]"),
                                slider_syntax:formData.get("{{ $currentLocale->code }}[slider_syntax]"),
                                link: formData.get("{{ $currentLocale->code }}[link]"),
                                image_cdn_link:[],
                            });

                            if (sliderImage instanceof File) {
                                this.setFile(sliderImage, this.sliders.images.length - 1);
                            }

                            this.$refs.editSliderModal.toggle();

                            resetForm();
                        } catch (error) {
                            setErrors({'slider_image': [error.message]});
                        }
                    }
                },
            },
        });
    </script>
@endPushOnce    