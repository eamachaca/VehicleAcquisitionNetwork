<?php

namespace App\Consumer;

class UserConsumer extends BaseConsumer
{
    protected $url = 'users';

    public function all()
    {
        return collect(parent::get());
    }

    public function only(int $id)
    {
        return collect(parent::get($id));
    }

    public function posts($userId)
    {
        return collect(parent::get("$userId/posts"));
    }
}
