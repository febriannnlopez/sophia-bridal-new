@props([
    'sidebar' => false,
])
@if($sidebar)
    <flux:sidebar.brand name="Sophia Bridal" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-9 items-center justify-center rounded-full bg-bridal-primary text-white shadow-md">
            <x-app-logo-icon class="size-5 text-white" />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="Sophia Bridal" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-9 items-center justify-center rounded-full bg-bridal-primary text-white shadow-md">
            <x-app-logo-icon class="size-5 text-white" />
        </x-slot>
    </flux:brand>
@endif
