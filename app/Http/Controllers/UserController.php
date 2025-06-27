<?php

namespace App\Http\Controllers;
use App\Models\User;    
use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;

class UserController extends Controller
{
    public function myProfile()
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in to view your profile.');
    }

    return view('crud_user.profile', compact('user'));
}
}