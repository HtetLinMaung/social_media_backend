<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\InnerComment;
use App\Http\Resources\InnerComment as InnerCommentResource;
use App\Http\Requests;

class InnerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $innerComment = InnerComment::all();

        return InnerCommentResource::collection($innerComment);
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
        $inner_comment = $request->isMethod('put') ? InnerComment::findOrFail($request->inner_comment_id) : new InnerComment;

        $inner_comment->id = $request->input('inner_comment_id');
        $inner_comment->description = $request->input('description');
        $inner_comment->user_id = $request->input('comment_id');
        $inner_comment->user_id = $request->input('user_id');

        if ($comment->save()) {
            return new CommentResource($inner_comment);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $innerComment = InnerComment::FindOrFail($id);

        return new InnerCommentResource($innerComment);
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
        $innerComment = InnerComment::FindOrFail($id);

        if($innerComment->delete()) {
            return new InnerCommentResource($id);
        }
    }
}
