<x-account-layout>
    <x-slot name="header">
        <div class="d-none d-lg-block">
            <h1 class="h2 text-white">{{ __('Payment methods')  }}</h1>
        </div>
    </x-slot>
    <br>
<div class="card">
    <h3 class="card-header">{{ __('My cards') }}</h3>
    
    <livewire:payments />
</div>
@push('styles')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
</x-account-layout>
