<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Post;
use App\Transaction;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('type');

    }
    public function index($user)
    {

        $posts = Post::where('user_id', $user)->orderBy('created_at','DESC')->paginate(6);
        

       
        $count =Transaction::where('admin_id', $user);
        $user = User::findOrFail($user);
        return view('admin', [
            'user' => $user,
        ], compact('posts', 'count'));
    }
}
