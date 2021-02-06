<div>
    <div class="flex flex-wrap items-center justify-between w-full">
        @foreach ($this->tags() as $tag)
            <div class="w-full md:w-4/12">
                <div class="flex flex-wrap items-center justify-between w-full m-1 border-2 border-gray-200 p-2 pb-1 group bg-white">
                    <div class="ml-2">
                        <h2 class="font-bold leading-none">
                            {{ $tag->name }}
                        </h2>

                        <div class="flex items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-600 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-sm text-gray-600">
                                {{ $tag->created_at->toFormattedDateString() }}
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <div class="flext items-center">
                                <a href="#" class="inline-block border text-sm border-blue-400 text-blue-400 font-semibold rounded-lg px-2 py-1 bg-white">
                                    View tag
                                </a>
                                <a href="{{ route('tag.edit', $tag) }}" class="inline-block border text-sm border-blue-400 text-blue-400 font-semibold rounded-lg px-2 py-1 bg-white">
                                    Edit tag
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $this->tags()->links() }}
</div>
