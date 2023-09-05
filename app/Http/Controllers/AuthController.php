<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }    
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Lakukan tindakan setelah pengguna berhasil login
            $user = Auth::user(); // Dapatkan objek user yang berhasil login
            Config::set('app.timezone', getSetting('time_zone'));
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        } else {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                return back()
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'password' => 'The password entered is incorrect.',
                    ]);
            } else {
                return back()
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => 'These credentials do not match our records.',
                    ]);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
