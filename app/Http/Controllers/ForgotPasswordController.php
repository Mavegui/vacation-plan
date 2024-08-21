<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function emailForm()
    {
        // Returns the view 'login.password.emailForm' which contains the form to request a password reset link.
        return view('login.password.emailForm');
    }

    /**
     * Send a password reset link to the specified email address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function emailLink(Request $request)
    {
        // Validate that the 'email' field is required and must be a valid email address.
        $request->validate(['email' => 'required|email']);

        // Attempt to send a password reset link to the given email address.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the reset link was sent successfully.
        if ($status == Password::RESET_LINK_SENT) {
            // Redirect back with a success message if the link was sent.
            return redirect()->back()->with('status', __('Password reset link sent! Check your email.'));
        }

        // Redirect back with an error message if the link could not be sent.
        return redirect()->back()->withErrors(['email' => __($status)]);
    }
}
