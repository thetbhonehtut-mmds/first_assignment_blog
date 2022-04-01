<?php

namespace App\Http\Controllers;

use App\Facades\PostFacade;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\ReactionResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostResource::collection(Post::orderBy('created_at', 'desc')->paginate());
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryResource::collection(Category::orderBy('name', 'desc')->get());
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = PostFacade::store($request);

        return redirect("/posts/$post->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        if (!Auth::user()) {
            if (!$post->is_published) {
                return redirect('/');
            } else {
                $reaction = new ReactionResource(Reaction::where('post_id', $post->id)->get());
            }
        } else {
            if (!$post->is_published and $post->user_id != Auth::user()->id) {
                return redirect('/');
            } else {
                $reaction = new ReactionResource(Reaction::where('post_id', $post->id)->where('user_id', Auth::user()->id)->get());
            }
        }
        return view('posts.show', compact('post', 'reaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function handleReaction(Post $post, User $user)
    {

        $post_id = $post->id;
        $user_id = Auth::user()->id;
        $like_count = $post->like_count;

        $reaction = Reaction::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        if ($reaction == 0) {
            $reaction = new ReactionResource(Reaction::firstOrCreate(['post_id' => $post_id, 'user_id' => $user_id]));
            $post->update(['like_count' => $like_count += 1]);
        } else {
            $post->update(['like_count' => $like_count -= 1]);
        }

        return redirect("posts/$post_id");
    }
}
