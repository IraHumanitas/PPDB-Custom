<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ResetsPasswords;


class AuthController extends Controller
{
    
    public function loadRegister()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' =>'string|required|confirmed|min:6',
            'role' => 'required|integer|in:0,1,2,3,4'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = $request->password;

        $user->role = $request->role;
        $user->save();

        return back()->with('success','Your Registration has been successfull.');
    }

    public function loadLogin()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('name','password');
        if(Auth::attempt($userCredential)){

            $route = $this->redirectDash();
            return redirect($route);
        }
        else{
            return back()->with('error','Username & Password is incorrect');
        }
    }

    public function loadDashboard()
    {
        return view('administrator.dashboard');
    }


    public function redirectDash()
    {
        $redirect = '';

        if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/super-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 2){
            $redirect = '/sub-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 3){
            $redirect = '/admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 4){
            $redirect = '/asal-sekolah/dashboard';
        }
        else{
            $redirect = '/dashboard';
        }

        return $redirect;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
