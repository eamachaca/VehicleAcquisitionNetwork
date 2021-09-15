<?php

namespace App\Consumer;

class CommentsConsumer extends BaseConsumer
{
    protected $url = 'comments';

    public function all()
    {
        return collect(parent::get());
    }

    public function only(int $id)
    {
        return collect(parent::get($id));
    }

    public function fromPost($postId)
    {
        return collect(parent::get("$postId/comments"));
    }
}
