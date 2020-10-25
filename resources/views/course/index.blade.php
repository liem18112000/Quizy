@extends('layouts.app')

@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Course List</h2>
                        <p>Home<span>/</span>Course</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->


    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h2>Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($courses as $course)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="img/special_cource_1.png" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href=""><h3>{{$course->name}}</h3></a>
                            <p>UID: {{$course->id}}</p>
                            <p>Date Created: {{$course->cresated_date}}</p>
                            <p>Lecture:  </p>
                            <div class="text-center">
                            <a href="" class="btn_4">Join In</a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
            </div>
            <div class='row'>
                <div class='col-12'>
                    <div align='center'>
                        {{ $courses->links( "pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->







@endsection
