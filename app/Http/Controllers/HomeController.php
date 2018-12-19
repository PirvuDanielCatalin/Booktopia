<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Auth;
use Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $use = new User;
        $use->name = 'abc';
        $use->email = 'a';
        $use->password = 'aaa';
        $use ->save();
        dd(User::orderBy('id','desc')->first());
        */


        /*for($i = 1; $i <= 10; $i++)
            echo $i . "<br>";*/

        $user = Auth::user();
        dd($user->isAdmin());
        /*
        dd(
            $user->comments[0]->text,
            $user->bookcomments[0]->comment_id,
            $user->bookcomments[0]->comment->text
        );
        */

        //$user->roles()->save(Role::find(3));

        /*
        $user = User::all();

        echo '<pre>';
            foreach ($user as $us){
                $roles = $us -> roles;
                foreach($roles as $role) {
                    echo $us->name . ' ' . $role->name . '<br>';
                    // print_r($us);
                    // print_r($role);
                }
            }
        echo '</pre>';
        die();
        */
        return view('home');
    }

    public function testemail()
    {
        Mail::send('test', [], function ($message) {
            $message->to('danut_pirvu2008@yahoo.com', 'Destinatar')
                ->subject('Laravel HTML Testing Mail');
        });
    }

}
