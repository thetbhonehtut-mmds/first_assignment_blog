<?php

namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostService{

    public function store(StorePostRequest $request){
        $post = Post::create($request->all());
        
        return $post;
    }

    public function handleReaction(){
        
    }
}