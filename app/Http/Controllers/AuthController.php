<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\UserRole;
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

    public function registration(){
        return view('vendor.adminlte.auth.register');
    }

    public function register(Request $request)
    {
        $backToLogin = redirect()->route('registration');

        $validator = Validator::make($request->all(), $this->model->rules['registration']);
        if($validator->fails()){
            return $backToLogin->withInput()->withErrors($validator);
        }

        $user = $this->model->where('email',$request->email)->first();
        if($user) {
            flash()->error('Email already registered !!');
            return back()->withInput();
        }

        try {
            
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            UserRole::create([
                'role_id' => $request->input('role'),
                'user_id' => $user->id
            ]);

            flash()->success('Registrasi Berhasil !');
            return redirect()->route('login');
        } catch (\Exception $e) {
            flash()->error('Something went wrong, failed to submit data');
            \Log::error($e);
            return back()->withInput();
        }
        
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
