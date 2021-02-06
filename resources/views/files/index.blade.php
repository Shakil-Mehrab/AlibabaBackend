<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Files') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <livewire:file.file-browser :object="$object" :ancestors="$ancestors" />
            </div>
        </div>
    </div>
</x-app-layout>
