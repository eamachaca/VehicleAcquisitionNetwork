<?php

namespace App\Console\Commands;

use App\Consumer\UserConsumer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vehicles:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all Users from API';

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
        if (User::count() > 0) {
            $this->info('Users has been created.');
            if ($this->confirm('Do you want fresh tables?', true)) {
                Artisan::call('migrate:fresh');
                $this->handle();
            } else
                $this->info('Keeping Tables.');
        } else {
            $users = (new UserConsumer())->all()->map(function ($user) {
                $now = Carbon::now();
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => $user->username,
                    'address' => json_encode($user->address),
                    'phone' => $user->phone,
                    'website' => $user->website,
                    'company' => json_encode($user->company),
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            })->toArray();
            User::insert($users);
            $this->info('Users Created Successfully.');
        }
        return true;
    }
}
