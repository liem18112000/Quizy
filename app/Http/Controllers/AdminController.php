<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
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

    public function dashboard()
    {
        $numberOfCourses = count(Course::all());

        $numberOfUsers = count(User::all());

        return view('admin.dashboard', [
            'numberOfUsers'         => $numberOfUsers,
            'numberOfCourses'       => $numberOfCourses,
        ]);
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

    public function tableUser()
    {
        return view('admin.table.user', [
            'users'      => User::all(),
        ]);
    }

    public function tableCourse()
    {
        return view('admin.table.course', [
            'courses'    => Course::all()
        ]);
    }
}
