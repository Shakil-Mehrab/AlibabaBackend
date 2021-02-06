<div class="relative" x-data="{ isVisible: true }" @click.away="isVisible = false">
    <x-jet-input
        type="text"
        class="mt-1 block w-full"
        placeholder="Search"
        wire:model.debounce.300ms="query"
        @focus="isVisible = true"
    />

    <div class="absolute top-0 right-2 flex items-center h-full ml-2">
        <svg class="text-gray-500 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>

    @if(strlen($query) > 0)
        <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2" x-show.transition.opacity.duration.700="isVisible">
            <ul>
                @if($this->records()->isEmpty())
                    <li class="block text-white hover:bg-gray-700 p-3 border-b border-gray-400">
                        No records found.
                    </li>
                @endif
                @foreach ($this->records() as $item)
                    <li class="border-b border-gray-400">
                        <a href="#" class="block text-white hover:bg-gray-700 p-3"
                            @click.prevent=""
                        >
                            {{ $item->name }}
                            @if($firstParent = $item->parent)
                                <span>
                                    , {{ $firstParent->name }}
                                </span>
                            @endif
                            @if($secondParent = $firstParent->parent)
                                <span>
                                    , {{ $secondParent->name }}
                                </span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
