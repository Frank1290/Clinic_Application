<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view_login()
    {
        return view('pages/login');
    }
    public function check_login(Request $request)
    {
        $login = Login::all();
        // return $login;
        $id = $login[0]['id'];
        $admin = $login[0]['username'];
        $password = $login[0]['password'];
        if ($admin === $request->username && $password === $request->password) {
            $request->session()->put('LoggedUser', $id);
            return redirect('check_profile');
            // return "checked";
        } else {
            return "Unchecked";
        }
    }

    public function check_profile()
    {
        if (session()->has('LoggedUser'));
        $login = Login::where('id', '=', session('LoggedUser'))->first();
        $data = [
            'LoggedUserInfo' => $login
        ];
        return redirect('main')->with('$data');
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('');
        }
    }
}
