<?php

namespace Vendor\LaravelBlog\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Vendor\LaravelBlog\Models\Post;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $featuredImage;
    public $metaTitle;
    public $metaDescription;
    public $metaKeywords;
    public $status = 'draft';

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required',
        'featuredImage' => 'nullable|image|max:1024',
        'metaTitle' => 'nullable|max:60',
        'metaDescription' => 'nullable|max:160',
        'metaKeywords' => 'nullable',
        'status' => 'required|in:draft,published'
    ];

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'status' => $this->status,
            'published_at' => $this->status === 'published' ? now() : null,
        ]);

        if ($this->featuredImage) {
            $path = $this->featuredImage->store('blog-images', 'public');
            $post->update(['featured_image' => $path]);
        }

        $post->meta()->create([
            'meta_title' => $this->metaTitle ?? $this->title,
            'meta_description' => $this->metaDescription,
            'meta_keywords' => $this->metaKeywords,
        ]);

        session()->flash('message', 'Post created successfully!');
        return redirect()->route('blog.posts.index');
    }

    public function render()
    {
        return view('laravel-blog::livewire.create-post');
    }
}
