<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Topic') }}
            </h2>
            <a href="{{ route('topic.index') }}" class="inline-block text-gray-600 border border-gray-300 px-3 py-1 shadow-md rounded-md bg-white">
                Topics
            </a>
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <livewire:topic.topic-form />
        </div>
    </div>
</x-app-layout>
