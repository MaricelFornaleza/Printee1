<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

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
    public function edit($id)
    {
        $user = User::find($id);
        return view('user/edit')->with("user", $user);
    }
    public function update(Request $request, $id)
    {

        $file = $request->file('avatar');
        $file->getClientOriginalName();
        $filePath = time().'.'.$file->getClientOriginalName();
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
        return redirect('/user/'.auth()->user()->id);
    }
}
