<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user()
    {
        return view('vehicle.user')->with('users', User::latest()->paginate(5));
    }
    public function posts($id)
    {
        return view('vehicle.posts')->with('posts',User::find($id)->posts()->latest()->paginate(5));
    }
}
