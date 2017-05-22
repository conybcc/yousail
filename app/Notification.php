<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $table = 'notification';

    /**
     * sendForComment
     * @param   $article
     * @param   $comment
     * @return
     */
    public static function sendForComment($article, $comment)
    {
        $notification = new Notification;

        $notification->user_id = $article->user_id;
        $notification->type = 'comment';
        $notification->source_id = $article->id;
        $notification->content = '您的文章有了新评论:' . substr($comment->content, 0, 50);

        $notification->save();
    }
}
