<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('enclaves::app.admin.inquiries.tickets.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-4 max-lg:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('enclaves::app.admin.inquiries.tickets.title')
        </p>

        <div class="flex items-center gap-x-[10px] dark:text-white">
            {!! view_render_event('admin.inquiries.exit.before') !!}

                @include('enclaves::admin.inquiries.tickets.form.edit')

            {!! view_render_event('admin.inquiries.exit.after') !!}
        </div>
    </div>

    <div class="mt-5 gap-x-[10px] dark:text-white">
        <div class="box-shadow rounded-[4px] bg-white p-4 dark:bg-gray-900">
            <div class="flex justify-between gap-5 p-[5px]">
                <p class="text-xl font-bold text-gray-800 dark:text-white">{{ $ticket->reasons->name }}</p>

                @switch($ticket->status->name)
                    @case('Canceled')
                            <span class="label-danger bg-red mx-[5px] text-[14px]"> {{ $ticket->status->name }} </span>
                        @break

                    @case('Pending')
                        <span class="label-pending mx-[5px] text-[14px]"> {{ $ticket->status->name }} </span>
                    @break

                    @case('Resolved')
                        <span class="label-active mx-[5px] text-[14px]"> {{ $ticket->status->name }} </span>
                    @break
                @endswitch
            </div>

            <div class="table-responsive w-full p-1">
                <div class="flex gap-[30px] p-[5px]">
                    <p class="text-[16px] font-semibold leading-[24px] text-gray-600 dark:text-gray-300">
                        @lang('enclaves::app.admin.inquiries.tickets.form.view.comment-name')
                    </p>

                    <p class="text-[16px] font-semibold leading-[24px] text-gray-800 dark:bg-gray-900">
                        {{ $customer->name }} 
                    </p>
                </div>

                <div class="gap-[14px] p-[5px]">
                    <p class="text-[16px] font-semibold leading-[24px] text-gray-600 dark:text-gray-300">
                        @lang('enclaves::app.admin.inquiries.tickets.form.view.comment')
                    </p>

                    <p class="mt-[10px] h-auto rounded-[4px] bg-white p-4 text-justify leading-[24px] dark:bg-gray-900">
                        {{ $ticket->comment }} 
                    </p>
                </div>

                @if ($ticket->files)
                    <div class="grid justify-items-start gap-[14px] px-[16px] py-5">
                        <p class="text-[16px] font-semibold leading-[24px] text-gray-600 dark:text-gray-300">
                            @lang('enclaves::app.admin.inquiries.tickets.form.view.attachment')
                        </p>

                        <p class="mt-1 text-xs italic text-gray-600">
                            @lang('enclaves::app.admin.inquiries.tickets.form.view.attachment-info')
                        </p>
                        
                        <div class="mt-[10px] flex flex-wrap gap-[14px]">
                            @foreach ($ticket->files as $file)
                                <a href="{{ Storage::url($file->path. '/'. $file->name) }}" download>
                                    <img 
                                        src="{{ Storage::url($file->path) }}" 
                                        alt="{{ config('app.name') }}" 
                                        style="height: 300px; width: 450px;"
                                    />
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="grid justify-items-center gap-[14px] px-[16px] py-5">
                        <img src="{{ bagisto_asset('images/product-placeholders/use-cases.svg') }}"
                            class="h-[80px] w-[80px] rounded-[4px] border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert"
                        >
                        
                        <div class="flex flex-col items-start">
                            <p class="text-[16px] font-semibold text-gray-400">
                                @lang('enclaves::app.admin.inquiries.tickets.form.view.no-image')
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin::layouts>