@unless ($breadcrumbs->isEmpty())
<div class="mb-3 mt-[30px] flex justify-start">
    <div class="flex items-center gap-x-[14px]">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (
                $breadcrumb->url 
                && ! $loop->last
            )
                <p class="flex items-center gap-x-[14px] text-[16px] font-medium max-md:text-xs">
                    {{ $breadcrumb->title }} 
                    <span class="icon-arrow-right text-[24px] font-bold max-md:text-xs"></span>
                </p>
            @else
                <p class="after:content[' '] after:bs-main-sprite flex items-center gap-x-[16px] text-[16px] font-medium text-[#7D7D7D] after:h-[20px] after:w-[9px] after:bg-[position:-7px_-41px] after:last:hidden max-md:text-xs">
                    {{ $breadcrumb->title }}
                </p>
            @endif
        @endforeach
    </div>
</div>
@endunless