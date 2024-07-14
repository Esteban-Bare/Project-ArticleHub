<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfileView()
    {
        $userId = session('userId');

        if (!$userId) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to view this page.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        return view('profile')->with('user', $user);
    }
}