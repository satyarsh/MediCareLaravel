<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prescriptions;
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
    public function showProfile()
    {

        $prescriptions = Prescriptions::with(['medication', 'doctor', 'patient'])
            ->where('PatientID', Auth::id())
            ->where('RefillsRemaining', '>', 0)
            ->orderBy('PrescriptionDate', 'desc')
            ->limit(5)
            ->get();

        return view('profile', compact('prescriptions'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'created_at' => now(),
            'updated_at' => now(),
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
