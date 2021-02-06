<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product') }}
            </h2>
            <a href="{{ route('product.create') }}"
                class="inline-block text-gray-600 border border-gray-300 px-3 py-1 shadow-md rounded-md bg-white">
                Create New Product
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto py-2">
        <livewire:product.table paginate="20" />
    </div>
</x-app-layout>
