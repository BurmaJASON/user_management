<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Services\ProfileService;

class ProfileController extends Controller
{


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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }



    public function passwordPage() {
        return view('profile.password');
    }

    public function changePassword(ProfileRequest $request, ProfileService $profileService) {
        return  $profileService->changePassword($request);
    }

}
