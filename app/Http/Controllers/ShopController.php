<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Auth;
use Mail;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop');
    }

    public function control_panel()
    {
        return view('control-panel');
    }

    public function contactemail(Request $request)
    {
        //dd($request->all());
        $subject = (isset($request->subject)) ? $request->subject : '';
        $email = (isset($request->email)) ? $request->email : '';
        $text = (isset($request->text)) ? $request->text : '';
        //dd($subject, $email, $text);
        Mail::send('mail', ['text' => $text], function ($message) use ($subject, $email) {
            $message->subject($subject)
                ->from($email)
                ->to('booktopia.contact@gmail.com', 'Booktopia');
        });
        return back();
    }

}
