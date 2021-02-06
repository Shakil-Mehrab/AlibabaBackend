@props(['open-region' => false])

<div class="m-1 mr-0 p-2 pb-1 pr-0 border-2 border-gray-200 bg-white">
    <div class="flex flex-wrap items-center justify-between w-full">
        <div class="ml-2">
            <h2 class="font-bold leading-none">
                {{ $region->name }}
            </h2>

            <div class="flex items-center mt-1">
                <div class="text-sm text-gray-600">
                    {{ $region->slug }}
                </div>
            </div>
        </div>

        <div class="m-1">
            <div class="opacity-100">
                <div class="flext items-center">
                    <a href="#"  wire:click="$emit('postAdded')" class="inline-block border text-sm border-blue-400 text-blue-400 font-semibold rounded-lg px-2 py-1 bg-white">
                        View {{ $region->name }}
                    </a>
                    <a href="{{ route('region.edit', $region) }}" class="inline-block border text-sm border-blue-400 text-blue-400 font-semibold rounded-lg px-2 py-1 bg-white">
                        Edit {{ $region->name }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if($region->children->count())
        <div wire:ignore x-data="{ opened_tab: false }">
            <button x-on:click.prevent="opened_tab = !opened_tab" :class="{ 'bg-gray-300': opened_tab }" class="flex w-full items-center justify-center p-2 px-10 hover:bg-gray-200 rounded-md shadow-sm">
                <svg x-show="opened_tab" x-cloak class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
                <svg x-show="!opened_tab" class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="opened_tab" x-cloak>
                @foreach ($region->children as $childOne)
                    <x-region.region-object :region="$childOne" />
                @endforeach
            </div>
        </div>
    @endif
</div>
