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
        // Returns the view 'login.form' which contains the login form.
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
        // Validate the incoming request data for login.
        // Custom validation messages are provided in Portuguese.
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        // Extract credentials from the request.
        $credentials = $request->only('email', 'password');
        
        // Attempt to authenticate the user with the provided credentials.
        $authenticated = Auth::attempt($credentials);

        if (!$authenticated) {
            // Redirect back to the login form with an error message if authentication fails.
            return redirect()->route('login.index')->withErrors(['error' => 'Invalid email or password, please try again.']);
        } 
        
        // Retrieve the authenticated user.
        $user = Auth::user();
        
        // Create a new authentication token for the user.
        $token = $user->createToken('API Token')->plainTextToken;
        
        // Store the token in the session and redirect the user to the administration panel with a success message.
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
        // Check if the user is authenticated and has a valid token.
        if ($request->user()) {
            // Revoke all tokens for the authenticated user.
            $request->user()->tokens()->delete();
        }

        // Remove the token from the session and redirect the user to the home page.
        session()->forget('token');
        return redirect()->route('site.home');
    }
}
