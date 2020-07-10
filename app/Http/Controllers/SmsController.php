<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Nexmo\Laravel\Facade\Nexmo;
use App\User;


class SmsController extends Controller
{
    public function sendSms(Request $request)
    {
        Nexmo::message()->send([
            'to'   => '63' . $request->phone,
            'from' => 'Printee',
            'text' => 'Your document is completed. Ready for pickup or delivery.'
        ]);
        Session::flash('success', 'SMS sent Successfully');
        $user=auth()->user()->id;
        return redirect()->route('transaction.show', [$user]);
        
    }
}
