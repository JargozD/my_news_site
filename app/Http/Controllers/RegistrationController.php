<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function submit(Request $req)
    {
        $validation = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            //'login' => 'required|min:3',
            'password' => 'required|min:8',
        ]);

        $registration = new Registration();
        $registration->name = $req->input('name');
        $registration->email = $req->input('email');
        //$registration->login = $req->input('login');
        $registration->password = $req->input('password');

        $registration->save();

        return "Nice";
        // return redirect()->route('home')->with('success', 'Вы успешно зарегистрировались!');
    }
}
