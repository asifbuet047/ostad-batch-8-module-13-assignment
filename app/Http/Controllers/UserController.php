<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewRegistrationForm(Request $req)
    {
        return view('signup_page');
    }

    public function viewLoginPage(Request $req)
    {
        return view('/login_page');
    }

    public function storeUserIntoDB(Request $req)
    {
        $validateUser = $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Email is mandatory.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'Password cannot be empty.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        User::create([
            'name' => $validateUser['name'],
            'email' => $validateUser['email'],
            'password' => $validateUser['password']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => "{$validateUser['name']} successfully registered"
        ]);
    }

    public function loginUser(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'Please enter your email.',
            'email.email' => 'Enter a valid email address.',
            'password.required' => 'Password cannot be empty.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid email or password.',
            ], 401);
        }

        Auth::login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful.',
            'user' => $user
        ]);
    }
}
