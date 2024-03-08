<x-shop::layouts.account>
    <!-- Page Title --->
    <x-slot:title>
        @lang('shop::app.customers.account.orders.view.page-title', ['order_id' => $order->increment_id])
    </x-slot:title>
    
    <!-- Breadcrumbs --->
    @section('breadcrumbs')
        <x-shop::breadcrumbs name="transactions.view" :entity="$order"></x-shop::breadcrumbs>
    @endSection

    <div class="flex justify-between items-center">
        <div class="">
            <h2 class="text-[29px] font-semibold max-md:text-[20px]">
                Transaction Details
            </h2>
        </div>
    </div>

    {!! view_render_event('bagisto.shop.customers.account.orders.view.before', ['order' => $order]) !!}

    <!-- Order view tabs --->
    <div>
        <x-shop::tabs class="mt-5">
            <x-shop::tabs.item
                class="!px-0"
                :title="trans('shop::app.customers.account.orders.view.information.info')"
                :is-selected="true"
            >


                <div class="mt-9">
					<p class="text-[20px] font-bold mt-6">Placed On 24 June 2024</p>

					<div class="flex justify-between items-center mt-12 flex-wrap">
						<div class="flex gap-[20px] flex-wrap">
							<img class="rounded-[10px] max-w-[80px] max-h-[67px]" src="{{ bagisto_asset('images/document-files.svg') }}" />
							<p class="text-[20px] font-bold max-w-[380px]">Zaya Studio Condominium Standard Inner Unit</p>
						</div>
						<a href=""
							class="flex gap-[8px] items-center text-white font-medium px-[25px] py-[21px] bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] rounded-[20px]"><span class="icon-billing text-[24px] font-medium "></span> Billing Statement</a>
					</div>

					<div class="grid grid-cols-2 gap-[30px] max-2xl:grid-cols-1">
						<dl class="flex flex-col gap-[16px] mt-9">
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-semibold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Full Name: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> Charles Ley Baldemor </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Date of Birth: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> June 24, 1998 </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Email Address: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> abc@gmail.com </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Mobile Number: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> 09467786754 </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Lot / Unit number: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> Lot A </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Civil Status: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> Single </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Gender: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> Male </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Secondary Home Address: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px] max-w-[300px]"> 162 San Juan, Agoo Philippines test
								</dd>
							</div>
						</dl>

						<dl class="flex flex-col gap-[16px] mt-9">
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt class="text-[18px] font-bold">Seller Details</dt>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-[16px]">
									Date of Birth: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 md:text-[16px]"> June 24, 1998 </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-[16px]">
									Email Address: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 md:text-[16px]"> abc@gmail.com</dd>
							</div>

						</dl>
					</div>

					<div class="border-b-[1px] h-[1px] border-[#B9B9B9] py-[22px]"></div>

					<div class="grid gap-[30px] grid-cols-1">
						<dl class="flex flex-col gap-[16px] mt-9">
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-semibold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Full Name: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> Charles Ley Baldemor </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Date of Birth: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> June 24, 1998 </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Email Address: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> abc@gmail.com</dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Mobile Number: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> 09467786754 </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Lot / Unit number: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> Lot A </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Civil Status: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> Single </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Gender: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> Male </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] text-[16px]">
									Secondary Home Address: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 text-[16px]"> 162 San Juan, Agoo, La Union,
									Philippines </dd>
							</div>
						</dl>
						<dl class="flex flex-col gap-[16px] mt-9">
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt class="text-[18px] font-bold">Seller Details</dt>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-[16px]">
									Date of Birth: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 md:text-[16px]"> June 24, 1998 </dd>
							</div>
							<div class="flex columns-2 flex-wrap gap-x-6 sm:px-0">
								<dt
									class="w-[10rem] min-w-[10rem] tracking-tighter sm:tracking-normal sm:w-[13rem] sm:min-w-[13rem] sm:whitespace-nowrap text-base font-bold leading-5 text-gray-900 md:w-[17rem] md:min-w-[17rem] md:text-[16px]">
									Email Address: </dt>
								<dd class="text-base font-normal leading-5 text-gray-900 md:text-[16px]"> Floodway Street, Cambridge
									Village, Cluster One Duke </dd>
							</div>
						</dl>
					</div>

				</div>




            </x-shop::tabs.item>

            @if ($order->invoices->count())
                <x-shop::tabs.item  :title="trans('shop::app.customers.account.orders.view.invoices.invoices')">

                    @foreach ($order->invoices as $invoice)
                        <div class="flex justify-between items-center">
                            <div class="">
                                <p class="text-[15px] font-medium">
                                    @lang('shop::app.customers.account.orders.view.invoices.individual-invoice', ['invoice_id' => $invoice->increment_id ?? $invoice->id])
                                </p>
                            </div>
                            <div class="secondary-button flex gap-x-[10px] items-center py-[12px] px-[20px] border-[#E9E9E9] font-normal">
                                <a href="{{ route('shop.customers.account.transactions.print-invoice', $invoice->id) }}">
                                        @lang('shop::app.customers.account.orders.view.invoices.print')
                                </a>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto mt-[30px] border rounded-[12px]">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-[#F5F5F5] border-b-[1px] border-[#E9E9E9] text-[14px] text-black">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-3 py-[16px] font-medium"
                                        >
                                            @lang('shop::app.customers.account.orders.view.invoices.sku')
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-3 py-[16px] font-medium"
                                        >
                                            @lang('shop::app.customers.account.orders.view.invoices.product-name')
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-3 py-[16px] font-medium"
                                        >
                                            @lang('shop::app.customers.account.orders.view.invoices.price')
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-3 py-[16px] font-medium"
                                        >
                                            @lang('shop::app.customers.account.orders.view.invoices.qty')
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-3 py-[16px] font-medium"
                                        >
                                            @lang('shop::app.customers.account.orders.view.invoices.subtotal')
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-3 py-[16px] font-medium"
                                        >
                                            @lang('shop::app.customers.account.orders.view.invoices.tax-amount')
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-3 py-[16px] font-medium"
                                        >
                                            @lang('shop::app.customers.account.orders.view.invoices.grand-total')
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($invoice->items as $item)
                                        <tr class="bg-white border-b">
                                            <td
                                                class="px-3 py-[16px] text-black font-medium"
                                                data-value="@lang('shop::app.customers.account.orders.view.invoices.sku')"
                                            >
                                                {{ $item->getTypeInstance()->getOrderedItem($item)->sku }}
                                            </td>

                                            <td
                                                class="px-3 py-[16px] text-black font-medium"
                                                data-value="@lang('shop::app.customers.account.orders.view.invoices.product-name')"
                                            >
                                                {{ $item->name }}
                                            </td>

                                            <td
                                                class="px-3 py-[16px] text-black font-medium"
                                                data-value="@lang('shop::app.customers.account.orders.view.invoices.price')"
                                            >
                                                {{ core()->formatPrice($item->price, $order->order_currency_code) }}
                                            </td>

                                            <td
                                                class="px-3 py-[16px] text-black font-medium"
                                                data-value="@lang('shop::app.customers.account.orders.view.invoices.qty')"
                                            >
                                                {{ $item->qty }}
                                            </td>

                                            <td
                                                class="px-3 py-[16px] text-black font-medium"
                                                data-value="@lang('shop::app.customers.account.orders.view.invoices.subtotal')"
                                            >
                                                {{ core()->formatPrice($item->total, $order->order_currency_code) }}
                                            </td>

                                            <td
                                                class="px-3 py-[16px] text-black font-medium"
                                                data-value="@lang('shop::app.customers.account.orders.view.invoices.tax-amount')"
                                            >
                                                {{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}
                                            </td>

                                            <td
                                                class="px-3 py-[16px] text-black font-medium"
                                                data-value="@lang('shop::app.customers.account.orders.view.invoices.grand-total')"
                                            >
                                                {{ core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="flex gap-[40px] items-start mt-[30px] max-lg:gap-[20px] max-md:grid">
                            <div class="flex-auto max-md:mt-[30px]">
                                <div class="flex justify-end">
                                    <div class="grid gap-[8px] max-w-max">
                                        <div class="flex gap-x-[20px] justify-between w-full">
                                            <p class="text-[14px]">
                                                @lang('shop::app.customers.account.orders.view.invoices.subtotal')
                                            </p>

                                            <div class="flex gap-x-[20px]">
                                                <p class="text-[14px]">-</p>

                                                <p class="text-[14px]">
                                                    {{ core()->formatPrice($invoice->sub_total, $order->order_currency_code) }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex gap-x-[20px] justify-between w-full">
                                            <p class="text-[14px]">
                                                @lang('shop::app.customers.account.orders.view.invoices.shipping-handling')
                                            </p>

                                            <div class="flex gap-x-[20px]">
                                                <p class="text-[14px]">-</p>

                                                <p class="text-[14px]">
                                                    {{ core()->formatPrice($invoice->shipping_amount, $order->order_currency_code) }}
                                                </p>
                                            </div>
                                        </div>

                                        @if ($invoice->base_discount_amount > 0)
                                            <div class="flex gap-x-[20px] justify-between w-full">
                                                <p class="text-[14px]">
                                                    @lang('shop::app.customers.account.orders.view.invoices.discount')
                                                </p>

                                                <div class="flex gap-x-[20px]">
                                                    <p class="text-[14px]">-</p>

                                                    <p class="text-[14px]">
                                                        {{ core()->formatPrice($invoice->discount_amount, $order->order_currency_code) }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="flex gap-x-[20px] justify-between w-full">
                                            <p class="text-[14px]">
                                                @lang('shop::app.customers.account.orders.view.invoices.tax')
                                            </p>

                                            <div class="flex gap-x-[20px]">
                                                <p class="text-[14px]">-</p>

                                                <p class="text-[14px]">
                                                    {{ core()->formatPrice($invoice->tax_amount, $order->order_currency_code) }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex gap-x-[20px] justify-between w-full">
                                            <p class="text-[14px]">
                                                @lang('shop::app.customers.account.orders.view.invoices.grand-total')
                                            </p>

                                            <div class="flex gap-x-[20px]">
                                                <p class="text-[14px]">-</p>

                                                <p class="text-[14px]">
                                                    {{ core()->formatPrice($invoice->grand_total, $order->order_currency_code) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </x-shop::tabs.item>
            @endif

          
        </x-shop::tabs>

        <div class="flex flex-wrap gap-x-[64px] gap-y-[30px] justify-between mt-[42px] pt-[26px] border-t-[1px] border-[#E9E9E9]">

            <!-- Payment Method --->
            <div class="grid gap-[15px] place-content-baseline max-w-[200px] max-868:w-full max-868:max-w-full max-md:max-w-[200px] max-sm:max-w-full">
                <p class="text-[16px] text-[#6E6E6E]">
                    @lang('shop::app.customers.account.orders.view.payment-method')
                </p>

                <p class="text-[14px]">
                    {{ core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title') }}
                </p>

                @if (! empty($additionalDetails))
                    <div class="instructions">
                        <label>{{ $additionalDetails['title'] }}</label>
                    </div>
                @endif

                {!! view_render_event('bagisto.shop.customers.account.orders.view.payment_method.after', ['order' => $order]) !!}
            </div>
        </div>
    </div>

    {!! view_render_event('bagisto.shop.customers.account.orders.view.after', ['order' => $order]) !!}
</x-shop::layouts.account>
