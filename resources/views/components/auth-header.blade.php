@props([
    'title',
    'description',
])
<div class="flex w-full flex-col text-center mb-2">
    <flux:heading size="xl" class="!text-bridal-dark font-display !font-semibold">{{ $title }}</flux:heading>
    <flux:subheading class="!text-bridal-secondary mt-1">{{ $description }}</flux:subheading>
</div>
