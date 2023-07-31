<?php

namespace App\Services;

use App\Models\User;

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
            $data['password'] = $request->input('password');
        }
        User::where('id',$id)->update($data);
        $user = User::find($id);

        return redirect()->route('user.index')->with('success', "$user->name's account is successfully updated!");
    }

    //delete
    public function delete($id) {
        $user = User::find($id);
        User::where('id',$id)->delete();
        return redirect()->route('user.index')->with('success', "$user->name's account is completely deleted!");
    }
}



?>
