<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Role;
use App\Models\Profile;
use App\Models\RoleType;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        $numberOfLecturers = count(Role::where('role_type_id', '2')->get());

        $numberOfAdmins = count(Role::where('role_type_id', '3')->get());

        $numberOfExams = count(Exam::all());

        return view('admin.dashboard', [
            'numberOfUsers'         => $numberOfUsers,
            'numberOfCourses'       => $numberOfCourses,
            'numberOfAdmins'        => $numberOfAdmins,
            'numberOfLecturers'     => $numberOfLecturers,
            'numberOfExams'         => $numberOfExams
        ]);
    }

    public function storeUser(Request $request)
    {
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'provider'  => 'application'
        ]);

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->log('New user create by admin');

        $profile = Profile::create([
            'user_id'    => $user->id,
            'profile_image' => $this->storeMediaCloudinary($request, 'profile_image')
        ]);

        activity()
            ->performedOn($profile)
            ->causedBy(Auth::user())
            ->log('New profile create by admin');


        $role = Role::create([
            'user_id' => $user->id,
            'role_type_id' => $request->role_type
        ]);

        activity()
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->log('New role create by admin');

        alert()->success('Register done!', 'Add new account!');

        return redirect()->back();
    }

    public function storeCourse(Request $request)
    {
        $image = $this->storeMediaCloudinary($request, 'image');

        $course = Course::create([
            'name'      => $request->name,
            'image'     => $image,
            'admin_id'  => Auth::user()->id,
            'role_id'   => Auth::user()->roles->where('role_type_id', '3')->first()->id
        ]);

        activity()
            ->performedOn($course)
            ->causedBy(Auth::user())
            ->log('New course create by admin');

        alert()->success('Done!', 'Add new course successfully!');

        return redirect()->back();
    }

    public function users()
    {
        return view('admin.user', [
            'users'      => User::all(),
            'role_types' => RoleType::all(),
        ]);
    }

    public function courses()
    {
        return view('admin.course', [
            'courses'    => Course::all()
        ]);
    }

    public function exams(Course $course)
    {
        return view('admin.exam', [
            'course'    => $course,
            'exams'     => $course->exams,
        ]);
    }

    public function questions(Course $course, Exam $exam)
    {
        return view('admin.question', [
            'course'    => $course,
            'exam'     => $exam,
            'questions'  => $exam->questions
        ]);
    }
}
