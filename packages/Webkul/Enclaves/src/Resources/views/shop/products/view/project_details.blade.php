<div class="mt-8 max-sm:mt-6 max-sm:border-t max-sm:border-[#D9D9D9] max-sm:pt-5">
	<h2 class="text-base font-medium text-dark">
		@lang('enclaves::app.shop.product.project-details')
	</h2>
	<div class="mt-10 max-sm:mt-5">
		<div
			class="group"
			:class="detailAccordians[0] ? 'active' : ''"
			>
			<h2
				@click="detailAccordians[0] = !detailAccordians[0]"
				class="flex cursor-pointer items-start justify-between gap-1 bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-[380px]:text-base">
					Amenities
					<span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span>
				</h2>
			<div class="hidden bg-white p-5 group-[.active]:block">
				<ul class="list-inside list-disc">
					<li class="text-base font-normal text-[#0F0E0E]">Multi-Purpose Hall</li>
					<li class="text-base font-normal text-[#0F0E0E]">Swimming Pool</li>
					<li class="text-base font-normal text-[#0F0E0E]">Playing Courts</li>
					<li class="text-base font-normal text-[#0F0E0E]">Gardens, Chapel</li>
					<li class="text-base font-normal text-[#0F0E0E]">Open spaces</li>
				</ul>
			</div>
		</div>
		<div
			class="group mt-1"
			:class="detailAccordians[1] ? 'active' : ''"
			>
			<h2
				@click="detailAccordians[1] = !detailAccordians[1]"
				class="flex cursor-pointer items-start justify-between gap-1 bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-[380px]:text-base">Accessibility <span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span></h2>
			<div class="hidden bg-white p-5 group-[.active]:block">
				<ul class="list-inside list-disc">
					<li class="text-base font-normal text-[#0F0E0E]">Multi-Purpose Hall</li>
					<li class="text-base font-normal text-[#0F0E0E]">Swimming Pool</li>
					<li class="text-base font-normal text-[#0F0E0E]">Playing Courts</li>
					<li class="text-base font-normal text-[#0F0E0E]">Gardens, Chapel</li>
					<li class="text-base font-normal text-[#0F0E0E]">Open spaces</li>
				</ul>
			</div>
		</div>
		<div
			class="group mt-1"
				:class="detailAccordians[2] ? 'active' : ''"
				>
			<h2
				@click="detailAccordians[2] = !detailAccordians[2]"
				class="flex cursor-pointer items-start justify-between gap-1 bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-[380px]:text-base">Educational Institutions <span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span></h2>
			<div class="hidden bg-white p-5 group-[.active]:block">
				<ul class="list-inside list-disc">
					<li class="text-base font-normal text-[#0F0E0E]">Multi-Purpose Hall</li>
					<li class="text-base font-normal text-[#0F0E0E]">Swimming Pool</li>
					<li class="text-base font-normal text-[#0F0E0E]">Playing Courts</li>
					<li class="text-base font-normal text-[#0F0E0E]">Gardens, Chapel</li>
					<li class="text-base font-normal text-[#0F0E0E]">Open spaces</li>
				</ul>
			</div>
		</div>
		<div
			class="group mt-1"
			:class="detailAccordians[3] ? 'active' : ''"
			>
			<h2
				@click="detailAccordians[3] = !detailAccordians[3]"
				class="flex cursor-pointer items-start justify-between gap-1 bg-[#F3F4F6] px-4 py-3 text-xl font-bold text-[#111827] max-[380px]:text-base">Commercial Establishments <span class="icon-arrow-down mt-1 block text-[24px] text-secondary group-[.active]:rotate-180"></span></h2>
			<div class="hidden bg-white p-5 group-[.active]:block">
				<ul class="list-inside list-disc">
					<li class="text-base font-normal text-[#0F0E0E]">Multi-Purpose Hall</li>
					<li class="text-base font-normal text-[#0F0E0E]">Swimming Pool</li>
					<li class="text-base font-normal text-[#0F0E0E]">Playing Courts</li>
					<li class="text-base font-normal text-[#0F0E0E]">Gardens, Chapel</li>
					<li class="text-base font-normal text-[#0F0E0E]">Open spaces</li>
				</ul>
			</div>
		</div>
	</div>
</div>
