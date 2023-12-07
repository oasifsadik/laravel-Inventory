<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated()
    {
        if(Auth::user()->role_as == '1') //1 = Admin Login
        {
            return redirect('dashboard')->with('success','Welcome to your dashboard');
        }
        elseif(Auth::user()->role_as == '0' && Auth::user()->is_approved == 1) // Normal or Default User Login
        {
            return redirect('/user_dashboard')->with('status','Logged in successfully');
        }else {
            // User is not approved, logout and redirect to login page
            Auth::logout();
            return redirect('/login')->with('warningS', 'Your account is not yet approved.');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
