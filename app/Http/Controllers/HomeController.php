<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function about()
    {
        return view('about',[
            'courses'   => Course::all()->count(),
            'exams'     => Exam::all()->count(),
            'users'     => User::all()->count(),
            'teachers'  => Role::where('role_type_id', '2')->count()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function contact()
    {
        return view('contact');
    }
}
