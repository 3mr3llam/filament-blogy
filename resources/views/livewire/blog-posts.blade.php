<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        <input 
            wire:model.debounce.300ms="search" 
            type="text" 
            placeholder="Search posts..." 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
        >
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                @if($post->featured_image)
                    <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @endif
                
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">
                        <a href="{{ route('blog.posts.show', $post) }}" class="hover:text-indigo-600">
                            {{ $post->title }}
                        </a>
                    </h2>
                    
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit(strip_tags($post->content), 150) }}
                    </p>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>{{ $post->published_at->format('M d, Y') }}</span>
                        <a href="{{ route('blog.posts.show', $post) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                            Read more →
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>
