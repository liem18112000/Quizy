<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        //
    }

    public function console()
    {
        return view('admin.console');
    }

    public function makeAccout(Request $request)
    {
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        $profile = Profile::create([
            'user_id'    => $user->id,
        ]);

        switch (strtolower($request->roleType)){
            case 'admin':{
                $role = Role::create([
                    'user_id' => $user->id,
                    'role_type_id' => '3'
                ]);
                alert()->success('Register done!', 'Add new Admin account!');
                break;
            }
            case 'lecturer':{
                $role = Role::create([
                    'user_id' => $user->id,
                    'role_type_id' => '2'
                ]);
                alert()->success('Register done!', 'Add new Lecturer account!');
                break;
            }

            case 'student':{
                $role = Role::create([
                    'user_id' => $user->id,
                ]);
                alert()->success('Register done!', 'Add new Student account!');
                break;
            }

            default:{
                alert()->warning('Register failed!', 'Add new account failed!');
                break;
            }
        }

        return redirect()->back();
    }
}
