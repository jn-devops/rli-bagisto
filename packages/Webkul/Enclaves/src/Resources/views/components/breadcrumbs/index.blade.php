@props([
    'name'  => '',
    'entity' => null,
])

<div class="flex justify-start mt-[30px] max-lg:hidden">
    <div class="flex gap-x-[14px] items-center">        
        {{ Breadcrumbs::view('store::partials.breadcrumbs', $name, $entity) }}
    </div>
</div>
