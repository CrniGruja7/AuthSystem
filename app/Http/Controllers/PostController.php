<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\AuthService;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    protected $authService;

    public function __construct(PostService $postService, AuthService $authService) {
        $this->postService = $postService;
        $this->authService = $authService;
    }

    public function index(){
        return response()->json(PostResource::collection(Post::all()));
    }

    public function store(StoreRequest $reqest) {
        return response()->json(new PostResource($this->postService->createPost($reqest)));
    }

    public function update(StoreRequest $request,$id){
        $post = $this->postService->getPost($id);
        
        if($this->authService->isAuthUser($post)){
            return response()->json(PostResource::make($this->postService->updatePost($request, $id)));
        }else{
            return response()->json([
                "status" => "error",
                "message" => "unautorize"
            ]);
        }
    }

    public function destroy(Post $post) 
    {
        if($this->authService->isAuthUser($post)){
            $this->postService->deletePost($post);
            return response()->json([
                "status" => "success",
                "message" => "Post deleted sucessfully",
                "data" => PostResource::make($post),
                ],200);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Unauthorized"
            ], 403);
        }
    }
}
