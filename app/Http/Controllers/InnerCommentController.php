<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InnerComment;
use App\Http\Resources\InnerComment as InnerCommentResource;

class InnerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return InnerCommentResource::collection(InnerComment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inner_comment = new InnerComment;
        $inner_comment->description = $request->input('description');
        $inner_comment->user_id = $request->user()->id;
        $inner_comment->comment_id = $request->input('comment_id');
         if($inner_comment->save()){
        return new InnerCommentResource($inner_comment);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $inner_comment = InnerComment::findOrFail($id);

        return new InnerCommentResource($inner_comment); 
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
    public function update(Request $request,InnnerComment $inner_comment)
    {
        //
        if($request->user()->id !== $inner_comment->user_id) {
            return response()->json(['error' => 'You can only edit your comments']);
        }
        $inner_comment->update($request->only(['description']));

        return new InnerCommentResource($inner_comment);
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
        $inner_comment = InnerComment::findOrFail($id);
        if($inner_comment->delete()) {
            return new InnerCommentResource($inner_comment);
        }
    }
}
