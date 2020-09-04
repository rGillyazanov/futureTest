<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view("welcome", ["comments" => $comments]);
    }

    public function send(CommentRequest $request)
    {
        $comment = new Comment($request->all());
        $comment->save();

        return redirect()->back()->with(["success" => "Сообщение успешно отправлено"]);
    }
}
