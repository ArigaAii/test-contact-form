<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ログインフォーム表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        //メールアドレス存在チェック
        if (!\App\Models\User::where('email', $request->email)->exists()) {
            return back()
                ->withErrors(['email' => 'ログイン情報が登録されていません'])
                ->withInput();
        }

        // 認証試行
        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors(['password' => 'パスワードに誤りがあります'])
                ->withInput();
        }

        $request->session()->regenerate();
        return redirect('/');
    }
}
