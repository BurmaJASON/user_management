<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserLog;
use App\Jobs\UserActionLog;
use Illuminate\Support\Facades\DB;
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

    //show
    public function show($id) {
        $logs = UserLog::where('user_id',$id)->latest()->get();
        foreach ($logs as $log) {
            $json = $log->data;
            $decodedData = json_decode($json, true);
            if ($decodedData && (json_last_error() == JSON_ERROR_NONE)) {
                $log->data = $decodedData;
            }
        }
        $user = User::find($id);

        $logData = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        UserActionLog::dispatch(Auth()->user()->id,'viewed',$logData);

        return view('user.show',compact(['user','logs']));
    }

    //store
    public function store($request) {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
            'password' => Hash::make($request->input('password'))
        ];

        UserActionLog::dispatch(Auth()->user()->id,'created',$data);

        User::create($data);


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

        $user = User::find($id);
        $logData = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        UserActionLog::dispatch(Auth()->user()->id,'updated',$logData);

        User::where('id',$id)->update($data);

        return redirect()->route('user.index')->with('success', "$user->name's account is successfully updated!");
    }

    //delete
    public function delete($id) {
        $user = User::find($id);
        $logData = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        UserActionLog::dispatch(Auth()->user()->id,'deleted',$logData);

        User::where('id',$id)->delete();

        return redirect()->route('user.index')->with('success', "$user->name's account is completely deleted!");
    }
}



?>
