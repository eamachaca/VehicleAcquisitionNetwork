<?php

namespace App\Consumer;

class PostConsumer extends BaseConsumer
{
    protected $url = 'posts';

    public function all()
    {
        return collect(parent::get());
    }

    public function only(int $id)
    {
        return collect(parent::get($id));
    }

    public function comments($postId)
    {
        return collect(parent::get("$postId/comments"));
    }
}
