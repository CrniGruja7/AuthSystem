<?php

namespace App\Services;

use App\Http\Requests\StoreRequest;
use App\Models\Post;
use PhpParser\Node\Expr\Cast\Bool_;

class AuthService {

    public function __construct() {
        
    }

    public function isAuthUser(Post $post)
    {
        if($post->user_id == auth()->user()->id){
            return true;
        } else {
            return false;
        }
    }
}