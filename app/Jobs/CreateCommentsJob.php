<?php

namespace App\Jobs;

use App\Consumer\CommentsConsumer;
use App\Models\Comment;
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
        //$this->getFromAPI($post); //if you want to create from API
        //Comment::factory()->for($post)->create(); // if you want to create by Relationships Factories
        $this->getFromFakerInJob($post); // if you want to create by Relationship only (ok, I'm using faker too, sry)

    }

    private function getFromFakerInJob($post)
    {
        $faker = \Faker\Factory::create();
        $this->createCommentInPost(
            $post,
            $this->makeComment(
                Comment::count() + 1,
                $faker->name,
                $faker->email,
                $faker->sentences(15)
            )
        );
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
        $comment = $apiComments->whereNotIn('postId', $alreadyComments->pluck('id')->toArray())->first();
        $this->createCommentInPost(
            $post,
            $this->makeComment(
                $comment->id,
                $comment->name,
                $comment->email,
                $comment->body
            )
        );
    }
}
