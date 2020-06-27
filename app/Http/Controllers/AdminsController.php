<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Post;
use App\Transaction;

class AdminsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('type');

    }
    public function index($user)
    {

        $posts = Post::orderBy('created_at','DESC')->paginate(6);
        $user = User::findOrFail($user);

        return view('admin', [
            'user' => $user,
        ])->with('posts', $posts);
    }
}
