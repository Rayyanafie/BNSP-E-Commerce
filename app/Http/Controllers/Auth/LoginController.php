<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Check user role and redirect accordingly
            $user = Auth::user();

            if ($user->role === 1) {
                return redirect()->route('admin.index'); // Redirect to admin dashboard
            } elseif ($user->role === 2) {
                return redirect()->route('user.index');  // Redirect to user dashboard
            }
        } else {
            // Redirect back with error message if login fails
            return back()->withErrors(['username' => 'The provided credentials do not match our records.']);
        }
    }



}
