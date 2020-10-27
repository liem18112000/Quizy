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
                            <p>Home<span>/</span>Course Details</p>
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
                        <img class="img-fluid" src="{{ asset('img/single_cource.png')}}" alt="">
                    </div>
                    <div class="content_wrapper">

                        <h4 class="title">Course Outline</h4>
                        <div class="content">
                            <ul class="course_list">
                                <li class="justify-content-between align-items-center d-flex">
                                    <h5>Exam list</h5>
                                    <a class="btn_2 text-uppercase" href="{{route('exam.index', $course)}}">View Details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Trainer’s Name</p>
                                    <span class="color">George Mathews</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee </p>
                                    <span>$230</span>
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
                        @if(!Auth::user()->roles->where('role_type_id', '1')->first()->enrollCourse->first())
                        <form action='{{ route('course.enroll', $course)}}' method='POST'>
                            @csrf
                            <button type="submit" class="btn_1 btn-block">Enroll Course</button>
                        </form>
                        @else
                            <a href="javascript:void(0)" class="btn_1 btn-block" href="#" role="button"> Already Enrolled</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection



