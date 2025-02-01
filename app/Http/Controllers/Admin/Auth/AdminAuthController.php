<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function register(Request $request){
        $admin = $this->validate($request, [
            'name' => 'required',
            'code' => 'required|unique:admins,code',
            'password' => 'required|min:6',
        ]);

        $admin['password'] = bcrypt($admin['password']);
        Admin::create($admin);

        return redirect()->intended('/dashboard/index');
    }

    public function login(Request $request){
         $admin = $this->validate($request, [
            'code' => 'required|exists:admins,code',
            'password' => 'required|min:6',
        ]);

        if (auth('admin')->attempt(['code' => $request->code, 'password' => $request->password])) {
            return redirect('/dashboard/index');
        }

        return back()->withErrors(['error' => 'Invalid Credentials']);
    }

    public function logout(Request $request) {
        auth('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/dashboard');
    }
}
