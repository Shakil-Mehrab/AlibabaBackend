<div class="flex flex-wrap items-center justify-between w-full">
    @foreach ($this->categories() as $category)
        <div class="w-full md:w-6/12">
            <div class="m-1 border-2 border-gray-200 p-2 pb-1 flex justify-between items-center group @if(!$category->live) bg-red-100 @else bg-white @endif">
                <img class="h-12 w-12 object-cover" src="{{ $category->getAvatarUrl() }}" alt="{{ $category->name }}">
                <div class="ml-5 flex flex-wrap items-center justify-between w-full">
                    <div class="w-full md:w-4/12 mb-2">
                        <h2 class="font-bold leading-none">
                            {{ $category->name }}
                        </h2>

                        <div class="flex items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-600 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-sm text-gray-600">
                                {{ $category->created_at->toFormattedDateString() }}
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <div class="flext items-center">
                                <a href="#" class="inline-block border text-sm border-blue-400 text-blue-400 font-semibold rounded-lg px-2 py-1 bg-white">
                                    View Category
                                </a>
                                <a href="{{ route('category.edit', $category) }}" class="inline-block border text-sm border-blue-400 text-blue-400 font-semibold rounded-lg px-2 py-1 bg-white">
                                    Edit Category
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

