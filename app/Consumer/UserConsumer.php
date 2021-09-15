<?php

namespace App\Consumer;

class UserConsumer extends BaseConsumer
{
    protected $url = 'users';

    public function all()
    {
        return parent::get();
    }

    public function only(int $id)
    {
        return parent::get($id);
    }

    public function posts($userId)
    {
        return parent::get("$userId/posts");
    }
}
