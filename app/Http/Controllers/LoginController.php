<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Обработка попыток аутентификации.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            return redirect('/news')->with('success', 'Вы успешно вошли в аккаунт!');
        }

        return back()->withErrors([
            'email' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ])->onlyInput('email');
    }

    /**
     * Выход пользователя из приложения.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/news');
        // return redirect('/');
    }
}
