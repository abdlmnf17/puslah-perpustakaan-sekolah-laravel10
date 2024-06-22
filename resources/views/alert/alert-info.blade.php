@if (session('success') || session('error'))
<div class="mb-4">
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert-error type="error" :message="session('error')" />
    @endif
</div>
@endif
