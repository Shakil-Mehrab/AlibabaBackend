
<x-jet-form-section submit="store"  class="w-full">
    <x-slot name="title">
        {{ __('Tag Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Tag is one of the default taxonomies in Website. You can use categories to sort and group your posts into different sections. For example, a news website might have categories for their articles filed under News, Opinion, Weather, and Sports.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" placeholder="Enter name" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Slug -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="slug" value="{{ __('Slug') }}" />
            <x-jet-input id="slug" type="text" class="mt-1 block w-full" placeholder="Tag slug" wire:model.defer="state.slug" />
            <x-jet-input-error for="slug" class="mt-2" />
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
