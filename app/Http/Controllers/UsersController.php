<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('usertype');

    }
    public function index($user)
    {
         $userlist = User::where('type','service')->paginate(12);
        

        $user = User::findOrFail($user);

        return view('user', [
            'user' => $user,
        ])->with('userlist', $userlist);
    }
   
}
