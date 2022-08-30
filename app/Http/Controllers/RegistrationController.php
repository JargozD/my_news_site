<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function submit(Request $req)
    {
        $validation = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $registration = new User();
        $registration->name = $req->input('name');
        $registration->email = $req->input('email');
        $registration->password = Hash::make($req->input('password'));

        $registration->save();

        return view('/reg')->with(['success' => 'Вы успешно зарегистрировались!']);
    }
}
