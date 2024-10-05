<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AuthRequest;
use App\Models\Author;

class AuthController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function register()
    {
        return view('register');
    }

    public function create(AuthRequest $request)
    {
        $form = $request->all();
        // ここにユーザー作成のロジックを追加する必要があります
        return redirect('login');
    }

    public function handleRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // ここにユーザー作成のロジックを追加する

        return redirect()->route('thanks');
    }

    public function login()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => '入力された認証情報が記録と一致しません。',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
