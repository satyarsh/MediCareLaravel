<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
  
    public function showLogin()
    {
        return view('login');
    }
    public function showProfile() {
      return view('profile');
    }
  
    public function register(Request $request)
    {
        $validated = $request->validate([
          'username' => 'required|string|max:255',
          'email' => 'required|email|unique:users',
          'password' => 'required|string|min:8|confirmed',
        ]);
  
        $user = User::create($validated);
  
        Auth::login($user);
  
        return redirect()->route('index');
    }
  
    public function login(Request $request)
    {
        $validated = $request->validate([
          'email' => 'required|email',
          'password' => 'required|string|min:8',
        ]);
  
        if (Auth::attempt($validated)) {
          $request->session()->regenerate();
  
          return redirect()->route('index');
        }
  
        throw ValidationException::withMessages([
          'credentials' => 'Sorry, incorrect credentials',
        ]);
    }
  
    public function logout(Request $request)
    {
        Auth::logout();
  
        $request->session()->invalidate();
        $request->session()->regenerateToken();
  
        return redirect()->route('show.login');
    }
}
