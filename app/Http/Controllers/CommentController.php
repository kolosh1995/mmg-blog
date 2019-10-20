<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentStoreRequest;

class CommentController extends Controller
{
    /**
     * @param CommentStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentStoreRequest $request)
    {
        $author           = $request->get('author');
        $content          = $request->get('content');
        $commentable_id   = $request->get('commentable_id');
        $commentable_type = $request->get('commentable_type');

        $comment = new Comment([
            'author'           => $author,
            'content'          => $content,
            'commentable_id'   => $commentable_id,
            'commentable_type' => $commentable_type,
        ]);

        $comment->save();

        return response()->json(['comment' => $comment], 200);
    }
}
