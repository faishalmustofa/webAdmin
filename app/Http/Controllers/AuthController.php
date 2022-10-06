<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct(User $model,Role $role)
    {
        $this->model = $model;
        $this->role = $role;
    }

    public function register(){
        return view('vendor.adminlte.auth.register');
    }

    public function login(){
        return view('vendor.adminlte.auth.login');
    }

    public function postLogin(Request $request)
    {
        $backToLogin = redirect()->route('login');

        $validator = Validator::make($request->all(), $this->model->rules['login']);
        if($validator->fails()){
            return $backToLogin->withInput()->withErrors($validator);
        }
        $credentials = $request->only('email', 'password');

        $user = User::where('email',$request->email)->firstOrFail();
        if ($user){
            $remember = ($request->has('remember') && $request->remember == "on" ? true : false);

            if(!Auth::attempt($credentials,$remember)){
                flash()->error('Invalid Email Or Password!');
                return $backToLogin;
            }
            $redirectAfterLogin = redirect()->route('dashboard');

            flash()->success('Login success!');
            return $redirectAfterLogin;
        } else {
            return $backToLogin;
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
