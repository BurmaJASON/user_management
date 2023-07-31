<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Services\ProfileService;

class ProfileController extends Controller
{

    public function index() {
        return view('profile.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('profile.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, string $id, ProfileService $profileService)
    {
        return $profileService->update($request,$id);
    }

    public function passwordPage() {
        return view('profile.password');
    }

    public function changePassword(ProfileRequest $request, ProfileService $profileService) {
        return  $profileService->changePassword($request);
    }

}
