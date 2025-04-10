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

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = $request->all();
        $user['password'] = bcrypt($request->password);
        $user = User::create($user);
        Auth::login($user);
        return redirect()->route('login.index');
    }
}
