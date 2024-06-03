@props(['isMultiRow' => false])

<v-table>
    {{ $slot }}
</v-table>

@pushOnce('scripts')
    <script type="text/x-template" id="v-table-template">
        <div class="relative overflow-x-auto mt-[30px]">
            <table class="w-full text-sm text-left border-collapse rounded-[12px]">
                <template v-if="$parent.isLoading">
                    <x-shop::shimmer.datagrid.table.head :isMultiRow="$isMultiRow"></x-shop::shimmer.datagrid.table.head>
                </template>
                <template v-else>
                    <thead class="text-[14px] text-black bg-[#F5F5F5]">
                        <tr>
                            <th 
                                scope="col" 
                                class="px-6 py-[16px] font-medium border border-[#B9B9B9]"
                                v-if="$parent.available.massActions.length"
                            > 
                                <input
                                    type="checkbox"
                                    name="mass_action_select_all_records"
                                    id="mass_action_select_all_records"
                                    class="peer hidden"
                                    :checked="['all', 'partial'].includes($parent.applied.massActions.meta.mode)"
                                    @change="$parent.selectAllRecords"
                                >

                                <span
                                    class="icon-uncheckbox cursor-pointer rounded-[6px] text-[24px]"
                                    :class="[
                                        $parent.applied.massActions.meta.mode === 'all' ? 'peer-checked:icon-checked peer-checked:text-blue-600' : (
                                            $parent.applied.massActions.meta.mode === 'partial' ? 'peer-checked:icon-checkbox-partial peer-checked:text-blue-600' : ''
                                        ),
                                    ]"
                                >
                                </span>
                            </th>

                            <th
                                scope="col" 
                                class="px-6 py-[16px] font-medium border border-[#B9B9B9]"
                                v-for="column in $parent.available.columns"
                                @click="$parent.sortPage(column)"
                            > 
                                @{{ column.label }}

                                <i
                                    class="text-[16px] text-gray-800 align-text-bottom"
                                    :class="[$parent.applied.sort.order === 'asc' ? 'icon-arrow-down': 'icon-arrow-up']"
                                    v-if="column.index == $parent.applied.sort.column"
                                ></i>
                            </th>

                            <th
                                scope="col" 
                                class="px-6 py-[16px] font-medium border border-[#B9B9B9]"
                            > 
                                @{{ 'View' }}
                            </th>
                        </tr>
                    </thead>
                </template>

                <slot name="body" v-if="$parent.available.records.length">
                    <template v-if="$parent.isLoading">
                        <x-shop::shimmer.datagrid.table.body :isMultiRow="$isMultiRow"></x-shop::shimmer.datagrid.table.body>

                        <x-shop::shimmer.datagrid.table.footer/>
                    </template>

                    <template v-else>
                        <tbody v-if="$parent.available.records.length">
                            <tr class="bg-white" v-for="record in $parent.available.records">

                                <td 
                                    scope="row"
                                    class="px-6 py-[16px] font-medium whitespace-nowrap text-black border border-[#B9B9B9]"
                                    v-if="$parent.available.massActions.length"
                                >
                                    <label :for="`mass_action_select_record_${record[$parent.available.meta.primary_column]}`">
                                        <input
                                            type="checkbox"
                                            class="peer hidden"
                                            :name="`mass_action_select_record_${record[$parent.available.meta.primary_column]}`"
                                            :value="record[$parent.available.meta.primary_column]"
                                            :id="`mass_action_select_record_${record[$parent.available.meta.primary_column]}`"
                                            v-model="$parent.applied.massActions.indices"
                                            @change="$parent.setCurrentSelectionMode"
                                        >

                                        <span class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-[6px] text-[24px] peer-checked:text-blue-600">
                                        </span>
                                    </label>
                                </td>

                                <td 
                                    class="px-6 py-[16px] text-black font-medium border border-[#B9B9B9]"
                                    v-if="record.is_closure"
                                    v-for="column in $parent.available.columns"
                                    v-html="record[column.index]"
                                >
                                </td>

                                <td
                                    v-else
                                    v-for="column in $parent.available.columns"
                                    v-html="record[column.index]"
                                >
                                </td>

                                <td
                                    v-if="$parent.available.actions.length"
                                    class="px-6 py-[16px] text-black font-medium border border-[#B9B9B9]"
                                >
                                    <span
                                        class="cursor-pointer rounded-[6px] p-[6px] text-[24px] transition-all hover:bg-gray-200 max-lg:place-self-center"
                                        :class="action.icon"
                                        v-text="!action.icon ? action.title : ''"
                                        v-for="action in record.actions"
                                        @click="$parent.performAction(action)"
                                    >
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </slot>

                <slot v-else>
                    <tr class="bg-white">
                        <td
                            colspan="7"
                            scope="row"
                            class="px-6 py-[16px] font-medium whitespace-nowrap text-black border border-[#B9B9B9] text-center"
                        >
                            @lang('shop::app.components.datagrid.table.no-records-available')

                        </td>
                    </tr>
                </slot>
            </table>

            <div
                class="flex flex justify-between items-center mt-3" 
                v-if="$parent.available.records.length"
                >
                <p class="text-[12px] font-medium">
                    Showing @{{ $parent.available.meta.from }} to @{{ $parent.available.meta.to }} of @{{ $parent.available.meta.total }} entries
                </p>

                <!-- Pagination -->
                <div class="flex items-center gap-[4px]">
                    <div
                        class="inline-flex w-full max-w-max cursor-pointer appearance-none items-center justify-between gap-x-[4px] rounded-[6px] border border-transparent p-[6px] text-center text-gray-600 transition-all marker:shadow hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-black active:border-gray-300"
                        @click="changePage('previous')"
                    >
                        <span class="icon-sort-left text-[24px]"></span>
                    </div>

                    <div
                        class="inline-flex w-full max-w-max cursor-pointer appearance-none items-center justify-between gap-x-[4px] rounded-[6px] border border-transparent p-[6px] text-center text-gray-600 transition-all marker:shadow hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-black active:border-gray-300"
                        @click="changePage('next')"
                    >
                        <span class="icon-sort-right text-[24px]"></span>
                    </div>
                </div>

                <nav aria-label="Page Navigation">
                    <ul class="inline-flex items-center -space-x-px">
                        <li @click="$parent.changePage('previous')">
                            <a
                                href="javascript:void(0);"
                                class="flex items-center justify-center w-[35px] h-[37px] border border-[#E9E9E9] rounded-l-lg leading-normal font-medium hover:bg-gray-100"
                                aria-label="Previous Page"
                            >
                                <span class="icon-arrow-left text-[24px]"></span>
                            </a>
                        </li>

                        <li>
                            <input
                                type="text"
                                :value="$parent.available.meta.current_page"
                                class="px-[15px] pt-[6px] pb-[5px] max-w-[42px] border border-[#E9E9E9] leading-normal text-black font-medium text-center hover:bg-gray-100"
                                @change="$parent.changePage(parseInt($event.target.value))"
                                aria-label="Page Number"
                            >
                        </li>

                        <li @click="$parent.changePage('next')">
                            <a
                                href="javascript:void(0);"
                                class="flex items-center justify-center w-[35px] h-[37px] border border-[#E9E9E9] rounded-r-lg leading-normal font-medium hover:bg-gray-100"
                                aria-label="Next Page"
                            >
                                <span class="icon-arrow-right text-[24px]"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-table', {
            template: '#v-table-template',

            computed: {
                gridsCount() {
                    let count = this.$parent.available.columns.length;

                    if (this.$parent.available.actions.length) {
                        ++count;
                    }

                    if (this.$parent.available.massActions.length) {
                        ++count;
                    }

                    return count;
                },
            },
        });
    </script>
@endpushOnce
