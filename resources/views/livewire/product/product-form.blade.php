<x-jet-form-section submit="store" class="w-full">
    <x-slot name="title">
        {{ __('Product Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Input new article information into this form.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Kicker -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="kicker" value="{{ __('Kicker (If any)') }}" />
            <x-jet-input id="kicker" type="text" class="mt-1 block w-full" placeholder="Event Keyword"
                wire:model.defer="state.kicker" />
            <x-jet-input-error for="kicker" class="mt-2" />
        </div>

        <!-- Title -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" placeholder="Enter Title"
                wire:model.defer="state.title" wire:change="titleChanged($event.target.value)" />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <!-- Slug -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="slug" value="{{ __('Slug') }}" />
            <x-jet-input id="slug" type="text" class="mt-1 block w-full" placeholder="Enter Slug"
                wire:model.defer="state.slug" />
            <x-jet-input-error for="slug" class="mt-2" />
        </div>

        <!-- Body -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="body" value="{{ __('Body') }}" />
            <x-input.rich-text wire:model.lazy="state.body" id="body" :initialValue="optional($state)['body']" />
            <x-jet-input-error for="body" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="body" value="{{ __('Featured Thumbnail') }}" />
            <x-jet-secondary-button class="mt-1" wire:click.prevent="$set('showingMediaModal', true)">
                {{ __('Upload or Select a Image') }}
            </x-jet-secondary-button>
        </div>

        <!-- Category -->
        <div class="col-span-6 sm:col-span-6">
            <legend class="block font-medium text-sm text-gray-700">Category</legend>
            <div class="flex flex-wrap mt-1">
                @foreach ($this->categories() as $category)
                    <div class="flex w-full border border-gray-300 mb-1 p-1 rounded-md">
                        <div class="mr-2 text-lg">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" value="{{ $category->id }}"
                                    wire:model="state.categories.{{ $category->id }}">
                                <span class="ml-1 text-lg font-bold text-gray-600">
                                    {{ $category->name }}
                                </span>
                            </label>
                        </div>
                        @if ($category->children->count())
                            <div class="flex flex-wrap items-center">
                                @foreach ($category->children as $child)
                                    <div class="mr-2 text-lg">
                                        <label class="flex items-center">
                                            <input type="checkbox" class="form-checkbox" value="{{ $child->id }}"
                                                wire:model="state.categories.{{ $child->id }}">
                                            <span class="ml-1 text-lg text-gray-600">{{ $child->name }}</span>
                                        </label>
                                    </div>
                                    @if ($child->children->count())
                                        @foreach ($child->children as $subChild)
                                            <div class="mr-2 text-lg">
                                                <label class="flex items-center">
                                                    <input type="checkbox" class="form-checkbox"
                                                        value="{{ $subChild->id }}"
                                                        wire:model="state.categories.{{ $subChild->id }}">
                                                    <span
                                                        class="ml-1 text-lg text-gray-600">{{ $subChild->name }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <x-jet-input-error for="categories" class="mt-2" />
        </div>

        <!-- Topics -->
        {{-- <div class="col-span-6 sm:col-span-6">
            <legend class="block font-medium text-sm text-gray-700">Topics</legend>
            <div class="flex flex-wrap items-center mt-1">
                @foreach ($this->topics() as $topic)
                    <div class="mr-2 text-lg">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" value="{{ $topic->id }}"
                                wire:model="state.topics.{{ $topic->id }}">
                            <span class="ml-1 text-lg text-gray-600">{{ $topic->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
            <x-jet-input-error for="topics" class="mt-2" />
        </div> --}}
        <!-- Tags -->

        {{-- @if (!$article)
            <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="tags" value="{{ __('Tags') }}" />
                <x-input.select2 multiple>
                    @foreach ($this->tags() as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </x-input.select2>
                <x-jet-input-error for="tags" class="mt-2" />
            </div>
        @endif --}}

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="body" value="{{ __('Choose Region') }}" />
            <livewire:search.search-dropdown />
        </div>

        <x-jet-modal wire:model="showingRegionSelectionModal">
            <div class="px-6 py-4 bg-white">
                @livewire('search.search-dropdown')
            </div>
            <div class="px-6 py-4 bg-gray-100 text-right">
                <x-jet-secondary-button class="ml-2" wire:click.prevent="$set('showingRegionSelectionModal', false)">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button>
                    {{ __('Select') }}
                </x-jet-button>
            </div>
        </x-jet-modal>

        <x-jet-modal wire:model="showingMediaModal" maxWidth="full">
            <livewire:file.media-browser />
            <div class="px-6 py-4 bg-gray-100 text-right">
                <x-jet-secondary-button class="ml-2" wire:click.prevent="$set('showingMediaModal', false)">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button>
                    {{ __('Select') }}
                </x-jet-button>
            </div>
        </x-jet-modal>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>


</x-jet-form-section>
