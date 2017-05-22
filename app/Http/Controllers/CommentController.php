<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {

        $this->validate($request, [
            'article' => 'required|integer',
            'content' => 'required|max:65535',
        ]);

        $article = Article::find($request->input('article'));
        if (!$article) {
            throw new \Exception('文章不存在');
        }

        $comment = new Comment;
        $comment->article_id = $article->id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->route('article.detail', ['id' => $article->id]);
    }
}
