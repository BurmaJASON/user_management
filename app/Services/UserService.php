<?php

namespace App\Services;

use App\Jobs\UserActionLog;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // index
    public function index() {
        return view('user.index',[
            'users' => User::latest()
                            ->filter(request('search'))
                            ->paginate(6)
                            ->withQueryString()
        ]);
    }

    //store
    public function store($request) {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
            'password' => Hash::make($request->input('password'))
        ];

        User::create($data);

        $logData = [$data['name'],$data['email']];

        UserActionLog::dispatch(Auth()->user()->id,'created',$logData);

        return redirect()->route('user.index')->with('success', "You have successfully created an account!");
    }

    // edit
    public function edit($id) {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    // update
    public function update($request,$id) {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => $request->input('status')
        ];
        if($request->input('password') != null) {
            $data['password'] = Hash::make($request->input('password'));
        }
        User::where('id',$id)->update($data);
        $user = User::find($id);
        $logData = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        UserActionLog::dispatch(Auth()->user()->id,'updated',$logData);

        return redirect()->route('user.index')->with('success', "$user->name's account is successfully updated!");
    }

    //delete
    public function delete($id) {
        $user = User::find($id);
        User::where('id',$id)->delete();
        UserActionLog::dispatch(Auth()->user()->id,'deleted',$user);
        return redirect()->route('user.index')->with('success', "$user->name's account is completely deleted!");
    }
}



?>
