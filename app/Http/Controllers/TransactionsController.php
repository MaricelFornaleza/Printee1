<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $transactions = DB::table('transactions')->where('transactions.user_id', $user)
        ->join('users', 'transactions.admin_id', '=','users.id')
        ->select('transactions.*', 'users.name')->paginate(12);
        $user = User::findOrFail($user);

        return view('transaction.index', [
            'user' => $user,
        ])->with('transactions', $transactions);
    }

    public function view($user)
    {
        $transactions = DB::table('transactions')->where('transactions.user_id', $user)
        ->join('users', 'transactions.admin_id', '=','users.id')
        ->select('transactions.*', 'users.name')->paginate(12);
        $user = User::findOrFail($user);

        return view('transaction.index', [
            'user' => $user,
        ])->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    public function upload($admin_id)
    {
        
        return view('transaction.upload')->with('admin_id', $admin_id);
    }
    public function download($file)
    {
        //  $url = Storage::url($file);
        //  return Storage::download($url);
        $file_path = public_path('uploads/upload.php');
        return response()->download($file_path, 'upload.php');
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'admin_id' => 'required',
            'description' => 'required',
            'file' => ['required', 'file'],

        ]);
        $file = $request->file('file');
        $file->getClientOriginalName();

        $filePath = $file->getClientOriginalName();
        $loc=$file->storeAs('public/storage/uploads', $filePath);

        auth()->user()->transactions()->create([
            'admin_id' => $data['admin_id'],
            'description' => $data['description'],
            'file' => $filePath,
            'path' => $loc
        ]);


       return redirect('/transaction/view/'.auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $transactions = DB::table('transactions')->where('transactions.admin_id', $user)
        ->join('users', 'transactions.user_id', '=','users.id')
        ->select('transactions.*', 'users.name')->paginate(12);
        $user = User::findOrFail($user);
      
        
        return view('transaction.show', [
            'user' => $user,
        ],compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction =Transaction::find($id);
        $transaction->status = $request->status;
        $transaction->save();
        $user=auth()->user()->id;
        return redirect()->route('transaction.show', [$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
