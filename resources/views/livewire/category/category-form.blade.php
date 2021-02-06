
<x-jet-form-section submit="store"  class="w-full">
    <x-slot name="title">
        {{ __('Category Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Category is one of the default taxonomies in Website. You can use categories to sort and group your posts into different sections. For example, a news website might have categories for their articles filed under News, Opinion, Weather, and Sports.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" placeholder="Enter name" wire:model="state.name" autofocus
            wire:change="nameChanged($event.target.value)" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Slug -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="slug" value="{{ __('Slug') }}" />
            <div class="flex justify-between items-center">
                <x-jet-input id="slug" :disabled="!$enableSlugInput" type="text" class="mt-1 block w-full" placeholder="Enter slug" wire:model.defer="state.slug" />
                @if ($enableSlugInput)
                    <button class="ml-2" wire:click.prevent="$emit('clickEditButton')" title="Confirm Changes">
                        <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <button class="ml-2" wire:click.prevent="changeEditInput" title="Cancel">
                        <svg class="w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                @else
                    @if (optional($state)['slug'])
                        <button class="ml-2" wire:click.prevent="$emit('clickEditButton')" title="Modify">
                            <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                    @endif
                    @if ($slugManuallyChanged)
                        <button class="ml-2" wire:click.prevent="resetSlugInput" title="Reset">
                            <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                            </svg>
                        </button>
                    @endif
                @endif
            </div>
            <x-jet-input-error for="slug" class="mt-2" />
        </div>

        <!-- Status -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="live" value="{{ __('Status') }}" />
            <label for="status" class="flex items-center mt-1 w-full cursor-pointer">
                <div class="relative">
                  <input id="status" type="checkbox" class="hidden" wire:model="state.live" />
                  <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                  <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
                </div>

                <div  class="ml-3 text-gray-700 font-medium">
                  Live
                </div>
              </label>
            <x-jet-input-error for="live" class="mt-2" />
        </div>

        <!-- Parent Category -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="parent_id" value="{{ __('Parent') }}" />
            <x-input.select class="mt-1 block w-full" placeholder="None" wire:model="state.parent_id">
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @endforeach
            </x-input.select>
            <x-jet-input-error for="parent_id" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Changes Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
