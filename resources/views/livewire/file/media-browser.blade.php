<div class="px-2 py-4">
    <ul class="list-reset flex border-b">
        <li class="-mb-px mr-1">
          <a class="bg-white inline-block py-2 px-4 text-blue font-semibold @if(!$showingUploadForm) border-l border-t border-r rounded-t @endif" href="#"
           wire:click.prevent="$set('showingUploadForm', false)">Media Browser</a>
        </li>
        <li class="mr-1">
          <a class="bg-white inline-block py-2 px-4 text-blue font-semibold @if($showingUploadForm) border-l border-t border-r rounded-t @endif" href="#"
           wire:click.prevent="$set('showingUploadForm', true)">Upload New Media</a>
        </li>
    </ul>

    <div class="@if(!$showingUploadForm) hidden @endif" class="m-4">
        <x-input.filepond wire:model="state.upload" multiple />
        <x-jet-input-error for="upload" class="mt-2" />
        <div class="mb-3">
            <div class="mx-3">
                <x-jet-label for="media-caption" value="{{ __('Caption') }}" />
                <x-jet-input id="media-caption" type="text" class="mt-1 block w-full" placeholder="Enter caption" wire:model.defer="state.caption" />
                <x-jet-input-error for="caption" class="mt-2" />
            </div>
            <div class="mx-3">
                <x-jet-label for="media-description" value="{{ __('Description') }}" />
                <textarea id="media-description" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Enter description" wire:model.defer="state.description"></textarea>
                <x-jet-input-error for="description" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="@if($showingUploadForm) hidden  @endif">
        <div class="flex flex-wrap items-center justify-between mx-3 mt-4">
            <div>
                <button class="pr-3 mr-2">
                    <svg class="text-gray-700 h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                </button>
                <button class="pr-3 mr-2">
                    <svg class="text-gray-700 h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </button>
            </div>
            <div class="flex-grow mt-4 md:mt-0 w-full md:w-auto">
                <input type="search" placeholder="Search media" class="w-full px-3 h-12 border-2 rounded-lg">
            </div>
        </div>
        <div class="flex flex-wrap justify-between w-full mt-4">
            <div class="w-full md:w-9/12">
                <ul class="flex flex-wrap justify-start items-center">
                    @foreach ($this->medias() as $media)
                        <li class="m-1">
                            <button type="button" wire:click.prevent="$emit('selectingMedia', {{ $media->id }})">
                                <img src="{{ $media->getMediaLink() }}" class="h-32" alt="{{ $media->name }}">
                                {{ $media->getMediaLink() }}
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div>
                    {{ $this->medias()->links() }}
                </div>
            </div>
            @if ($selectedMediaObject)
                <div class="hidden md:block md:w-3/12 pl-3 border-gray-200 border-l-2">
                    <div class="text-gray-500">
                        Media Details
                    </div>
                    <div class="hidden sm:block">
                        <div class="py-3">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div>
                            <img src="{{ $selectedMediaObject->getMediaLink() }}" alt="{{ $selectedMediaObject->name }}">
                        </div>
                    </div>
                    <div class="pt-3">
                        <form wire:submit.prevent="updateMediaObject">
                            <table class="table-auto">
                                <tbody>
                                <tr>
                                    <td class="text-sm">Name: </td>
                                    <td class="text-sm text-gray-600">{{ $selectedMediaObject->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-md">Caption: </td>
                                    <td class="text-md text-gray-600">
                                        <x-jet-input id="caption" type="text" class="mt-1 block" wire:model.defer="selectedMediaObjectState.caption" />
                                        <x-jet-input-error for="caption" class="mt-2" />
                                    </td>
                                </tr>
                                <tr class="text-md">
                                    <td>Details: </td>
                                    <td class="text-md text-gray-600">
                                        <textarea id="description" type="text" class="form-input rounded-md shadow-sm mt-1 block" wire:model.defer="selectedMediaObjectState.description"></textarea>
                                        <x-jet-input-error for="description" class="mt-2" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <x-jet-button class="mt-1 w-full inline-block">
                                            {{ __('Update') }}
                                        </x-jet-button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
