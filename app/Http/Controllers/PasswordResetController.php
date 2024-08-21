<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;

class PasswordResetController extends Controller
{
    /**
     * Show the password reset form.
     *
     * This method returns the view for resetting the password, passing the token needed for the password reset.
     *
     * @param  string  $token  The password reset token.
     * @return \Illuminate\View\View
     */
    public function resetForm($token)
    {
        // Returns the view 'login.password.reset' with the password reset token.
        return view('login.password.reset', ['token' => $token]);
    }

    /**
     * Handle the password reset request.
     *
     * This method performs:
     * - Validation of the request data, including token, email, and password.
     * - Password reset process using the provided token and new password.
     * - Redirects the user to the login page with a success message or back with errors.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        // Validate the incoming request data for password reset.
        // Custom validation messages are provided in Portuguese.
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Attempt to reset the password using the provided token and credentials.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Hash and save the new password.
                $user->password = Hash::make($password);
                $user->save();

                // Fire the PasswordReset event.
                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            // Redirect to the login page with a success message if the password was reset successfully.
            return redirect()->route('login.index')->with('status', __('The password was reset successfully!'));
        }

        // Redirect back to the reset form with error messages if the password reset failed.
        return redirect()->back()->withErrors(['email' => [trans($status)]]);
    }
}
