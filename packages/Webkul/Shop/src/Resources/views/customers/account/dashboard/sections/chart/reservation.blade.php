<div class="p-6 bg-white rounded-lg mt-10">
    <h1 class="font-bold text-[20px]">Reservation Fee</h1>

    <!-- Row 1 -->
    <div class="flex justify-center mt-5 my-5">
        <table class="w-full text-left leading-loose">
            <tr>
                <!-- left -->
                <th>
                    <p class="text-[#b8b8b8]">@lang('Particulars')</p>
                </th>

                <!-- Middle -->
                <th>
                    <p class="text-[#b8b8b8]">@lang('Rate')</p>
                </th>

                <!-- right -->
                <th>
                    <p class="text-[#b8b8b8]">@lang('Amount')</p>
                </th>
            </tr>

            <tr>
                <!-- left -->
                <td>
                    <span class="text-[#2e2d2d]">@lang('Electicity')</span>
                </td>

                <!-- Middle -->
                <td>
                    <span class="text-[#2e2d2d]">@lang('70%')</span>
                </td>

                <!-- right -->
                <td>
                    <span class="text-[#2e2d2d]">@lang('₱7,000.00')</span>
                </td>
            </tr>

            <tr>
                <!-- left -->
                <td>
                    <span class="text-[#2e2d2d]">@lang('Water')</span>
                </td>

                <!-- Middle -->
                <td>
                    <span class="text-[#2e2d2d]">@lang('30%')</span>
                </td>

                <!-- right -->
                <td>
                    <span class="text-[#2e2d2d]">@lang('₱3,000.00')</span>
                </td>
            </tr>
        </table>
    </div>

    <div class="border border-gray-300 mt-10"></div>

    <div class="flex justify-end">
        <p class="mt-4">
            <span class="font-bold">Total: </span>
            @lang('₱10,000.00')
        </p>
    </div>
</div>