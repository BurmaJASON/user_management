<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLog;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{

    //Dashboard
    public function index() {
        $logs = UserLog::latest()->take(10)->get();
        foreach ($logs as $log) {
            $json = $log->data;
            $decodedData = json_decode($json, true);
            if ($decodedData && (json_last_error() == JSON_ERROR_NONE)) {
                $log->data = $decodedData;
            }
        }
        return view('dashboard',[
            'users' => User::latest()->take(6)->get(),
            'count' => User::count(),
            'logs' => $logs
        ]);
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
