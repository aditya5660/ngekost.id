<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated($request, $user)
    {
        // if ($user->hasRole('Admin') ) {
        //     $this->redirectTo = route('admin.dashboard');

        // } elseif ($user->hasRole('Owner')) {

        //     $this->redirectTo = route('owner.dashboard');

        // } elseif ($user->hasRole('Users')) {

        //     $this->redirectTo = route('users.dashboard');
        // }
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
          }
        return redirect()->intended($this->redirectPath());
    }
}
