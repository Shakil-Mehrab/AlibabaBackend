<div>
    <div class="flex justify-between items-center mb-4">
        <div class="flex-col">
            <input type="search" name="query" id="query" class="form-input rounded-md shadow-sm p-2 w-full" placeholder="Search" wire:model="query">
        </div>

        <div class="flex justify-between items-center">
            <div>
                <div class="flex items-center ml-4">
                    <label for="paginate" class="whitespace-no-wrap inline-block text-sm font-medium text-gray-700 mr-3">Per-Page</label>
                    <select id="paginate" name="paginate" class="mt-1 block p-2 py-1 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="paginate">
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <div class="ml-2">
                @if (count($checked))
                    <x-jet-dropdown align="right">
                        <x-slot name="trigger">
                            <button class="flex items-center mt-1 p-2 py-1 border border-gray-300 bg-white rounded-md shadow-sm hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>With checked ({{ count($checked) }})</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-jet-dropdown-link href="#"  wire:click="deleteChecked">
                                {{ __('Delete') }}
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                @endif
            </div>
        </div>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <svg class="h-4 w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </th>
                @foreach ($columns as $column)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $column }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($this->records() as $record)
                <tr class="@if ($this->isChecked($record)) table-primary @endif" class="bg-white hover:bg-gray-300">
                    <td class="px-6 py-4">
                        <input type="checkbox" value="{{ $record->id }}" wire:model="checked">
                    </td>
                    @foreach ($columns as $column)
                        <td class="px-6 py-4">
                            {{ $record->{$column} }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $this->records()->links() }}
</div>
