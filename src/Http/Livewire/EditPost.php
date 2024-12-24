<?php

namespace FilamentBlogy\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use FilamentBlogy\Models\Post;

class EditPost extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $content;
    public $newFeaturedImage;
    public $metaTitle;
    public $metaDescription;
    public $metaKeywords;
    public $status;

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required',
        'newFeaturedImage' => 'nullable|image|max:1024',
        'metaTitle' => 'nullable|max:60',
        'metaDescription' => 'nullable|max:160',
        'metaKeywords' => 'nullable',
        'status' => 'required|in:draft,published'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->metaTitle = $post->meta_title;
        $this->metaDescription = $post->meta_description;
        $this->metaKeywords = $post->meta_keywords;
        $this->status = $post->status;
    }

    public function update()
    {
        $this->validate();

        if ($this->newFeaturedImage) {
            $featuredImage = $this->newFeaturedImage->store('featured-images', 'public');
            $this->post->featured_image = $featuredImage;
        }

        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'meta_title' => $this->metaTitle,
            'meta_description' => $this->metaDescription,
            'meta_keywords' => $this->metaKeywords,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Post updated successfully.');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('laravel-blog::livewire.edit-post');
    }
}
