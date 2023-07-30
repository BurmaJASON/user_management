<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    //password change
    public function changePassword ($request) {
        $user = User::where('id',Auth::user()->id)->first();
        $pass = $user->password;

        if(Hash::check($request->input('currentPassword'), $pass)) {
            $newPass = Hash::make($request->input('password'));

            $updateUser = [
                'password' => $newPass,
                'updated_at' => Carbon::now()
            ];
            User::where('id',Auth::user()->id)->update($updateUser);

            return redirect('dashboard')->with('success', 'Your Password is successfully updated!');
        }else {
            return back()->with('passUpdateFail', 'Old Password Do not Match!');
        }
    }
}

?>
