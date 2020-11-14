<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\EnrollCourse;
use App\Models\Role;
use App\Models\Profile;
use App\Models\RoleType;
use App\Models\Exam;
use App\Models\Teaching;
use App\Models\UserRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        /**
         * Auth : middleware for authentication : login
         * Admin : middleware for chech is an admin : isAdmin
         */
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * @return Application|Factory|View
     */
    public function dashboard()
    {
        // Count all the courses
        $numberOfCourses = count(Course::all());

        // Count all the users
        $numberOfUsers = count(User::all());

        // Count all the lecturers : '2' is the role_type_id of role Lecturer
        $numberOfLecturers = count(Role::where('role_type_id', '2')->get());

        // Count all the admins : '3' is the role_type_id of role admin
        $numberOfAdmins = count(Role::where('role_type_id', '3')->get());

        // Count all the exams
        $numberOfExams = count(Exam::all());

        // Return view
        return view('admin.dashboard', [
            'numberOfUsers'         => $numberOfUsers,
            'numberOfCourses'       => $numberOfCourses,
            'numberOfAdmins'        => $numberOfAdmins,
            'numberOfLecturers'     => $numberOfLecturers,
            'numberOfExams'         => $numberOfExams,
            'requests'              => UserRequest::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeUser(Request $request)
    {
        // Validate request data
        $request->validate([
            'name'          => 'required',
            'email'         => 'required:max:255',
            'password'      => 'required|max:255',
            'role_type_id'  => 'required',
            'profile_image' => 'required'
        ]);

        // Create new user
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'provider'  => 'application'
        ]);

        // Log event to ActivityLog
        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->log('New user create by admin');

        // Create new Profile
        $profile = Profile::create([
            'user_id'    => $user->id,
            'profile_image' => $this->storeMediaCloudinary($request, 'profile_image')
        ]);

        // Log event to ActivityLog
        activity()
            ->performedOn($profile)
            ->causedBy(Auth::user())
            ->log('New profile create by admin');

        // Create new Role
        $role = Role::create([
            'user_id' => $user->id,
            'role_type_id' => $request->role_type
        ]);

        // Log event to ActivityLog
        activity()
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->log('New role create by admin');

        // Popup success alert
        alert()->success('Register done!', 'Add new account!');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
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

    /**
     * @return Application|Factory|View
     */
    public function users()
    {
        return view('admin.user', [
            'users'      => User::all(),
            'role_types' => RoleType::all(),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function courses()
    {
        return view('admin.course', [
            'courses'    => Course::all()
        ]);
    }


    /**
     * @param Course $course
     * @return Application|Factory|View|RedirectResponse
     */
    public function exams(Course $course)
    {
        if (isset($course->exams)) {
            return view('admin.exam', [
                'course'    => $course,
                'exams'     => $course->exams,
            ]);
        }

        // Popup warning alert
        alert()->warning('Ops?', 'Something went wrong?');

        return redirect()->back();
    }

    public function questions(Course $course, Exam $exam)
    {
        if (isset($exam->questions)) {
            return view('admin.question', [
                'course'    => $course,
                'exam'     => $exam,
                'questions'  => $exam->questions
            ]);
        }

        // Popup warning alert
        alert()->warning('Ops?', 'Something went wrong?');

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     */
    public function allRequests()
    {
        return view('admin.request.index', [
            'requests'      => UserRequest::where('status', '1')->get()
        ]);
    }

    /**
     * @param UserRequest $request
     * @return bool
     */
    private function tackleRequest(UserRequest $request)
    {
        // Validate request data
        $request->validate([
            'request_type_id'   => 'required',
            'course_id'         => 'required',
            'user_id'           => 'required'
        ]);

        if (isset($request->request_type_id)) {
            switch($request->request_type_id)
            {
                case 1:{
                    Teaching::create([
                        'course_id' => $request->data,
                        'user_id'   => $request->user_id,
                        'role_id'   => Role::where('user_id', $request->user_id)->where('role_type_id', '2')->first()->id,
                    ]);

                    alert()->success('Done', 'Request verified successfully');
                    break;
                }

                case 2:{
                    $teach = Teaching::where('user_id', $request->user_id)->where('course_id', $request->data)->first();
                    $teach->delete();

                    alert()->success('Done', 'Request verified successfully');
                    break;
                }

                case 3: {
                    Role::create([
                        'user_id' => $request->user_id,
                        'role_type_id'  => $request->data,
                    ]);

                    alert()->success('Done', 'Request verified successfully');
                    break;
                }

                default: {
                    break;
                }
            }
        }

        return true;
    }

    /**
     * @param UserRequest $userRequest
     * @return RedirectResponse
     */
    public function verify(UserRequest $userRequest)
    {
        $userRequest->update([
            'request_status'        => 'success',
            'admin_id'              => Auth::user()->id,
        ]);

        alert()->success('Done', 'User request verified successfully');

        if($this->tackleRequest($userRequest))
        {
            alert()->success('Done', 'User request execute done');
        }else{
            alert()->error('Ops', 'User request exec failed');
        }

        return redirect()->back();
    }

    /**
     * @param UserRequest $userRequest
     * @return RedirectResponse
     */
    public function deny(UserRequest $userRequest)
    {
        if (isset(Auth::user()->id)) {
            $userRequest->update([
                'request_status'        => 'failed',
                'admin_id'              => Auth::user()->id,
            ]);
        }

        alert()->success('Done', 'User request reject successfully');
        return redirect()->back();
    }
}
