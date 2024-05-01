@unless ($breadcrumbs->isEmpty())
<div class="flex justify-start mt-[30px]">
    <div class="flex gap-x-[14px] items-center">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (
                $breadcrumb->url 
                && ! $loop->last
            )
                <p class="flex items-center gap-x-[14px] text-[16px] font-medium">
                    {{ $breadcrumb->title }} 
                    <span class="icon-arrow-right text-[24px]"></span>
                </p>
            @else
                <p class="text-[#7D7D7D] text-[16px] flex items-center gap-x-[16px] font-medium  after:content[' '] after:bg-[position:-7px_-41px] after:bs-main-sprite after:w-[9px] after:h-[20px] after:last:hidden">
                    {{ $breadcrumb->title }}
                </p>
            @endif
        @endforeach
    </div>
</div>
@endunless