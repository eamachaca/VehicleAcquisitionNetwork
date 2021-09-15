<?php

namespace App\Console\Commands;

use App\Consumer\PostConsumer;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;

class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vehicles:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all Posts from API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (User::count() == 0)
            $this->info("Users hasn't been created.");
        else {
            if (Post::count() > 0)
                $this->info('Posts has been created.');
            else {
                $posts = (new PostConsumer)->all()->map(function ($post) {
                    return ['id' => $post->id, 'title' => $post->title, 'body' => $post->body, 'user_id' => $post->userId];
                });
                Post::insert($posts->toArray());
                $this->info('Post Created Successfully.');
            }
        }
        return true;
    }
}
