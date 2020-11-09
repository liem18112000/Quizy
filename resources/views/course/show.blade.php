@extends('layouts.app')

@section('content')

     <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Course Details</h2>
                            <p>Home<span>/</span>All Courses<span>/</span>Course Details</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{$course->image}}" style='width:100%; object-fit:cover' alt="">
                    </div>
                    <div class="content_wrapper">


                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>

                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course</p>
                                    <span>{{$course->name}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Lecturer</p>
                                    <span class="color">
                                        {{$course->teachBy->first() ? $course->teachBy->first()->teachBy->user->name : 'Not Available'}}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Available Seats </p>
                                    <span>15</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Schedule </p>
                                    <span>2.00 pm to 4.00 pm</span>
                                </a>
                            </li>

                        </ul>

                        <h4 class="title">Course Outline</h4>
                        <div class="content">
                            <ul class="course_list">
                                <li class="justify-content-between align-items-center d-flex">
                                    <p>Exam list</p>
                                    <a class="btn_2 text-uppercase" href="{{route('exam.index', $course)}}">View Details</a>
                                </li>
                            </ul>
                        </div>

                        <hr/>
                        @if($course->hasStudent->first() && $course->hasStudent->where('user_id', Auth::user()->id)->first())
                            <a class="btn_1 btn-block" href="{{route('student.course.exam', $course)}}" role="button"> View Exams</a>
                        @else
                            <form action='{{ route('course.enroll', $course)}}' method='POST'>
                                @csrf
                                <button type="submit" class="btn_1 btn-block">Enroll Course</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection



