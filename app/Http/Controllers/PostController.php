<?php
    
namespace App\Http\Controllers;
    
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
    
class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::orderBy('id', 'ASC')->paginate(5);
          
        return view('posts.index', compact('posts'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(PostStoreRequest $request)
    {   
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }
    
        Post::create($validated);

        session()->flash('success', 'Post created successfully.');
        return redirect()->route('posts.index');
    }
 
    public function show(Post $post): View
    {
        session()->flash('info', 'You are viewing the post details.');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('posts.edit',compact('post'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
         $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
        $validated['image'] = $request->file('image')->store('posts', 'public');
    }

    $post->update($validated);

        session()->flash('warning', 'Post updated successfully.');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('error', 'Post deleted successfully.');
        return redirect()->route('posts.index');
    }
}