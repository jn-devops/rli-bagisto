<x-admin::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('google_feed::app.admin.attribute.title')
    </x-slot>

    <x-admin::form
        :action="route('google_feed.attribute.index.store')"
        enctype="multipart/form-data"
    >
        <div class="flex items-center justify-between gap-4 max-lg:flex max-sm:flex-wrap">
            <!-- Title -->
            <p class="text-xl font-bold text-gray-800 dark:text-white">
                @lang('google_feed::app.admin.attribute.title')
            </p>
            
            <div class="flex items-center gap-x-2.5">
                @if (
                    ! is_null($googleProductAttribute)
                    && bouncer()->hasPermission('google_feed.attribute.refresh')
                )
                   <a href="{{ route('google_feed.attribute.index.refresh', $googleProductAttribute->id) }}">
                       <button 
                           type="button"
                           class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                        >
                           @lang('google_feed::app.admin.attribute.index.reset-btn-title')
                       </button>
                    </a>
                @endif

                <button class="primary-button cursor-pointer">
                    @lang('google_feed::app.admin.attribute.index.save-btn-title')
                </button>
            </div>
        </div>

        <!-- body content -->
        <div class="mt-4 flex gap-2.5">
            <div class="flex flex-1 flex-col gap-x-2 overflow-auto">
                <div class="box-shadow rounded-[4px] bg-white p-4 dark:bg-gray-900">
                    <input 
                        type="text" 
                        name="id" 
                        value="{{ $googleProductAttribute ? $googleProductAttribute->id : null }}" 
                        hidden
                    />

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.attribute.index.product-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="product_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->product_id : null }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.attribute.index.product-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.product-id')"
                        >
                            @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="product_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.attribute.index.title-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="title_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->title_id : null}}"
                            rules="required"
                            :label="trans('google_feed::app.admin.attribute.index.title-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.title-id')"
                        >
                            @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="title_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.attribute.index.description-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="description_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->description_id : null }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.attribute.index.description-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.description-id')"
                        >
                            @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="description_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.attribute.index.gtin-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="gtin_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->gtin_id : null }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.attribute.index.gtin-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.gtin-id')"
                        >
                           @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="gtin_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.attribute.index.brand-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="brand_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->brand_id : null }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.attribute.index.brand-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.brand-id')"
                        >
                           @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="brand_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.attribute.index.color-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="color_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->brand_id : null }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.attribute.index.color-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.color-id')"
                        >
                           @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="color_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.attribute.index.weight-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="weight_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->weight_id : null }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.attribute.index.weight-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.weight-id')"
                        >
                            @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="weight_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label>
                            @lang('google_feed::app.admin.attribute.index.image-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="image_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->image_id : null }}"
                            :label="trans('google_feed::app.admin.attribute.index.image-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.image-id')"
                        >
                            @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="image_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label>
                            @lang('google_feed::app.admin.attribute.index.size-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="size_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->size_id : null }}"
                            :label="trans('google_feed::app.admin.attribute.index.size-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.size-id')"
                        >
                            @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="size_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label>
                            @lang('google_feed::app.admin.attribute.index.size-system-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="size_system_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->size_system_id : null }}"
                            :label="trans('google_feed::app.admin.attribute.index.size-system-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.size-system-id')"
                        >
                           @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="size_system_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label>
                            @lang('google_feed::app.admin.attribute.index.size-type-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="size_type_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->size_type_id : null }}"
                            :label="trans('google_feed::app.admin.attribute.index.size-type-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.size-type-id')"
                        >
                            @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="size_type_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-2.5">
                        <x-admin::form.control-group.label class="required">
                            @lang('google_feed::app.admin.attribute.index.mpn-id')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="select"
                            name="mpn_id"
                            value="{{ $googleProductAttribute ? $googleProductAttribute->mpn_id : null }}"
                            rules="required"
                            :label="trans('google_feed::app.admin.attribute.index.mpn-id')"
                            :placeholder="trans('google_feed::app.admin.attribute.index.mpn-id')"
                        >
                            @foreach ($attributes as $attribute)
                                @if ($attribute->code == "manage_stock")
                                    continue;
                                @else
                                    <option value="{{ $attribute->code }}"> 
                                       {{ $attribute->name ?? $attribute->admin_name }}
                                    </option>
                                @endif
                            @endforeach
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="mpn_id"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>
                </div>
            </div>
        </div>
    </x-admin::form>
</x-admin::layouts>