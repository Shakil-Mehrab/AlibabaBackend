<x-jet-form-section submit="store"  class="w-full">
    <x-slot name="title">
        {{ __('Region Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Region is one of the default taxonomies in Website.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" placeholder="Region Name" wire:model.defer="state.name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Slug -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="slug" value="{{ __('Slug') }}" />
            <x-jet-input id="slug" type="text" class="mt-1 block w-full" placeholder="Region Slug" wire:model.defer="state.slug" />
            <x-jet-input-error for="slug" class="mt-2" />
        </div>

        <!-- Latitude -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="lat" value="{{ __('Latitude') }}" />
            <x-jet-input id="lat" type="text" class="mt-1 block w-full" placeholder="Region Latitude" wire:model.defer="state.lat" />
            <x-jet-input-error for="lat" class="mt-2" />
        </div>

        <!-- Longitude -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="lng" value="{{ __('Longitude') }}" />
            <x-jet-input id="lng" type="text" class="mt-1 block w-full" placeholder="Region Longitude" wire:model.defer="state.lng" />
            <x-jet-input-error for="lng" class="mt-2" />
        </div>

        <!-- Parent Region -->
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
