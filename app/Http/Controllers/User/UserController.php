<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserService $userService)
    {
        return $userService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserService $userService,string $id)
    {
        return $userService->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,UserService $userService, string $id)
    {
        return $userService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserService $userService,string $id)
    {
        return $userService->delete($id);
    }
}
