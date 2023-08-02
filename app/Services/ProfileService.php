<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileService
{

    //index
    public function index() {
        $logs = UserLog::where('user_id',Auth::user()->id)->latest()->get();
        foreach ($logs as $log) {
            $json = $log->data;
            $decodedData = json_decode($json, true);
            if ($decodedData && (json_last_error() == JSON_ERROR_NONE)) {
                $log->data = $decodedData;
            }
        }
        return view('profile.index',compact('logs'));
    }



    //password change
    public function changePassword ($request) {
        $user = User::where('id',Auth::user()->id)->first();
        $pass = $user->password;

        if(Hash::check($request->input('currentPassword'), $pass)) {
            $newPass = $request->input('password');

            $updateUser = [
                'password' => Hash::make($newPass),
                'updated_at' => Carbon::now()
            ];
            User::where('id',Auth::user()->id)->update($updateUser);

            return redirect('dashboard')->with('success', 'Your Password is successfully updated!');
        }else {
            return back()->with('passUpdateFail', 'Old Password Do not Match!');
        }
    }

    //profile change
    public function update($request, $id) {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];
        User::where('id',$id)->update($data);
        return redirect('dashboard')->with('success', 'Your Account is successfully updated!');
    }
}

?>
