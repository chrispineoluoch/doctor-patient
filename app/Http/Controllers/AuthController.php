<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("auth.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            "email"=> "required|email",
            "password"=>"required"
        ]);

        // Extract email and password from the request
        $credentials = $request->only("email","password");

        // Check if the "remember" checkbox is filled
        $remember = $request->filled("remember");

        // Attempt to authenticate the user using the provided credentials
        if(Auth::attempt($credentials, $remember)) 
        {
            // Redirect the user to the intended URL or the default URL ('/')
            return redirect()->intended('/');
        }
        else
        {
            // If authentication fails, redirect back with an error message
            return redirect()->back()
                ->with('error', 'Invalid credentials');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        // Log out the currently authenticated user clearing the user's authentication status and session data.
        Auth::logout();

        // Invalidate the user's session to clear any existing session data and prevent session hijacking
        request()->session()->invalidate();

        // Regenerate the CSRF token for enhanced security to protect against Cross-Site Request Forgery attacks.
        request()->session()->regenerateToken();

        // Redirect the user to the home page
        return redirect('/');
    }
}
