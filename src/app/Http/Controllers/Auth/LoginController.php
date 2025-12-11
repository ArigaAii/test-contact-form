<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        \Log::info('LOGIN CONTROLLER RUNNING');

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
        return redirect('/admin');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //ログアウト後にトップ（問い合わせフォーム）へ戻す
        return redirect()->route('contact.index');
    }
}
