<div>
    <div
        class="flex flex-wrap items-center justify-between w-full border-b-2 border-t-2 border-gray-200 p-4 py-2 bg-white">
        <div class="flex flex-wrap items-between">
            {{-- <div class="flex items-center justify-end mr-3">
                <select id="action" name="action" class="mt-1 block p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>With Selected (10)</option>
                    <option>20</option>
                    <option>50</option>
                </select>
            </div> --}}

            <div class="flex items-center justify-end">
                <label for="paginate"
                    class="whitespace-no-wrap inline-block text-sm font-medium text-gray-700 mr-3">Per-Page</label>
                <select id="paginate" name="paginate"
                    class="mt-1 block p-2 py-1 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    wire:model="paginate">
                    @foreach (collect([10, 20, 50, 100]) as $perPage)
                        <option value="{{ $perPage }}">{{ $perPage }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="w-full md:w-4/12 md:mt-0 mt-2 flex items-center">
            <input class="form-input rounded-md shadow-sm p-2 w-full" placeholder="Search" />
            <x-jet-button type="button" class="ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </x-jet-button>
        </div>
    </div>
    @foreach ($this->products() as $article)
        <div class="border-b-2 border-t-2 border-gray-200 p-4 pb-2 flex justify-between group bg-white">
            <img class="h-15 w-20 mr-4" src="https://picsum.photos/id/1/15/20" alt="Thumbnail">

            <div class="flex flex-wrap items-center justify-between w-full">
                <div class="w-full md:w-4/12 mb-2">
                    <h2 class="font-bold leading-none">
                        {{ $article->name }}
                    </h2>
                    <div class="flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-4 h-4 text-gray-600 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-gray-600">
                            {{ $article->created_at->toDayDateTimeString() }}
                        </div>
                    </div>

                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-4 h-4 text-gray-600 mr-1">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="text-sm text-gray-600">
                            {{ $article->user->name }}
                        </div>
                    </div>
                </div>

                @if ($article->categories->isNotEmpty())
                    <div class="w-full md:w-4/12 mb-2">
                        Category:
                        @foreach ($article->categories as $category)
                            <a href="#"
                                class="inline-block text-gray-600 border-2 border-gray-300 px-3 py-1 rounded-lg mr-2 bg-white">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                @endif



                <div class="mb-2">
                    <div class="opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <div class="flext items-center">
                            <a href="#"
                                class="inline-block border-2 border-blue-400 text-blue-400 font-bold rounded-lg px-3 py-2 bg-white">
                                View Article
                            </a>
                            <a href="{{ route('article.edit', $article) }}"
                                class="inline-block border-2 border-blue-400 text-blue-400 font-bold rounded-lg px-3 py-2 bg-white">
                                Edit Article
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="mt-2">
        {{ $this->products()->links() }}
    </div>
</div>
