<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <form wire:submit.prevent="save" class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" wire:model="title" id="title" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <div wire:ignore>
                <textarea wire:model="content" id="content" rows="8" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
            </div>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="featuredImage" class="block text-sm font-medium text-gray-700">Featured Image</label>
            <input type="file" wire:model="featuredImage" id="featuredImage" 
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('featuredImage') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="bg-gray-50 p-6 rounded-lg space-y-4">
            <h3 class="text-lg font-medium text-gray-900">SEO Settings</h3>
            
            <div>
                <label for="metaTitle" class="block text-sm font-medium text-gray-700">Meta Title</label>
                <input type="text" wire:model="metaTitle" id="metaTitle" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('metaTitle') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="metaDescription" class="block text-sm font-medium text-gray-700">Meta Description</label>
                <textarea wire:model="metaDescription" id="metaDescription" rows="3" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                @error('metaDescription') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="metaKeywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                <input type="text" wire:model="metaKeywords" id="metaKeywords" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('metaKeywords') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select wire:model="status" id="status" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save Post
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('content', editor.getData());
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
