<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('login.form');
    }

    /**
     * Handle the login request, validate the credentials, and log in the user.
     *
     * This method performs:
     * - Validation of login credentials.
     * - Authentication attempt with provided credentials.
     * - Creation of an authentication token upon successful login.
     * - Redirecting the user to the administration panel or back to the login form with errors.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);

        if (!$authenticated) {
            return redirect()->route('login.index')->withErrors(['error' => 'Invalid email or password, please try again.']);
        } 
        
        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;
        session(['token' => $token]);
        return redirect()->route('admin.dashboard')->with('success', 'Logged in');
    }

    /**
     * Log out the currently authenticated user.
     *
     * This method performs:
     * - Revoking all tokens for the authenticated user.
     * - Clearing the session token.
     * - Redirecting the user to the home page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        session()->forget('token');
        return redirect()->route('site.home');
    }
}
