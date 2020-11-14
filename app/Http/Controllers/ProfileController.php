<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function upgradeRole(Request $request)
    {
        $request->validate([
            'role_type_id'          => 'required',
        ]);

        $roles = null;

        if (isset(Auth::user()->id)) {
            $role = Role::create([
                'role_type_id'      => $request->role_type_id,
                'user_id'           => Auth::user()->id,
            ]);
        }

        activity()
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->log('Role is upgraded');

        alert()->success('Done', 'Update Role successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Profile $profile
     * @return Response
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
     * @param Request $request
     * @param Profile $profile
     * @return Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'location'  => 'required',
            'DOB'       => 'required',
            'bio'       => 'required',
        ]);

        $profile = $profile->update([
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

    public function destroy(Profile $profile)
    {
        //
    }
}
