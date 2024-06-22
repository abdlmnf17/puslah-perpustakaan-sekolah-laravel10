<!-- resources/views/components/label.blade.php -->
<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300']) }}>
    {{ $slot }}
</label>
