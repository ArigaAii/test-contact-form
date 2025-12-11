<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Features;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //  Fortifyのルートを有効化
        Fortify::ignoreRoutes(false);
        
        // ログイン画面
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // 会員登録画面
        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::createUsersUsing(\App\Actions\Fortify\CreateNewUser::class);

        // ✅ 登録完了後のリダイレクトを /login に変更
        app()->singleton(RegisterResponse::class, function () {
            return new class implements RegisterResponse {
                public function toResponse($request)
                {
                    return redirect('/login');
                }
            };
        
        });

        Fortify::authenticateUsing(function ($request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });

        Fortify::redirects([
            'login' => '/admin',
        ]);
    }
}