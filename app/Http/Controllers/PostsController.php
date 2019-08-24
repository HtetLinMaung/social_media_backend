<?php

namespace App\Http\Controllers;
use Auth;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
// resources
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostCollection;

class PostsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PostCollection(Post::paginate(10));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post([
            'description' => $request->get('description'),
        ]);
        
        $post->user_id = $request->user()->id;
        
        $post->save();
        
        return response([
           'data' => new PostResource($post)
        ], Response::HTTP_CREATED);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->isUserPost($post);
        $post->update($request->all());
        return response([
            'data' => new PostResource($post)
        ], Response::HTTP_CREATED);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->isUserPost($post);
        $post->delete();
        return response([
            null
        ], Response::HTTP_NO_CONTENT);
    }
    
   
}
