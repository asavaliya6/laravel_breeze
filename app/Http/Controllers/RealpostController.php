<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realuser;
use App\Models\Realpost;

class RealpostController extends Controller
{
    // Create Post for User
    public function store(Request $request, $userId)
    {
        $user = Realuser::findOrFail($userId);
        $post = $user->realposts()->create($request->only(['title', 'body']));

        return response()->json(['message' => 'Post created successfully!', 'post' => $post]);
    }

    // Get User's Posts
    public function getUserPosts($userId)
    {
        $user = Realuser::findOrFail($userId);
        return response()->json(['user' => $user, 'posts' => $user->realposts]);
    }

    // Get Post's User
    public function getPostUser($postId)
    {
        $post = Realpost::findOrFail($postId);
        return response()->json(['post' => $post, 'user' => $post->realuser]);
    }
}

