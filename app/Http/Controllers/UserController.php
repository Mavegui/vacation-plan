<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Returns the view 'login.create' which contains the form to create a new user account.
        return view('login.create');  
    }

    /**
     * Store a newly created user in the database and authenticate the user.
     *
     * This method is responsible for:
     * - Validating the data from the account creation form.
     * - Creating a new user record in the database.
     * - Authenticating the newly created user.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data for user creation.
        // The validation rules and custom messages are provided in Portuguese.
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);
        
        // Retrieve all input data from the request.
        $user = $request->all();
        
        // Encrypt the password before storing it in the database.
        $user['password'] = bcrypt($request->password);
        
        // Create a new user record in the database with the provided data.
        $user = User::create($user);
        
        // Log in the newly created user.
        Auth::login($user);
        
        // Redirect the user to the login page.
        return redirect()->route('login.index');
    }
}
