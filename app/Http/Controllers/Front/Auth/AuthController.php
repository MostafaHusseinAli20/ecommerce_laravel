<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
       $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|numeric|unique:users,phone',
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->loginUsingId($user->id);
        return redirect()->intended('/');
    }

    public function login(Request $request){
        $data = $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        if(auth()->attempt($data)){
            return redirect('/');
        }
        return back()->withErrors(['erorr' => 'Invalid Credentials']);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
