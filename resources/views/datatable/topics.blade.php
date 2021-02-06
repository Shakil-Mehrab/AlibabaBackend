<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Topics Datatable') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <livewire:datatable model="{{ $model }}" exclude="updated_at" paginate="20" />
        </div>
    </div>
</x-app-layout>
