<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upgradeRole(Request $request)
    {
        $role = Role::create([
            'role_type_id'      => $request->role_type_id,
            'user_id'           => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profile.show', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->update([
            'location'  => $request->location,
            'DOB'       => $request->DOB,
            'bio'       => $request->bio,
        ]);

        if ($profile) {
            alert()->success('Done', 'Profile updated successfully...');
        } else {
            alert()->error('Failed', 'Profile updated failed...');
        }

        return redirect()->route('profile.show', $profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
