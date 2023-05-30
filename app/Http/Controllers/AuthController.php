<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthReq;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthService\AuthService;
Use Alert;


class AuthController extends Controller
{
    private $authserv;
    public function __construct()
    {
        $this->authserv = new AuthService;
    }
    public function index()
    {
        return view('Auth.login');
    }
    public function store(AuthReq $req)
    {
        $validation = $req->validated();
        if(Auth::attempt(['email' => $validation['email'],'password' => $validation['password']])){
            return redirect()->intended('dashboard')->with('success','Berhasil login');
        }
    }
    public function logout(Request $req)
    {
        $this->authserv->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/')->with('success','Berhasil Logout');
    }
}
