<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Article;
use App\Notification;

class NotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        $comment = $event->comment;
        $article = Article::find($comment->article_id);

        if ($article->user_id == $comment->user_id) {
            return true;
        }

        Notification::sendForComment($article, $comment);
    }
}
