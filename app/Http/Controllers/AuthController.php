<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('username', $request->username)->first();
            $match = Hash::check($request->password, $user->password);

            if ($user && $match) {
                Auth::login($user);

                $request->session()->regenerate();
                return redirect()->intended('home');
            }

            return back()->withErrors([
                'username' => 'username atau password salah',
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                'username' => $e->getMessage(),
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json([
                'message' => 'Logout berhasil',
            ])->setStatusCode(200);
        } catch (\Exception $e) {
            return back()->withErrors([
                'message' => $e->getMessage(),
            ])->setStatusCode(500);
        }

    }
}