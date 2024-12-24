<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        @if($post->featured_image)
            <div class="w-full h-96 relative">
                <img src="{{ Storage::url($post->featured_image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-full object-cover">
            </div>
        @endif

        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $post->title }}</h1>
            <div class="mt-2 text-sm text-gray-500">
                Published {{ $post->published_at ? $post->published_at->diffForHumans() : 'Draft' }}
            </div>
        </div>

        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <div class="prose max-w-none">
                {!! $post->content !!}
            </div>
        </div>

        @if($post->meta_title || $post->meta_description || $post->meta_keywords)
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium text-gray-900">Meta Information</h3>
                @if($post->meta_title)
                    <div class="mt-3">
                        <h4 class="text-sm font-medium text-gray-500">Meta Title</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->meta_title }}</p>
                    </div>
                @endif

                @if($post->meta_description)
                    <div class="mt-3">
                        <h4 class="text-sm font-medium text-gray-500">Meta Description</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->meta_description }}</p>
                    </div>
                @endif

                @if($post->meta_keywords)
                    <div class="mt-3">
                        <h4 class="text-sm font-medium text-gray-500">Meta Keywords</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $post->meta_keywords }}</p>
                    </div>
                @endif
            </div>
        @endif

        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <div class="flex justify-between">
                <a href="{{ route('blog.posts.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back to Posts
                </a>
                @if(auth()->check())
                    <a href="{{ route('blog.posts.edit', $post) }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Edit Post
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>