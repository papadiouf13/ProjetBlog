<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //afficher le formulaire d'inscription

    public function form_register()
    {
        return view("register");
    }

    public function form_register_post(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('register')->with('status', 'Votre inscription a été bien prise en compte');
    }

    public function form_login()
    {
        return view('login');
    }

    public function form_login_post(Request $request)
    {
        $userConnect = $request->validate([
            'email' => 'required',
            'password'=> 'required',
        ]);
        if (Auth::attempt($userConnect)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }else{
            return redirect()->route('login');
        }
    }
}
