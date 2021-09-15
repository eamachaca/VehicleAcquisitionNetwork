<?php

namespace Tests\Feature;

use App\Jobs\CreateCommentsJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class VehicleCommandTest extends TestCase
{
    function import_users_from_api()
    {
        $this->artisan('vehicle:users')
            ->assertExitCode(true);
        $this->assertCount(10, User::all());
    }

    function import_posts_from_api()
    {
        $this->artisan('vehicle:posts')
            ->assertExitCode(true);
        $this->assertCount(100, Post::all());
    }

    function make_comments_to_random_post(){

        Bus::assertDispatched(CreateCommentsJob::class);
    }
}
