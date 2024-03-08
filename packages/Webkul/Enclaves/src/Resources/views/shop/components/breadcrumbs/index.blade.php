@props([
    'name'  => '',
    'entity' => null,
])
     
{{ Breadcrumbs::view('shop::partials.breadcrumbs', $name, $entity) }}

