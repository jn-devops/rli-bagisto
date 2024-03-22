<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('enclaves::app.admin.inquiries.title')
    </x-slot:title>

    <div class="flex justify-between items-center">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('enclaves::app.admin.inquiries.title')
        </p>

        <div class="flex gap-x-[10px] items-center dark:text-white">
            {!! view_render_event('admin.inquiries.exit.before') !!}

                @include('enclaves::admin.inquiries.form.edit')

            {!! view_render_event('admin.inquiries.exit.after') !!}
        </div>
    </div>

    <div class="gap-x-[10px] dark:text-white mt-5">
        <div class="p-4 bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
            <div class="p-[5px] flex justify-between">
                <p class="text-[16px] text-gray-800 dark:text-white font-semibold">{{ $ticket->reasons->name }}</p>

                @switch($ticket->status->name)
                    @case('Canceled')
                            <span class="label-danger bg-red text-[14px] mx-[5px]"> {{ $ticket->status->name }} </span>
                        @break

                    @case('Pending')
                        <span class="label-pending text-[14px] mx-[5px]"> {{ $ticket->status->name }} </span>
                    @break

                    @case('Resolved')
                        <span class="label-active text-[14px] mx-[5px]"> {{ $ticket->status->name }} </span>
                    @break
                @endswitch
            </div>

            <div class="table-responsive grid w-full p-1">
                <div class="flex p-[5px] gap-[14px]">
                    <p class="text-[16px] text-gray-600 dark:text-gray-300 font-semibold leading-[24px] text-[16px]">
                        @lang('enclaves::app.admin.inquiries.form.view.comment-name')
                    </p>

                    <p class="text-[16px] dark:bg-gray-900 text-gray-800 font-semibold leading-[24px]">
                        {{ $customer->name }} 
                    </p>
                </div>

                <div class="p-[5px] gap-[14px]">
                    <p class="text-[16px] text-gray-600 dark:text-gray-300 font-semibold leading-[24px]">
                        @lang('enclaves::app.admin.inquiries.form.view.comment')
                    </p>

                    <p class="h-auto p-4 mt-[10px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow text-justify leading-[24px]">
                        {{ $ticket->comment }} 
                    </p>
                </div>

                @if ($ticket->files)
                    <div class="grid gap-[14px] py-5 justify-items-start px-[16px]">
                        <p class="text-[16px] text-gray-600 dark:text-gray-300 font-semibold leading-[24px]">
                            @lang('enclaves::app.admin.inquiries.form.view.attachment')
                        </p>

                        <p class="mt-1 text-red-600 text-xs italic">
                            @lang('enclaves::app.admin.inquiries.form.view.attachment-info')
                        </p>
                        
                        <div class="flex flex-wrap gap-[14px]">
                            @foreach ($ticket->files as $file)
                                <a href="{{ Storage::url($file->path. '/'. $file->name) }}" download>
                                    <img 
                                        src="{{ Storage::url($file->path. '/'. $file->name) }}" 
                                        alt="{{ config('app.name') }}" 
                                        style="height: 300px; width: 450px;"
                                    />
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="grid gap-[14px] py-5 justify-items-center px-[16px]">
                        <img src="{{ bagisto_asset('images/product-placeholders/use-cases.svg') }}"
                            class="w-[80px] h-[80px] border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion"
                        >
                        
                        <div class="flex flex-col items-start">
                            <p class="text-[16px] text-gray-400 font-semibold">
                                @lang('enclaves::app.admin.inquiries.form.view.no-image')
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin::layouts>