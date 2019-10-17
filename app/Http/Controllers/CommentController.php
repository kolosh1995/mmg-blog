<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param CommentStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentStoreRequest $request)
    {
        $author  = $request->get('author');
        $content = $request->get('content');
        $post_id = $request->get('post_id');

        $comment = new Comment([
            'author'  => $author,
            'content' => $content,
            'post_id' => $post_id,
        ]);

        $comment->save();

        return response()->json(['comment' => $comment], 200);
    }
}
