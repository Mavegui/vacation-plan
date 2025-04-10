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
        
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return redirect()->back()->with('status', __('Password reset link sent! Check your email.'));
        }

        return redirect()->back()->withErrors(['email' => __($status)]);
    }
}
