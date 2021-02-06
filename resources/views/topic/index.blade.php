<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Topics') }}
            </h2>
            <a href="{{ route('topic.create') }}" class="inline-block text-gray-600 border border-gray-300 px-3 py-1 shadow-md rounded-md bg-white">
                Create New Topic
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto py-2">
        <livewire:topic.topic-list paginate="24" />
    </div>
</x-app-layout>
