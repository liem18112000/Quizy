<?php

namespace App\Http\Controllers;

use App\Models\User as Lecturer;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Course;
use App\Models\Role;
use App\Models\Profile;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('lecturer');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'lecturers.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, 'lecturers.xlsx');

        return redirect('/')->with('success', 'All good!');
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
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
    public function dashboard()
    {
        

        return view('lecturer.dashboard', [
           
        ]);
    }
  
    public function tableCourse()
    {
        return view('lecturer.table.course', [
            'courses'    => Course::all()
        ]);
    }
}
