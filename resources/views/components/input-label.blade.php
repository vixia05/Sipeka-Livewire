@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 min-w-fit']) }}>
    {{ $value ?? $slot }}
</label>
