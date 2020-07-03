<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Post;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;


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
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/edit')->with("user", $user);
    }
    public function update(Request $request, $id)
    {

        $data = request()->validate([
            
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $file = $request->file('avatar');
        $file->getClientOriginalName();
        $filePath =time().'.'. $file->getClientOriginalName();
        Image::make($file)->save(public_path('/img/'. $filePath));

       
        // $loc=$file->storeAs('public/img', $filePath);
        // $filePath->store('toPath', ['disk' => 'public']);

      


        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone= $request->phone;
        $user->address = $request->address;
        $user->avatar = $filePath;
        $user->save();
        return redirect('/admin/'.auth()->user()->id);
    }
}
