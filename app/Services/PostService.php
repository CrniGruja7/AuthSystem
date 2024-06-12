<?php

namespace App\Services;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostService {
    protected $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function createPost(StoreRequest $reqest) {
        return Post::create([
            "title" => $reqest->title,
            "content" => $reqest->content,
            "user_id" => auth()->user()->id
        ]);
    }

    public function updatePost($request, $id) {
        $post = $this->getPost($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        
        return $post;
    }

    public function getPost($id) {
        return Post::where('id', $id)->firstOrFail();
    }

    public function deletePost($post) {
        return $post->delete();

    }
}