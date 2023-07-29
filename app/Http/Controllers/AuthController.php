<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{

    //Dashboard
    public function index() {
        return view('dashboard');
    }

    //Register
    public function register(RegisterRequest $request, AuthService $authService){
        return $authService->register($request);
    }

    //Login
    public function login(LoginRequest $request, AuthService $authService) {
        return $authService->login($request);
    }

    //Logout
    public function logout() {
        auth()->logout();
        return redirect('/');
    }


}
