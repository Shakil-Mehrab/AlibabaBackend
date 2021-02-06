
<x-jet-form-section submit="store"  class="w-full">
    <x-slot name="title">
        {{ __('Topic Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Topic is one of the default taxonomies in Website. You can use categories to sort and group your posts into different sections. For example, a news website might have categories for their articles filed under News, Opinion, Weather, and Sports.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" placeholder="Topic name" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Slug -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="slug" value="{{ __('Slug') }}" />
            <x-jet-input id="slug" type="text" class="mt-1 block w-full" placeholder="Topic slug" wire:model.defer="state.slug" />
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
