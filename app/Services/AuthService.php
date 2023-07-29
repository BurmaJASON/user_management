<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    // register
    public function register($request) {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        auth()->login($user);
        return redirect()->route('dashboard')->with('success','Welcome Dear, ' . $user->name);
    }

    // login
    public function login($request) {
        $user = User::where('email',$request->input('email'))->firstOrFail();
        if(Hash::check($request->input('password'), $user->password)) {
            auth()->login($user);
            return redirect()->route('dashboard')->with('success','Welcome Back');
        }else {
            return back()->withErrors(['password' => 'Incorrect Password!'])->withInput();
        }
    }


}

?>
