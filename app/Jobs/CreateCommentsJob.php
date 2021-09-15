<?php

namespace App\Jobs;

use App\Consumer\CommentsConsumer;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCommentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $post = Post::inRandomOrder()->first();
        $this->getFromAPI($post);
    }

    private function makeComment($id, $name, $email, $body)
    {
        return [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'body' => $body,
        ];
    }

    private function createCommentInPost($post, $comment)
    {
        $post->comments()->create($comment);
    }

    private function getFromAPI($post)
    {
        $alreadyComments = $post->comments;
        $apiComments = (new CommentsConsumer)->fromPost($post->id);
        $apiComments->whereIn('postId', $alreadyComments->pluck('id')->toArray());

    }
}
