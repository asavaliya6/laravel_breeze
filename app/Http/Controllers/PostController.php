<?php
    
namespace App\Http\Controllers;
    
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
    
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::latest()->paginate(5);
          
        return view('posts.index', compact('posts'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request): RedirectResponse
    {   
        Post::create($request->validated());
           
        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('posts.show',compact('post'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('posts.edit',compact('post'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());
          
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
           
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}