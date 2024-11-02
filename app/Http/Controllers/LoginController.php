<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class loginController extends Controller
{
    public function show(){
        return view('login.show');
    }
    public function login(Request $request){
       $login=$request->login;
       $password=$request->password;
       $credentials=['email'=>$login,'password'=>$password];
       if (Auth::attempt($credentials)) {
        // Connect
        $request->session()->regenerate();
        return redirect()->route('homepage')->with('success','vous etes bien connecte '.$login." . "); // Corrected from to_route to redirect()->route
      } else {
        // Error handling
        return back()->withErrors([
            'login' => 'Email ou mot de passe incorrect.'
        ])->onlyInput('login');
    }
    
    }
    public function logout(){
    Session::flush();
    Auth::logout();

    return to_route('login')->with('success', 'Vous êtes bien déconnecté.');
    }

}
